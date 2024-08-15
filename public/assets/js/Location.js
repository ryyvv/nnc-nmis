// $(document).ready(function() {
//     // Load regions on page load
//     loadRegions();

//     // Event listener for Region dropdown
//     $('#regionSelect').change(function() {
//         let regionId = $(this).val();
//         if (regionId) {
//             loadProvinces(regionId);
//         } else {
//             $('#provinceSelect').html('<option value="">Select your Province</option>');
//             $('#citySelect').html('<option value="">Select your City/Municipal</option>');
//             $('#barangaySelect').html('<option value="">Select your Barangay</option>');
//         }
//     });

//     // Event listener for Province dropdown
//     $('#provinceSelect').change(function() {
//         let provinceId = $(this).val();
//         if (provinceId) {
//             loadCities(provinceId);
//         } else {
//             $('#citySelect').html('<option value="">Select your City/Municipal</option>');
//             $('#barangaySelect').html('<option value="">Select your Barangay</option>');
//         }
//     });

//     // Event listener for City/Municipal dropdown
//     $('#citySelect').change(function() {
//         let cityId = $(this).val();
//         if (cityId) {
//             loadBarangays(cityId);
//         } else {
//             $('#barangaySelect').html('<option value="">Select your Barangay</option>');
//         }
//     });

//     // Function to load regions
//     function loadRegions() {
//         $.ajax({
//             url: '{{ route("regions.get") }}',
//             method: 'GET',
//             success: function(response) {
//                 let regionSelect = $('#regionSelect');
//                 regionSelect.html('<option value="">Select your Region</option>');
//                 response.forEach(function(region) {
//                     regionSelect.append(new Option(region.region, region.id));
//                 });
//             },
//             error: function(xhr) {
//                 console.error('Error loading regions:', xhr.responseText);
//             }
//         });
//     }

//     // Function to load provinces based on selected region
//     function loadProvinces(regionId) {
//         $.ajax({
//             url: '{{ url("provinces") }}/' + regionId,
//             method: 'GET',
//             success: function(response) {
//                 let provinceSelect = $('#provinceSelect');
//                 provinceSelect.html('<option value="">Select your Province</option>');
//                 response.forEach(function(province) {
//                     provinceSelect.append(new Option(province.province, province.provcode));
//                 });
//                 $('#citySelect').html('<option value="">Select your City/Municipal</option>');
//                 $('#barangaySelect').html('<option value="">Select your Barangay</option>');
//             },
//             error: function(xhr) {
//                 console.error('Error loading provinces:', xhr.responseText);
//             }
//         });
//     }

//     // Function to load cities based on selected province
//     function loadCities(provinceId) {
//         $.ajax({
//             url: '{{ url("cities") }}/' + provinceId,
//             method: 'GET',
//             success: function(response) {
//                 let citySelect = $('#citySelect');
//                 citySelect.html('<option value="">Select your City/Municipal</option>');
//                 response.forEach(function(city) {
//                     citySelect.append(new Option(city.cityname, city.id));
//                 });
//                 $('#barangaySelect').html('<option value="">Select your Barangay</option>');
//             },
//             error: function(xhr) {
//                 console.error('Error loading cities:', xhr.responseText);
//             }
//         });
//     }

//     // Function to load barangays based on selected city
//     function loadBarangays(cityId) {
//         $.ajax({
//             url: '{{ url("barangays") }}/' + cityId,
//             method: 'GET',
//             success: function(response) {
//                 let barangaySelect = $('#barangaySelect');
//                 barangaySelect.html('<option value="">Select your Barangay</option>');
//                 response.forEach(function(barangay) {
//                     barangaySelect.append(new Option(barangay.barangay, barangay.id));
//                 });
//             },
//             error: function(xhr) {
//                 console.error('Error loading barangays:', xhr.responseText);
//             }
//         });
//     }
// });


$(document).ready(function() {
    function loadBarangays(locationId, type, barangaySelectId) {
        $.ajax({
            url: `/barangays/${locationId}/${type}`,
            method: 'GET',
            success: function(response) {
                let barangaySelect = $(barangaySelectId);
                barangaySelect.find('option:not(:first)').remove();
                response.forEach(function(barangay) {
                    barangaySelect.append(new Option(barangay.name, barangay.id));
                });
            },
            error: function(xhr, status, error) {
                console.error('Error loading barangays:', xhr.responseText);
                alert('Error loading barangays');
            }
        });
    }

    function setupDropdowns(regionSelectId, provinceSelectId, citySelectId, barangaySelectId) {
        $(regionSelectId).change(function() {
            // Handle Region change to load Provinces
        });

        $(provinceSelectId).change(function() {
            // Handle Province change to load Cities/Municipals
        });

        $(citySelectId).change(function() {
            let selectedCityId = $(this).val();
            if (selectedCityId) {
                loadBarangays(selectedCityId, 'city', barangaySelectId);
            } else {
                $(barangaySelectId).find('option:not(:first)').remove();
            }
        });

        $(municipalSelectId).change(function() {
            let selectedMunicipalId = $(this).val();
            if (selectedMunicipalId) {
                loadBarangays(selectedMunicipalId, 'municipal', barangaySelectId);
            } else {
                $(barangaySelectId).find('option:not(:first)').remove();
            }
        });
    }

    setupDropdowns('#regionSelect', '#provinceSelect', '#citySelect', '#barangaySelect');
});
