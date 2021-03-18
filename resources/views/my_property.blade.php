<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'My Properties'])
    @include('components.dash-sidebar')
    @include('template.my-property')
</x-app-layout>
