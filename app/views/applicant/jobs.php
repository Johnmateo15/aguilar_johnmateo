<?php $page_title = 'Job Search'; ob_start(); ?>
<?php $rows = $jobs ?? [ ['id'=>31,'title'=>'Frontend Dev','company'=>'Acme','location'=>'Manila','salary'=>'45000','description'=>'Build UI'], ['id'=>32,'title'=>'Designer','company'=>'Globex','location'=>'Cebu','salary'=>'40000','description'=>'Design UX'] ]; ?>
<div class="bg-white border border-slate-200 rounded-xl p-5">
  <div class="flex items-center justify-between mb-4">
    <h2 class="text-lg font-semibold">Job Listings</h2>
    <form action="/jobs/seeker" method="get" class="flex gap-2">
      <input class="border rounded-lg px-3 py-2" name="q" placeholder="Search jobs..." />
      <button class="px-3 py-2 rounded-lg bg-slate-900 text-white">Search</button>
    </form>
  </div>
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm">
      <thead>
        <tr class="bg-slate-50 text-slate-600">
          <th class="text-left px-3 py-2">Title</th>
          <th class="text-left px-3 py-2">Company</th>
          <th class="text-left px-3 py-2">Location</th>
          <th class="text-left px-3 py-2">Salary</th>
          <th class="text-left px-3 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($rows as $r): ?>
        <tr class="border-t">
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['title']); ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['company']); ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['location']); ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['salary']); ?></td>
          <td class="px-3 py-2">
            <a href="/applications/apply/<?php echo $r['id']; ?>" class="px-3 py-1 rounded bg-emerald-600 text-white">Apply</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


