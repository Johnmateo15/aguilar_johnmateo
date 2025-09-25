<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            margin: 0;
            padding: 20px;
            color: #fff;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.5);
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.5);
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            color: #333;
        }

        th, td {
            padding: 15px 20px;
            text-align: center;
        }

        th {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 18px;
        }

        tr {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:nth-child(odd) {
            background: #f0f0f0;
        }

        tr:hover {
            transform: scale(1.02);
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
            background: #e0f7fa;
        }

		/* Pagination basic styles (no external CSS required) */
		.pagination {
			list-style: none;
			padding-left: 0;
			display: inline-flex;
			gap: 8px;
		}
		.page-item { list-style: none; }
		.page-link {
			background: #fff;
			color: #333;
			padding: 8px 12px;
			border-radius: 6px;
			border: 1px solid rgba(0,0,0,0.1);
			text-decoration: none;
			box-shadow: 0 2px 4px rgba(0,0,0,0.1);
			transition: 0.2s;
		}
		.page-link:hover {
			background: #f0f0ff;
			transform: translateY(-1px);
		}
		.page-item.active .page-link {
			background: #667eea;
			color: #fff;
			border-color: #667eea;
		}

        a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }

        a[href*="update"] {
            background: #4CAF50;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        a[href*="update"]:hover {
            background: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }

        a[href*="delete"] {
            background: #e53935;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        a[href*="delete"]:hover {
            background: #d32f2f;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }

        /* Search bar styles */
        .search-container {
            width: 80%;
            margin: 0 auto 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            padding: 8px 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin: 0;
        }

        .search-box:focus-within {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }

        .search-box input {
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            font-size: 16px;
            padding: 8px 12px;
            width: 300px;
        }

        .search-box input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-box button {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.3s ease;
            margin-left: 10px;
        }

        .search-box button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }

        @media (max-width: 768px) {
            .search-container {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-box input {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h1>Welcome to View Page</h1>
    
    <!-- Search Bar Container -->
    <div class="search-container">
        <form method="GET" action="<?= site_url('user'); ?>" class="search-box">
            <input type="text" name="search" id="searchInput" placeholder="Search users by username or email..." 
                   value="<?= htmlspecialchars($search_term ?? ''); ?>" 
                   onkeyup="handleSearch(event)">
            <button type="submit">Search</button>
            <?php if (!empty($search_term)): ?>
                <a href="<?= site_url('user'); ?>" style="
                    background: #e53935;
                    color: white;
                    padding: 8px 15px;
                    border-radius: 20px;
                    text-decoration: none;
                    font-size: 14px;
                    font-weight: bold;
                    margin-left: 10px;
                    transition: all 0.3s ease;
                ">Clear</a>
            <?php endif; ?>
        </form>
        <div style="text-align: right;">
            <a href="<?= site_url('user/create'); ?>" style="
                background: linear-gradient(135deg, #667eea, #764ba2);
                color: white;
                padding: 12px 24px;
                text-decoration: none;
                border-radius: 8px;
                font-weight: bold;
                font-size: 16px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.2);
                transition: all 0.3s ease;
                display: inline-block;
            " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 12px rgba(0,0,0,0.3)'" 
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.2)'">
                + Create New User
            </a>
        </div>
    </div>
    
    <div style="width: 80%; margin: 0 auto 30px auto; text-align: right; display: none;">
        <a href="<?= site_url('user/create'); ?>" style="
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            display: inline-block;
        " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 12px rgba(0,0,0,0.3)'" 
           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.2)'">
            + Create New User
        </a>
    </div>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php if (empty($users)): ?>
            <tr>
                <td colspan="4" style="background:#fff; color:#666; padding: 30px; text-align: center;">
                    <?php if (!empty($search_term)): ?>
                        No users found matching "<?= htmlspecialchars($search_term); ?>". 
                        <a href="<?= site_url('user'); ?>" style="color: #667eea; text-decoration: underline;">View all users</a>
                    <?php else: ?>
                        No users found.
                    <?php endif; ?>
                </td>
            </tr>
        <?php else: ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="<?= site_url('user/update/'.$user['id']); ?>">Edit</a> |
                    <a href="<?= site_url('user/delete/'.$user['id']); ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <?php if (!empty($pagination)): ?>
    <div style="width: 80%; margin: 20px auto 0 auto; text-align: center;">
        <?= $pagination; ?>
    </div>
    <?php endif; ?>

    <script>
        // Auto-submit form when user stops typing (with delay)
        let searchTimeout;
        
        function handleSearch(event) {
            clearTimeout(searchTimeout);
            
            // If Enter key is pressed, submit immediately
            if (event.key === 'Enter') {
                event.target.form.submit();
                return;
            }
            
            // Auto-submit after 1 second of no typing
            searchTimeout = setTimeout(() => {
                event.target.form.submit();
            }, 1000);
        }
        
        // Show search results info
        function showSearchInfo() {
            const searchTerm = '<?= htmlspecialchars($search_term ?? ''); ?>';
            if (searchTerm) {
                const totalResults = <?= $total ?? 0; ?>;
                const currentPage = <?= $page ?? 1; ?>;
                const perPage = 10;
                const startResult = ((currentPage - 1) * perPage) + 1;
                const endResult = Math.min(currentPage * perPage, totalResults);
                
                let infoDiv = document.getElementById('search-info');
                if (!infoDiv) {
                    infoDiv = document.createElement('div');
                    infoDiv.id = 'search-info';
                    infoDiv.style.cssText = `
                        width: 80%;
                        margin: 10px auto;
                        padding: 10px;
                        background: rgba(255, 255, 255, 0.1);
                        border-radius: 8px;
                        text-align: center;
                        color: #fff;
                        font-size: 14px;
                    `;
                    document.querySelector('.search-container').parentNode.insertBefore(infoDiv, document.querySelector('.search-container').nextSibling);
                }
                
                if (totalResults > 0) {
                    infoDiv.innerHTML = `
                        <strong>Search Results:</strong> Found ${totalResults} result(s) for "${searchTerm}" 
                        (Showing ${startResult}-${endResult} of ${totalResults})
                    `;
                } else {
                    infoDiv.innerHTML = `
                        <strong>No results found</strong> for "${searchTerm}". 
                        <a href="<?= site_url('user'); ?>" style="color: #fff; text-decoration: underline;">View all users</a>
                    `;
                }
            }
        }
        
        // Show search info when page loads
        document.addEventListener('DOMContentLoaded', showSearchInfo);
    </script>
</body>
</html>