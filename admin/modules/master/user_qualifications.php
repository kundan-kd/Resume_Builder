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
              <h4 class="fs-18 fw-semibold m-0">Qualification</h4>
            </div>
            <div class="text-end">
              <button class="btn btn-primary qualificationAdd" data-bs-toggle="modal" data-bs-target="#qualificationModal">
                <i class="ri-add-line"></i> Add
              </button>
            </div>
          </div>

          <!-- qualification Table -->
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <table id="qualification_table" class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                         <!-- data appended here using qualification.js -->
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
  <div class="modal fade" id="qualificationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header" style="padding:9px 9px;">
          <h5 class="modal-title qualificationTitle">Add Qualification</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="qualificationForm" class="needs-validation" novalidate>
          <div class="modal-body">
            <label for="qualificationName" class="mb-2">Qualification</label>
            <input type="hidden" id="qualificationID">
            <input class="form-control" type="text" placeholder="Enter qualification" id="qualificationName" name="qualificationName" style="background-image: none;" required>
            <div class="invalid-feedback">Enter Qualification Name</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary qualificationSubmit" type="submit" name="submit">Submit</button>
            <button class="btn btn-primary qualificationUpdate d-none" type="button" onclick="qualificationUpdate(document.getElementById('qualificationID').value)">Update</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <?php include '../../includes/footer.php'; ?>
  <!-- JavaScript -->
<script src="../../assets/js/custom/master/qualification.js"></script>
</body>
</html>
