<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
    body { min-height: 100vh; display: grid; place-items: center; background: linear-gradient(135deg,#f6f7fb 0%,#eef1f7 100%); color: #0f172a; }
    .card { width: 420px; background: #fff; border-radius: 16px; border: 1px solid #e5e7eb; box-shadow: 0 10px 30px rgba(2,6,23,0.06); padding: 28px; }
    .brand { display:flex; align-items:center; gap:10px; margin-bottom: 18px; }
    .brand .logo { width:36px; height:36px; border-radius:10px; background:#111827; display:grid; place-items:center; color:#fff; font-weight:700; }
    h2 { font-size: 22px; font-weight: 700; }
    p.sub { color:#6b7280; font-size: 14px; margin-top: 4px; }
    .field { margin-top: 14px; }
    .input { width:100%; padding:12px 40px 12px 12px; border:1px solid #e5e7eb; border-radius:10px; background:#fff; color:#0f172a; outline:none; transition: border .2s, box-shadow .2s; }
    .input:focus { border-color:#111827; box-shadow: 0 0 0 4px rgba(17,24,39,.08); }
    .toggle-password { position:absolute; right:12px; top:50%; transform:translateY(-50%); color:#6b7280; cursor:pointer; }
    .relative { position:relative; }
    .btn { margin-top: 16px; width: 100%; padding: 12px; border:none; border-radius:10px; background:#111827; color:#fff; font-weight:700; cursor:pointer; transition: transform .02s ease-in-out, background .2s; }
    .btn:hover { background:#0b1220; }
    .btn:active { transform: scale(.99); }
    .error-box { background:#fef2f2; color:#991b1b; border:1px solid #fecaca; padding:10px 12px; border-radius:10px; margin-top:10px; font-size:14px; }
    .meta { margin-top: 14px; text-align:center; font-size:14px; color:#6b7280; }
    .meta a { color:#111827; font-weight:600; text-decoration:none; }
    .meta a:hover { text-decoration:underline; }
  </style>
</head>
<body>
  <div class="card">
    <div class="brand">
      <div class="logo">JB</div>
      <div>
        <h2>Welcome back</h2>
        <p class="sub">Sign in to manage your jobs and applications</p>
      </div>
    </div>

    <?php if (!empty($error)): ?>
      <div class="error-box">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="field">
        <input class="input" type="text" placeholder="Username" name="username" required />
      </div>
      <div class="field relative">
        <input class="input" type="password" placeholder="Password" name="password" id="password" required />
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>
      <button class="btn" type="submit">Sign in</button>
    </form>

    <div class="meta">
      Don't have an account? <a href="<?= site_url('auth/register'); ?>">Create one</a>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    if (togglePassword && password) {
      togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>
