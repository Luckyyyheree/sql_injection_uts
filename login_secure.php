<?php
$conn = mysqli_connect("localhost", "root", "", "db_keamanan");
if (!$conn) die("Koneksi database gagal!");

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        header("Location: artikel.php");
        exit();
    } else {
        $message = "<div class='failed'>❌ Login GAGAL</div>";
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aman</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0a4d0a, #1b5e20);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.35);
            padding: 45px 35px;
            text-align: center;
        }
        h1 { 
            color: #2e7d32; 
            margin-bottom: 35px;
            font-size: 2.2em;
        }
        .success { background:#e8f5e9; color:#2e7d32; padding:18px; border-radius:12px; margin:20px 0; font-size: 1.1em; }
        .failed { background:#ffebee; color:#c62828; padding:18px; border-radius:12px; margin:20px 0; font-size: 1.1em; }
        label { 
            display:block; 
            text-align:left; 
            margin:18px 0 8px; 
            font-weight:600; 
            color: #333;
        }
        input {
            width: 100%;
            padding: 16px;
            border: 3px solid #66bb6a;
            border-radius: 12px;
            font-size: 17px;
        }
        input:focus {
            border-color: #2e7d32;
            outline: none;
        }
        button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #2e7d32, #43a047);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            margin-top: 30px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #1b5e20;
            transform: scale(1.03);
        }
        .note {
            margin-top: 35px;
            padding: 22px;
            background: #f1f8e9;
            border-radius: 12px;
            text-align: left;
            border-left: 6px solid #4caf50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🟢 LOGIN AMAN (SECURE)</h1>
        
        <?php if(isset($message)) echo $message; ?>

        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login Aman</button>
        </form>

        <div class="note">
            <strong>✅ Keamanan Aktif</strong><br><br>
            Coba masukkan payload serangan:<br>
            <code>admin' OR '1'='1</code><br>
            Password kosong<br><br>
            <strong>Hasil yang diharapkan: Login GAGAL</strong>
        </div>
    </div>
</body>
</html>