<?php
require_once '../../includes/main_header.php';
// require_once '../../includes/connection.php';
$userId = $_SESSION['user_id'];
if (isset($_SESSION['user_email'])) {
    $email = mysqli_real_escape_string($conn, $_SESSION['user_email']);
    $select = "SELECT * FROM `user_registrations` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No user found.";
    }
} else {
    echo "User email not set in session.";
}

?>

<body data-menu-color="light" data-sidebar="default">
     <?php include  '../alert/toast.php';?>
  <div id="app-layout">
    <?php include '../../includes/topbar.php'; ?>
    <?php include '../../includes/left_sidebar.php'; ?>
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">Profiles</h4>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Update Profile</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" id="profile_details" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row g-3">

                                   <div class="col-4">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" style="background-image: none;"
                                            value="<?php echo $row['first_name']?>" required>
                                    </div>

                                    <div class="col-4">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" style="background-image: none;"
                                            value="<?php echo $row['last_name'] ?>" required>
                                    </div>
                                    
                                    <div class="col-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" style="background-image: none;"
                                            value="<?php echo $row['email'] ?>" required>
                                    </div>
                                    <div class="col-4">
                                        <label for="mobile" class="form-label">Mobile No</label>
                                        <input type="number" class="form-control" id="mobile" name="mobile" style="background-image: none;"
                                            value="<?= $row['mobile']?>" required>
                                    </div>
                                    <div class="col-4">
                                        <label for="dob" class="form-label">DOB</label>
                                        <input type="date" class="form-control" id="dob" name="dob" value="<?= $row['dob']?>" placeholder="" style="background-image: none;">
                                    </div>

                                    <div class="col-4">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" style="background-image: none;"
                                            placeholder="" value="<?= $row['address']?>" required>
                                    </div>
                                    <div class="col-4">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="<?= $row['city']?>" style="background-image: none;" required>
                                    </div>

                                    <div class="col-4">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="" value="<?= $row['state']?>" style="background-image: none;" required>
                                    </div>

                                    <div class="col-4">
                                        <label for="pincode" class="form-label">Pincode</label>
                                        <input type="number" class="form-control" id="pincode" name="pincode" style="background-image: none;"
                                            value="<?= $row['pincode']?>" required>
                                    </div>

                                    <div class="col-4">
                                        <label for="country" class="form-label">Country</label>
                                        <select class="form-select" id="country" name="country" style="background-image: none;" value="<?= $row['country']?>" required>
                                            <option value="">-- Select Country --</option>
                                            <option value="India" selected>India</option>
                                            <option value="USA">USA</option>
                                            <option value="China">China</option>
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="designation" name="designation" value="<?= $row['designation']?>"
                                           style="background-image: none;">
                                    </div>


                                    <div class="col-4">
                                        <label for="personal_no" class="form-label">Personal No</label>
                                        <input type="number" class="form-control" id="personal_no" name="personal_no"
                                            value="<?= $row['personal_no']?>" style="background-image: none;">
                                    </div>

                                    <div class="col-4">
                                        <label for="support_no" class="form-label">Support No</label>
                                        <input type="number" class="form-control" id="support_no" name="support_no"
                                            value="<?= $row['support_no']?>" style="background-image: none;">
                                    </div>

                                    <div class="col-4">
                                        <label for="office_no" class="form-label">Office No</label>
                                        <input type="number" class="form-control" id="office_no" name="office_no"
                                            value="<?= $row['office_no']?>" style="background-image: none;">
                                    </div>

                                    <div class="col-4">
                                        <label for="telegram" class="form-label">Telegram</label>
                                        <input type="text" class="form-control" id="telegram"
                                            value="<?= $row['telegram']?>" style="background-image: none;">
                                    </div>

                                    <div class="col-4">
                                        <label for="skype" class="form-label">Skype </label>
                                        <input type="text" class="form-control" id="skype"
                                            value="<?= $row['skype']?>" style="background-image: none;">
                                    </div>
                                    <div class="col-4">
                                        <label for="linkedin" class="form-label">LinkedIn</label>
                                        <input type="text" class="form-control" id="linkedin" name="linkedin" style="background-image: none;"
                                            value="<?= $row['linkedin']?>" style="background-image: none;" >
                                    </div>
                                 
                                    <div class="col-4">
                                        <label for="punchline" class="form-label">Punchline</label>
                                        <input type="text" class="form-control" id="punchline" name="punchline" value="<?= $row['punchline']?>"
                                            placeholder="Enter Punchline" style="background-image: none;">
                                    </div>
                                     <div class="col-4">
                                        <label for="project" class="form-label">Projects Completed</label>
                                        <input type="number" class="form-control" id="project"
                                            name="project" placeholder="Enter Projects Completed" style="background-image: none;" value="<?= $row['project']?>" style="background-image: none;">
                                    </div>
                                  
                                    <div class="col-4">
                                        <label for="experience" class="form-label">Experience</label>
                                        <input type="text" class="form-control" id="experience" name="experience" style="background-image: none;"
                                            placeholder="Enter Experience" value="<?= $row['experience']?>" style="background-image: none;">
                                    </div>
                                 
                                    <div class="col-4">
                                        <label for="customer_count" class="form-label">Customer Count</label>
                                        <input type="number" class="form-control" id="customer_count"
                                            name="customer_count" placeholder="Enter Customer Count"  value="<?= $row['customer_count']?>" style="background-image: none;">
                                    </div>
                                    <div class="col-4">
                                        <label for="award_count" class="form-label">Award Count</label>
                                        <input type="number" class="form-control" id="award_count" name="award_count" value="<?= $row['award_count']?>"
                                            placeholder="Enter Award Count" style="background-image: none;">
                                    </div>
                                      <div class="col-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="password1" name="password1" value="<?=$row['plain_password']?>"
                                            placeholder="" style="background-image: none;">
                                    </div>
                                      <div class="col-2">
                                        <label for="profile_image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="profile_image" name="profile_image" value=""
                                            placeholder="" style="background-image: none;">
                                        <!-- <img id="profile_image_preview" src="../../uploads/projects/<?=$row['profile_image']?>" alt="Image Preview" style="margin-top:10px; max-width:60px; border-radius:5px;"> -->

                                    </div>
                                      <div class="col-2 <<?php $row['profile_image'] == '' || null ?'d-none':''?>">
                                        <img id="profile_image_preview" src="../../uploads/projects/<?=$row['profile_image']?>" alt="Image Preview" style="margin-top:30px; max-width:60px; border-radius:5px;">
                                    </div>
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" id="" name="" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

