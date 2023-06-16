function debounce(func, wait = 500, immediate) {
    var timeout;
    return function () {
        var context = this,
            args = arguments;
        var later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

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
                $.each(
                    serviceProviders,
                    function (_, { service_provider: { id, name }, price }) {
                        serviceProviderSelect.append(
                            `<option value="${id}" ${oldValue === id ? 'selected' : ''
                            } data-price="${price}">${name}</option>`
                        );
                    }
                );
            },
            error: console.error,
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

        var destinationField = $('#destination-field');
        if (
            serviceName === 'Tour(Tour Includes all services)' ||
            serviceName === 'Coach'
        ) {
            destinationField.removeClass('d-none');
            $('#destination-field').attr('required', true);
        } else {
            destinationField.addClass('d-none');
            $('#destination-field [required]').removeAttr('required');
        }

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

document.addEventListener('DOMContentLoaded', function () {
    var originInput = document.getElementById('from');
    var destinationInput = document.getElementById('to');
    var autocompleteResults = document.getElementById('autocomplete-results');

    function autocompleteSearch(inputElement) {
        var query = inputElement.value;

        if (query.trim()) {
            var url =
                'https://nominatim.openstreetmap.org/search?format=json&q=' +
                encodeURIComponent(query);
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
                                inputElement.value = item.display_name;
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
    }

    originInput.addEventListener(
        'input',
        debounce(() => autocompleteSearch(originInput))
    );
    destinationInput.addEventListener(
        'input',
        debounce(() => autocompleteSearch(destinationInput))
    );

    document.addEventListener('click', function (event) {
        if (
            !originInput.contains(event.target) &&
            !destinationInput.contains(event.target)
        ) {
            autocompleteResults.innerHTML = '';
        }
    });

    const calculateDays = (startDate, endDate) => {
        const start = new Date(startDate);
        const end = new Date(endDate);

        const timeDiff = end.getTime() - start.getTime();
        return Math.ceil(timeDiff / (1000 * 3600 * 24));
    };

    const calculatePrice = async () => {
        const startDate = $('#start').val();
        const endDate = $('#end').val();
        const serviceName = $('#service_id option:selected').text();
        const days = calculateDays(startDate, endDate);
        const servicePrice = +$(
            '[name="service_provider_id"] option:selected'
        ).data('price');
        let distance;
        console.log(days);
        console.log(servicePrice);

        if (serviceName.includes('Tour') || serviceName.includes('Coach')) {
            distance = await calculateDistance();
        }
        else {
            distance = 12;
        }
        console.log(distance);

        const persons = +$('#persons').val();
        const totalPrice = (servicePrice + (distance / 2)) * days * (persons / 2);
        console.log(persons);
        console.log(totalPrice);

        $('#price-input').val(totalPrice.toFixed());
    };

    const calculateDistance = () => {
        let resolve;

        const promise = new Promise(res => {
            resolve = res;
        });

        var origin = $('#from').val();
        var destination = $('#to').val();

        $.ajax({
            url: '/api/proxy/maps-api',
            method: 'GET',
            data: { origin, destination },
            success: function ({ distance }) {
                resolve(distance);
                console.log(distance);
            },
            error: console.error,
        });

        return promise;
    };

    $('#calculate-price').on('click', () => {
        const form$ = $('#booking-form')[0];

        if (!form$.checkValidity()) {
            return form$.reportValidity();
        }

        calculatePrice();
    });
});
