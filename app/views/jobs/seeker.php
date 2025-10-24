<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Job Listings</title>
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

    a.btn-apply {
      background: #28a745;
    }
    a.btn-apply:hover {
      background: #218838;
    }

    .search-form {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }

    .search-form input {
      border-radius: 4px;
      border: 1px solid #ccc;
      padding: 10px;
      flex: 1;
    }

    .search-form button {
      background: #000;
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 4px;
      padding: 8px 18px;
      transition: background-color 0.3s;
    }

    .search-form button:hover {
      background: #333;
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
        <i class="fa-solid fa-search"></i>
        Job Listings
      </h2>
      <a href="<?= site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
    </div>

    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status">
        <strong>Welcome:</strong> <?= html_escape($logged_in_user['username']); ?>
      </div>
    <?php endif; ?>

    <div class="table-card">
      <form action="<?= site_url('jobs/seeker'); ?>" method="get" class="search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input name="q" type="text" class="form-control" placeholder="Search jobs..." value="<?= html_escape($q); ?>">
        <button type="submit"><i class="fa fa-search"></i> Search</button>
      </form>

      <div class="table-responsive">
        <table class="table align-middle">
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Company</th>
            <th>Location</th>
            <th>Salary</th>
            <th>Action</th>
          </tr>
          <?php foreach ($jobs as $job): ?>
          <tr>
            <td><?= html_escape($job['title']); ?></td>
            <td><?= html_escape(substr($job['description'], 0, 100)) . '...'; ?></td>
            <td><?= html_escape($job['company']); ?></td>
            <td><?= html_escape($job['location']); ?></td>
            <td><?= html_escape($job['salary']); ?></td>
            <td>
              <a href="<?= site_url('/applications/apply/'.$job['id']); ?>" class="btn-action btn-apply">Apply</a>
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
