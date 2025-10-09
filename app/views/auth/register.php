<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | Glass UI</title>
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
      overflow: hidden;
    }

    .register {
      backdrop-filter: blur(20px);
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 20px;
      padding: 40px 35px;
      width: 420px;
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

    .register h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #fff;
    }

    .inputBox {
      position: relative;
      margin-bottom: 20px;
    }

    .inputBox input,
    .inputBox select {
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

    .inputBox input:focus,
    .inputBox select:focus {
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

    .register button {
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

    .register button:hover {
      background: linear-gradient(135deg, #1d4ed8, #7e22ce);
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
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
  <div class="register">
    <h2>Create Account</h2>

    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="inputBox">
        <input type="text" name="username" placeholder="Username" required />
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required />
      </div>

      <div class="inputBox">
        <input type="password" id="password" name="password" placeholder="Password" required />
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="inputBox">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required />
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="inputBox">
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="group">
      <p>Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a></p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener("click", function () {
        const type = input.getAttribute("type") === "password" ? "text" : "password";
        input.setAttribute("type", type);
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
      });
    }

    toggleVisibility("togglePassword", "password");
    toggleVisibility("toggleConfirmPassword", "confirmPassword");
  </script>
</body>
</html>
