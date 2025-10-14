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
              <h4 class="fs-18 fw-semibold m-0">Plan Types</h4>
            </div>
            <div class="text-end">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#planModal">
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
                            <td>Starter</td>
                            <td>
                              <button class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal"
                                data-bs-target="#editButton"><i class="ri-pencil-line"></i></button>
                              <button class="btn  btn-outline-danger btn-sm" onclick="deleteButton()"><i
                                  class="ri-delete-bin-6-line"></i></button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Hourly</td>
                            <td>
                              <button class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal"
                                data-bs-target="#editButton"><i class="ri-pencil-line"></i></button>
                              <button class="btn  btn-outline-danger btn-sm" onclick="deleteButton()"><i
                                  class="ri-delete-bin-6-line"></i></button>
                            </td>

                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Full time</td>
                            <td>
                              <button class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal"
                                data-bs-target="#editButton"><i class="ri-pencil-line"></i></button>
                              <button class="btn  btn-outline-danger btn-sm" onclick="deleteButton()"><i
                                  class="ri-delete-bin-6-line"></i></button>
                            </td>
                          </tr> -->
                          <?php
                          $select = "SELECT * FROM `plan_types`";
                          $result = mysqli_query($conn, $select);
                          if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                              ?>
                              <tr>
                                <th scope="row"><?php echo $id; ?></th>
                                <td><?php echo $row['name']; ?></td>
                                <td>
                                  <button class="edit-plan-btn btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#editPlanModal" data-plan-id="<?php echo $row['id']; ?>"><i
                                      class="ri-pencil-line"></i></button>
                                  <button class="btn  btn-outline-danger btn-sm" onclick="deleteButton(<?= $row['id'] ?>, 'plan_types','<?= $row['name'] ?>')"><i
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
    <!-- Add Category  -->
    <div class="modal fade" id="planModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="padding:9px 9px;">
            <h5 class="modal-title">Add</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>

          </div>
          <form id="planForm">
            <div class="modal-body">
              <label for="planName" class="mb-2">Plan</label>
              <input class="form-control mb-3" type="text" placeholder="Plan" id="planName" name="planName" required>
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
    <div class="modal fade" id="editPlanModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="padding:9px 9px;">
            <h5 class="modal-title">Edit</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <form method="post" id="editPlanForm">
            <div class="modal-body">
              <label for="editPlanName" class="mb-2">Plan</label>
              <input class="form-control mb-3" type="text" placeholder="Plan" id="editPlanName" name="editPlanName"
                required>
              <input type="hidden" id="editPlanId">
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
              <label for="deletePlanName" class="mb-2">Plan Name</label>
              <input class="form-control mb-3" type="text" placeholder="plan name" id="deletePlanName"
                name="deletePlanName" required>
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