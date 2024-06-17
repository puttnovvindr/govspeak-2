<?php
session_start();

// Koneksi ke database (ganti dengan informasi koneksi database kamu)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Proses form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data user berdasarkan email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Login berhasil, set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            // Redirect ke halaman homepage setelah login
            header("Location: ../Homepage/homepage.php");
            exit();
        } else {
            $login_error = "Invalid email or password";
        }
    } else {
        $login_error = "Invalid email or password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="bag-kiri">
        <h1 id="h1-1">Welcome to</h1>
        <h1 id="h1-2">Govspeak Portal</h1>
        <p>Login to access your account</p>
    </div>

    <div class="bag-kanan">
        <div class="login-form">
            <div class="text">
                <h1>Log In and Submit a Complaint</h1>
                <p>Share Your Feedback with the Government</p><br>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div><br>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <?php if(isset($login_error)) { ?>
                    <div class="alert alert-danger"><?php echo $login_error; ?></div>
                <?php } ?>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div><br>
                <p>Don't have an account? <a href="signup.php">Sign up now</a></p>
            </form>
        </div>
    </div>
</body>
</html>
