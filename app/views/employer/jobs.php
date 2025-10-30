<?php $page_title = 'My Jobs'; ob_start(); ?>
<?php $rows = $jobs ?? [ ['id'=>11,'title'=>'Backend Dev','company'=>'Acme','location'=>'Manila','salary'=>'50000','status'=>'approved','created_at'=>'2025-01-10'], ['id'=>12,'title'=>'QA Engineer','company'=>'Globex','location'=>'Cebu','salary'=>'40000','status'=>'pending','created_at'=>'2025-01-11'] ]; ?>
<div class="bg-white border border-slate-200 rounded-xl p-5">
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
    <h2 class="text-lg font-semibold">Job Posts</h2>
    <div class="flex items-center gap-2 w-full md:w-auto">
      <form action="/jobs" method="get" class="flex gap-2 w-full md:w-80">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input class="w-full border rounded-lg px-3 py-2" name="q" placeholder="Search my jobs..." value="<?= html_escape($q); ?>" />
        <button class="px-3 py-2 rounded-lg bg-slate-900 text-white" type="submit">Search</button>
      </form>
      <a href="/jobs/create" class="px-3 py-2 rounded-lg bg-blue-600 text-white">Add Job</a>
    </div>
  </div>
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm">
      <thead>
        <tr class="bg-slate-50 text-slate-600">
          <th class="text-left px-3 py-2">Title</th>
          <th class="text-left px-3 py-2">Company</th>
          <th class="text-left px-3 py-2">Location</th>
          <th class="text-left px-3 py-2">Salary</th>
          <th class="text-left px-3 py-2">Status</th>
          <th class="text-left px-3 py-2">Posted</th>
          <th class="text-left px-3 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($rows)): ?>
          <tr class="border-t"><td colspan="7" class="px-3 py-6 text-center text-slate-500">No jobs yet. Click "Add Job" to post your first job.</td></tr>
        <?php else: foreach($rows as $r): ?>
        <tr class="border-t">
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['title']); ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['company']); ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['location']); ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['salary']); ?></td>
          <td class="px-3 py-2">
            <?php $s = isset($r['status']) ? $r['status'] : 'approved'; ?>
            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium <?php echo $s==='approved' ? 'bg-emerald-100 text-emerald-700' : ($s==='pending' ? 'bg-amber-100 text-amber-700' : 'bg-rose-100 text-rose-700'); ?>"><?php echo htmlspecialchars($s); ?></span>
          </td>
          <td class="px-3 py-2 text-slate-500"><?php echo htmlspecialchars($r['created_at'] ?? '—'); ?></td>
          <td class="px-3 py-2">
            <div class="flex gap-2">
              <a href="/jobs/update/<?php echo $r['id']; ?>" class="px-2 py-1 rounded border">Edit</a>
              <a href="/jobs/delete/<?php echo $r['id']; ?>" class="px-2 py-1 rounded border text-red-600">Delete</a>
            </div>
          </td>
        </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
  <?php if (isset($page)) : ?>
    <div class="mt-4 flex justify-center"><?php echo $page; ?></div>
  <?php endif; ?>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


