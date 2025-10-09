<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: #eef3fb;
      font-family: "Poppins", sans-serif;
      color: #333;
    }

    .dashboard-container {
      max-width: 1100px;
      margin: 50px auto;
      padding: 30px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      border-bottom: 2px solid #e6ecf8;
      padding-bottom: 15px;
    }

    .dashboard-header h2 {
      font-size: 1.8em;
      font-weight: 700;
      color: #0a47a9;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .dashboard-header h2 i {
      color: #0b56d0;
    }

    .logout-btn {
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      background: #0b56d0;
      color: #fff;
      font-weight: 600;
      transition: 0.3s;
    }

    .logout-btn:hover {
      background: #093d99;
    }

    .user-status {
      background: #f1f6ff;
      border: 1px solid #d5e3ff;
      padding: 12px 18px;
      border-radius: 12px;
      margin-bottom: 25px;
      color: #0b56d0;
      font-weight: 500;
    }

    .user-status.error {
      background: #fff3f5;
      border-color: #ffccd2;
      color: #d22d3d;
    }

    .table-card {
      background: #fafcff;
      border-radius: 15px;
      padding: 20px;
      box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.02);
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 8px;
    }

    th {
      background: #0b56d0;
      color: #fff;
      text-transform: uppercase;
      font-weight: 600;
      padding: 12px;
      border: none;
    }

    td {
      background: #fff;
      padding: 12px;
      border: none;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
      border-radius: 8px;
    }

    tr:hover td {
      background: #f0f5ff;
    }

    a.btn-action {
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      margin: 0 2px;
      display: inline-block;
    }

    a.btn-update {
      background: #0b56d0;
    }
    a.btn-update:hover {
      background: #093d99;
    }

    a.btn-delete {
      background: #d22d3d;
    }
    a.btn-delete:hover {
      background: #b31f2e;
    }

    .btn-create {
      display: inline-block;
      padding: 12px 25px;
      border: none;
      background: #0b56d0;
      color: #fff;
      font-size: 1em;
      border-radius: 10px;
      font-weight: 600;
      transition: 0.3s;
      text-transform: uppercase;
      text-decoration: none;
      margin-top: 20px;
    }

    .btn-create:hover {
      background: #093d99;
    }

    .search-form {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }

    .search-form input {
      border-radius: 8px;
      border: 1px solid #cfdaf5;
      padding: 10px;
      flex: 1;
    }

    .search-form button {
      background: #0b56d0;
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      padding: 8px 18px;
      transition: 0.3s;
    }

    .search-form button:hover {
      background: #093d99;
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <div class="dashboard-container">
    <div class="dashboard-header">
      <h2>
        <i class="fa-solid fa-graduation-cap"></i>
        <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
      </h2>
      <a href="<?= site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
    </div>

    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status">
        <strong>Welcome:</strong> <?= html_escape($logged_in_user['username']); ?>
      </div>
    <?php else: ?>
      <div class="user-status error">
        Logged in user not found
      </div>
    <?php endif; ?>

    <div class="table-card">
      <form action="<?= site_url('users'); ?>" method="get" class="search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input name="q" type="text" class="form-control" placeholder="Search student..." value="<?= html_escape($q); ?>">
        <button type="submit"><i class="fa fa-search"></i> Search</button>
      </form>

      <div class="table-responsive">
        <table class="table align-middle">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th>Password</th>
              <th>Role</th>
            <?php endif; ?>
            <th>Action</th>
          </tr>
          <?php foreach ($user as $row): ?>
          <tr>
            <td><?= html_escape($row['id']); ?></td>
            <td><?= html_escape($row['username']); ?></td>
            <td><?= html_escape($row['email']); ?></td>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <td>*******</td>
              <td><?= html_escape($row['role']); ?></td>
            <?php endif; ?>
            <td>
              <a href="<?= site_url('/users/update/'.$row['id']); ?>" class="btn-action btn-update">Update</a>
              <a href="<?= site_url('/users/delete/'.$row['id']); ?>" class="btn-action btn-delete">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="pagination-container">
        <?php echo $page; ?>
      </div>
    </div>

    <a href="<?= site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
  </div>
</body>
</html>
