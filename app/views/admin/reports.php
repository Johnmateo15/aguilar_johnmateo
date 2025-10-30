<?php $page_title = 'Reports'; ob_start(); ?>
<div class="bg-white border border-slate-200 rounded-xl p-5">
  <h2 class="text-lg font-semibold mb-4">Summary</h2>
  <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
    <div class="border rounded-xl p-4">
      <div class="text-slate-500 text-sm">Employees</div>
      <div class="text-2xl font-bold"><?php echo isset($employees) ? count($employees) : 0; ?></div>
    </div>
    <div class="border rounded-xl p-4">
      <div class="text-slate-500 text-sm">Job Seekers</div>
      <div class="text-2xl font-bold"><?php echo isset($job_seekers) ? count($job_seekers) : 0; ?></div>
    </div>
    <div class="border rounded-xl p-4">
      <div class="text-slate-500 text-sm">Total Jobs</div>
      <div class="text-2xl font-bold"><?php echo isset($jobs) ? count($jobs) : 0; ?></div>
    </div>
  </div>
  <div class="mt-6">
    <button class="px-3 py-2 rounded-lg bg-slate-900 text-white">Download Report</button>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


