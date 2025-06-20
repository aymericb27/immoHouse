<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies_users extends Model
{
    use HasFactory;
    protected $table = 'companies_users';

    protected $fillable = [
        'fk_companies',
        'fk_users',
    ];
}
