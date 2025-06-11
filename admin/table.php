<?php include_once('header.php'); ?>
<?php include_once('nav-menu.php'); ?>

    <div class="right-part container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo ADMIN_URL;?>index.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item dd-item">
                            <a class="nav-link dd-link collapsed" data-bs-toggle="collapse" data-delay="0"
                                href="<?php echo ADMIN_URL;?>#collapseSetting" role="button" aria-expanded="false"
                                aria-controls="collapseSetting">
                                <span data-feather="folder" class="align-text-bottom"></span>
                                Settings
                            </a>
                            <div class="collapse" id="collapseSetting">
                                <a class="nav-link inner-item" href="<?php echo ADMIN_URL;?>#">
                                    General Settings
                                </a>
                                <a class="nav-link inner-item" href="<?php echo ADMIN_URL;?>#">
                                    Payment Settings
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMIN_URL;?>form.php">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Form
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMIN_URL;?>form-tab.php">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Form Tab
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMIN_URL;?>table.php">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Table
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMIN_URL;?>datatable.php">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Data Table
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">

                <h1 class="page-heading">
                    Table
                    <a href="<?php echo ADMIN_URL;?>form.php" class="btn btn-primary btn-sm right"><i class="fas fa-plus"></i> Add New</a>
                </h1>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Property Name</th>
                                <th scope="col">Property Price</th>
                                <th scope="col">Location</th>
                                <th scope="col">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>207 AB Villa</td>
                                <td>$10,000</td>
                                <td>NewYork</td>
                                <td>Villa</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>207 AB Villa</td>
                                <td>$10,000</td>
                                <td>NewYork</td>
                                <td>Villa</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>207 AB Villa</td>
                                <td>$10,000</td>
                                <td>NewYork</td>
                                <td>Villa</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>207 AB Villa</td>
                                <td>$10,000</td>
                                <td>NewYork</td>
                                <td>Villa</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>
<?php include_once('footer.php'); ?>