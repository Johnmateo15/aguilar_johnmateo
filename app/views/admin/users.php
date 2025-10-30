<?php $page_title = 'User Management'; ob_start(); ?>
<?php $rows = $user ?? [ ['id'=>1,'username'=>'admin','email'=>'admin@example.com','role'=>'admin'], ['id'=>2,'username'=>'employer1','email'=>'emp1@example.com','role'=>'employee'], ['id'=>3,'username'=>'seeker1','email'=>'seek1@example.com','role'=>'job_seeker'] ]; ?>
<div class="bg-white border border-slate-200 rounded-xl p-5">
  <div class="flex items-center justify-between mb-4">
    <h2 class="text-lg font-semibold">Users</h2>
    <div class="flex gap-2">
      <input class="border rounded-lg px-3 py-2" placeholder="Search users..." />
      <button class="px-3 py-2 rounded-lg bg-slate-900 text-white">Add User</button>
    </div>
  </div>
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm">
      <thead>
        <tr class="bg-slate-50 text-slate-600">
          <th class="text-left px-3 py-2">ID</th>
          <th class="text-left px-3 py-2">Username</th>
          <th class="text-left px-3 py-2">Email</th>
          <th class="text-left px-3 py-2">Role</th>
          <th class="text-left px-3 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($rows as $r): ?>
        <tr class="border-t">
          <td class="px-3 py-2"><?php echo $r['id']; ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['username']); ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['email']); ?></td>
          <td class="px-3 py-2 capitalize"><?php echo htmlspecialchars($r['role']); ?></td>
          <td class="px-3 py-2 space-x-2">
            <button class="px-2 py-1 rounded border">Edit</button>
            <button class="px-2 py-1 rounded border text-red-600">Delete</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


