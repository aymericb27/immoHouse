// This sample uses the Places  widget to:
// 1. Help the user select a place
// 2. Retrieve the address components associated with that place
// 3. Populate the form fields with those address components.
// This sample requires the Places library, Maps JavaScript API.
// Include the libraries=places parameter when you first load the API.
// For example: <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
let autocomplete;
let address1Field;
let address2Field;
let postalField;
let countPlace = 0;
$listPlaceResearch = [];
function initAutocomplete() {
    if($('#ship-address').length != 0){
        address1Field = document.querySelector("#ship-address");
        postalField = document.querySelector("#postcode");
        autocomplete = new google.maps.places.Autocomplete(address1Field, {
            componentRestrictions: { country: ["be"] },
            fields: ["address_components", "geometry"],
            types: ["address"],
        });
        // Create the autocomplete object, restricting the search predictions to
        // addresses in the US and Canada.

        if(address1Field){
            address1Field.focus();
        }
        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener("place_changed", fillInAddress);
    }

    if($('#searchText').length !== 0){
        address1Field = document.querySelector("#searchText");
        autocomplete = new google.maps.places.Autocomplete(address1Field, {
            componentRestrictions: { country: ["be"] },
            fields: ["address_components", "geometry"],
            types: ["(regions)"],
        });

        if(address1Field){
            address1Field.focus();
        }
        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener("place_changed", addAdressToResearch);
    }



}

function addAdressToResearch(){
    const place = autocomplete.getPlace();
    $('#searchText').val('');
    console.log(place);
    countPlace++;
    $txt = '';
    $type = '';
    $shortName = '';
    $count = 0;
    for (const component of place.address_components) {
        const componentType = component.types[0];
        switch (componentType) {

          case "sublocality_level_1": {
              $type = componentType;
              $txt += component.long_name;
              $count++;
          }
          case "locality": {
              if($count == 0){
                $type = componentType;
                $txt += component.long_name;
                $count++;
              }
            break;
          }
          case "administrative_area_level_2": {
            if($count == 0){
                $type = componentType;
                $txt += component.long_name;
                $shortName = component.short_name;
                $count++;
              }
            break;
          }
          case "administrative_area_level_1": {
            if($count == 0){
                $type = componentType;
                $txt += component.long_name;
                $shortName = component.short_name;
                $count++;
              }
            break;
          }
        }
    }
    $listPlaceResearch.push({
        id : countPlace,
        lat : place.geometry.location.lat(),
        lng : place.geometry.location.lng(),
        type : $type,
        name : $txt,
        shortName : $shortName,
    });
    $html = "<div id='search_place-"+ countPlace +"' class='search_place'>"+ $txt +"<i class='fa fa-close close_search_place'></i></div>";
    $('.listResearch').append($html);
    if($('#searchPropertyInMoreFilterForm').length !== 0){
        loadNumberProperty();
    }
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  const place = autocomplete.getPlace();
  let address1 = "";
  let postcode = "";
  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  // place.address_components are google.maps.GeocoderAddressComponent objects
  // which are documented at http://goo.gle/3l5i5Mr
  for (const component of place.address_components) {
    const componentType = component.types[0];

    switch (componentType) {
      case "street_number": {
        address1 = `${component.long_name} ${address1}`;
        break;
      }

      case "route": {
        address1 += component.short_name;
        break;
      }

      case "postal_code": {
        postcode = `${component.long_name}${postcode}`;
        break;
      }

      case "postal_code_suffix": {
        postcode = `${postcode}-${component.long_name}`;
        break;
      }
      case "locality":
        document.querySelector("#locality").value = component.long_name;
        break;
    }
  }
  address1Field.value = address1;
  postalField.value = postcode;
  // After filling the form with address components from the Autocomplete
  // prediction, set cursor focus on the second address line to encourage
  // entry of subpremise information such as apartment, unit, or floor number.
}




$('.welcomeAddMoreFilter').on('click',function(event){
    var formData = new FormData(document.getElementById('searchPropertyForm'));
    for(var i = 0; i < $listPlaceResearch.length; ++i){
        formData.append("place_research[]", JSON.stringify($listPlaceResearch[i]));
    }
     $.ajax({
        url: '/addMoreFilter',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        type: "POST",
        success: function (data) {
            document.open();
            window.history.pushState('', '', '/moreFilter');
            document.write(data);
            document.close();
        },
        error: function (data) {
            alert("ERROR - " + data.responseText);
        }
    });
})

$('.searchInTheList').on('click',function(event){
    var formData = new FormData(document.getElementById('searchPropertyForm'));
    for(var i = 0; i < $listPlaceResearch.length; ++i){
        formData.append("place_research[]", JSON.stringify($listPlaceResearch[i]));
    }
     $.ajax({
        url: '/researchInList',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        type: "POST",
        success: function (data) {
            document.open();
            window.history.pushState('', '', '/research');
            document.write(data);
            document.close();
        },
        error: function (data) {
            alert("ERROR - " + data.responseText);
        }
    });
})

function loadNumberProperty(){
    var formData = new FormData(document.getElementById('searchPropertyInMoreFilterForm'));
    for(var i = 0; i < $listPlaceResearch.length; ++i){
        formData.append("place_research[]", JSON.stringify($listPlaceResearch[i]));
    }
     $.ajax({
        url: 'getNumberPropertiesMoreFilter',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        type: "POST",
        success: function (result) {
            $('.numberProperties').html(result);
        },
        error: function (data) {
            alert("ERROR - " + data.responseText);
        }
    });
}
