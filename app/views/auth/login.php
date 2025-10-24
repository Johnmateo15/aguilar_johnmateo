<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #fff;
      color: #000;
    }

    .login {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 40px 30px;
      width: 400px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      color: #000;
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #000;
    }

    .inputBox {
      position: relative;
      margin-bottom: 25px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      color: #000;
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      outline: none;
      transition: border-color 0.3s ease;
    }

    .inputBox input:focus {
      border-color: #000;
    }

    .inputBox input::placeholder {
      color: #999;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #666;
      opacity: 0.8;
      font-size: 1.1em;
      transition: 0.3s;
    }

    .toggle-password:hover {
      opacity: 1;
    }

    .login button {
      width: 100%;
      padding: 14px;
      border: none;
      background: #000;
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 4px;
      cursor: pointer;
      text-transform: uppercase;
      transition: background-color 0.3s ease;
    }

    .login button:hover {
      background: #333;
    }

    .error-box {
      background: #f8d7da;
      color: #721c24;
      padding: 10px;
      border-radius: 4px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.9em;
      border: 1px solid #f5c6cb;
    }

    .group {
      text-align: center;
      margin-top: 20px;
    }

    .group a {
      font-size: 0.95em;
      color: #000;
      font-weight: 500;
      text-decoration: none;
      transition: text-decoration 0.3s;
    }

    .group a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="inputBox">
        <input type="text" placeholder="Username" name="username" required />
      </div>

      <div class="inputBox">
        <input type="password" placeholder="Password" name="password" id="password" required />
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit">Login</button>
    </form>

    <div class="group">
      <p style="font-size: 0.9em;">
        Don't have an account?
        <a href="<?= site_url('auth/register'); ?>">Register here</a>
      </p>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
