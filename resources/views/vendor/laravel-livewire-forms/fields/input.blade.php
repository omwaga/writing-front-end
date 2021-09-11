<div class="form-group row">
    <label for="{{ $field->name }}" class="text-lg text-gray-700">
        {{ $field->label }}
    </label>

    <div class="col-md">
        <input
            id="{{ $field->name }}"
            type="{{ $field->input_type }}"
            class="form-control @error($field->key) is-invalid @enderror"
            autocomplete="{{ $field->autocomplete }}"
            placeholder="{{ $field->placeholder }}"
            wire:model.lazy="{{ $field->key }}">

        @include('laravel-livewire-forms::fields.error-help')
    </div>
</div>
