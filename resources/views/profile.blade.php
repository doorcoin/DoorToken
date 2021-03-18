<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header', ['titletxt' => 'My Profile'])
    @include('components.dash-sidebar')
    @include('template.user-profile')
</x-app-layout>
