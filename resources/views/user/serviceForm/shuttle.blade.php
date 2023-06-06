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
    <x-form-select label="Shuttle" name="shuttle" placeholder="Select Shuttle" >
      <option value="1">Car</option>
      <option value="2">Bike</option>
    </x-form-select>
</div>
</div>