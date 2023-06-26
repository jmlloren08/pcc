<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: ./dashboard.php');
    exit;
}
include_once('./db_connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM tbl_admin WHERE user = '$user' AND pass = '$pass'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->rowCount();
    $fetch = $stmt->fetch();
    if ($row > 0) {
        $_SESSION['user'] = $fetch['user'];
        header('Location: ./dashboard.php');
    } else {
        $error = "<script>alert('Invalid Username or Password')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Login Page</h1>
    <p>
        <?php echo isset($error) ? $error : ""; ?>
    </p>


    <form method="POST" action="">
        <label for="user">username: </label>
        <input type="text" name="user" id="user" required><br>
        <label for="pass">Password: </label>
        <input type="password" name="pass" id="pass" required><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>