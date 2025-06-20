<?php

namespace App\Repositories;
use Stripe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pack;
use App\Models\Promo;
use App\Models\UsersPromo;
use App\Models\Property;
use App\Models\Order;
class PaymentRepository
{

	public function __construct(Order $order)
	{
        $this->order = $order;
	}

    public function getAllPaymentMethod(){
        $paymentMethod = [];
        $paymentMethod['sell'] = $this->getPaymentPack(1);
        $paymentMethod['rent'] = $this->getPaymentPack(2);
     return $paymentMethod;
    }

    private function getPaymentPack($sellOrRent){
        $paymentMethod = [];
        $method = [ 1 =>'essential', 2 => 'standard', 3 => 'premium' ];
        foreach($method as $index => $value){
            $paymentMethod[$value] = Pack::select('price','id','fk_number_week')->where('fk_type_pack',$index)->where('fk_sell_or_rent',$sellOrRent)->get();
        }
        return $paymentMethod;
    }

    public function getPackById($id){
        return Pack::select('price')->where('id',$id)->first();
    }

    public function getPromoByCode($code){
        return Promo::where('code',$code)->first();
    }

    public function getNumberWeek(){
        return DB::table('number_week')->get();
    }

	public function save($request, $idProperty)
	{
        $this->order->fk_pack = $request->get('pack');
        $this->order->is_active = 1;
        $this->order->fk_users_promo = null;
        $this->order->fk_property = $idProperty;
        $this->order->id_stripe = null;
        $pack = $this->getPackById($request->get('pack'));
        $price = (int) str_replace(".", "", $pack->price);
        $promoCode = $this->getPromoByCode($request->get('promo_code'));
        if($promoCode){
           $fk_promo = $promoCode->id;
           $promoUser = UsersPromo::where('fk_promo', $fk_promo)->where('fk_users', $request->get('fk_users'))->first();
           if(!$promoUser){
               $price = round(($price / 100 ) * $promoCode->promo_pourcent);
                $idusersPromo = UsersPromo::insertGetId([
                    "fk_users" => $request->get('fk_users'),
                    "fk_promo" => $fk_promo,
                    "count_promo" => 1,
                ]);
                $this->order->fk_users_promo = $idusersPromo;
                if($promoCode->promo_pourcent == 100){
                    $this->order->save();
                    Property::where('id',$idProperty)->update([
                        'is_online' => 1,
                    ]);
                    return ['redirect' => 'property', 'url' => url('/')];
                }
           } else {
               if($promoCode->count_max >= $promoUser->count_promo ){
                   $price = round(($price / 100 ) * $promoCode->promo_pourcent);
                   $this->order->fk_users_promo = $promoUser->id;
                   $count_promo = ++$promoUser->count_promo;
                   UsersPromo::where('id', $promoUser->id)->update([
                       'count_promo' => $count_promo,
                   ]);

                   if($promoCode->promo_pourcent == 100){
                        $this->order->save();
                        Property::where('id',$idProperty)->update([
                            'is_online' => 1,
                        ]);
                        return ['redirect' => 'property', 'url' =>url('/')];
                    }
               }
           }
        }

        $paymentMethod = $request->get('type_payment');
        if($paymentMethod === 'bancontact'){
            $idSession = $this->createStripeSource($price, $request->get('contact_email'));
            $secretId = $idSession->id;

        } elseif ($paymentMethod === 'visa'){
            $idSession = $this->createStripeSession($price, $request->get('contact_email'));
            $secretId = $idSession;
        }
        $this->order->id_stripe = $secretId;
        $this->order->save();
        return ['redirect' => 'payment', 'payement_method' => $paymentMethod, "session" => $idSession];
	}

    public function paymentSuccess(){

    }

    public function paymentCancel(){

    }
    private function createStripeSession($amount, $email){

        Stripe\Stripe::setApiKey('sk_test_zkZylv1VXC1geSp1FR53RemV00xFy483eS');
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => __('publication of announcement'),
                'amount' => $amount,
                'currency' => 'eur',
                'quantity' => 1,
            ]],
            'customer_email' => $email,
            'success_url' => url('paymentSuccess'),
            'cancel_url' => url('paymentCancel'),
        ]);

        return $session->id;
    }

    private function createStripeSource($amount, $email){
        Stripe\Stripe::setApiKey('sk_test_zkZylv1VXC1geSp1FR53RemV00xFy483eS');

        $session = \Stripe\Source::create([
            "type" => "bancontact",
            "currency" => "eur",
            "amount" => $amount,
            "owner" => [
                "name" => "baurain",
                "email" => $email,
            ],
            "redirect" => [
                "return_url" =>  url('paymentSuccess'),
            ],
        ]);

        return $session;
    }
}
