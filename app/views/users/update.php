<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: linear-gradient(135deg, #dfe6ff, #f5eaff);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .form-card {
      width: 440px;
      padding: 40px 35px;
      background: #ffffff;
      border-radius: 18px;
      box-shadow: 0 8px 25px rgba(88, 86, 208, 0.15);
      text-align: center;
      animation: fadeIn 0.7s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .form-card h1 {
      background: linear-gradient(90deg, #6c1fe9ff, #1e88e5);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-size: 2em;
      font-weight: 700;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 18px;
      position: relative;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 14px 12px 42px;
      font-size: 1em;
      color: #333;
      background: #f9f9ff;
      border: 1px solid #cfd9eb;
      border-radius: 10px;
      outline: none;
      transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #5c6bc0;
      box-shadow: 0 0 8px rgba(92, 107, 192, 0.25);
      background: #fff;
    }

    .form-group input::placeholder {
      color: #888;
    }

    .form-group i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: #5c6bc0;
      font-size: 1em;
      opacity: 0.85;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #5c6bc0;
      font-size: 1em;
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #5c6bc0, #1e88e5);
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s ease;
      text-transform: uppercase;
      box-shadow: 0 4px 12px rgba(92, 107, 192, 0.25);
    }

    .btn-submit:hover {
      background: linear-gradient(90deg, #4a5bb0, #166ed6);
      transform: translateY(-2px);
    }

    .btn-return {
      display: block;
      margin-top: 20px;
      font-size: 0.95em;
      color: #5c6bc0;
      text-decoration: none;
      transition: 0.3s;
    }

    .btn-return:hover {
      text-decoration: underline;
      color: #1e88e5;
    }
  </style>
</head>
<body>
  <div class="form-card">
    <h1>Update User</h1>
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST">
      <div class="form-group">
        <i class="fa-solid fa-user"></i>
        <input type="text" name="username" value="<?=html_escape($user['username']);?>" placeholder="Username" required>
      </div>

      <div class="form-group">
        <i class="fa-solid fa-envelope"></i>
        <input type="email" name="email" value="<?=html_escape($user['email']);?>" placeholder="Email" required>
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div class="form-group">
          <i class="fa-solid fa-user-shield"></i>
          <select name="role" required>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <div class="form-group">
          <i class="fa-solid fa-lock"></i>
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <button type="submit" class="btn-submit">Update User</button>
    </form>
    <a href="<?=site_url('/users');?>" class="btn-return">← Return to Home</a>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    if (togglePassword && password) {
      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>
