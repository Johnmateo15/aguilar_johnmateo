<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
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

    .register {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 40px 30px;
      width: 420px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      color: #000;
    }

    .register h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #000;
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
      color: #000;
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      outline: none;
      transition: border-color 0.3s ease;
    }

    .inputBox input:focus,
    .inputBox select:focus {
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

    .register button {
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

    .register button:hover {
      background: #333;
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
          <option value="job_seeker" selected>Job Seeker</option>
          <option value="employer">Employer</option>
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
