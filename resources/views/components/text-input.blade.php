@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 w-full focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm']) !!}>
