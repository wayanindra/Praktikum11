<?php

session_start();

$title = 'Data Barang';
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
$user = $_POST['user'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '{$user}'
AND password = md5('{$password}') ";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_affected_rows($conn) != 0)
{
    $_SESSION['isLogin'] = true;
    $_SESSION['user'] = mysqli_fetch_array($result);

    header('location: header.php');
} else
$errorMsg = "<p style=\"color:red;\">Gagal Login,
silakan ulangi lagi.</p>";
}

include_once "header.php";

if (isset($errorMsg)) echo $errorMsg;
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<h2>Login</h2>
<form method="post">
    <div class="mb-3">
        <label  for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1"/>
    </div>
    <div class="submit">
        <button type="submit" name="submit" value="Login" class="btn btn-primary">LOGIN<button>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</form>
<?php
include_once 'footer.php';
?>