<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='85'>🕒</text></svg>">
    <title>Time</title>
    <style>
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: whitesmoke;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: black;
        }
        .container {
            background: white;
            padding: 2rem;
            border-radius: 40px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
            width: 400px;
        }
        h2 { color: #4a5568; margin-bottom: 1.5rem; }
        .time-box {
            font-size: 2.5rem;
            font-weight: bold;
            color: black;
            margin: 1rem 0;
            font-family: 'Courier New', Courier, monospace;
        }
        input[type="text"] {
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            width: 70%;
            outline: none;
        }
        button {
            padding: 10px 20px;
            background: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover { background: lightblue; }
        .greeting { font-size: 1.1rem; color: #666; }
    </style>
</head>
<body>

    <div class="container">
        <?php
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $name = "Visitor"; 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['user_name'])) {
            $name = htmlspecialchars($_POST['user_name']);
        }
        ?>

        <h2>Welcome</h2>
        
        <p class="greeting">Hi! <strong><?php echo $name; ?></strong>！</p>
        
        <div class="time-box" id="clock">
            <?php echo date("H:i:s"); ?>
        </div>

        <form method="post">
            <input type="text" name="user_name" placeholder="Insert your name">
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        
        function updateClock() {
            const now = new Date();
            
            const h = String(now.getHours()).padStart(2, '0');
            const m = String(now.getMinutes()).padStart(2, '0');
            const s = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('clock').textContent = h + ":" + m + ":" + s;
        }
        
        setInterval(updateClock, 1000);
    </script>
</body>
</html>