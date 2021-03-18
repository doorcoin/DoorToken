<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'All Properties'])
    @include('components.dash-sidebar')
    @include('template.admin-properties')
</x-app-layout>
