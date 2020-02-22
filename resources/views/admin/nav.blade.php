<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link <?php echo isset($page) && $page === 'admin' ? 'active' : '' ?>" href="{{ route('admin.index') }}">Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($page) && $page === 'types' ? 'active' : '' ?>" href="{{ route('admin.types.index') }}">Event Types</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($page) && $page === 'vote-categories' ? 'active' : '' ?>" href="{{ route('admin.vote-categories.index') }}">Vote Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($page) && $page === 'events' ? 'active' : '' ?>" href="{{ route('admin.events.index') }}">Events</a>
        </li>
    </ul>
</nav>
