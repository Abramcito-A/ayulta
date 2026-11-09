@props(['name', 'label', 'checked' => false])

<label class="checkbox-control" for="{{ $name }}">
    <input id="{{ $name }}" name="{{ $name }}" type="checkbox" value="1" @checked(old($name, $checked))>
    <span class="checkbox-custom" aria-hidden="true"><x-icon name="check" size="14" /></span>
    <span>{{ $label }}</span>
</label>
