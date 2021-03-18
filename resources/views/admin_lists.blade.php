<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'All Lists'])
    @include('components.dash-sidebar')
    @include('template.admin-lists')
</x-app-layout>
