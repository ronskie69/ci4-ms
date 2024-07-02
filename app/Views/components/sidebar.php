<div class="sidebar">
    <div class="sidebar-content">
        <ul class="sidebar-links">
            <li class="sidebar-link-item"><a href="<?=base_url('/dashboard')?>">Dashboard</a></li>
            <li class="sidebar-link-item"><a href="<?=base_url('/people')?>">People</a></li>
            <li class="sidebar-link-item"><a href="<?=base_url('/dashboard')?>">User Management</a></li>
            <li class="sidebar-link-item"><a href="#" onclick="confirm('Are you sure to logout?') && window.location.replace('<?=base_url('/logout')?>')">Logout</a></li>
        </ul>
    </div>
</div>