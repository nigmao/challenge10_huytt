<?php
include_once(__DIR__ . '/database/sqlFunction.php');

session_start();
if (isset($_SESSION['user'])) {
    header('Location: admin.php');
}

$password = $username = '';
if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username != '' && $password != '') {
        $pwd = $password;
        $sql  = "select * from users where username = '$username' and password = '$pwd'";
        $data = select($sql);
        if ($data != null) {
            $_SESSION['username'] = $username;
            header('Location: admin.php');
        } else {
?>
            <script>
                alert("Wrong username or password")
            </script>
<?php
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Classroom</title>

</head>

<body>
    <div>
        <div>
            <div>
                </br>
                <h1>Login Page</h1>
                </br>
            </div>
            <div class="panel-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="usr" class="form-label">User name: </label>
                        <input type="text" class="form-control" id="urs" required name="username" placeholder="Enter your username">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password: </label>
                        <input type="password" class="form-control" id="pwd" required name="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-success" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>