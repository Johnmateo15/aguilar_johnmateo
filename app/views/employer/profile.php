<?php $page_title = 'Employer Profile'; ob_start(); ?>
<div class="bg-white border border-slate-200 rounded-xl p-5 max-w-2xl">
  <form method="post" enctype="multipart/form-data" class="space-y-4">
    <div>
      <label class="text-sm text-slate-600">Username</label>
      <input class="mt-1 w-full border rounded-lg px-3 py-2" type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
    </div>
    <div>
      <label class="text-sm text-slate-600">Email</label>
      <input class="mt-1 w-full border rounded-lg px-3 py-2" type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div>
        <label class="text-sm text-slate-600">Company Name</label>
        <input class="mt-1 w-full border rounded-lg px-3 py-2" type="text" name="company_name" placeholder="Acme Inc.">
      </div>
      <div>
        <label class="text-sm text-slate-600">Company Address</label>
        <input class="mt-1 w-full border rounded-lg px-3 py-2" type="text" name="company_address" placeholder="City, Country">
      </div>
    </div>
    <div>
      <label class="text-sm text-slate-600">Logo</label>
      <input class="mt-1 w-full border rounded-lg px-3 py-2" type="file" name="logo">
    </div>
    <div class="pt-2">
      <button class="px-3 py-2 rounded-lg bg-slate-900 text-white" type="submit">Save</button>
    </div>
  </form>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


