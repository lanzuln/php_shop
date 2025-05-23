<?php include 'header.php';?>

<!-- breadcrumb start -->
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled d-flex align-items-center m-0">
            <li><a href="<?php echo BASE_URL;?>index.php">Home</a></li>
            <li class="ml_10 mr_10">
                <i class="fas fa-chevron-right"></i>
            </li>
            <li>Forget Password</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->

<main id="MainContent" class="content-for-layout">
    <div class="login-page mt-100">
        <div class="container">
            <form action="" class="login-form common-form mx-auto" method="post">
                <div class="section-header mb-3">
                    <h2 class="section-heading text-center">Forget Password</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Email address</label>
                            <input type="email">
                        </fieldset>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-primary d-block btn-signin">SUBMIT</button>
                        <a href="<?php echo BASE_URL;?>login.php" class="text_14 d-block mt-4">Back to Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>            
</main>

<?php include 'footer.php';?>