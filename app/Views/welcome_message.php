<!DOCTYPE html>
<html>
<head>
    <title>Daily Operational System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Welcome to Daily Operational System</h1>
    <p>Choose a module to continue:</p>

    <div class="list-group">
        <a href="<?= site_url('production') ?>" class="list-group-item list-group-item-action">
            Production Module <span class="text-mute">(CRUD, Datatable, Ajax, JOIN Query, SQL Server)</span>
        </a>
        <!-- Tambahkan menu lain di sini -->
        <a href="<?= site_url('machines') ?>" class="list-group-item list-group-item-action">
            Machines Module
        </a>
        <a href="<?= site_url('maintenance') ?>" class="list-group-item list-group-item-action">
            Maintenance Module
        </a>
    </div>
</div>
</body>
</html>
