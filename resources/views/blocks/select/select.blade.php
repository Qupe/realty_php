<select class="{{ isset($class) ? $class : '' }}" id="{{ $prop['code'] }}" name="{{ $prop['code'] }}" {{ isset($disabled) && $disabled ? 'disabled' : '' }}>
    {!! !isset($default) ? '<option value="">Не выбрано</option>' : '' !!}
    @if (isset($prop['values']) && !empty($prop['values']))
        @foreach($prop['values'] as $option)
            <option value="{{ $option['id'] }}" {{ $option['id'] == old($prop['code'], $prop['current_value']) ? 'selected' : '' }}>
                {{ $option['value'] }}
            </option>
        @endforeach
    @endif
</select>
@if (isset($disabled) && $disabled)
    <input type="hidden" name="{{ $prop['code'] }}" value="{{ old($prop['code'], $prop['current_value']) }}" >
@endif