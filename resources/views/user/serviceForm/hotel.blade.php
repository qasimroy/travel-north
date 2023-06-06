<div class="row">
    <div class="col-md-12">
        <x-form-select label="Origin" name="origin" placeholder="Select Your Origin" required>
            <option value="">..</option>
        </x-form-select>
    </div>
    <div class="col-md-6">
        <x-form-input name="persons" label="Persons" type="number" required autofocus />
    </div>
    <div class="col-md-6">
        <x-form-select label="Hotel" name="hotel" placeholder="Select Hotel" >
            <option value="1">1 star</option>
            <option value="2">2 star</option>
            <option value="3">3 star</option>
            <option value="4">4 star</option>
            <option value="5">5 star</option>
        </x-form-select>
    </div>
</div>