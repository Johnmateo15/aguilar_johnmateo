<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User | Glass UI</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

    .create-user {
      width: 420px;
      padding: 40px;
      backdrop-filter: blur(20px);
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
      animation: fadeIn 0.8s ease;
      color: #fff;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .create-user h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #fff;
    }

    .inputBox {
      margin-bottom: 20px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 15px;
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

    button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(135deg, #2563eb, #9333ea);
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s ease;
      text-transform: uppercase;
      box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4);
    }

    button:hover {
      background: linear-gradient(135deg, #1d4ed8, #7e22ce);
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .link-wrapper {
      text-align: center;
      margin-top: 15px;
    }

    .link-wrapper a {
      font-size: 0.95em;
      color: #fff;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s;
    }

    .link-wrapper a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="create-user">
    <h2>Create User</h2>
    <form method="POST" action="<?= site_url('users/create'); ?>">
      <div class="inputBox">
        <input type="text" name="username" placeholder="Username" required value="<?= isset($username) ? html_escape($username) : '' ?>">
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required value="<?= isset($email) ? html_escape($email) : '' ?>">
      </div>

      <button type="submit">Create User</button>
    </form>

    <div class="link-wrapper">
      <a href="<?= site_url('/users'); ?>">Return to Home</a>
    </div>
  </div>

</body>
</html>
