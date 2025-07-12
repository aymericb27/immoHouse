createApp({
    setup() {
        isDropLangVisible = ref(true);

        const showDropdownLang = () => {
            isDropLangVisible.value = !isDropLangVisible.value;
        };
        return {
            isDropLangVisible,
            showDropdownLang,
        };
    },
}).mount("#header");
