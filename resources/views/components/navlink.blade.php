@props(['active'=>false])
<a class="{{ $active ? '	bg-[#0b5e34] text-white' : 'text-gray-300 hover:bg-green-900 hover:text-white' }} rounded-md px-3 py-1 text-sm font-medium"
   aria-current="{{ $active ? 'page' : 'false' }}"
    {{$attributes}}
    >{{$slot}}</a>
