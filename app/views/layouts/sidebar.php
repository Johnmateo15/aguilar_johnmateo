<?php $u = isset($logged_in_user) ? $logged_in_user : (isset($_SESSION['user']) ? $_SESSION['user'] : null); ?>
<aside id="appSidebar" class="w-64 bg-white/95 backdrop-blur-sm border-r border-slate-200/50 fixed inset-y-0 -ml-64 lg:ml-0 transition-all z-30 shadow-xl">
    <div class="h-16 flex items-center px-4 border-b border-slate-200/50">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-purple-600 text-white grid place-items-center font-bold text-lg shadow-lg">JB</div>
        <div class="ml-3">
            <div class="text-sm font-bold text-slate-800">Job Portal</div>
        </div>
    </div>
    <nav class="p-4 space-y-2 overflow-y-auto h-[calc(100vh-4rem)]">
        <a href="/admin" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-700 transition-all duration-200 <?php echo ($u && $u['role']==='admin') ? 'text-blue-700 bg-blue-50' : 'hidden'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span class="font-medium">Admin Dashboard</span>
        </a>
        <a href="/users" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-700 transition-all duration-200 <?php echo ($u && $u['role']==='admin') ? 'text-slate-700' : 'hidden'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-4m-5 6h5m-5 0a4 4 0 01-4-4v-1a4 4 0 014-4m0 9H7m6-9a4 4 0 100-8 4 4 0 000 8z"/></svg>
            <span class="font-medium">Users</span>
        </a>
        <a href="/admin/categories" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-700 transition-all duration-200 <?php echo ($u && $u['role']==='admin') ? 'text-slate-700' : 'hidden'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
            <span class="font-medium">Categories</span>
        </a>
        <a href="/admin/approvals" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-700 transition-all duration-200 <?php echo ($u && $u['role']==='admin') ? 'text-slate-700' : 'hidden'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="font-medium">Job Approvals</span>
        </a>
        <a href="/admin/reports" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-700 transition-all duration-200 <?php echo ($u && $u['role']==='admin') ? 'text-slate-700' : 'hidden'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 012-2h8M9 7h.01M9 7a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 01-2 2H11a2 2 0 01-2-2z"/></svg>
            <span class="font-medium">Reports</span>
        </a>

        <a href="/jobs" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-green-50 hover:text-green-700 transition-all duration-200 <?php echo ($u && $u['role']==='employee') ? 'text-green-700 bg-green-50' : 'hidden'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
            <span class="font-medium">My Jobs</span>
        </a>
        <a href="/applications" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-green-50 hover:text-green-700 transition-all duration-200 <?php echo ($u && $u['role']==='employee') ? 'text-slate-700' : 'hidden'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4h4m-6 4h8M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/></svg>
            <span class="font-medium">Applicants</span>
        </a>

        <a href="/jobs/seeker" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-purple-50 hover:text-purple-700 transition-all duration-200 <?php echo ($u && $u['role']==='job_seeker') ? 'text-purple-700 bg-purple-50' : 'hidden'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2v-6H3v6a2 2 0 002 2z"/></svg>
            <span class="font-medium">Job Search</span>
        </a>
        <a href="/applicant/profile" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-purple-50 hover:text-purple-700 transition-all duration-200 <?php echo ($u && $u['role']==='job_seeker') ? 'text-slate-700' : 'hidden'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/></svg>
            <span class="font-medium">My Profile</span>
        </a>
    </nav>
</aside>


