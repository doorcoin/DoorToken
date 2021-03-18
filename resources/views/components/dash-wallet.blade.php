<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
    <i class="flaticon-381-id-card"></i>
    <span class="nav-text">My Wallet</span>
</a>
<ul aria-expanded="false">
    <li><a href="{{ route('wallet.my.view') }}">My Wallet</a></li>
    <li><a href="{{ route('wallet.transactions.view') }}">Transactions</a></li>
    <li><a href="{{ route('wallet.deposit.view') }}">Deposit</a></li>
    <li><a href="{{ route('wallet.withdraw.view') }}">Withdrawal</a></li>
</ul>
</li>
