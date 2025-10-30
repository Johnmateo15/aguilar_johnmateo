<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($page_title) ? $page_title . ' • ' : ''; ?>Job Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style> 
        *{font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif}
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
    <div class="min-h-screen flex">
        <?php include __DIR__ . '/sidebar.php'; ?>

        <div class="flex-1 min-w-0 lg:ml-64">
            <?php include __DIR__ . '/navbar.php'; ?>

            <main class="p-6 lg:p-8">
                <div class="max-w-7xl mx-auto">
                    <?php echo isset($content) ? $content : ''; ?>
                </div>
            </main>
        </div>
    </div>

    <script>
        const sidebarToggles = document.querySelectorAll('[data-toggle-sidebar]');
        sidebarToggles.forEach(btn => btn.addEventListener('click', () => {
            document.getElementById('appSidebar').classList.toggle('-ml-64');
        }));
    </script>
</body>
</html>


