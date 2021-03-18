<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'My Wallet'])
    @include('components.dash-sidebar')
    @include('template.my-wallet')
</x-app-layout>
