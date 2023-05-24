<button {!! $attributes->merge([
    'class' => 'btn btn-primary my-2',
    'type' => 'submit'
    ]) !!}
    >
    {!! trim($slot) ?: __('Submit') !!}
</button>