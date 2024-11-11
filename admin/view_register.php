<?php
include('authentication.php');
include ('includes/header.php');
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Register User</h4>
                    <a href="accounts_add.php" class="btn btn-primary float-end">Add User</a>
                </div>
                <div class="card-body">
                    <form method="GET" class="mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <select name="role" class="form-select">
                                    <option value="">All Roles</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Parish</option>
                                    <option value="3">Oeconomous</option>
                                    <option value="4">Chancery</option>
                                    <option value="5">VGM</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Suffix</th>
                                <th>Sex</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Parish</th>
                                <th>Region</th>
                                <th>Province</th>
                                <th>City</th>
                                <th>Barangay</th>
                                <th>Street</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users WHERE 1 = 1";
                            if(isset($_GET['role']) && $_GET['role'] !== '') {
                                $role = mysqli_real_escape_string($con, $_GET['role']);
                                $query .= " AND role = '$role'";
                            }

                            if(isset($_GET['search']) && $_GET['search'] !== '') {
                                $search = mysqli_real_escape_string($con, $_GET['search']);
                                $query .= " AND (first_name LIKE '%$search%' OR middle_name LIKE '%$search%' OR surname LIKE '%$search%' OR suffix LIKE '%$search%' OR sex LIKE '%$search%' OR username LIKE '%$search%' OR email LIKE '%$search%' OR mobile_no LIKE '%$search%' OR parish LIKE '%$search%' OR address LIKE '%$search%' OR password LIKE '%$search%' OR role LIKE '%$search%' OR created_at LIKE '%$search%' OR updated_at LIKE '%$search%')";
                            }

                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0) {
                                foreach($query_run as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['surname'], ", ", $row['first_name'], " ", $row['middle_name'] ?></td>
                                        <td><?= $row['suffix'] ?></td>
                                        <td>
                                            <?= $row['sex'] == '0' ? 'Male' : 'Female'; ?>
                                        </td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['mobile_no'] ?></td>
                                        <td>
                                            <?= $row['parish'] == '0' ? 'Parish 1' : ($row['parish'] == '1' ? 'Parish 2' : 'Other'); ?>
                                        </td>
                                        <!-- Address -->
                                        <td><?= $row['region_text'] ?></td>
                                        <td><?= $row['province_text'] ?></td>
                                        <td><?= $row['city_text'] ?></td>
                                        <td><?= $row['barangay_text'] ?></td>
                                        <td><?= $row['street_text'] ?></td>
                                        <td><?= $row['zip'] ?></td>

                                        <td><?= $row['password'] ?></td>
                                        <td>
                                            <?php
                                            if($row['role'] == '0'){
                                                echo 'User';
                                            }
                                            elseif($row['role'] == '1'){
                                                echo 'Admin';
                                            }
                                            elseif($row['role'] == '2'){
                                                echo 'Parish';
                                            }
                                            elseif($row['role'] == '3'){
                                                echo 'Oeconomous';
                                            }
                                            elseif($row['role'] == '4'){
                                                echo 'Chancery';
                                            }
                                            elseif($row['role'] == '5'){
                                                echo 'VGM';
                                            }
                                            ?>
                                        </td>
                                        <td><?= $row['created_at'] ?></td>
                                        <td><?= $row['updated_at'] ?></td>
                                        <td><a href="accounts_edit.php?id=<?=$row['id'];?>" class="btn btn-success">Edit</a></td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <button type="submit" name="user_delete" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="15">No Record Found</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include ('includes/footer.php');
include ('includes/scripts.php');
?>