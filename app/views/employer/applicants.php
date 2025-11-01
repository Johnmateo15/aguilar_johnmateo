<?php $page_title = 'Applications'; ob_start(); ?>
<?php 
$u = isset($logged_in_user) ? $logged_in_user : (isset($_SESSION['user']) ? $_SESSION['user'] : null);
$rows = $applications ?? []; 
?>
<div class="bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden">
  <!-- Header -->
  <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4h4m-6 4h8M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/>
      </svg>
      <h1 class="text-xl font-bold text-white">Employer Dashboard - Applications</h1>
    </div>
    <a href="/auth/logout" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg font-semibold transition-colors">Logout</a>
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
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">JOB TITLE</th>
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">APPLICANT</th>
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">EMAIL</th>
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">STATUS</th>
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">APPLIED AT</th>
            <th class="border border-slate-300 px-4 py-3 text-left font-semibold text-slate-700 uppercase text-xs">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($rows)): ?>
            <tr>
              <td colspan="7" class="border border-slate-300 px-4 py-6 text-center text-slate-500">
                No applications yet. Applications will appear here when job seekers apply to your job postings.
              </td>
            </tr>
          <?php else: foreach($rows as $r): ?>
          <tr class="hover:bg-slate-50">
            <td class="border border-slate-300 px-4 py-3"><?php echo htmlspecialchars($r['id']); ?></td>
            <td class="border border-slate-300 px-4 py-3 font-medium"><?php echo htmlspecialchars($r['job_title'] ?? '—'); ?></td>
            <td class="border border-slate-300 px-4 py-3"><?php echo htmlspecialchars($r['username']); ?></td>
            <td class="border border-slate-300 px-4 py-3"><?php echo htmlspecialchars($r['email']); ?></td>
            <td class="border border-slate-300 px-4 py-3">
              <?php $s = isset($r['status']) ? $r['status'] : 'pending'; ?>
              <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium <?php echo $s==='accepted' ? 'bg-emerald-100 text-emerald-700' : ($s==='pending' ? 'bg-amber-100 text-amber-700' : ($s==='reviewed' ? 'bg-blue-100 text-blue-700' : 'bg-rose-100 text-rose-700')); ?>">
                <?php echo htmlspecialchars($s); ?>
              </span>
            </td>
            <td class="border border-slate-300 px-4 py-3 text-slate-500"><?php echo htmlspecialchars($r['applied_at'] ?? '—'); ?></td>
            <td class="border border-slate-300 px-4 py-3">
              <div class="flex gap-2">
                <a href="/applications/view/<?php echo $r['id']; ?>" class="px-3 py-1.5 bg-slate-900 hover:bg-slate-800 text-white rounded font-medium text-sm">View CV</a>
                <a href="/applications/update_status/<?php echo $r['id']; ?>/accepted" class="px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded font-medium text-sm">Accept</a>
                <a href="/applications/update_status/<?php echo $r['id']; ?>/rejected" class="px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white rounded font-medium text-sm">Reject</a>
              </div>
            </td>
          </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <?php if (isset($page)) : ?>
      <div class="mt-4 flex justify-center"><?php echo $page; ?></div>
    <?php endif; ?>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


