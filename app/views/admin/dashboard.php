<?php $page_title = 'Admin Dashboard'; ob_start(); ?>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
  <div class="bg-white border border-slate-200 rounded-xl p-5">
    <div class="text-sm text-slate-500">Total Users</div>
    <div class="text-2xl font-bold mt-1"><?php echo isset($total_users) ? (int)$total_users : 0; ?></div>
  </div>
  <div class="bg-white border border-slate-200 rounded-xl p-5">
    <div class="text-sm text-slate-500">Total Jobs</div>
    <div class="text-2xl font-bold mt-1"><?php echo isset($total_jobs) ? (int)$total_jobs : 0; ?></div>
  </div>
  <div class="bg-white border border-slate-200 rounded-xl p-5">
    <div class="text-sm text-slate-500">Applications</div>
    <div class="text-2xl font-bold mt-1"><?php echo isset($total_applications) ? (int)$total_applications : 0; ?></div>
  </div>
  <div class="bg-white border border-slate-200 rounded-xl p-5">
    <div class="text-sm text-slate-500">Pending Approvals</div>
    <div class="text-2xl font-bold mt-1">—</div>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


