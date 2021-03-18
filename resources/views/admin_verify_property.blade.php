<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'Verify Properties'])
    @include('components.dash-sidebar')
    @include('template.admin-verify-property')
</x-app-layout>
