<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'All Leads'])
    @include('components.dash-sidebar')
    @include('template.admin-leads')
</x-app-layout>
