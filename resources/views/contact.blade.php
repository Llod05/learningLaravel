<x-layout>
    <x-slot:heading>
        Contact Page
    </x-slot:heading>
    @php
        $text = "If you have any questions or concerns about this Privacy Policy or our privacy practices, please contact us here.";
    @endphp

    {!! preg_replace(
        '/(us here)/',
        '<a href="https://docs.google.com/forms/d/e/1FAIpQLSed5_IUz_paWywaOuTRvPk_XzwsNywqyqhzlhY2ANmIAhgUWQ/viewform" class="text-blue-500 underline" target="_blank">$1</a>',
        e($text)
    ) !!}

</x-layout>
