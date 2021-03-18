<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'Add a Property'])
    @include('components.dash-sidebar')
    @include('template.property-add')
</x-app-layout>
