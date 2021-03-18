<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'Users need Verification'])
    @include('components.dash-sidebar')
    @include('template.admin-verify-users')
</x-app-layout>
