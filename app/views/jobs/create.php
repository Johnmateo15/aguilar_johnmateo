<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Post New Job</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: #fff;
      font-family: Arial, sans-serif;
      color: #000;
    }

    .form-container {
      max-width: 600px;
      margin: 50px auto;
      padding: 30px;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-header {
      text-align: center;
      margin-bottom: 25px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 15px;
    }

    .form-header h2 {
      font-size: 1.8em;
      font-weight: 700;
      color: #000;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .form-header h2 i {
      color: #000;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: 600;
      color: #000;
      margin-bottom: 5px;
      display: block;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1em;
    }

    .form-group textarea {
      resize: vertical;
      min-height: 100px;
    }

    .btn-submit {
      width: 100%;
      padding: 12px;
      border: none;
      background: #000;
      color: #fff;
      font-size: 1em;
      border-radius: 4px;
      font-weight: 600;
      transition: background-color 0.3s;
      text-transform: uppercase;
    }

    .btn-submit:hover {
      background: #333;
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

  <div class="form-container">
    <div class="form-header">
      <h2>
        <i class="fa-solid fa-plus"></i>
        Post New Job
      </h2>
    </div>

    <form action="<?= site_url('jobs/create'); ?>" method="post">
      <div class="form-group">
        <label for="title">Job Title</label>
        <input type="text" id="title" name="title" required>
      </div>

      <div class="form-group">
        <label for="description">Job Description</label>
        <textarea id="description" name="description" required></textarea>
      </div>

      <div class="form-group">
        <label for="company">Company</label>
        <input type="text" id="company" name="company" required>
      </div>

      <div class="form-group">
        <label for="location">Location</label>
        <input type="text" id="location" name="location" required>
      </div>

      <div class="form-group">
        <label for="salary">Salary</label>
        <input type="text" id="salary" name="salary" placeholder="e.g., $50,000 - $70,000" required>
      </div>

      <button type="submit" class="btn-submit">Post Job</button>
    </form>

    <a href="<?= site_url('jobs'); ?>" class="btn-back">Back to Jobs</a>
  </div>
</body>
</html>
