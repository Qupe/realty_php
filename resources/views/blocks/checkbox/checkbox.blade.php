@if (isset($prop['values']) && !empty($prop['values']))
    <input type="hidden" name="{{ $prop['code'] }}" value="0">
    @foreach($prop['values'] as $option)
        <label class="checkbox-inline">
            <input type="checkbox" class="realty-add__control" name="{{ $prop['code'] }}" value="1"
                    {{ $option['value'] == old($prop['code'], $prop['current_value']) ? 'checked' : '' }}>
            {{ $prop['name'] }}
        </label>
    @endforeach
@endif