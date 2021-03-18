<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'Dashboard'])
    @include('components.dash-sidebar')
    @include('template.dashboard')
</x-app-layout>
