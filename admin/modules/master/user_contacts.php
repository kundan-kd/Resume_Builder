<?php require_once '../../includes/header.php';
      require_once '../../includes/connection.php';
      $id = 1;
?>
<!-- body start -->

<body data-menu-color="light" data-sidebar="default">
    <!-- Begin page -->
    <div id="app-layout">

        <!-- Topbar Start -->
        <?php include '../../includes/topbar.php'; ?>
        <!-- end Topbar -->
        <!-- Left Sidebar Start -->
        <?php include '../../includes/left_sidebar.php'; ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">Contacts</h4>
                        </div>
                    </div>

                    <div class="card mt-3 skill-card">
                        <!-- <div class="card-header">
                            <h5 class="card-title mb-0">Contacts</h5>
                        </div> -->
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered nowrap" id="datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone No</th>
                                            <th scope="col">Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>john@example.com</td>
                                            <td>9876543210</td>
                                            <td>Hello, I want to know more.</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>john@example.com</td>
                                            <td>9876543210</td>
                                            <td>Hello, I want to know more.</td> -->
                                        </tr> <?php
                                       $select = "SELECT * FROM `user_contacts` WHERE `user_id` = '{$_SESSION['user_id']}'";     // WHERE `id` = '{$user_id}'
                                        $result = mysqli_query($conn, $select);
                                        if ($result && $result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?= $id ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['email'] ?></td>
                                                    <td><?= $row['phone_no'] ?></td>
                                                    <td><?= $row['message'] ?></td>
                                            </tr> <?php
                                            $id++;
                                            }
                                        }
                                        ?> </tbody>
                                </table>
                            </div>

                            <div class="alert-container mt-3"></div>

                        </div>
                    </div>

                </div>
            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col fs-13 text-muted text-center">
                            &copy;
                            <script>document.write(new Date().getFullYear())</script> - Made with <span
                                class="mdi mdi-heart text-danger"></span> by <a href="#!"
                                class="text-reset fw-semibold">Zoyothemes</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <?php require_once '../../includes/footer.php'; ?>
</body>

</html>