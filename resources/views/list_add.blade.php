<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'Lists'])
    @include('components.dash-sidebar')
    @include('template.list-add')
</x-app-layout>
