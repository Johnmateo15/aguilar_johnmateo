<?php $page_title = 'Employer Profile'; ob_start(); ?>
<?php 
$u = isset($logged_in_user) ? $logged_in_user : (isset($_SESSION['user']) ? $_SESSION['user'] : null);
?>
<div class="bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden">
  <!-- Header -->
  <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/>
      </svg>
      <h1 class="text-xl font-bold text-white">Employer Dashboard - Profile</h1>
    </div>
    <a href="/auth/logout" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg font-semibold transition-colors">Logout</a>
  </div>

  <!-- Welcome Message -->
  <div class="px-6 py-3 bg-slate-50 border-b border-slate-200">
    <p class="text-slate-700"><strong>Welcome:</strong> <?php echo $u ? htmlspecialchars($u['username']) : 'Guest'; ?></p>
  </div>

  <!-- Form Container -->
  <div class="p-6 max-w-3xl">
    <form method="post" enctype="multipart/form-data" class="space-y-5">
      <div>
        <label class="block text-sm font-medium text-slate-700 mb-2">Username</label>
        <input class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
      </div>
      <div>
        <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
        <input class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-slate-700 mb-2">Company Name</label>
          <input class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="company_name" placeholder="Acme Inc.">
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-700 mb-2">Company Address</label>
          <input class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="company_address" placeholder="City, Country">
        </div>
      </div>
      <div>
        <label class="block text-sm font-medium text-slate-700 mb-2">Company Logo</label>
        <input class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="file" name="logo" accept="image/*">
      </div>
      <div class="pt-2">
        <button class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-lg font-semibold transition-colors shadow-lg" type="submit">Save Profile</button>
      </div>
    </form>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


