<x-layout>
    <x-slot:heading>
        {{$radio['name']}}
    </x-slot:heading>
    <h2 class = "font-bold text-lg">{{$radio['name']}}</h2>
    <p>
        This radio is from {{$radio['country']}}.
    </p>

</x-layout>
