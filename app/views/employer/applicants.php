<?php $page_title = 'Applicants'; ob_start(); ?>
<?php $rows = $applications ?? [ ['id'=>201,'job_title'=>'Backend Dev','username'=>'seeker1','email'=>'seek1@example.com','status'=>'pending'], ['id'=>202,'job_title'=>'QA Engineer','username'=>'seeker2','email'=>'seek2@example.com','status'=>'reviewed'] ]; ?>
<div class="bg-white border border-slate-200 rounded-xl p-5">
  <h2 class="text-lg font-semibold mb-4">Applicants</h2>
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm">
      <thead>
        <tr class="bg-slate-50 text-slate-600">
          <th class="text-left px-3 py-2">Job</th>
          <th class="text-left px-3 py-2">Applicant</th>
          <th class="text-left px-3 py-2">Email</th>
          <th class="text-left px-3 py-2">Status</th>
          <th class="text-left px-3 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($rows as $r): ?>
        <tr class="border-t">
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['job_title']); ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['username']); ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['email']); ?></td>
          <td class="px-3 py-2 capitalize"><?php echo htmlspecialchars($r['status']); ?></td>
          <td class="px-3 py-2 space-x-2">
            <button class="px-2 py-1 rounded border">View CV</button>
            <button class="px-2 py-1 rounded bg-emerald-600 text-white">Accept</button>
            <button class="px-2 py-1 rounded bg-rose-600 text-white">Reject</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


