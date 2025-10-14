<?php
require_once '../../includes/header.php';
require_once '../../includes/connection.php';
$id = 1;
?>

<body data-menu-color="light" data-sidebar="default">
  <div id="app-layout">
    <?php include '../../includes/topbar.php'; ?>
    <?php include '../../includes/left_sidebar.php'; ?>

    <div class="content-page">
      <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
          <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
              <h4 class="fs-18 fw-semibold m-0">Users</h4>
            </div>
            <div class="text-end">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userForm">
                <i class="ri-add-line"></i> Add
              </button>
            </div>
          </div>

          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">

                  <div class="row g-3">
                    <div class="col-12">
                      <!-- removed .table-responsive -->
                      <table id="datatable" class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Street</th>
                            <th scope="col">Pincode</th>
                            <th scope="col">Country</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- <tr>
                            <td scope="row">1</td>
                            <td>Arter</td>
                            <td>Carter</td>
                            <td>Artur Carter</td>
                            <td>arter_carter666</td>
                            <td>artercarter@gmail.com</td>
                            <td>780771142653</td>
                            <td>12 toronto street</td>
                            <td>A1A1A1</td>
                            <td>Canada</td>
                            <td class="text-center">
                              <div class="d-flex justify-content-center">
                                <button class="btn btn-outline-info btn-sm me-1" title="View">
                                  <i class="ri-eye-line"></i>
                                </button>
                                <button class="btn btn-outline-primary btn-sm me-1" data-bs-toggle="modal"
                                  data-bs-target="#editButton" title="Edit">
                                  <i class="ri-edit-2-line"></i>
                                </button>
                                <button class="btn btn-outline-danger btn-sm" onclick="deleteButton()" title="Delete">
                                  <i class="ri-delete-bin-6-line"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">2</td>
                            <td>Mohit</td>
                            <td>Anand</td>
                            <td>Mohit Anand</td>
                            <td>mohit_anand666</td>
                            <td>anandmohitsingh@gmail.com</td>
                            <td>780771142453</td>
                            <td>Phulwari Shareef</td>
                            <td>805105</td>
                            <td>India</td>
                            <td class="text-center">
                              <div class="d-flex justify-content-center">
                                <button class="btn btn-outline-info btn-sm me-1" title="View">
                                  <i class="ri-eye-line"></i>
                                </button>
                                <button class="btn btn-outline-primary btn-sm me-1" data-bs-toggle="modal"
                                  data-bs-target="#editButton" title="Edit">
                                  <i class="ri-edit-2-line"></i>
                                </button>
                                <button class="btn btn-outline-danger btn-sm" onclick="deleteButton()" title="Delete">
                                  <i class="ri-delete-bin-6-line"></i>
                                </button>
                              </div>
                            </td>
                          </tr> -->
                          <?php
                          $select = "SELECT * FROM `user_registrations`";
                          $result = mysqli_query($conn, $select);
                          if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                              ?>


                              <tr>
                                <td scope="row"><?= $id ?></td>
                                <td><?= $row['first_name'] ?></td>
                                <td><?= $row['last_name'] ?></td>
                                <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                <td></td>
                                <td><?= $row['email'] ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                  <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-info btn-sm me-1" title="View">
                                      <i class="ri-eye-line"></i>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm me-1" data-bs-toggle="modal"
                                      data-bs-target="#editButton" title="Edit">
                                      <i class="ri-edit-2-line"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="deleteButton()" title="Delete">
                                      <i class="ri-delete-bin-6-line"></i>
                                    </button>
                                  </div>
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

    <!-- Modals remain unchanged... -->

    <!-- User Form Modal -->
    <div class="modal fade" id="userForm" tabindex="-1" aria-labelledby="userFormLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title" id="userFormLabel">Add</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Modal Body with Form -->
          <form id="user-registration" method="POST">
            <div class="modal-body">
              <div class="row g-3">

                <div class="col-md-6">
                  <label for="firstname" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name"
                    required>
                </div>

                <div class="col-md-6">
                  <label for="lastname" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name"
                    required>
                </div>

                <div class="col-md-6">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"
                    required>
                </div>

                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>

                <div class="col-md-6">
                  <label for="contact" class="form-label">Contact No.</label>
                  <input type="number" class="form-control" id="contact" name="contact"
                    placeholder="Enter contact number" required>
                </div>

                <div class="col-md-6">
                  <label for="street" class="form-label">Street</label>
                  <input type="text" class="form-control" id="street" name="street" placeholder="Enter street" required>
                </div>

                <div class="col-md-6">
                  <label for="pincode" class="form-label">Pincode</label>
                  <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Enter pincode"
                    required>
                </div>

                <div class="col-md-6">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control" id="country" name="country" placeholder="Enter country"
                    required>
                </div>

              </div>
            </div>

            <!-- Modal Footer with Submit -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

        </div>
      </div>
    </div>



  </div>
  <?php
  require_once '../../includes/footer.php';
  ?>
</body>

</html>