<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'My Leads'])
    @include('components.dash-sidebar')
    @include('template.my-lead')
</x-app-layout>
