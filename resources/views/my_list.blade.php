<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'My Lists'])
    @include('components.dash-sidebar')
    @include('template.my-list')
</x-app-layout>
