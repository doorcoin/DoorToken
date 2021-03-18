<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'Property Details'])
    @include('components.dash-sidebar')
    @include('template.property-detail')
</x-app-layout>
