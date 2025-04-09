<div class="sidebar d-flex flex-column p-3">
    <div class="sidebar-heading text-center py-4">
        <h4>Admin Dashboard</h4>
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ url('/admin') }}" class="list-group-item list-group-item-action {{ request()->is('admin') ? 'active' : '' }}">
            <i class="fas fa-cart-plus"></i> Order
        </a>
        <a href="{{ route('admin.transactions') }}" class="list-group-item list-group-item-action {{ request()->is('admin/transactions') ? 'active' : '' }}">
            <i class="fab fa-amazon-pay"></i> Transactions
        </a>
    </div>
</div>

<style>
.sidebar {
    position: fixed;
    top: 56px;
    left: 0;
    bottom: 0;
    background-color: #87CEEB;
    color: #fff;
    z-index: 1000;
    padding: 1rem;
    white-space: nowrap; /* Agar tidak wrap */
}

.sidebar .list-group-item {
    background-color: #87CEEB;
    color: #fff;
    border: none;
    padding: 0.75rem 1rem;
}

.sidebar .list-group-item.active {
    background-color: #4682B4;
}
</style>
