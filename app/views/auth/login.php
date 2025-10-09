<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Glass UI</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #3b82f6, #9333ea);
    }

    .login {
      backdrop-filter: blur(20px);
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 20px;
      padding: 50px 40px;
      width: 400px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
      animation: slideUp 0.8s ease;
      color: #fff;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #fff;
    }

    .inputBox {
      position: relative;
      margin-bottom: 25px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      color: #fff;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 10px;
      outline: none;
      transition: all 0.3s ease;
    }

    .inputBox input:focus {
      border-color: #fff;
      background: rgba(255, 255, 255, 0.2);
    }

    .inputBox input::placeholder {
      color: #e5e7eb;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #fff;
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
      background: linear-gradient(135deg, #2563eb, #9333ea);
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      text-transform: uppercase;
      transition: 0.3s ease;
      box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4);
    }

    .login button:hover {
      background: linear-gradient(135deg, #1d4ed8, #7e22ce);
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .error-box {
      background: rgba(239, 68, 68, 0.2);
      color: #fecaca;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.9em;
      border: 1px solid rgba(239, 68, 68, 0.5);
    }

    .group {
      text-align: center;
      margin-top: 20px;
    }

    .group a {
      font-size: 0.95em;
      color: #fff;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s;
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
