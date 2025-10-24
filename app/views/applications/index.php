<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Job Applications</title>
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

    a.btn-accept {
      background: #28a745;
    }
    a.btn-accept:hover {
      background: #218838;
    }

    a.btn-reject {
      background: #721c24;
    }
    a.btn-reject:hover {
      background: #5a1419;
    }

    .btn-back {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      border: none;
      background: #666;
      color: #fff;
      font-size: 1em;
      border-radius: 4px;
      font-weight: 600;
      transition: background-color 0.3s;
      text-transform: uppercase;
      text-decoration: none;
    }

    .btn-back:hover {
      background: #555;
    }
  </style>
</head>
<body>

  <div class="dashboard-container">
    <div class="dashboard-header">
      <h2>
        <i class="fa-solid fa-clipboard-list"></i>
        Job Applications
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
            <th>Job Title</th>
            <th>Applicant</th>
            <th>Email</th>
            <th>Status</th>
            <th>Applied At</th>
            <th>Action</th>
          </tr>
          <?php foreach ($applications as $app): ?>
          <tr>
            <td><?= html_escape($app['job_title']); ?></td>
            <td><?= html_escape($app['username']); ?></td>
            <td><?= html_escape($app['email']); ?></td>
            <td><?= html_escape($app['status']); ?></td>
            <td><?= html_escape($app['applied_at']); ?></td>
            <td>
              <a href="<?= site_url('/applications/update_status/'.$app['id'].'/accepted'); ?>" class="btn-action btn-accept">Accept</a>
              <a href="<?= site_url('/applications/update_status/'.$app['id'].'/rejected'); ?>" class="btn-action btn-reject">Reject</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

    <a href="<?= site_url('jobs'); ?>" class="btn-back">Back to Jobs</a>
  </div>
</body>
</html>
