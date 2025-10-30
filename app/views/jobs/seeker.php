<?php $page_title = 'Job Search'; ob_start(); ?>
<div class="bg-white border border-slate-200 rounded-xl p-5">
  <div class="flex items-center justify-between gap-2 mb-4">
    <h2 class="text-lg font-semibold">Job Listings</h2>
    <form action="<?= site_url('jobs/seeker'); ?>" method="get" class="flex gap-2 w-full max-w-md">
      <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
      <input name="q" type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Search jobs..." value="<?= html_escape($q); ?>">
      <button type="submit" class="px-3 py-2 rounded-lg bg-slate-900 text-white">Search</button>
    </form>
  </div>

  <?php if(!empty($logged_in_user)): ?>
    <div class="mb-4 text-sm text-slate-700">Welcome, <span class="font-semibold"><?= html_escape($logged_in_user['username']); ?></span></div>
  <?php endif; ?>

  <div class="overflow-x-auto">
    <table class="min-w-full text-sm">
      <thead>
        <tr class="bg-slate-50 text-slate-600">
          <th class="text-left px-3 py-2">Title</th>
          <th class="text-left px-3 py-2">Description</th>
          <th class="text-left px-3 py-2">Company</th>
          <th class="text-left px-3 py-2">Location</th>
          <th class="text-left px-3 py-2">Salary</th>
          <th class="text-left px-3 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($jobs as $job): ?>
        <tr class="border-t">
          <td class="px-3 py-2"><?= html_escape($job['title']); ?></td>
          <td class="px-3 py-2"><?= html_escape(substr($job['description'], 0, 100)) . '...'; ?></td>
          <td class="px-3 py-2"><?= html_escape($job['company']); ?></td>
          <td class="px-3 py-2"><?= html_escape($job['location']); ?></td>
          <td class="px-3 py-2"><?= html_escape($job['salary']); ?></td>
          <td class="px-3 py-2">
            <a href="<?= site_url('/applications/apply/'.$job['id']); ?>" class="px-3 py-1 rounded bg-emerald-600 text-white">Apply</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-4 flex justify-center">
    <?php echo $page; ?>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>
