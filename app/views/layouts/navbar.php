<?php $u = isset($logged_in_user) ? $logged_in_user : (isset($_SESSION['user']) ? $_SESSION['user'] : null); ?>
<header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 lg:px-6 sticky top-0 z-20">
    <div class="flex items-center gap-3">
        <button class="lg:hidden inline-flex items-center justify-center w-9 h-9 rounded-lg border border-slate-200" data-toggle-sidebar>
            <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <span class="text-slate-900 font-semibold text-sm hidden sm:inline">Welcome<?php echo $u ? ', '.htmlspecialchars($u['username']) : ''; ?></span>
    </div>
    <div class="flex items-center gap-3">
        <?php if ($u): ?>
            <span class="text-xs px-2 py-1 rounded-full bg-slate-100 border border-slate-200 capitalize"><?php echo htmlspecialchars($u['role']); ?></span>
            <a href="/auth/logout" class="text-sm font-semibold text-white bg-slate-900 hover:bg-slate-800 rounded-lg px-3 py-2">Logout</a>
        <?php else: ?>
            <a href="/auth/login" class="text-sm font-semibold text-slate-700">Login</a>
        <?php endif; ?>
    </div>
</header>


