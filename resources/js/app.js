const el = document.getElementById('wrapper');
const toggleButton = document.getElementById('menu-toggle');

toggleButton.onclick = function () {
    el.classList.toggle('toggled');
};


$(document).ready(function () {
    function populateServiceProviders(serviceId) {
        const serviceProviderSelect = $('select[name="service_provider_id"]')
        serviceProviderSelect.empty()

        $.ajax(({
            url: `/api/service-providers/${serviceId}`,
            method: 'GET',
            success: (serviceProviders) => {
                $.each(serviceProviders, function (_, { id, name }) {
                    serviceProviderSelect.append(`<option value="${id}">${name}</option>`)
                })
            },
            error: console.log
        }))
    }

    // Event handler for the service selection change
    $('select[name="service_id"]').on('change', function () {
        $('#service-details').children().addClass('d-none')

        const services = {
            'Tour(Tour Includes all services)': 'tour',
            'Hotel': 'hotel',
            'Coach': 'coach',
            'Shuttle': 'shuttle'
        }
        const serviceName = $(this).find(':selected').text();
        const serviceId = $(this).find(':selected').val();

        populateServiceProviders(serviceId);

        $(`#${services[serviceName]}`).removeClass('d-none');
    });
});
