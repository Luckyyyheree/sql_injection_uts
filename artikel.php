<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection: Bahaya di Balik Form Login Sederhana</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #e2e8f0);
            min-height: 100vh;
            padding: 40px 20px;
            color: #1e2937;
        }
        .article {
            max-width: 920px;
            margin: 0 auto;
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }
        .hero {
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            color: white;
            text-align: center;
            padding: 80px 40px 60px;
        }
        .hero h1 {
            font-size: 2.6em;
            margin-bottom: 12px;
            line-height: 1.2;
        }
        .hero p {
            font-size: 1.2em;
            opacity: 0.95;
        }
        .content {
            padding: 60px 70px;
        }
        h2 {
            color: #1e40af;
            font-size: 1.85em;
            margin: 50px 0 18px;
            border-left: 5px solid #3b82f6;
            padding-left: 18px;
        }
        p {
            font-size: 1.08em;
            line-height: 1.75;
            margin-bottom: 20px;
        }
        pre {
            background: #0f172a;
            color: #e2e8f0;
            padding: 22px;
            border-radius: 16px;
            overflow-x: auto;
            font-size: 15.5px;
            margin: 25px 0;
            border: 1px solid #334155;
        }
        .box {
            background: #f0f9ff;
            border-left: 6px solid #3b82f6;
            padding: 28px;
            border-radius: 16px;
            margin: 35px 0;
        }
        .result-box {
            background: #ecfdf5;
            border-left: 6px solid #10b981;
            padding: 28px;
            border-radius: 16px;
            margin: 35px 0;
        }
        .back {
            display: inline-block;
            margin-top: 50px;
            padding: 16px 36px;
            background: #1e40af;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1em;
        }
        .back:hover {
            background: #1e3a8a;
        }
    </style>
</head>
<body>
    <div class="article">
        <div class="hero">
            <h1>SQL Injection</h1>
            <p>Bahaya di Balik Form Login Sederhana</p>
            <p style="margin-top: 15px; opacity: 0.9;">Eksperimen Pribadi • UTS Pemrograman Web</p>
        </div>

        <div class="content">
            <h2>Pendahuluan</h2>
            <p>Banyak dari kita saat membuat aplikasi web hanya fokus agar fitur login berjalan. Padahal, tanpa perlindungan yang tepat, form login sederhana bisa menjadi pintu masuk bagi penyerang untuk mengambil alih akun atau bahkan menghancurkan database.</p>
            <p><strong>SQL Injection</strong> adalah salah satu kerentanan keamanan web yang paling umum dan berbahaya hingga saat ini.</p>

            <h2>Eksperimen yang Saya Lakukan</h2>
            <p>Saya membuat dua versi halaman login menggunakan PHP dan MySQL di XAMPP:</p>
            <ul style="margin: 20px 0 30px 30px; font-size: 1.08em;">
                <li><strong>🔴 Halaman Rentan</strong> — Menggunakan query SQL secara langsung (sengaja dibuat rentan)</li>
                <li><strong>🟢 Halaman Aman</strong> — Menggunakan Prepared Statements</li>
            </ul>

            <div class="result-box">
                <strong>Hasil Eksperimen:</strong><br><br>
                • Pada halaman <strong>Rentan</strong>: Payload <code>admin' OR '1'='1</code> dengan password kosong → <strong>Login BERHASIL</strong><br>
                • Pada halaman <strong>Aman</strong>: Payload yang sama → <strong>Login GAGAL</strong><br><br>
                Ini membuktikan bahwa Prepared Statements sangat efektif mencegah serangan SQL Injection.
            </div>

            <h2>Perbedaan Kode</h2>
            <p><strong>Kode Rentan (Bahaya):</strong></p>
            <pre><code>$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";</code></pre>

            <p><strong>Kode Aman (Direkomendasikan):</strong></p>
            <pre><code>$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ? AND password = ?");
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);</code></pre>

            <h2>Kesimpulan</h2>
            <p>Dari eksperimen ini, saya semakin yakin bahwa SQL Injection sangat mudah dilakukan jika kode tidak aman, tapi juga sangat mudah dicegah dengan menggunakan <strong>Prepared Statements</strong>.</p>
            <p>Keamanan web bukanlah fitur tambahan, melainkan harus menjadi kebiasaan sejak awal kita menulis kode. Mulai sekarang, saya akan selalu menerapkan teknik ini di setiap proyek.</p>

            <center>
                <a href="index.php" class="back">← Kembali ke Halaman Demo</a>
            </center>
        </div>
    </div>
</body>
</html>