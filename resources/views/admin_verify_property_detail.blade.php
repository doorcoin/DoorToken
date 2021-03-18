<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'Property Verification'])
    @include('components.dash-sidebar')
    @include('template.admin-verify-property-detail')
</x-app-layout>
