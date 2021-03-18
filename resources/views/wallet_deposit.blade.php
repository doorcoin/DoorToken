<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'Deposit'])
    @include('components.dash-sidebar')
    @include('template.wallet-deposit')
</x-app-layout>
