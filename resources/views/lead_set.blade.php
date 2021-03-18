<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'Lead Settings'])
    @include('components.dash-sidebar')
    @include('template.lead-set')
</x-app-layout>
