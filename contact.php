<?php include 'header.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



if (isset($_POST['send_email'])) {
    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $phone = strip_tags($_POST['phone']);
    $message = trim(strip_tags($_POST['message'], '<br>'));
    try {
        if ($name == "") {
            throw new Exception("Name is required");
        }
        if ($email == "") {
            throw new Exception("Email is required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Please enter a valid email');
        }
        if ($phone == "") {
            throw new Exception("Phone is required");
        }
        if ($message == "") {
            throw new Exception("Message is required");
        }


        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = 'adec5c968238ad';
        $mail->Password = '3fba3d9a65e926';
        $mail->SMTPSecure = 'tls';
    
        $mail->setFrom('lanzu@gmail.com');
        $mail->addAddress('user@gmail.com');
        $mail->addReplyTo('lanzu_from@gmail.com');

        $mail_message = '<h2>Visitor Information</h2>';
        $mail_message .= '<strong>Name: </strong><br>' . $name . '<br><br>';
        $mail_message .= '<strong>Email: </strong><br>' . $email . '<br><br>';
        $mail_message .= '<strong>Phone: </strong><br>' . $phone . '<br><br>';
        $mail_message .= '<strong>Message: </strong><br>' . nl2br($message) . '<br><br>';

        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Message';
        $mail->Body = $mail_message;


        $mail->send();
        
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>

<!-- breadcrumb start -->
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled d-flex align-items-center m-0">
            <li><a href="index.php">Home</a></li>
            <li class="ml_10 mr_10">
                <i class="fas fa-chevron-right"></i>
            </li>
            <li>Contact US</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->

<main id="MainContent" class="content-for-layout">
    <div class="contact-page">

        <!-- contact box start -->
        <div class="contact-box mt-100">
            <div class="contact-box-wrapper">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope" style="font-size: 40px;"></i>
                                </div>
                                <div class="contact-details">
                                    <h2 class="contact-title">Mail Address</h2>
                                    <a class="contact-info" href="mailto:info@example.com">info@example.com</a>
                                    <a class="contact-info" href="mailto:info2@example.com">info2@example.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-location-arrow" style="font-size: 40px;"></i>
                                </div>
                                <div class="contact-details">
                                    <h2 class="contact-title">Office Location</h2>
                                    <p class="contact-info">2715 Ash Dr. San Jose, South Dakota 83475</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone" style="font-size: 40px;"></i>
                                </div>
                                <div class="contact-details">
                                    <h2 class="contact-title">Phone Number</h2>
                                    <a class="contact-info" href="tel:(201) 555-0124">(201) 555-0124</a>
                                    <a class="contact-info" href="tel:(307) 555-0133">(307) 555-0133</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- contact box end -->

        <!-- about banner start -->
        <div class="contact-form-section mt-100">
            <div class="container">
                <div class="contact-form-area">
                    <div class="section-header mb-4">
                        <h2 class="section-heading">Drop us a line</h2>
                        <p class="section-subheading">We would like to hear from you.</p>
                    </div>
                    <div class="contact-form--wrapper">
                        <?php if (isset($error_message) && $error_message != ''): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        <form action="" class="contact-form" method="post">
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <fieldset>
                                        <input type="text" placeholder="Full Name *" name="name"
                                            value="<?php echo isset($name) ? $name : ''; ?>">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <fieldset>
                                        <input type="email" placeholder="Email Address *" name="email"
                                            value="<?php echo isset($email) ? $email : ''; ?>">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <fieldset>
                                        <input type="text" placeholder="Phone Number *" name="phone"
                                            value="<?php echo isset($phone) ? $phone : ''; ?>">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <fieldset>
                                        <textarea cols="20" rows="6" placeholder="Message *" name="message">
                                            <?php echo isset($message) ? $message : ''; ?>
                                        </textarea>
                                    </fieldset>
                                    <button type="submit" name="send_email"
                                        class="position-relative review-submit-btn contact-submit-btn">SEND
                                        MESSAGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- about banner end -->
    </div>
</main>
<?php include 'footer.php'; ?>