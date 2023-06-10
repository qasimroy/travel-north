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


    function calculateDistance() {
        var origin = $('#from').val();
        var destination = $('#to').val();

        // Make the AJAX request to your Laravel server
        $.ajax({
            url: '/api/proxy/maps-api',
            method: 'GET',
            data: { origins: origin, destinations: destination },
            success: function (response) {
                var distance = response.rows[0].elements[0].distance.text;
                $('#distance').val(distance);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }


    // Event listener for form field changes
    $('#calculate-price').on('click', () => {
        calculatePrice();
    });
});
document.addEventListener('DOMContentLoaded', function () {
    var originInput = document.getElementById('origin');
    var autocompleteResults = document.getElementById('autocomplete-results');

    originInput.addEventListener('input', function () {
        var query = originInput.value;

        if (query.trim() !== '') {
            var url = 'https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(query);
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    autocompleteResults.innerHTML = '';

                    if (data.length > 0) {
                        var ul = document.createElement('ul');
                        data.forEach(function (item) {
                            var li = document.createElement('li');
                            li.textContent = item.display_name;
                            li.addEventListener('click', function () {
                                originInput.value = item.display_name;
                                autocompleteResults.innerHTML = '';
                            });
                            ul.appendChild(li);
                        });
                        autocompleteResults.appendChild(ul);
                    }
                })
                .catch(error => {
                    console.error('Autocomplete search error:', error);
                    autocompleteResults.innerHTML = '';
                });
        } else {
            autocompleteResults.innerHTML = '';
        }
    });

    document.addEventListener('click', function (event) {
        if (!originInput.contains(event.target)) {
            autocompleteResults.innerHTML = '';
        }
    });
});
