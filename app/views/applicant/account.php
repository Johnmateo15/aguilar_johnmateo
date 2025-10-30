<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Account</title>
    <style>body{font-family:Arial, sans-serif;margin:24px} label{display:block;margin:.5rem 0 .25rem}</style>
</head>
<body>
    <h1>My Account</h1>
    <nav>
        <a href="/jobs/seeker">Job Search</a>
    </nav>
    <form method="post">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <label>New Password (optional)</label>
        <input type="password" name="password" placeholder="••••••">
        <div style="margin-top:12px"><button type="submit">Save</button></div>
    </form>
</body>
</html>


