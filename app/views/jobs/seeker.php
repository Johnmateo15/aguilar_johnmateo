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

  <?php if(isset($has_resume) && !$has_resume): ?>
    <div class="mb-4 p-4 bg-amber-50 border border-amber-200 rounded-lg">
      <div class="flex items-start gap-3">
        <svg class="w-5 h-5 text-amber-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 19.5c-.77.833.192 2.5 1.732 2.5z"/>
        </svg>
        <div>
          <p class="text-amber-800 font-semibold">Resume Required</p>
          <p class="text-amber-700 text-sm mt-1">Please upload your resume in your profile before applying for jobs.</p>
          <a href="/applicant/profile" class="inline-block mt-2 px-3 py-1.5 bg-amber-600 hover:bg-amber-700 text-white rounded text-sm font-medium">Upload Resume</a>
        </div>
      </div>
    </div>
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
        <?php if (empty($jobs)): ?>
          <tr>
            <td colspan="6" class="px-3 py-6 text-center text-slate-500">No jobs available at the moment.</td>
          </tr>
        <?php else: foreach ($jobs as $job): ?>
        <tr class="border-t">
          <td class="px-3 py-2"><?= html_escape($job['title']); ?></td>
          <td class="px-3 py-2"><?= html_escape(substr($job['description'], 0, 100)) . '...'; ?></td>
          <td class="px-3 py-2"><?= html_escape($job['company']); ?></td>
          <td class="px-3 py-2"><?= html_escape($job['location']); ?></td>
          <td class="px-3 py-2"><?= html_escape($job['salary']); ?></td>
          <td class="px-3 py-2">
            <?php if(isset($has_resume) && $has_resume): ?>
              <a href="<?= site_url('/applications/apply/'.$job['id']); ?>" class="px-3 py-1 rounded bg-emerald-600 hover:bg-emerald-700 text-white">Apply</a>
            <?php else: ?>
              <span class="px-3 py-1 rounded bg-slate-400 text-white cursor-not-allowed" title="Upload resume first">Apply</span>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-4 flex justify-center">
    <?php echo $page; ?>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>
