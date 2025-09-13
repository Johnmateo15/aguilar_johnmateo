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
    </style>
</head>
<body>
    <h1>Welcome to View Page</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

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
    </table>
</body>
</html>
