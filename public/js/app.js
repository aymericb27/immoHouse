const { createApp, ref, watch, onMounted } = Vue;

createApp({
    setup() {
        const el = document.getElementById("listingOfProperties");

        const properties_filter = JSON.parse(el.dataset.properties);

        //** listing properties page **//

        const form_listing_properties = ref({
            search_text: properties_filter["search_text"],
            sell_or_rent: [properties_filter["sell_or_rent"]],
            sub_type_property_tab: [properties_filter["sub_type_property"]],
            minimum_price: properties_filter["minimum_price"],
            maximum_price: properties_filter["maximum_price"],
            minimum_frontage: properties_filter["minimum_frontage"]
                ? properties_filter["minimum_frontage"]
                : 1,
            maximum_frontage: properties_filter["maximum_frontage"]
                ? properties_filter["maximum_frontage"]
                : 4,
            minimum_bedroom: properties_filter["minimum_bedroom"]
                ? properties_filter["minimum_bedroom"]
                : 0,
            maximum_bedroom: properties_filter["maximum_bedroom"]
                ? properties_filter["maximum_bedroom"]
                : 4,
            minimum_total_area: properties_filter["minimum_total_area"],
            maximum_total_area: properties_filter["maximum_total_area"],
            minimum_living_area: properties_filter["minimum_living_area"],
            maximum_living_area: properties_filter["maximum_living_area"],
        });

        const numberProperties = ref(0);
        const listingProperties = ref([]);

        /* display the number of properties available according to the change in the filter used */

        watch(form_listing_properties.value, async (data) => {
            sendGetNumberProperties(data);
        });

        const sendGetNumberProperties = async () => {
            try {
                const response = await axios.post(
                    "/getNumberPropertiesMoreFilter",
                    form_listing_properties.value,
                    {
                        headers: { accept: "text/html" },
                    }
                );
                numberProperties.value = response.data;
                console.log(properties_filter);
            } catch (error) {
                showError(error);
            }
        };

        const researchInList = async () => {
            try {
                const response = await axios.post(
                    "/researchInList",
                    form_listing_properties.value,
                    {
                        headers: { accept: "json" },
                    }
                );
                console.log(response);
                listingProperties.value = response.data.properties;
            } catch (error) {
                showError(error);
            }
        };

        onMounted(async () => {
            sendGetNumberProperties();
            researchInList();
        });

        //** Common function  **//

        /* Fonction use to decrease or increase the value of an input with the two buttons plus and less at the extremity */
        const incrOrDecrInteger = (action, formRef, fieldName) => {
            const currentValue = formRef[fieldName] ?? 0;

            if (action === "less" && currentValue > 0) {
                formRef[fieldName]--;
            } else if (action === "plus") {
                formRef[fieldName]++;
            }
            console.log(formRef);
        };

        const showError = (error) => {
            alert(error);
            console.error(error);
        };

        return {
            form_listing_properties,
            numberProperties,
            listingProperties,
            incrOrDecrInteger,
            researchInList,
        };
    },
}).mount("#listingOfProperties");
