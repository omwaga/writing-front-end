<div class="form-group row">
    <div class="col-md-2 col-form-label text-md-right py-md-0 text-xl font-bold mt-4 mb-2 ">
        {{ array_search($field, $fields) + 1 }}. {{ $field->label }}
    </div>

    <div
        class="col-md flex flex-col justify-start text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mt-2 mb-2">
        @foreach($field->options as $value => $label)
            <div class="form-check mb-4">
                <input
                    id="{{ $field->name . '.' . $loop->index }}"
                    type="radio"
                    class="form-check-input form-radio focus:outline-none focus:shadow-outline @error($field->key) is-invalid @enderror"
                    value="{{ $value }}"
                    wire:model.lazy="{{ $field->key }}">

                <label class="form-check-label text-gray-700 text-lg" for="{{ $field->name . '.' . $loop->index }}">
                    {{ $label }}
                </label>
            </div>
        @endforeach

        @include('laravel-livewire-forms::fields.error-help')
    </div>
</div>
