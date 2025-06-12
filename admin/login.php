<?php include_once('header.php'); ?>
<?php
if (isset($_POST['login_form'])) {
    try {

        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);

        if ($email == '') {
            throw new Exception('Please enter your email');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Please enter a valid email');
        }

        if ($password == '') {
            throw new Exception('Please enter your password');
        }

        $q = $pdo->prepare("SELECT * FROM admins WHERE email=? AND status=?");
        $q->execute([$email, 'Active']);
        $total = $q->rowCount();
        if (!$total) {
            throw new Exception("Email is not found");
        }

        $result = $q->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($password, trim($result['password']))) {
            throw new Exception("Password does not match");
        }


        $_SESSION['admin'] = $result;

        $_SESSION['success_message'] = 'You have successfully logged in';
        header("location: " . ADMIN_URL . "index.php");
        exit;

    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>


<div class="container-login">
    <main class="form-signin w-100 m-auto">
        <h1 class="text-center">Admin Login</h1>
        <form action="" method="post">
            <div class="form-floating">
                <input type="text" name="email" class="form-control" placeholder="name@example.com" autocomplete="off">
                <label for="">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                <label for="">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login_form">Login</button>
        </form>
        <div class="login-forget-password">
            <a href="<?php echo ADMIN_URL; ?>forget-password.php">Forget Password</a>
        </div>
    </main>
</div>


<?php
include_once('footer.php');
?>