<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create Account</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
    body { min-height: 100vh; display: grid; place-items: center; background: linear-gradient(135deg,#f6f7fb 0%,#eef1f7 100%); color: #0f172a; }
    .card { width: 460px; background: #fff; border-radius: 16px; border: 1px solid #e5e7eb; box-shadow: 0 10px 30px rgba(2,6,23,0.06); padding: 28px; }
    .brand { display:flex; align-items:center; gap:10px; margin-bottom: 18px; }
    .brand .logo { width:36px; height:36px; border-radius:10px; background:#111827; display:grid; place-items:center; color:#fff; font-weight:700; }
    h2 { font-size: 22px; font-weight: 700; }
    p.sub { color:#6b7280; font-size: 14px; margin-top: 4px; }
    .field { margin-top: 14px; }
    .input { width:100%; padding:12px 40px 12px 12px; border:1px solid #e5e7eb; border-radius:10px; background:#fff; color:#0f172a; outline:none; transition: border .2s, box-shadow .2s; }
    .input:focus { border-color:#111827; box-shadow: 0 0 0 4px rgba(17,24,39,.08); }
    .toggle-password { position:absolute; right:12px; top:50%; transform:translateY(-50%); color:#6b7280; cursor:pointer; }
    .relative { position:relative; }
    .segmented { display:flex; gap:8px; background:#f3f4f6; border-radius:10px; padding:6px; }
    .segmented label { flex:1; display:grid; place-items:center; padding:10px; border-radius:8px; cursor:pointer; font-weight:600; color:#374151; }
    .segmented input { display:none; }
    .segmented input:checked + span { background:#111827; color:#fff; box-shadow: 0 1px 0 rgba(0,0,0,.04) inset; }
    .btn { margin-top: 16px; width: 100%; padding: 12px; border:none; border-radius:10px; background:#111827; color:#fff; font-weight:700; cursor:pointer; transition: transform .02s ease-in-out, background .2s; }
    .btn:hover { background:#0b1220; }
    .btn:active { transform: scale(.99); }
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
        <h2>Create your account</h2>
        <p class="sub">Join as a Job Seeker or Employer</p>
      </div>
    </div>

    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="field">
        <input class="input" type="text" name="username" placeholder="Username" required />
      </div>
      <div class="field">
        <input class="input" type="email" name="email" placeholder="Email" required />
      </div>
      <div class="field relative">
        <input class="input" type="password" id="password" name="password" placeholder="Password" required />
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>
      <div class="field relative">
        <input class="input" type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required />
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>
      <div class="field">
        <div class="segmented">
          <label>
            <input type="radio" name="role" value="job_seeker" checked>
            <span>Job Seeker</span>
          </label>
          <label>
            <input type="radio" name="role" value="employee">
            <span>Employer</span>
          </label>
        </div>
      </div>
      <button class="btn" type="submit">Create account</button>
    </form>
    <div class="meta">Already have an account? <a href="<?= site_url('auth/login'); ?>">Sign in</a></div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);
      if (toggle && input) {
        toggle.addEventListener("click", function () {
          const type = input.getAttribute("type") === "password" ? "text" : "password";
          input.setAttribute("type", type);
          this.classList.toggle("fa-eye");
          this.classList.toggle("fa-eye-slash");
        });
      }
    }
    toggleVisibility("togglePassword", "password");
    toggleVisibility("toggleConfirmPassword", "confirmPassword");
  </script>
</body>
</html>
