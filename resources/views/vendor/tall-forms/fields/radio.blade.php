@foreach($field->options as $value => $label)
    <x-tall-radio class="text-lg"
                  :field="$field"
                  :value="$value"
                  :label="$label"
                  wire:key="{{ md5($field->key.$value.$label.$loop->index) }}"/>
@endforeach
