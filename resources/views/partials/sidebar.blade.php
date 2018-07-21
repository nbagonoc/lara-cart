<div class="list-group sticky-top">
    <a href="/dashboard" class="list-group-item list-group-item-action text-dark">Dashboard</a>
    @if(Auth::user()->role=="admin" || Auth::user()->role=="moderator")
        <a href="/products/manage" class="list-group-item list-group-item-action text-dark">Manage Products</a>
        <a href="/orders/manage" class="list-group-item list-group-item-action text-dark">Manage Orders</a>
    @endif
    @if(Auth::user()->role=="admin")
        <a href="/users/manage" class="list-group-item list-group-item-action text-dark">Manage Users</a>
    @endif
    @if(Auth::user()->role=="admin" || Auth::user()->role=="user")
        <a href="/cart" class="list-group-item list-group-item-action text-dark">Cart</a>
        <a href="/orders" class="list-group-item list-group-item-action text-dark">Orders</a>
    @endif
    <a href="/user/account" class="list-group-item list-group-item-action text-dark">Account Details</a>
</div>