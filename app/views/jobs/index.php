<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Employer Dashboard - Jobs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: #fff;
      font-family: Arial, sans-serif;
      color: #000;
    }

    .dashboard-container {
      max-width: 1100px;
      margin: 50px auto;
      padding: 30px;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 15px;
    }

    .dashboard-header h2 {
      font-size: 1.8em;
      font-weight: 700;
      color: #000;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .dashboard-header h2 i {
      color: #000;
    }

    .logout-btn {
      padding: 10px 18px;
      border: none;
      border-radius: 4px;
      background: #000;
      color: #fff;
      font-weight: 600;
      transition: background-color 0.3s;
    }

    .logout-btn:hover {
      background: #333;
    }

    .user-status {
      background: #f9f9f9;
      border: 1px solid #ddd;
      padding: 12px 18px;
      border-radius: 4px;
      margin-bottom: 25px;
      color: #000;
      font-weight: 500;
    }

    .table-card {
      background: #f9f9f9;
      border-radius: 4px;
      padding: 20px;
      border: 1px solid #ddd;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th {
      background: #000;
      color: #fff;
      text-transform: uppercase;
      font-weight: 600;
      padding: 12px;
      border: 1px solid #ddd;
    }

    td {
      background: #fff;
      padding: 12px;
      border: 1px solid #ddd;
    }

    tr:hover td {
      background: #f9f9f9;
    }

    a.btn-action {
      padding: 6px 14px;
      border-radius: 4px;
      font-size: 13px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      margin: 0 2px;
      display: inline-block;
    }

    a.btn-update {
      background: #000;
    }
    a.btn-update:hover {
      background: #333;
    }

    a.btn-delete {
      background: #721c24;
    }
    a.btn-delete:hover {
      background: #5a1419;
    }

    .btn-create {
      display: inline-block;
      padding: 12px 25px;
      border: none;
      background: #000;
      color: #fff;
      font-size: 1em;
      border-radius: 4px;
      font-weight: 600;
      transition: background-color 0.3s;
      text-transform: uppercase;
      text-decoration: none;
      margin-top: 20px;
    }

    .btn-create:hover {
      background: #333;
    }
  </style>
</head>
<body>

  <div class="dashboard-container">
    <div class="dashboard-header">
      <h2>
        <i class="fa-solid fa-briefcase"></i>
        Employer Dashboard - My Jobs
      </h2>
      <a href="<?= site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
    </div>

    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status">
        <strong>Welcome:</strong> <?= html_escape($logged_in_user['username']); ?>
      </div>
    <?php endif; ?>

    <div class="table-card">
      <div class="table-responsive">
        <table class="table align-middle">
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Company</th>
            <th>Location</th>
            <th>Salary</th>
            <th>Action</th>
          </tr>
          <?php foreach ($jobs as $job): ?>
          <tr>
            <td><?= html_escape($job['id']); ?></td>
            <td><?= html_escape($job['title']); ?></td>
            <td><?= html_escape(substr($job['description'], 0, 50)) . '...'; ?></td>
            <td><?= html_escape($job['company']); ?></td>
            <td><?= html_escape($job['location']); ?></td>
            <td><?= html_escape($job['salary']); ?></td>
            <td>
              <a href="<?= site_url('/jobs/update/'.$job['id']); ?>" class="btn-action btn-update">Update</a>
              <a href="<?= site_url('/jobs/delete/'.$job['id']); ?>" class="btn-action btn-delete">Delete</a>
              <a href="<?= site_url('/applications'); ?>" class="btn-action" style="background: #28a745;">View Applications</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

    <a href="<?= site_url('jobs/create'); ?>" class="btn-create">+ Post New Job</a>
  </div>
</body>
</html>
