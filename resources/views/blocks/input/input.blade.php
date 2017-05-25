<input type="text"
       class="{{ isset($class) ? $class : '' }}"
       name="{{ $prop['code'] }}"
       id="{{ $prop['code'] }}"
       value="{{ old($prop['code'], $prop['current_value']) }}"
       placeholder="{{ isset($hint) ? $hint : '' }}"
/>