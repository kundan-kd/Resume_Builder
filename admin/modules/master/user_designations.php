<?php
include '../../includes/header.php';
include '../../includes/connection.php';
?>
<body data-menu-color="light" data-sidebar="default">
  <?php include  '../alert/toast.php';?>
  <div id="app-layout">
    <?php include '../../includes/topbar.php'; ?>
    <?php include '../../includes/left_sidebar.php'; ?>
    <div class="content-page">
      <div class="content">
        <!-- Start Content -->
        <div class="container-fluid">

          <!-- Page Title -->
          <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
              <h4 class="fs-18 fw-semibold m-0">Designations</h4>
            </div>
            <div class="text-end">
              <button class="btn btn-primary designationAdd" data-bs-toggle="modal" data-bs-target="#designationModal">
                <i class="ri-add-line"></i> Add
              </button>
            </div>
          </div>

          <!-- designation Table -->
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <table id="designation_table" class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                         <!-- data appended here using designation.js -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div> 
            </div> 
          </div> 

        </div> 
      </div> 
    </div> 
  </div> 

  <!-- Add Modal -->
  <div class="modal fade" id="designationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header" style="padding:9px 9px;">
          <h5 class="modal-title designationTitle">Add Designation</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="designationForm" class="needs-validation" novalidate>
          <div class="modal-body">
            <label for="designationName" class="mb-2">Designation</label>
            <input type="hidden" id="designationID">
            <input class="form-control" type="text" placeholder="Enter designation" id="designationName" name="designationName" style="background-image: none;" required>
            <div class="invalid-feedback">Enter Designation Name</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary designationSubmit" type="submit" name="submit">Submit</button>
            <button class="btn btn-primary designationUpdate d-none" type="button" onclick="designationUpdate(document.getElementById('designationID').value)">Update</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <?php include '../../includes/footer.php'; ?>
  <!-- JavaScript -->
<script src="../../assets/js/custom/master/designation.js"></script>
</body>
</html>
