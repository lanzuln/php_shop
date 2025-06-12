<?php include_once('header.php'); ?>
<?php
if(isset($_GET['email']) && isset($_GET['token'])) {
    $email = strip_tags($_GET['email']);
    $token = strip_tags($_GET['token']);

    $q = $pdo->prepare("SELECT * FROM admins WHERE email=? AND token=?");
    $q->execute([$email,$token]);
    $total = $q->rowCount();
    if(!$total) {
        header("location: ".ADMIN_URL."login.php");
        exit;
    }
} else {
    header("location: ".ADMIN_URL."login.php");
    exit;
}
?>

<?php
if(isset($_POST['reset_pass_form'])) {
    try {
        $password = strip_tags($_POST['password']);
        $confirm_password = strip_tags($_POST['confirm_password']);

        if($password == '' || $confirm_password == '') {
            throw new Exception("Password can not be empty");
        }

        if($password != $confirm_password) {
            throw new Exception("Passwords not match");
        }
        
        $final_password = password_hash($password, PASSWORD_DEFAULT); // hash password করে ফেললাম।

        $statement = $pdo->prepare("UPDATE admins SET token=?, password=? WHERE email=? AND token=?");
        $statement->execute(['',$final_password,$_REQUEST['email'],$_REQUEST['token']]); //সাথে token তা আবার blank করে দিবো।

        $_SESSION['success_message'] = 'Your password has been reset successfully. You can now login with your new password.';

        header('location: '.ADMIN_URL.'login.php');
        exit;

    } catch(Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>

    <div class="container-login">
        <main class="form-signin w-100 m-auto">
            <form action="" method="post">
                <h1 class="text-center">Reset Password</h1>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                    <label for="">New Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="confirm_password" class="form-control"  placeholder="Retype Password" autocomplete="off">
                    <label for="">Confirm Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="reset_pass_form">Submit</button>
            </form>
        </main>
    </div>
<?php include_once('footer.php'); ?>