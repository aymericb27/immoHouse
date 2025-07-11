const { createApp, ref, watch } = Vue
createApp({
  
  setup() {
    isDropLangVisible = ref(true)

    const showDropdownLang = () =>{
      isDropLangVisible.value = !isDropLangVisible.value
    }


    //** Welcome page **//

    const pageHtml = ref(null); // contiendra la réponse HTML

    const form_welcome = ref({
        search_text: '',
        sell_or_rent: '',
        sub_type_property: '',
        minimum_price: '',
        maximum_price: '',
      });

      const successMessage = ref('');
      const errorMessage = ref('');

      const submitForm = async () => {
        try {
          const response = await axios.post('/researchInList', form_welcome.value, {
            headers: { 'Accept': 'text/html' }
          });
          pageHtml.value = response.data;
        } catch (error) {
          successMessage.value = '';
          errorMessage.value = 'Erreur lors de l\'envoi du formulaire.';
          console.error(error);
        }
      };

      //** listing properties page **//


      const form_listing_properties = ref({
        search_text : '',
        sub_type_property_tab : [],
        minimum_price : '',
        maximum_price : '',
        minimum_frontage : 0,
        maximum_frontage : 4,
        minimum_bedroom : 0,
        maximum_bedroom : 4,
        minimum_total_area : '',
        maximum_total_area : '',
        minimum_living_area : '',
        maximum_living_area : '',
      })


      /* display the number of properties available according to the change in the filter used */
      const numberProperties = ref(0)
      const listingProperties = ref()
      watch(form_listing_properties.value, async(data)=> {
         try {
        const response = await axios.post('/getNumberPropertiesMoreFilter', form_listing_properties.value, {
            headers : {'accept': 'text/html'}
          })
          numberProperties.value = response.data

        } catch (error) {
          showError(error)
        }
      })

      const sendFilterFormListingProperties = async() => {
        try {
          const response = await axios.post('/researchInList', form_listing_properties.value, {
            headers : {'accept': 'text/html'}
          })
          listingProperties.html = response.data

        } catch (error) {
          showError(error)
        }
      }

      //** Common function  **//

  
  /* Fonction use to decrease or increase the value of an input with the two buttons plus and less at the extremity */
   const incrOrDecrInteger = (action, formRef, fieldName) => {
      const currentValue = formRef[fieldName] ?? 0;

      if (action === 'less' && currentValue > 0) {
        formRef[fieldName]--;
      } else if (action === 'plus') {
        formRef[fieldName]++;
      }
      console.log(formRef);
    };

    const showError = (error) =>{
      alert(error);
      console.error(error);
    }

    return {
      showDropdownLang,
      isDropLangVisible,
      form_welcome, 
      form_listing_properties,
      submitForm, 
      pageHtml,
      numberProperties,
      listingProperties,
      incrOrDecrInteger,
      sendFilterFormListingProperties,
    }
  }
}).mount('#app')