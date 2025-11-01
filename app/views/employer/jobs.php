<?php $page_title = 'My Jobs'; ob_start(); ?>
<?php 
$u = isset($logged_in_user) ? $logged_in_user : (isset($_SESSION['user']) ? $_SESSION['user'] : null);
$rows = $jobs ?? []; 
?>
<div class="bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden">
  <!-- Header -->
  <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
    <div class="flex items-center gap-3">
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"/>
      </svg>
      <h1 class="text-xl font-bold text-white">Employer Dashboard - My Jobs</h1>
    </div>
  </div>

  <!-- Welcome Message -->
  <div class="px-6 py-3 bg-slate-50 border-b border-slate-200">
    <p class="text-slate-700"><strong>Welcome:</strong> <?php echo $u ? htmlspecialchars($u['username']) : 'Guest'; ?></p>
  </div>

  <!-- Table Container -->
  <div class="p-6">
    <div class="overflow-x-auto">
      <table class="min-w-full border-collapse">
        <thead>
          <tr class="bg-slate-100">
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">ID</th>
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">TITLE</th>
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">DESCRIPTION</th>
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">COMPANY</th>
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">LOCATION</th>
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">SALARY</th>
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($rows)): ?>
            <tr>
              <td colspan="7" class="border border-slate-300 px-4 py-6 text-center text-slate-500">
                No jobs posted yet. Click "+ POST NEW JOB" to create your first job posting.
              </td>
            </tr>
          <?php else: foreach($rows as $r): ?>
          <tr class="hover:bg-slate-50">
            <td class="border border-slate-300 px-4 py-3"><?php echo htmlspecialchars($r['id']); ?></td>
            <td class="border border-slate-300 px-4 py-3 font-medium"><?php echo htmlspecialchars($r['title']); ?></td>
            <td class="border border-slate-300 px-4 py-3"><?php echo htmlspecialchars(substr($r['description'] ?? '', 0, 50)) . '...'; ?></td>
            <td class="border border-slate-300 px-4 py-3"><?php echo htmlspecialchars($r['company'] ?? 'None'); ?></td>
            <td class="border border-slate-300 px-4 py-3"><?php echo htmlspecialchars($r['location'] ?? '—'); ?></td>
            <td class="border border-slate-300 px-4 py-3"><?php echo htmlspecialchars($r['salary'] ?? '0.00'); ?></td>
            <td class="border border-slate-300 px-4 py-3">
              <div class="flex gap-2">
                <a href="/jobs/update/<?php echo $r['id']; ?>" class="px-3 py-1.5 bg-slate-900 hover:bg-slate-800 text-white rounded font-medium text-sm">Update</a>
                <a href="/jobs/delete/<?php echo $r['id']; ?>" class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded font-medium text-sm">Delete</a>
                <a href="/applications?job_id=<?php echo $r['id']; ?>" class="px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded font-medium text-sm">View Applications</a>
              </div>
            </td>
          </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Post New Job Button -->
    <div class="mt-6">
      <a href="/jobs/create" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-lg font-bold text-lg transition-colors shadow-lg">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        POST NEW JOB
      </a>
    </div>

    <!-- Pagination -->
    <?php if (isset($page)) : ?>
      <div class="mt-4 flex justify-center"><?php echo $page; ?></div>
    <?php endif; ?>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


