<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>hash test</title>
</head>
<body>
<?php
session_start();
$password = $_GET["password"];
$email = $_GET["email"];
$origin_txt = "admin";
$hashed_txt = $password;
$origin_txt = password_hash($origin_txt, PASSWORD_DEFAULT);
var_dump(password_verify($password, $origin_txt));
echo "$password (origin) = (password_hash) $origin_txt";

if(isset($_POST["login"])) {
  if($_POST["email"] == "admin@admin.com" && $_POST["password"] == "admin") {  
      $_SESSION["email"] = $_POST["email"];
      $login_link = "login_success.php";
      header("Location: {$login_link}");
      exit;
    }
  }
  if($_GET["email"] != "admin@admin.com" || $_GET["password"] != "admin") {
     $logout = "hash-pass-test-test.html";
     header("Location: {$logout}");
     exit;  
  }
?>

<form action="index.php" method="POST">
    <p>Email：<input type="email" name="email" value="<?php echo $_GET["email"]; ?>"></p>
    <p>password：<input type="password" name="password" value="<?php echo $_GET["password"]; ?>"></p>
    <input type="submit" name="login" value="login"><br>
</form>

</body>
</html>






