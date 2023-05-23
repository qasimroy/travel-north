<div class="p-2">
    <label for="">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="" class="form-control" placeholder="" aria-describedby="htlpId" value="{{ $value }}">
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