<!-- ----------------------------------------------------- -->
     <!-- <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Programming Skill To Enter</h5>
                        </div>
                        <div class="card-body">
                            <form id="select-form" action="skill_viewer.php" method="POST">

                                <div class="row mb-5">
                                    <div class="col-md-3">
                                        <label for="skill-type" class="form-label">Skill Type</label>
                                        <select id="skill-type" class="form-select" aria-label="Skills Selection">
                                            <option value="" selected></option>
                                            <option value="Design">web Development</option>
                                            <option value="Soft-Skills">Ui/UX Design</option>
                                            </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="skill-name" class="form-label">Service Name</label>
                                        <select id="skill-name" class="form-select" aria-label="Skill Type Selection">
                                            <option value="" selected></option>
                                            <option value="HTML5">HTML5</option>

                                        </select>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <label class="visually-hidden form-label" for="skill-measure">Percentage</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="skill-measure" min="0"
                                                max="100" placeholder="Percentage">
                                            <div class="input-group-text">%</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <button type="button" class="btn btn-success" id="addButton"
                                            onclick="addRow()">Add</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="table-responsive col-md-6">
                                        <table class="table mb-0" id="skill-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Skill Type</th>
                                                    <th scope="col">Skill Name</th>
                                                    <th scope="col">Skill Measure</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">1</td>
                                                    <td scope="row">Web Development</td>
                                                    <td scope="row">Html</th>
                                                    <td scope="row">100</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="alert-container col-md-12"></div>
                                <div class="col-md-12 mt-3 text-end">
                                    <button type="submit" class="btn btn-primary" style="display: none;"
                                        id="invisibleButton">Submit</button>
                                </div>

                            </form>

                        </div>
                    </div> 

                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">User Profiles</h5>
                        </div>
                        <div class="card-body">
                            <form id="select-form" action="skill_viewer.php" method="POST">
                                <div class="row g-3 mb-5">
                                    <!- <div class="col-md-3">
                                        <label for="user_id" class="form-label">User ID</label>
                                        <input type="text" class="form-control" id="user_id" name="user_id"
                                            placeholder="Enter User ID">
                                    </div>
                     <div class="col-md-3">
                                        <label for="residence" class="form-label">Residence</label>
                                        <input type="text" class="form-control" id="residence" name="residence"
                                            placeholder="Enter Residence">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city"
                                            placeholder="Enter City">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" id="state" name="state"
                                            placeholder="Enter State">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="pincode" class="form-label">Pincode</label>
                                        <input type="number" class="form-control" id="pincode" name="pincode"
                                            placeholder="Enter Pincode">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="number" class="form-control" id="age" name="age"
                                            placeholder="Enter Age">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="punchline" class="form-label">Punchline</label>
                                        <input type="text" class="form-control" id="punchline" name="punchline"
                                            placeholder="Enter Punchline">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="experience" class="form-label">Experience</label>
                                        <input type="text" class="form-control" id="experience" name="experience"
                                            placeholder="Enter Experience">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="projects_completed" class="form-label">Projects Completed</label>
                                        <input type="number" class="form-control" id="projects_completed"
                                            name="projects_completed" placeholder="Enter Projects Completed">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="customer_count" class="form-label">Customer Count</label>
                                        <input type="number" class="form-control" id="customer_count"
                                            name="customer_count" placeholder="Enter Customer Count">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="award_count" class="form-label">Award Count</label>
                                        <input type="number" class="form-control" id="award_count" name="award_count"
                                            placeholder="Enter Award Count">
                                    </div> 

                     <div class="col-md-3 mt-4">
                                        <button type="button" class="btn btn-success" id="addButton"
                                            onclick="addRow()">Add</button>
                                    </div> 
                    </div> 

                    <<div class="table-responsive">
                                    <table class="table mb-0" id="skill-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Skill Type</th>
                                                <th scope="col">Skill Name</th>
                                                <th scope="col">Skill Measure</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td>Web Development</td>
                                                <td>Html</td>
                                                <td>100</td>
                                            </tr>
                                        </tbody>
                                    </table>
                               </div> 
                    
                                <div class="alert-container mt-3"></div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary" style="display: none;"
                                        id="invisibleButton">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>  
                    
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">User Services</h5>
                        </div>
                        <div class="card-body">
                            <form id="select-form" action="skill_viewer.php" method="POST">

                                <div class="row mb-5">
                                    <div class="col-md-3">
                                        <label for="skill-type" class="form-label">Service Type</label>
                                        <select id="skill-type" class="form-select" aria-label="Skills Selection">
                                            <option value="" selected disabled>-- Select Service Type --</option>
                                            <option value="Design">web Development</option>
                                            <option value="Soft-Skills">Ui/UX Design</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="skill-name" class="form-label">Service Name</label>
                                        <select id="skill-name" class="form-select" aria-label="Skill Type Selection">
                                            <option value="" selected disabled>-- Select Service Name--</option>
                                            <option value="HTML5">HTML5</option>

                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="skill-measure">Efficiency</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="skill-measure" min="0"
                                                max="100" placeholder="Percentage">
                                            <div class="input-group-text">%</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <button type="button" class="btn btn-success" id="addButton"
                                            onclick="addRow()">Add</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="table-responsive col-md-6">
                                        <table class="table mb-0" id="skill-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Service Type</th>
                                                    <th scope="col">Service Name</th>
                                                    <th scope="col">Service Measure</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">1</td>
                                                    <td scope="row">Web Development</td>
                                                    <td scope="row">Html</th>
                                                    <td scope="row">100</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="alert-container col-md-12"></div>
                                <div class="col-md-12 mt-3 text-end">
                                    <button type="submit" class="btn btn-primary" style="display: none;"
                                        id="invisibleButton">Submit</button>
                                </div>

                            </form>

                        </div>
                    </div> -->
