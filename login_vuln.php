<?php
$conn = mysqli_connect("localhost", "root", "", "db_keamanan");
if (!$conn) die("Koneksi database gagal!");

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: artikel.php");
        exit();
    } else {
        $message = "<div class='failed'>❌ Login GAGAL</div>";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Rentan</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #4a0000, #8b0000);
            min-height: 100vh;
            padding: 40px 20px;
            color: #fff;
        }
        .container {
            max-width: 480px;
            margin: 0 auto;
            background: #fff;
            color: #333;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.4);
            padding: 40px 30px;
        }
        h1 { 
            color: #d32f2f; 
            text-align: center; 
            margin-bottom: 30px;
            font-size: 2em;
        }
        .failed { 
            background:#ffebee; 
            color:#c62828; 
            padding:15px; 
            border-radius:10px; 
            margin:20px 0; 
        }
        label { 
            display:block; 
            text-align:left; 
            margin:15px 0 8px; 
            font-weight:600; 
        }
        input {
            width: 100%;
            padding: 15px;
            border: 2px solid #ff8a80;
            border-radius: 10px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #d32f2f, #f44336);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            margin-top: 25px;
            cursor: pointer;
        }
        button:hover { background: #b71c1c; }
        .note { 
            margin-top: 30px; 
            padding: 20px; 
            background: #fff3cd; 
            border-radius: 12px; 
            text-align: left; 
            border-left: 5px solid #ff9800;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔴 LOGIN RENTAN (BAHAYA)</h1>
        <?php if($message) echo $message; ?>

        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" value="admin' OR '1'='1" required>
            <label>Password</label>
            <input type="password" name="password">
            <button type="submit">Login Rentan</button>
        </form>

        <div class="note">
            <strong>⚠️ Mode Serangan Aktif</strong><br>
            Username sudah diisi payload SQL Injection.<br>
            Password boleh kosong. Login seharusnya berhasil.
        </div>
    </div>
</body>
</html>