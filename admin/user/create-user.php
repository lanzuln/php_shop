<?php include_once('../header.php'); ?>
<?php include_once('../nav-menu.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['create_user'])) {
    try {
        
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $role = strip_tags($_POST['role']);
        $status = strip_tags($_POST['status']);

        if($name == '') {
            throw new Exception('Please enter your name');
        }
        if($email == '') {
            throw new Exception('Please enter your email');
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Please enter a valid email');
        }
        if($password == '') {
            throw new Exception('Please enter your password');
        }

        $final_password = password_hash($password, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO admins (name,email,password,token,role,status) VALUES (?,?,?,?,?,?)");
        $statement->execute([$name,$email,$final_password,'',$role,$status]);


        // Send email to the new admin user
        $link = ADMIN_URL;
        $email_message = 'Welcome to our admin panel. Your account has been created successfully. Your login information is given below:<br>';
        $email_message .= 'You can login using the link below:<br>';
        $email_message .= '<a href="'.$link.'">';
        $email_message .= $link;
        $email_message .= '</a>';
        $email_message .= '<br>Email: '.$email.'<br>';
        $email_message .= 'Password: '.$password.'<br>';

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_ENCRYPTION;
        $mail->Port = SMTP_PORT;
    
        $mail->setFrom(SMTP_FROM);
        $mail->addAddress($email);
        $mail->addReplyTo(SMTP_FROM);
        $mail->isHTML(true);
        $mail->Subject = 'Account Created';
        $mail->Body = $email_message;
        $mail->send();

        
        $_SESSION['success_message'] = 'Admin user has been created successfully';
        header("location: ".ADMIN_URL."user/list-user.php");
        exit;

    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}

?>

<div class="right-part container-fluid">
    <div class="row">
        <?php include_once('../sidebar.php'); ?>
        <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">

            <h1 class="page-heading">
                Form
                <a href="<?php echo ADMIN_URL; ?>user/list-user.php" class="btn btn-primary btn-sm right"><i
                        class="fas fa-eye"></i> Show All</a>
            </h1>

         <div class="row">
            <div class="col-md-6">
                   <form action="" method="post">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Role</label>
                        <select name="role" class="form-select">
                            <option value="Admin">Admin</option>
                            <option value="Moderator">Moderator</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary" name="create_user">Submit</button>
                    </div>
                </div>
            </form>
            </div>
         </div>
        </main>
    </div>
</div>

<?php include_once('../footer.php'); ?>