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
              <h4 class="fs-18 fw-semibold m-0">Languages</h4>
            </div>
            <div class="text-end">
              <button class="btn btn-primary languageAdd" data-bs-toggle="modal" data-bs-target="#languageModal">
                <i class="ri-add-line"></i> Add
              </button>
            </div>
          </div>

          <!-- language Table -->
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <table id="language_table" class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                         <!-- data appended here using language.js -->
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
  <div class="modal fade" id="languageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header" style="padding:9px 9px;">
          <h5 class="modal-title languageTitle">Add Language</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="languageForm" class="needs-validation" novalidate>
          <div class="modal-body">
            <label for="languageName" class="mb-2">Language</label>
            <input type="hidden" id="languageID">
            <input class="form-control" type="text" placeholder="Enter language" id="languageName" name="languageName" style="background-image: none;" required>
            <div class="invalid-feedback">Enter Language Name</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary languageSubmit" type="submit" name="submit">Submit</button>
            <button class="btn btn-primary languageUpdate d-none" type="button" onclick="languageUpdate(document.getElementById('languageID').value)">Update</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <?php include '../../includes/footer.php'; ?>
  <!-- JavaScript -->
<script src="../../assets/js/custom/master/language.js"></script>
</body>
</html>