<!-- -------------------------------------------------------------------- -->
                    <!-- Programming Cardd -->

     <!-- Programming Cardd -->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">My Services</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile_services" method="POST" class="needs-validation" novalidate>
                            <div class="row md-5">

                                    <!-- <div class="col-md-3">
                                        <label for="skill-type" class="form-label">Skill Type</label>
                                        <select id="skill-type" class="form-select" aria-label="Skills Selection">
                                            <option value="" selected disabled>-- Select Skill Type --</option>
                                            <option value="Design">web Development</option>
                                            <option value="Soft-Skills">Ui/UX Design</option>
                                        </select>
                                    </div> -->

                                    <div class="col-md-3">
                                        <label for="services_category" class="form-label">Skill Name</label>
                                         <input type="text" class="form-control" id="services_category" placeholder="Enter Services" style="background-image: none;" required>   
                                    </div>
                                     <!-- <div class="col-md-3 progSkillAdd d-none">
                                        <label class=" form-label" for="services_category_new">Skill Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="services_category_new" placeholder="Enter Skill Name" style="background-image: none;" required>
                                        </div>
                                    </div> -->

                                    <div class="col-md-3">
                                        <label class=" form-label" for="services_desc">Description</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="services_desc" placeholder="Enter Description" style="background-image: none;" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <button type="submit" class="btn btn-success"
                                            >Add</button>
                                    </div>


                                </div>
                            </form>

                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-striped mt-2" id="profile-services-tab">
                                            <thead>
                                            <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Services</th>
                                                    <th scope="col">Description</th>
                                                    <!-- <th scope="col">Delete</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <!-- data appended using function -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="alert-container col-md-12"></div>
                                <!-- <div class="col-md-12 mt-3 text-end">
                                    <button type="submit" class="btn btn-primary" style="display: none;"
                                        id="invisibleButton">Submit</button>
                                </div> -->
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" id="" name="" class="btn btn-primary" onclick="updateservices()">Update</button>
                                </div>
                            
                        </div>
                    </div>
                    <!-- Programming Card end -->






                    <!-- Programming Cardd -->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Programming Skill</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile_programmingSkill" method="POST" class="needs-validation" novalidate>
                            <div class="row md-5">

                                    <!-- <div class="col-md-3">
                                        <label for="skill-type" class="form-label">Skill Type</label>
                                        <select id="skill-type" class="form-select" aria-label="Skills Selection">
                                            <option value="" selected disabled>-- Select Skill Type --</option>
                                            <option value="Design">web Development</option>
                                            <option value="Soft-Skills">Ui/UX Design</option>
                                        </select>
                                    </div> -->

                                    <div class="col-md-3">
                                        <label for="skill-name" class="form-label">Skill Name</label>
                                        <select id="programming-skill-name" class="form-select"
                                            aria-label="Skill Type Selection" style="background-image: none;;" required>
                                            <option value="" selected disabled>-- Select Skill Name --</option>
                                            <?php $select = "SELECT * FROM `programming_skill_types` WHERE `deleted_at` IS NULL";
                                            $result = mysqli_query($conn, $select);
                                            if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>

                                                    </option>
                                                    <?php
                                                }
                                            }

                                            ?>
                                            <option value="0">Add More ✏️</option>
                                        </select>
                                        <input type="hidden" id="programming-skill-id" name="programming-skill-id">
                                    </div>
                                     <div class="col-md-3 progSkillAdd d-none">
                                        <label class=" form-label" for="programming-skill-new">Skill Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="programming-skill-new" placeholder="Enter Skill Name" style="background-image: none;" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-label" for="programming-skill-measure">Efficiency</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="programming-skill-measure"
                                                min="0" max="100" placeholder="Percentage" style="background-image: none;" required>
                                            <div class="input-group-text">%</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <button type="submit" class="btn btn-success" id="addButton"
                                            >Add</button>
                                    </div>


                                </div>
                            </form>

                                <div class="row">
                                    <div class="table-responsive col-md-6">
                                        <table class="table table-striped" id="profile-prog-tab">
                                            <thead>
                                            <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Skill Name</th>
                                                    <th scope="col">Skill Measure</th>
                                                    <!-- <th scope="col">Delete</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <!-- data appended using function -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="alert-container col-md-12"></div>
                                <!-- <div class="col-md-12 mt-3 text-end">
                                    <button type="submit" class="btn btn-primary" style="display: none;"
                                        id="invisibleButton">Submit</button>
                                </div> -->
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" id="" name="" class="btn btn-primary" onclick="updateProgrammingSkill()">Update</button>
                                </div>
                            
                        </div>
                    </div>
                    <!-- Programming Card end -->

                    <!-- User Languages -->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Language</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-language" method="POST" class="needs-validation" novalidate>
                                <div class="row g-3 mb-5">
                                    <div class="col-md-3">
                                        <label for="language-name" class="form-label">Language Id</label>
                                        <select class="form-select" id="language-name" name="language-name" style="background-image: none;" required>
                                            <option value="" selected disabled>-- Select Language --</option>
                                            <?php
                                            $select = "SELECT * FROM `language_types`";
                                            $result = mysqli_query($conn, $select);
                                            if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <option value="0">Add More ✏️</option>
                                        </select>
                                        <input type="hidden" id="language-id" name="language-id">
                                    </div>
                                    <div class="col-md-3 languageNewAdd d-none">
                                        <label class=" form-label" for="language-name-new">Langauage Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="language-name-new" placeholder="Enter Language Name" style="background-image: none;" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 2.9rem;">
                                        <label class="visually-hidden form-label" for="skill-measure">Efficiency</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="language-measure"
                                                name="language-measure" min="0" max="100" placeholder="Percentage" style="background-image: none;">
                                            <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 2.9rem;">
                                        <button type="submit"
                                            class="btn btn-success">Add</button>
                                    </div>
                                </div>
                            </form>
                                <div class="table-responsive col-md-6">
                                    <table class="table table-striped" id="profile-lang-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Language Name</th>
                                                <th scope="col">Efficiency</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="alert-container mt-3"></div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" id="lang-sub" name="lang-sub"
                                        class="btn btn-primary" onclick="updateLanguage()">Update</button>
                                </div>
                           
                        </div>
                    </div>

                    <!-- Language Card end -->


                    <!-- Project Card -->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Project</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-projects" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row g-3 mb-5">
                                    <div class="col-md-2 mb-3">
                                        <label for="project-category" class="form-label">Category</label>
                                        <select class="form-select" id="project-category" name="project-category" style="background-image: none;"
                                            required>
                                            <option value="" selected disabled>-- Select Category --</option>
                                            <!-- <option value="">Web Development</option> -->
                                            <?php
                                            $select = "SELECT * FROM `category_types`";
                                            $result = mysqli_query($conn, $select);
                                            if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <option value="Other">Other</option>
                                        </select>
                                        <!-- <input type="hidden" id="project-id" name="project-id"> -->
                                    </div>

                                    <!-- <input type="text" class="form-control" id="custom-category" name="custom-category"
                                        placeholder="Enter category" style="display:none;"> -->


                                    <div class="col-md-2">
                                        <label for="project-title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="project-title" name="project-title"
                                            placeholder="Enter Title" style="background-image: none;" required>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="project-desc" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="project-desc" name="project-desc"
                                            placeholder="Enter Description" style="background-image: none;" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="file_name" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" id="file_name" name="file_name[]" style="background-image: none;" multiple>
                                    </div>
                                    <div class="col-3" style="margin-top: 3rem;">
                                        <button type="submit" class="btn btn-success"
                                           >Add</button>
                                    </div>

                                </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table mb-0" id="project-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">File Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="alert-container mt-3"></div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" id="" name="" class="btn btn-primary" onclick="updateProject()">Update</button>
                                </div>
                          
                        </div>
                    </div>
                    <!-- Project card End -->

                    <!-- Extra Skills Card-->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Extra Skill</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-extra-skill" method="POST" class="needs-validation" novalidate>
                                <div class="row g-3 mb-5">
                                    <div class="col-md-3">
                                        <label for="extra-skill" class="form-label">Extra Skill ID</label>
                                        <select class="form-select" id="extra-skill" name="extra-skill" style="background-image: none;" required>
                                            <option value="" selected disabled>-- Select Extra Skill --</option>
                                            <?php
                                            $select = "SELECT * FROM `extra_skill_types`";
                                            $result = mysqli_query($conn, $select);
                                            if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <!-- <input type="hidden" id="extra-skill-id" name="extra_skill_id"> -->
                                    </div>


                                    <div class="col-md-3" style="margin-top: 2.9rem;">
                                        <button type="submit" class="btn btn-success"
                                           >Add</button>
                                    </div>

                                </div>
                                </form>
                                <div class="table-responsive col-md-6">
                                    <table class="table table-striped" id="extra-skill-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Extra Skill Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <!-- <div class="extra-skill-class"></div> -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="alert-container mt-3"></div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" id="" name="" class="btn btn-primary" onclick="updateExtraSkill()">Update</button>
                                </div>
                          
                        </div>
                    </div>

                    <div class="card mt-3 plan-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Plan</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-plan" method="POST" class="needs-validation" novalidate>

                                <div class="row mb-5">
                                    <div class="col-md-3">
                                        <label for="plan-type" class="form-label">Plan Type ID</label>
                                        <select id="plan-type" class="form-select" aria-label="Plan Type Selection" style="background-image: none;" required>
                                            <option value="" selected disabled>-- Select Plan Type --</option>
                                            <?php $select = "SELECT * FROM `plan_types`";
                                            $result = mysqli_query($conn, $select);
                                            if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="plan-price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="plan-price" name="plan-price"
                                            min="0" step="1" placeholder="Enter Price" style="background-image: none;" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="skill-types" class="form-label">Skill Type</label>
                                        <select id="skill-types" class="form-select" aria-label="Skill Type Selection" style="background-image: none;" required>
                                            <option value="" selected disabled>-- Select Skill type --</option>
                                            <?php $select = "SELECT * FROM `skill_list_types`";
                                            $result = mysqli_query($conn, $select);
                                            if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>

                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="popularity-type" class="form-label">Popularity Type</label>
                                        <select id="popularity-type" class="form-select" style="background-image: none;"
                                            aria-label="Popularity Selection" required>
                                            <option value="" selected disabled>-- Select Popularity --</option>
                                            <?php
                                            for ($i = 0; $i <= 10; $i++) {
                                                ?>
                                                <option value="<?=$i?>"><?= $i ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <button type="submit" class="btn btn-success" id="addPlanButton"
                                           >Add</button>
                                    </div>
                                </div>
                            </form>               
                                <div class="row">
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-striped" id="profile-plan-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Plan Type</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Skill Types</th>
                                                    <th scope="col">Popularity</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="alert-container col-md-12"></div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" onclick="updateProfilePlan()" class="btn btn-primary">Update</button>
                                </div>
                           
                        </div>
                    </div>

                    <!-- Plan Card end-->

                    <!-- Qualification Card -->
             <div class="card mt-3 skill-card">
    <div class="card-header">
        <h5 class="card-title mb-0">Qualification</h5>
    </div>
    <div class="card-body">
        <form id="profile-qualification" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
            <div class="row g-3">
                 <div class="col-md-3">
                    <label for="qualification_type" class="form-label">Qualification Type</label>
                    <select class="form-select" id="qualification_type" name="qualification_type[]" style="background-image: none;" required>
                        <option value="" >-- Select Qualification --</option>
                        <option value="Education">Education</option >
                        <option value="Work">Work</option>
                    </select>
                </div>
                <div class="col-md-3 education-type d-none">
                    <label for="education_type" class="form-label">Qualification ID</label>
                    <select class="form-select" id="education_type" name="education_type[]" style="background-image: none;" required>
                        <option value="" selected disabled>-- Select Qualification --</option>
                        <?php
                        $select = "SELECT * FROM `education_types`";
                        $result = mysqli_query($conn, $select);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="qualification_title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="qualification_title" name="qualification_title[]" style="background-image: none;" required>
                </div>
                <div class="col-md-3">
                    <label for="qualification-start-date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="qualification_start_date" name="qualification_start_date[]" style="background-image: none;" required>
                </div>

                <div class="col-md-3">
                    <label for="qualification-end-date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="qualification_end_date" name="qualification_end_date[]" style="background-image: none;" required>
                </div>

                <div class="col-md-3">
                    <label for="certification" class="form-label">Certification</label>
                    <input type="text" class="form-control" id="qualification_certification" name="qualification_certification[]" placeholder="Enter Certification" style="background-image: none;" required>
                </div>

               

                <div class="col-md-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="qualification_description" name="qualification_description[]" rows="1" placeholder="Enter Description" style="background-image: none;" required></textarea>
                </div>
            </div>

                <div class="col-md-3 mt-2 mb-2">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped" id="qualification-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">Education</th>
                        <th scope="col">Title</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Certification</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="alert-container mt-3"></div>
        <div class="d-flex justify-content-end mt-4">
            <button type="button" onclick="updateQualifications()" class="btn btn-primary">Update</button>
        </div>
    </div>
</div>

                 
                    <!-- <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Icon</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-icon" enctype="multipart/form-data" method="POST">
                                <div class="row g-3 mb-5">
                                    <div class="col-md-3">
                                        <label for="file_icon" class="form-label">Upload Image</label>
                                        <input type="file" class="form-control" id="file_icon" name="file_icon"
                                            accept="image/*" required>
                                    </div>


                                    <div class="col-md-3" style="margin-top: 2.9rem;">
                                        <button type="button" class="btn btn-primary"
                                            onclick="addRowIcon()">Update</button>
                                    </div>
                                </div>

                                <div class="table-responsive" id="icon-table">
                                    <table class="table mb-0" id="icons-table">
                                     
                                        <tbody>
                                           <tr>
                                                <td>1</td>
                                                <td>twitter.png</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="alert-container mt-3"></div>
                            </form>
                        </div>
                    </div> -->
                    <!-- Social Icons Card end -->



                    <!-- Skills To Show Card -->
                    <!-- <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Skill List</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-list" method="POST">
                                <div class="row g-3 mb-5">
                                    <div class=" col-3 mb-3">
                                        <label for="skill-list" class="form-label">Skill List</label>
                                        <select class="form-select" id="skill-list" name="skill-list" required>
                                            <option value="" selected disabled>-- Select Skill List --</option>
                                            <?php
                                            //  $select = "SELECT * FROM `skill_list_types`";
                                            // $result = mysqli_query($conn, $select);
                                            // if ($result && $result->num_rows > 0) {
                                            //     while ($row = $result->fetch_assoc()) {
                                            //         ?>
                                            //          <option value="<?//= $row['id'] ?>"><?//= $row['name'] ?></option>
                                            //          <?php
                                            //      }
                                            //  }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-3" style="margin-top: 2.9rem;">
                                        <button type="button" class="btn btn-success"
                                            onclick="addRowSkillList()">Add</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0" id="skill-list-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Skill List ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="alert-container mt-3"></div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" onclick="submitSkillList()"
                                        class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    
                </div>
            </div>
            
             <?php
    require_once '../../includes/footer.php';
    ?>
     <!-- JavaScript -->
     <script>
         const user_id = <?php echo json_encode($userId);?>;

    </script>
         <script src="../../assets/js/custom/profile/profile.js"></script>
         <script src="../../assets/js/custom/profile/profileTwo.js"></script>
         <script src="../../assets/js/custom/profile/programming-skills.js"></script>
</body>

</html>