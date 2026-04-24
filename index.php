<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo SQL Injection - UTS Pemrograman Web</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            color: white;
            text-align: center;
            padding: 60px 20px;
        }
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        .content {
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 25px;
        }
        .card {
            width: 100%;
            max-width: 420px;
            padding: 30px;
            border-radius: 16px;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .card:hover {
            transform: translateY(-8px);
        }
        .card-rentan {
            background: #ffebee;
            border: 3px solid #d32f2f;
        }
        .card-aman {
            background: #e8f5e9;
            border: 3px solid #2e7d32;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 16px 40px;
            font-size: 1.1em;
            font-weight: 600;
            border-radius: 12px;
            text-decoration: none;
            color: white;
        }
        .btn-rentan { background: #d32f2f; }
        .btn-aman { background: #2e7d32; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Demo SQL Injection</h1>
            <p>UTS Pemrograman Web</p>
        </div>
        
        <div class="content">
            <div class="card card-rentan">
                <h2 style="color:#d32f2f;">🔴 MODE RENTAN</h2>
                <p style="margin:15px 0;">Demonstrasi serangan SQL Injection</p>
                <a href="login_vuln.php" class="btn btn-rentan">Coba Login Rentan</a>
            </div>

            <div class="card card-aman">
                <h2 style="color:#2e7d32;">🟢 MODE AMAN</h2>
                <p style="margin:15px 0;">Menggunakan Prepared Statements (Secure)</p>
                <a href="login_secure.php" class="btn btn-aman">Coba Login Aman</a>
            </div>
        </div>
    </div>
</body>
</html>