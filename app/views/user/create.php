<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User/create</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .form-container {
            background: #fff;
            color: #333;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.4);
            width: 350px;
            animation: fadeIn 0.6s ease-in-out;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
            color: #2a5298;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            outline: none;
            box-shadow: inset 2px 2px 5px rgba(0,0,0,0.2), inset -2px -2px 5px rgba(255,255,255,0.5);
            transition: 0.3s;
            font-size: 15px;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            box-shadow: 0px 0px 8px #667eea;
        }

        input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.4);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Create New User</h1>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <input type="submit" value="Create User">
        </form>
    </div>
</body>
</html>
