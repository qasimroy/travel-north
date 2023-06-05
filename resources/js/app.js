const el = document.getElementById('wrapper');
const toggleButton = document.getElementById('menu-toggle');

toggleButton.onclick = function () {
    el.classList.toggle('toggled');
};



function handleServiceChange(HTMLselectElement) {
    var service = HTMLselectElement.value;
    var form = HTMLselectElement.closest('form');
    var dynamicFieldsContainer = document.getElementById('dynamic-fields-container');

    // Clear existing dynamic fields
    dynamicFieldsContainer.innerHTML = '';

    // Add fields based on the selected service
    if (service === 'tour') {
        dynamicFieldsContainer.innerHTML = `
            <div class="col-md-6">
                <x-form-input name="tourField1" label="Tour Field 1" type="text" required autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="tourField2" label="Tour Field 2" type="text" required autofocus />
            </div>
        `;
    } else if (service === 'hotel') {
        dynamicFieldsContainer.innerHTML = `
            <div class="col-md-6">
                <x-form-input name="location" label="Location" type="text" required autofocus />
            </div>
            <div class="col-md-6">
                <x-form-select label="Hotel" name="hotel" placeholder="Select Hotel">
                    <option value="1">1 star</option>
                    <option value="2">2 star</option>
                    <option value="3">3 star</option>
                    <option value="4">4 star</option>
                    <option value="5">5 star</option>
                </x-form-select>
            </div>
            <div class="col-md-6">
                <x-form-input name="persons" label="Persons" type="number" required autofocus />
            </div>
        `;
    } else if (service === 'coach') {
        dynamicFieldsContainer.innerHTML = `
            <div class="col-md-6">
                <x-form-select label="Origin" name="origin" placeholder="Select Your Origin" required>
                    <option value="">..</option>
                    <!-- Add options for origin -->
                </x-form-select>
            </div>
            <div class="col-md-6">
                <x-form-select label="Destination" name="destination" placeholder="Select Your Destination" required>
                    <option value="">..</option>
                    <!-- Add options for destination -->
                </x-form-select>
            </div>
            <div class="col-md-6">
                <x-form-input name="persons" label="Persons" type="number" required autofocus />
            </div>
            <div class="col-md-6">
                <x-form-select label="Coach" name="coach" placeholder="Select Coach">
                    <option value="">Toyota Hiace</option>
                    <option value="">Toyota Coaster</option>
                    <option value="">Daewoo</option>
                </x-form-select>
            </div>
        `;
    } else if (service === 'shuttle') {
        dynamicFieldsContainer.innerHTML = `
            <div class="col-md-6">
                <x-form-input name="location" label="Location" type="text" required autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="persons" label="Persons" type="number" required autofocus />
            </div>
            <div class="col-md-6">
                <x-form-select label="Shuttle" name="shuttle" placeholder="Select Shuttle">
                    <option value="1">Car</option>
                    <option value="2">Bike</option>
                </x-form-select>
            </div>
        `;
    }
}
