<?php $page_title = 'My Profile & CV'; ob_start(); ?>
<div class="bg-white border border-slate-200 rounded-xl p-5 max-w-2xl">
  <form method="post" enctype="multipart/form-data" class="space-y-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div>
        <label class="text-sm text-slate-600">Full Name</label>
        <input class="mt-1 w-full border rounded-lg px-3 py-2" type="text" name="full_name" placeholder="Your name">
      </div>
      <div>
        <label class="text-sm text-slate-600">Email</label>
        <input class="mt-1 w-full border rounded-lg px-3 py-2" type="email" name="email" placeholder="you@example.com">
      </div>
    </div>
    <div>
      <label class="text-sm text-slate-600">Resume (PDF)</label>
      <input class="mt-1 w-full border rounded-lg px-3 py-2" type="file" name="resume">
    </div>
    <div class="pt-2">
      <button class="px-3 py-2 rounded-lg bg-slate-900 text-white" type="submit">Save</button>
    </div>
  </form>
</div>
<?php $content = ob_get_clean(); include APP_DIR.'views/layouts/main.php'; ?>


