<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Style/login.css">
</head>
<body>
    <div class="container-logout">
        <form action="logout.php" method="POST" class="login-email">
            <h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
            <div class="input-group">
                <button type="submit" class="btn">Logout</button>
            </div>
        </form>
    </div>
</body>
</html>