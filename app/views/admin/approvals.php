<?php $page_title = 'Job Approvals'; ob_start(); ?>
<div class="bg-white border border-slate-200 rounded-xl p-5">
  <h2 class="text-lg font-semibold mb-4">Pending Job Posts</h2>
  <?php $rows = $jobs ?? [ ['id'=>101,'title'=>'Frontend Dev','company'=>'Acme','location'=>'Manila'], ['id'=>102,'title'=>'UI/UX Designer','company'=>'Globex','location'=>'Cebu'] ]; ?>
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm">
      <thead>
        <tr class="bg-slate-50 text-slate-600">
          <th class="text-left px-3 py-2">ID</th>
          <th class="text-left px-3 py-2">Title</th>
          <th class="text-left px-3 py-2">Company</th>
          <th class="text-left px-3 py-2">Location</th>
          <th class="text-left px-3 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($rows as $r): ?>
        <tr class="border-t">
          <td class="px-3 py-2"><?php echo $r['id']; ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['title']); ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['company']); ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['location']); ?></td>
          <td class="px-3 py-2 space-x-2">
            <button class="px-2 py-1 rounded bg-emerald-600 text-white">Approve</button>
            <button class="px-2 py-1 rounded bg-rose-600 text-white">Reject</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


