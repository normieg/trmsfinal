<h1>Users</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= htmlspecialchars((string)$u['id'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($u['username'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($u['full_name'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($u['email'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($u['role'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($u['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
