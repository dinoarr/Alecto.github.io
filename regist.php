<?php
include 'config.php';
session_start();

$username = $email = $password = $cpassword = '';
if (isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $hashed_password = hash('sha256', $password);
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);
            if ($stmt->execute()) {
                echo "<script>alert('Congratulations, registration successful!')</script>";
                $username = "";
                $email = "";
            } else {
                echo "<script>alert('Woops! Something went wrong.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email is already registered.')</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match')</script>";
    }
}
?>

 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Style/login.css">
    <title>Register Pages</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 600;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Password" name="username" value="<?php echo isset($username) ? $username : ''; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Do you already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>