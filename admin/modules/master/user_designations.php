<?php require_once '../../includes/header.php';
      require_once '../../includes/connection.php';
      $id = 1;
?>

<body data-menu-color="light" data-sidebar="default">
    <div id="app-layout">
         <!-- Topbar Start -->
        <?php include '../../includes/topbar.php'; ?>
        <!-- end Topbar -->
        <!-- Left Sidebar Start -->
        <?php include '../../includes/left_sidebar.php'; ?>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">Designation Types</h4>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryForm">
                                <i class="ri-add-line"></i> Add
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-12">
                                            <table id="datatable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- <tr>
                                                        <th scope="row">1</th>
                                                        <td>Author</td>
                                                        <td>
                                                            <button class="btn btn-outline-primary btn-sm me-2"
                                                                data-bs-toggle="modal" data-bs-target="#editButton"><i
                                                                    class="ri-pencil-line"></i></button>
                                                            <button class="btn  btn-outline-danger btn-sm"
                                                                onclick="deleteButton()"><i
                                                                    class="ri-delete-bin-6-line"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Doctor</td>
                                                        <td>
                                                            <button class="btn btn-outline-primary btn-sm me-2"
                                                                data-bs-toggle="modal" data-bs-target="#editButton"><i
                                                                    class="ri-pencil-line"></i></button>
                                                            <button class="btn  btn-outline-danger btn-sm"
                                                                onclick="deleteButton()"><i
                                                                    class="ri-delete-bin-6-line"></i></button>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Engineer</td>
                                                        <td>
                                                            <button class="btn btn-outline-primary btn-sm me-2"
                                                                data-bs-toggle="modal" data-bs-target="#editButton"><i
                                                                    class="ri-pencil-line"></i></button>
                                                            <button class="btn  btn-outline-danger btn-sm"
                                                                onclick="deleteButton()"><i
                                                                    class="ri-delete-bin-6-line"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td>Lawyer</td>
                                                        <td>
                                                            <button class="btn btn-outline-primary btn-sm me-2"
                                                                data-bs-toggle="modal" data-bs-target="#editButton"><i
                                                                    class="ri-pencil-line"></i></button>
                                                            <button class="btn  btn-outline-danger btn-sm"
                                                                onclick="deleteButton()"><i
                                                                    class="ri-delete-bin-6-line"></i></button>
                                                        </td>
                                                    </tr> -->
                                                    <?php
                                                    $select = "SELECT * FROM `designation_types`";
                                                    $result = mysqli_query($conn, $select);
                                                    if ($result && $result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {

                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $id; ?></th>
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td>
                                                                    <button
                                                                        class="edit-designation-btn btn btn-outline-primary btn-sm me-2"
                                                                        data-bs-toggle="modal"
                                                                        data-designation-id="<?php echo $row['id']; ?>"
                                                                        data-bs-target="#editDesignationModal" d><i
                                                                            class="ri-pencil-line"></i></button>

                                                                    <button class="btn  btn-outline-danger btn-sm"
                                                                        onclick="deleteButton(<?= $row['id'] ?>, 'designation_types', '<?= $row['name'] ?>')"><i
                                                                            class="ri-delete-bin-6-line"></i></button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $id++;
                                                        }
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div>
        </div>
        <!-- Add Modal  -->
        <div class="modal fade" id="categoryForm" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="padding:9px 9px;">
                        <h5 class="modal-title">Add </h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>

                    </div>
                    <form id="designationForm">
                        <div class="modal-body">
                            <label for="designationName" class="mb-2">Designation</label>
                            <input class="form-control mb-3" type="text" placeholder="Designation" id="designationName"
                                name="designationName" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit" value="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editDesignationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="padding:9px 9px;">
                        <h5 class="modal-title">Edit</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>

                    </div>
                    <form method="post" id="editDesignationForm">
                        <div class="modal-body">
                            <label for="editDesignationName" class="mb-2">Designation</label>
                            <input class="form-control mb-3" type="text" placeholder="Designation"
                                id="editDesignationName" name="editDesignationName" required>
                            <input type="hidden" id="editDesignationId">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit" value="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteButton" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <label for="deleteDesignationName" class="mb-2">Designation Name</label>
                            <input class="form-control mb-3" type="text" placeholder="designation name"
                                id="deleteDesignationName" name="deleteDesignationName" required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="button" value="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        require_once '../../includes/footer.php';
        ?>
</body>

</html>