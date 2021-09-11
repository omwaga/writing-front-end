<div {{ $attributes->merge(['class' => "flex {$field->class}"]) }}>
<input
    type="checkbox"
    value="{{ old($field->key) }}"
    @foreach($options() as $key => $value) {{$key}}="{{$value}}" @endforeach
    />
    <div class="tf-checkbox-label-spacing">
        <label for="{{ \Str::slug($field->key) }}" class="tf-checkbox-label">
            {{ $label ?? ''}}
        </label>
    </div>
</div>
