<div class="list-group sticky-top">
    <a href="/dashboard" class="list-group-item list-group-item-action text-dark">
        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
    </a>
    @if(Auth::user()->role=="admin" || Auth::user()->role=="moderator")
        <a href="/orders/manage" class="list-group-item list-group-item-action text-dark">
            <i class="fas fa-shipping-fast mr-2"></i>Manage Orders
        </a>
        <a href="/products/manage" class="list-group-item list-group-item-action text-dark">
            <i class="fas fa-shopping-cart mr-2"></i>Manage Products
        </a>
            <a href="/products/manage/create" class="list-group-item list-group-item-action text-dark pl-5">
                <i class="fas fa-plus-circle mr-2"></i>Create Product
            </a>
    @endif
    @if(Auth::user()->role=="admin")
        <a href="/users/manage" class="list-group-item list-group-item-action text-dark">
            <i class="fas fa-users mr-2"></i>Manage Users
        </a>
            {{-- <a href="/users/manage/create" class="list-group-item list-group-item-action text-dark pl-5">
                <i class="fas fa-plus-circle mr-2"></i>Create User
            </a> --}}
    @endif
    @if(Auth::user()->role=="user")
        <a href="/cart" class="list-group-item list-group-item-action text-dark">
            <i class="fas fa-shopping-cart mr-2"></i>Cart
        </a>
        <a href="/orders" class="list-group-item list-group-item-action text-dark">
            <i class="fas fa-shipping-fast mr-2"></i>Orders
        </a>
    @endif
</div>