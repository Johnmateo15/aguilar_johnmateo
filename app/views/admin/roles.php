<?php $page_title = 'Account & Role Management'; ob_start(); ?>
<?php $rows = $user ?? [ ['id'=>1,'username'=>'admin','role'=>'admin'], ['id'=>2,'username'=>'employer1','role'=>'employee'], ['id'=>3,'username'=>'seeker1','role'=>'job_seeker'] ]; ?>
<div class="bg-white border border-slate-200 rounded-xl p-5">
  <h2 class="text-lg font-semibold mb-4">Assign Roles</h2>
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm">
      <thead>
        <tr class="bg-slate-50 text-slate-600">
          <th class="text-left px-3 py-2">ID</th>
          <th class="text-left px-3 py-2">Username</th>
          <th class="text-left px-3 py-2">Role</th>
          <th class="text-left px-3 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($rows as $r): ?>
        <tr class="border-t">
          <td class="px-3 py-2"><?php echo $r['id']; ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($r['username']); ?></td>
          <td class="px-3 py-2 capitalize"><?php echo htmlspecialchars($r['role']); ?></td>
          <td class="px-3 py-2">
            <select class="border rounded-lg px-2 py-1">
              <option value="admin" <?php echo $r['role']==='admin'?'selected':''; ?>>admin</option>
              <option value="employee" <?php echo $r['role']==='employee'?'selected':''; ?>>employee</option>
              <option value="job_seeker" <?php echo $r['role']==='job_seeker'?'selected':''; ?>>job_seeker</option>
            </select>
            <button class="ml-2 px-2 py-1 rounded border">Save</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


