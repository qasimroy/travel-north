const el = document.getElementById('wrapper');
const toggleButton = document.getElementById('menu-toggle');

toggleButton.onclick = function () {
    el.classList.toggle('toggled');
};

$(document).ready(function () {
    function populateServiceProviders(serviceId) {
        const serviceProviderSelect = $('select[name="service_provider_id"]');
        const oldValue = serviceProviderSelect.data('oldValue');

        serviceProviderSelect.empty();
        serviceProviderSelect.append(
            `<option ${!oldValue ? 'selected' : ''
            } disabled>Select Service Provider</option>`
        );

        $.ajax({
            url: `/api/service-providers/${serviceId}`,
            method: 'GET',
            success: serviceProviders => {
                $.each(serviceProviders, function (_, { id, name }) {
                    serviceProviderSelect.append(
                        `<option value="${id}" ${oldValue === id ? 'selected' : ''
                        }>${name}</option>`
                    );
                });
            },
            error: console.log,
        });
    }

    function handleServices() {
        $('#service-details').children().addClass('d-none');
        $('#service-details').children().children().hide();
        $('#service-details [required]').removeAttr('required');

        const services = {
            'Tour(Tour Includes all services)': 'tour',
            Hotel: 'hotel',
            Coach: 'coach',
            Shuttle: 'shuttle',
        };
        const serviceName = $(this).find(':selected').text();
        const serviceId = $(this).find(':selected').val();

        populateServiceProviders(serviceId);

        const serviceDiv$ = $(`#${services[serviceName]}`);
        serviceDiv$.removeClass('d-none');
        serviceDiv$.children().show();
        serviceDiv$.children('input').attr('required', true);
        serviceDiv$.children('select').attr('required', true);
    }

    // Event handler for the service selection change
    const serviceId$ = $('select[name="service_id"]');

    if ((serviceId$.find(':selected').val() ?? 0) > 0) {
        handleServices.bind(serviceId$)();
    }

    serviceId$.on('change', () => {
        $('select[name="service_provider_id"]').find(':selected').remove();

        handleServices.bind(serviceId$)();
    });
});

$(document).ready(function () {
    // Function to calculate the price
    function calculatePrice() {
        var startDate = $('#start').val();
        var endDate = $('#end').val();
        var days = calculateDays(startDate, endDate); // Call your function to calculate the number of days
        var servicePrice = parseFloat($('#service_id option:selected').data('price'));
        var distance = calculateDistance(); // Call your function to calculate the distance
        var specificNumber = 1; // Replace with your specific number
        var persons = parseInt($('#persons').val());

        // Perform the calculation
        var totalPrice = (servicePrice + (distance * specificNumber)) * days * persons;
        console.log(totalPrice);

        // Update the price input field with the calculated value
        $('#price-input').val(totalPrice.toFixed());
    }

    // Function to calculate the number of days between start and end dates
    function calculateDays(startDate, endDate) {
        var start = new Date(startDate);
        var end = new Date(endDate);

        // Calculate the difference in milliseconds between the two dates
        var timeDiff = end.getTime() - start.getTime();

        // Calculate the number of days
        var days = Math.ceil(timeDiff / (1000 * 3600 * 24));

        return days;
    }


    // Function to calculate the distance
    // Function to calculate the distance between origin and destination using Google Maps Distance Matrix API
    function calculateDistance() {
        var origin = $('#from').val(); // Get the selected origin value
        var destination = $('#to').val(); // Get the selected destination value

        // Make an API request to calculate the distance
        // Replace 'YOUR_API_KEY' with your actual Google Maps API key
        var apiUrl = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=' + origin + '&destinations=' + destination + '&key=AIzaSyBJvmOY0QPIikdLp2vwz_p5MRMqchp3WBc';

        return new Promise(function (resolve, reject) {
            $.ajax({
                url: apiUrl,
                method: 'GET',
                success: function (response) {
                    // Parse the response and extract the distance value
                    var distance = response.rows[0].elements[0].distance.value;

                    // Convert the distance to kilometers (assuming the API returns distance in meters)
                    var distanceInKm = distance / 1000;

                    resolve(distanceInKm);
                },
                error: function (error) {
                    reject(error);
                }
            });
        });
    }


    // Event listener for form field changes
    $('#calculate-price').on('click', () => {
        calculatePrice();
    });
});

