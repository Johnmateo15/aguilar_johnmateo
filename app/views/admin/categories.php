<?php $page_title = 'Categories'; ob_start(); ?>
<div class="bg-white border border-slate-200 rounded-xl p-5">
  <div class="flex items-center justify-between mb-4">
    <h2 class="text-lg font-semibold">Job Categories</h2>
    <button class="px-3 py-2 rounded-lg bg-slate-900 text-white">Add Category</button>
  </div>
  <?php $categories = $categories ?? [ ['id'=>1,'name'=>'IT & Software'], ['id'=>2,'name'=>'Sales & Marketing'], ['id'=>3,'name'=>'Design'] ]; ?>
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm">
      <thead>
        <tr class="bg-slate-50 text-slate-600">
          <th class="text-left px-3 py-2">ID</th>
          <th class="text-left px-3 py-2">Name</th>
          <th class="text-left px-3 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($categories as $c): ?>
        <tr class="border-t">
          <td class="px-3 py-2"><?php echo $c['id']; ?></td>
          <td class="px-3 py-2"><?php echo htmlspecialchars($c['name']); ?></td>
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


