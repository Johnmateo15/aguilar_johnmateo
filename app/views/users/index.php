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
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      font-family: "Poppins", sans-serif;
      color: #333;
      min-height: 100vh;
      padding: 40px 0;
    }

    .dashboard-container {
      max-width: 1100px;
      margin: auto;
      padding: 40px;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 6px 30px rgba(0, 0, 0, 0.15);
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 2px solid #eee;
      margin-bottom: 25px;
      padding-bottom: 15px;
      flex-wrap: wrap;
      gap: 10px;
    }

    .dashboard-header h2 {
      font-size: 1.8em;
      font-weight: 700;
      background: linear-gradient(90deg, #6a11cb, #2575fc);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .dashboard-header h2 i {
      color: #6a11cb;
    }

    .header-buttons {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .logout-btn,
    .btn-create {
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
      background: linear-gradient(90deg, #6a11cb, #2575fc);
      color: #fff;
      font-weight: 600;
      transition: 0.3s;
      box-shadow: 0 3px 12px rgba(106, 17, 203, 0.3);
      text-decoration: none;
    }

    .logout-btn:hover,
    .btn-create:hover {
      background: linear-gradient(90deg, #5a0fb5, #1e63e8);
      transform: translateY(-2px);
      box-shadow: 0 4px 14px rgba(106, 17, 203, 0.4);
    }

    .user-status {
      background: #f4edff;
      border: 1px solid #d9ccff;
      padding: 14px 18px;
      border-radius: 12px;
      margin-bottom: 25px;
      color: #6a11cb;
      font-weight: 500;
      box-shadow: 0 2px 6px rgba(106, 17, 203, 0.1);
    }

    .user-status.error {
      background: #fff3f5;
      border-color: #ffccd2;
      color: #d22d3d;
    }

    .table-card {
      background: #fafaff;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 10px;
    }

    th {
      background: linear-gradient(90deg, #6a11cb, #2575fc);
      color: #fff;
      text-transform: uppercase;
      font-weight: 600;
      padding: 12px;
      border: none;
      border-radius: 8px 8px 0 0;
    }

    td {
      background: #ffffff;
      padding: 12px;
      border: none;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(106, 17, 203, 0.05);
    }

    tr:hover td {
      background: #f2f0ff;
      transition: 0.2s;
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
      transition: 0.3s;
    }

    a.btn-update {
      background: linear-gradient(90deg, #6a11cb, #2575fc);
      box-shadow: 0 3px 10px rgba(106, 17, 203, 0.3);
    }

    a.btn-update:hover {
      background: linear-gradient(90deg, #5a0fb5, #1e63e8);
    }

    a.btn-delete {
      background: linear-gradient(90deg, #ff416c, #ff4b2b);
      box-shadow: 0 3px 10px rgba(255, 65, 108, 0.3);
    }

    a.btn-delete:hover {
      background: linear-gradient(90deg, #e83e62, #e43a1e);
    }

    /* Search bar adjusted */
    .search-form {
      display: flex;
      gap: 10px;
      justify-content: flex-end;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .search-form input {
      border-radius: 8px;
      border: 1px solid #cfdaf5;
      padding: 10px;
      width: 280px; /* made shorter */
      max-width: 100%;
    }

    .search-form button {
      background: linear-gradient(90deg, #6a11cb, #2575fc);
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      padding: 8px 18px;
      transition: 0.3s;
      box-shadow: 0 3px 8px rgba(106, 17, 203, 0.25);
    }

    .search-form button:hover {
      background: linear-gradient(90deg, #5a0fb5, #1e63e8);
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 25px;
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

      <div class="header-buttons">
        <?php if (!empty($logged_in_user) && ($logged_in_user['role'] ?? 'user') === 'admin'): ?>
          <a href="<?= site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
        <?php endif; ?>
        <a href="<?= site_url('auth/logout'); ?>" class="logout-btn">Logout</a>
      </div>
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
              <?php if (!empty($logged_in_user) && ($logged_in_user['role'] ?? 'user') === 'admin'): ?>
                <a href="<?= site_url('/users/update/'.$row['id']); ?>" class="btn-action btn-update">Update</a>
                <a href="<?= site_url('/users/delete/'.$row['id']); ?>" class="btn-action btn-delete">Delete</a>
              <?php else: ?>
                <span class="text-muted">—</span>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="pagination-container">
        <?php echo $page; ?>
      </div>
    </div>
  </div>
</body>
</html>
