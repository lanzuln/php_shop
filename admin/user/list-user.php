<?php
include_once('../header.php');
include_once('../nav-menu.php');

// If moderator,then exit
// if($_SESSION['admin']['role'] == 'Moderator') {
//     header("location: ".ADMIN_URL."index.php");
//     exit;
// }

?>

<div class="right-part container-fluid">
    <div class="row">
        <?php include_once('../sidebar.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">

            <h1 class="page-heading">
                Datatable
                <a href="<?php echo ADMIN_URL; ?>user/create-user.php" class="btn btn-primary btn-sm right"><i
                        class="fas fa-plus"></i> Add New User</a>
            </h1>

            <div class="table-responsive">
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                      
                        $statement = $pdo->prepare("SELECT * FROM admins ORDER BY id ASC");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $key => $row):
                            
                            ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>
                                    <?php if ($row['role'] == 'Super Admin'): ?>
                                        <span class="badge bg-primary">Super Admin</span>
                                    <?php elseif ($row['role'] == 'Admin'): ?>
                                        <span class="badge bg-info">Admin</span>
                                    <?php elseif ($row['role'] == 'Moderator'): ?>
                                        <span class="badge bg-warning">Moderator</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($row['status'] == 'Active'): ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($row['role'] != 'Super Admin'): ?>
                                        <a href="<?php echo ADMIN_URL; ?>user/edit-user.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo ADMIN_URL; ?>user/admin-user-delete.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?')">Delete</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>

        </main>
    </div>
</div>

<?php
include_once('../footer.php');
?>