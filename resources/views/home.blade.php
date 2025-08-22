<x-layout>
    <x-slot:heading>
        Choose a radio
    </x-slot:heading>
    <a  class="font-bold text-lg hover:bg-gray-300 hover:text-black hover:underline" href="https://radioprojekt.netlify.app">Click here to go to the original page</a>
    <ul>
        @foreach($radios as $radio)
            <li>
                <a class="hover:bg-green-100 hover:text-black" href="/radios/{{$radio['id']}}">
                    <strong>{{$radio['name']}}</strong> - Country: {{$radio['country']}}
                </a>
            </li>
      @endforeach
    </ul>

</x-layout>
