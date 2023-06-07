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
            `<option ${
                !oldValue ? 'selected' : ''
            } disabled>Select Service Provider</option>`
        );

        $.ajax({
            url: `/api/service-providers/${serviceId}`,
            method: 'GET',
            success: serviceProviders => {
                $.each(serviceProviders, function (_, { id, name }) {
                    serviceProviderSelect.append(
                        `<option value="${id}" ${
                            oldValue === id ? 'selected' : ''
                        }>${name}</option>`
                    );
                });
            },
            error: console.log,
        });
    }

    function handleServices() {
        $('#service-details').children().addClass('d-none');
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
