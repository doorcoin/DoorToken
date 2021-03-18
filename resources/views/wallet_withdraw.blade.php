<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'Withdraw'])
    @include('components.dash-sidebar')
    @include('template.wallet-withdraw')
</x-app-layout>
