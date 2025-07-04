const { createApp, ref } = Vue
createApp({
  
  setup() {
    isDropLangVisible = ref(true)

    const showDropdownLang = () =>{
      isDropLangVisible.value = !isDropLangVisible.value
    }

    const pageHtml = ref(null); // contiendra la réponse HTML

    const form = ref({
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
          const response = await axios.post('/researchInList', form.value, {
            headers: { 'Accept': 'text/html' }
          });
          pageHtml.value = response.data;
        } catch (error) {
          successMessage.value = '';
          errorMessage.value = 'Erreur lors de l\'envoi du formulaire.';
          console.error(error);
        }
      };

    return {
      showDropdownLang,
      isDropLangVisible,
      form, 
      submitForm, 
      pageHtml,
    }
  }
}).mount('#app')