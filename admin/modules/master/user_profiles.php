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
                            <form id="profile-reg" method="POST" enctype="multipart/form-data">
                                <div class="row g-3">

                                    <div class="col-4">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            value="<?php echo $_SESSION['first_name'] ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            value="<?php echo $_SESSION['last_name'] ?>">
                                    </div>

                                    <!-- <div class="col-4">
                                        <label for="full-name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="full-name" name="full-name"
                                            placeholder="Enter your full name" required>
                                    </div> -->

                                    <div class="col-4">
                                        <label for="user-name" class="form-label">Username</label>
                                        <div class="input-group">
                                            <span class="input-group-text">@</span>
                                            <input type="text" class="form-control" id="user-name" name="user-name"
                                                placeholder="">
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password1" name="password1"
                                            placeholder="">
                                    </div>

                                    <div class="col-4">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="designation" name="designation"
                                            placeholder="">
                                    </div>

                                    <div class="col-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="<?= $_SESSION['email'] ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="personal_no" class="form-label">Personal No</label>
                                        <input type="number" class="form-control" id="personal_no" name="personal_no"
                                            value="<?= $_SESSION['personal_no'] ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="support_no" class="form-label">Support No</label>
                                        <input type="number" class="form-control" id="support_no" name="support_no"
                                            value="<?= $_SESSION['support_no'] ?>" r>
                                    </div>

                                    <div class="col-4">
                                        <label for="office_no" class="form-label">Office No</label>
                                        <input type="number" class="form-control" id="office_no" name="office_no"
                                            value="<?= $_SESSION['office_no'] ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="residence" class="form-label">Residence</label>
                                        <input type="text" class="form-control" id="residence" name="residence"
                                            placeholder="" value="<?php echo $user_profile['residence'];  ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="street" class="form-label">Street</label>
                                        <input type="text" class="form-control" id="street" name="street"
                                            value="<?= $_SESSION['street'] ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="<?= $user_profile['city']; ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="" value="<?= $user_profile['state'] ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="pincode" class="form-label">Pincode</label>
                                        <input type="number" class="form-control" id="pincode" name="pincode"
                                            value="<?= $_SESSION['pincode'] ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="country" class="form-label">Country</label>
                                        <select class="form-select" id="country" name="country">
                                            <option value="">-- Select Country --</option>
                                            <option value="India" <?= (isset($_SESSION['country']) && $_SESSION['country'] == 'India') ? 'selected' : '' ?>>India</option>
                                            <option value="USA" <?= (isset($_SESSION['country']) && $_SESSION['country'] == 'USA') ? 'selected' : '' ?>>USA</option>
                                            <option value="China" <?= (isset($_SESSION['country']) && $_SESSION['country'] == 'China') ? 'selected' : '' ?>>China</option>
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="telegram_id" class="form-label">Telegram</label>
                                        <input type="text" class="form-control" id="telegram_id" name="telegram_id"
                                            value="<?= $_SESSION['telegram'] ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="skype_id" class="form-label">Skype </label>
                                        <input type="text" class="form-control" id="skype_id" name="skype_id"
                                            value="<?= $_SESSION['skype'] ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="age" class="form-label">Dob</label>
                                        <input type="date" class="form-control" id="age" name="age" placeholder="">
                                    </div>
                                    <!-- <div class="col-4">
                                        <label for="punchline" class="form-label">Punchline</label>
                                        <input type="text" class="form-control" id="punchline" name="punchline"
                                            placeholder="Enter Punchline">
                                    </div> -->
                                    <div class="col-4">
                                        <label for="experience" class="form-label">Experience</label>
                                        <input type="text" class="form-control" id="experience" name="experience"
                                            placeholder="Enter Experience" value="<?= $user_profile['experience'];?>">
                                    </div>
                                    <div class="col-4">
                                        <label for="projects_completed" class="form-label">Projects Completed</label>
                                        <input type="number" class="form-control" id="projects_completed"
                                            name="projects_completed" placeholder="Enter Projects Completed" value="<?=  $user_profile['experience']; ?>">
                                    </div>
                                    <div class="col-4">
                                        <label for="customer_count" class="form-label">Customer Count</label>
                                        <input type="number" class="form-control" id="customer_count"
                                            name="customer_count" placeholder="Enter Customer Count" value="<?= $user_profile['customer_count']; ?>">
                                    </div>
                                    <div class="col-4">
                                        <label for="award_count" class="form-label">Award Count</label>
                                        <input type="number" class="form-control" id="award_count" name="award_count" value="<?= $user_profile['award_count']; ?>"
                                            placeholder="Enter Award Count">
                                    </div>

                                    <!-- Reusable Submit Section -->
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" id="" name="" class="btn btn-primary">Submit</button>
                                    </div>

                                    <!-- <div class="mt-4 d-flex justify-content-end gap-2"> -->
                                    <!-- <button type="button" class="btn btn-danger">Close</button> -->
                                    <!-- <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div> -->
                                </div>
                            </form>
                        </div>
                    </div>

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
                    </div> -->

                    <!-- <div class="card mt-3 skill-card">
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
                                    </div> -->
                    <!-- <div class="col-md-3">
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
                                    </div> -->

                    <!-- <div class="col-md-3 mt-4">
                                        <button type="button" class="btn btn-success" id="addButton"
                                            onclick="addRow()">Add</button>
                                    </div> -->
                    <!-- </div> -->

                    <!-- <div class="table-responsive">
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
                                </div> -->
                    <!-- 
                                <div class="alert-container mt-3"></div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary" style="display: none;"
                                        id="invisibleButton">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>  -->
                    <!-- 
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

                    <!-- Programming Cardd -->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Programming Skill</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-prog" method="POST">

                                <div class="row mb-5">
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
                                            aria-label="Skill Type Selection">
                                            <option value="" selected disabled>-- Select Skill Name --</option>
                                            <?php $select = "SELECT * FROM `programming_skill_types`";
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
                                        <input type="hidden" id="programming-skill-id" name="programming-skill-id">
                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-label" for="programming-skill-measure">Efficiency</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="programming-skill-measure"
                                                min="0" max="100" placeholder="Percentage">
                                            <div class="input-group-text">%</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <button type="button" class="btn btn-success" id="addButton"
                                            onclick="addRowProgrammingSkill()">Add</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="table-responsive col-md-6">
                                        <table class="table mb-0" id="profile-prog-tab">
                                            <!-- <thead> -->
                                            <!-- <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Skill Name</th>
                                                    <th scope="col">Skill Measure</th>
                                                </tr> -->
                                            <!-- </thead> -->
                                            <tbody>
                                                <!-- <tr>
                                                    <td scope="row">1</td>
                                                   
                                                    <td scope="row">Html</th>
                                                    <td scope="row">100</td>
                                                </tr>
                                               -->
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
                                    <button type="submit" id="" name="" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Programming Card end -->

                    <!-- User Languages -->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Language</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-lang" method="POST">
                                <div class="row g-3 mb-5">

                                    <!-- <div class="col-md-3">
                                        <label for="user_id" class="form-label">User ID</label>
                                        <input type="text" class="form-control" id="user_id" name="user_id"
                                            placeholder="Enter User ID" required>
                                    </div> -->
                                    <!-- 
                                    <div class="col-md-3">
                                        <label for="post_title" class="form-label">Language ID</label>
                                        <input type="text" class="form-control" id="post_title" name="post_title"
                                            placeholder="Enter Language ID" required>
                                    </div> -->

                                    <div class="col-md-3">
                                        <label for="language-name" class="form-label">Language Id</label>
                                        <select class="form-select" id="language-name" name="language-name" required>
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

                                        </select>
                                        <input type="hidden" id="language-id" name="language-id">
                                    </div>

                                    <div class="col-md-3" style="margin-top: 2.9rem;">
                                        <label class="visually-hidden form-label" for="skill-measure">Efficiency</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="language-measure"
                                                name="language-measure" min="0" max="100" placeholder="Percentage">
                                            <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 2.9rem;">
                                        <button type="button" onclick="addRowLanguage()"
                                            class="btn btn-success">Add</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0" id="lang-table">
                                        <!-- <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Language Name</th>
                                                <th scope="col">Efficiency</th>
                                            </tr>
                                        </thead> -->
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="alert-container mt-3"></div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" id="lang-sub" name="lang-sub"
                                        class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Language Card end -->


                    <!-- <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">User Reviews</h5>
                        </div>
                        <div class="card-body">
                            <form id="review-form" action="review_viewer.php" method="POST">
                                <div class="row g-3 mb-5">
                                  

                                    <div class="col-md-3">
                                        <label for="reviewer_name" class="form-label">Reviewer Name</label>
                                        <input type="text" class="form-control" id="reviewer_name" name="reviewer_name"
                                            placeholder="Enter Reviewer Name">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="designation_id" class="form-label">Designation ID</label>
                                        <input type="text" class="form-control" id="designation_id"
                                            name="designation_id" placeholder="Enter Designation ID">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="rating" class="form-label">Rating</label>
                                        <input type="number" class="form-control" id="rating" name="rating" min="0"
                                            max="5" placeholder="Enter Rating">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="review" class="form-label">Review</label>
                                        <textarea class="form-control" id="review" name="review" rows="3"
                                            placeholder="Enter Review"></textarea>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0" id="review-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Reviewer Name</th>
                                                <th scope="col">Designation ID</th>
                                                <th scope="col">Review</th>
                                                <th scope="col">Rating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>John Doe</td>
                                                <td>101</td>
                                                <td>Excellent service</td>
                                                <td>5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="alert-container mt-3"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->

                    <!-- Project Card -->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Project</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-proj" method="POST" enctype="multipart/form-data"
                                action="crud/profile/projects.php">
                                <div class="row g-3 mb-5">

                                    <!-- <div class="col-md-3">
                                <label for="user_id" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id"
                                    placeholder="Enter User ID" required>
                            </div> -->
                                    <div class="col-md-2 mb-3">
                                        <label for="project-category" class="form-label">Category</label>
                                        <select class="form-select" id="project-category" name="project-category"
                                            required>
                                            <option value="" selected disabled>-- Select Category --</option>
                                            <!-- <option value="">Web Development</option> -->
                                            <?php
                                            $select = "SELECT * FROM `categories`";
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

                                    <input type="text" class="form-control" id="custom-category" name="custom-category"
                                        placeholder="Enter category" style="display:none;">


                                    <div class="col-md-2">
                                        <label for="project-title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="project-title" name="project-title"
                                            placeholder="Enter Title" required>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="project-desc" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="project-desc" name="project-desc"
                                            placeholder="Enter Description" required>
                                    </div>
                                    <!-- 
                                    <div class="col-md-3">
                                        <label for="file_name" class="form-label">File Name</label>
                                        <input type="text" class="form-control" id="file_name" name="file_name"
                                            placeholder="Enter File Name" required>
                                    </div> -->

                                    <div class="col-md-3">
                                        <label for="file_name" class="form-label">Upload Image</label>
                                        <input type="file" class="form-control" id="file_name" name="file_name"
                                            accept="image/*" required>
                                    </div>
                                    <!-- <div class="col-md-3 d-flex flex-column justify-content-end">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div> -->
                                    <!-- <div class="col-md-3 d-flex align-items-end"  style="margin-top: 2.9rem;">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>   -->
                                    <div class="col-3" style="margin-top: 3rem;">
                                        <button type="button" class="btn btn-primary"
                                            onclick="addRowProject()">Update</button>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0" id="project-table">
                                        <!-- <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Category Name</th>

                                                <th scope="col">Title</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">File Name</th>
                                            </tr>
                                        </thead> -->
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="alert-container mt-3"></div>
                                <!-- <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" id="" name="" class="btn btn-primary">Update</button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                    <!-- Project card End -->

                    <!-- Extra Skills Card-->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Extra Skill</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-extra-skill" action="extra_skill_viewer.php" method="POST">
                                <div class="row g-3 mb-5">

                                    <!-- <div class="col-md-4">
                                <label for="user_id" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id"
                                    placeholder="Enter User ID" required>
                            </div> -->

                                    <!-- <div class="col-md-4">
                                        <label for="extra_skill_id" class="form-label">Extra Skill ID</label>
                                        <input type="text" class="form-control" id="extra_skill_id"
                                            name="extra_skill_id" placeholder="Enter Extra Skill ID" required>
                                    </div> -->
                                    <div class="col-md-3">
                                        <label for="extra-skill" class="form-label">Extra Skill ID</label>
                                        <select class="form-select" id="extra-skill" name="extra-skill" required>
                                            <option value="" selected disabled>-- Select Extra Skill --</option>
                                            <option value="">Git</option>
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
                                        <input type="hidden" id="extra-skill-id" name="extra_skill_id">
                                    </div>


                                    <div class="col-md-3" style="margin-top: 2.9rem;">
                                        <button type="button" class="btn btn-success"
                                            onclick="addRowExtraSkill()">Add</button>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0" id="extra-skill-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Extra Skill Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="alert-container mt-3"></div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" id="" name="" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Extra Skills Card end -->

                    <!-- Contact Card -->
                    <!-- <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">User Contacts</h5>
                        </div>
                        <div class="card-body">
                            <form id="contact-form" action="contact_viewer.php" method="POST">
                                <div class="row g-3 mb-5"> -->

                    <!-- <div class="col-md-4">
                                <label for="user_id" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id"
                                    placeholder="Enter User ID" required>
                            </div> -->

                    <!-- <div class="col-md-4">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter Email" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="phone_no" class="form-label">Phone No</label>
                                        <input type="text" class="form-control" id="phone_no" name="phone_no"
                                            placeholder="Enter Phone Number" required>
                                    </div>

                                    <div class="col-md-8">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="2"
                                            placeholder="Enter Message" required></textarea>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0" id="contact-table">
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
                                            <tr>
                                                <td>1</td>
                                                <td>John Doe</td>
                                                <td>john@example.com</td>
                                                <td>9876543210</td>
                                                <td>Hello, I want to know more.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="alert-container mt-3"></div>
                            </form>
                        </div>
                    </div> -->
                    <!-- Contact Card end -->

                    <!-- Plan Card -->

                    <div class="card mt-3 plan-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Plan</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-plan" method="POST">

                                <div class="row mb-5">
                                    <div class="col-md-3">
                                        <label for="plan-type" class="form-label">Plan Type ID</label>
                                        <select id="plan-type" class="form-select" aria-label="Plan Type Selection">
                                            <option value="" selected disabled>-- Select Plan Type --</option>
                                            <?php $select = "SELECT * FROM `plan_types`";
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
                                        <label for="plan-price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="plan-price" name="plan-price"
                                            min="0" step="1" placeholder="Enter Price">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="skill-types" class="form-label">Skill Type</label>
                                        <select id="skill-types" class="form-select" aria-label="Skill Type Selection">
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
                                        <select id="popularity-type" class="form-select"
                                            aria-label="Popularity Selection">
                                            <option value="" selected disabled>-- Select Popularity --</option>
                                            <?php
                                            for ($i = 0; $i <= 10; $i++) {
                                                ?>
                                                <option value=""><?= $i ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <button type="button" class="btn btn-success" id="addPlanButton"
                                            onclick="addRowPlan()">Add</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="table-responsive col-md-12">
                                        <table class="table mb-0" id="plan-table">
                                            <!-- <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Plan Type</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Skill Types</th>
                                                    <th scope="col">Popularity</th>
                                                </tr>
                                            </thead> -->
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="alert-container col-md-12"></div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" onclick="submitPlan()" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Plan Card end-->

                    <!-- Qualification Card -->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Qualification</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-qual" enctype="multipart/sform-data" method="POST">
                                <div class="row g-3 mb-5">

                                    <!-- <div class="col-md-4">
                                        <label for="qualification_id" class="form-label">Qualification ID</label>
                                        <input type="text" class="form-control" id="qualification_id"
                                            name="qualification_id" placeholder="Enter Qualification ID" required>
                                    </div> -->

                                    <div class="col-md-3">
                                        <label for="qualification" class="form-label">Qualification ID</label>
                                        <select class="form-select" id="qualification" name="qualification" required>
                                            <option value="" selected disabled>-- Select Qualification --</option>
                                            <?php $select = "SELECT * FROM `qualification_types`";
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

                                    <div class="col-md-4">
                                        <label for="start-date" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="start-date" name="start-date"
                                            required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="end-date" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="end-date" name="end-date" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="2"
                                            placeholder="Enter Description" required></textarea>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cert" class="form-label">Certification</label>
                                        <input type="text" class="form-control" id="cert" name="cert"
                                            placeholder="Enter Certification" required>
                                    </div>

                                    <!-- <div class="col-md-3">
                                        <label for="file_name" class="form-label">File Name</label>
                                        <input type="text" class="form-control" id="file_name" name="file_name"
                                            placeholder="Enter File Name" required>
                                    </div> -->
                                    <div class="col-md-3">
                                        <label for="file-name" class="form-label">Upload Image</label>
                                        <input type="file" class="form-control" id="file-name" name="file-name"
                                            accept="image/*" required>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" onclick="addRowQualification()"
                                            class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0" id="qualification-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Qualification ID</th>
                                                <th scope="col">Start Date</th>
                                                <th scope="col">End Date</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Certification</th>
                                                <th scope="col">File Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="alert-container mt-3"></div>
                                <!-- <div class="d-flex justify-content-end mt-4">
                                    <button type="button" onclick="submitQualifications()"
                                        class="btn btn-primary">Update</button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                    <!-- Qualification Card end  -->

                    <!-- Blog Posts card -->
                    <!-- <div class="card mt-3 skill-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">User Posts</h5>
                </div>
                <div class="card-body">
                    <form id="post-form" method="POST">
                        <div class="row g-3 mb-5">

                            <div class="col-3">
                                <label for="user_id" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id"
                                    placeholder="Enter User ID" required>
                            </div>

                            <div class="col-3">
                                <label for="post_title" class="form-label">Post Title</label>
                                <input type="text" class="form-control" id="post_title" name="post_title"
                                    placeholder="Enter Post Title" required>
                            </div>

                            <div class="col-3">
                                <label for="post_description" class="form-label">Post Description</label>
                                <input type="text" class="form-control" id="post_description" name="post_description"
                                    placeholder="Enter Post Description" required>
                            </div>

                            <div class="col-3">
                                <label for="post_content" class="form-label">Post Content</label>
                                <input type="text" class="form-control" id="post_content" name="post_content"
                                    placeholder="Enter Post Content" required>
                            </div>

                            <div class="col-3">
                                <label for="file_name" class="form-label">File Name</label>
                                <input type="text" class="form-control" id="file_name" name="file_name"
                                    placeholder="Enter File Name" required>
                            </div>

                            <div class="col-3 mt-4">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table mb-0" id="post-table">
                                <thead>
                                    <tr>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Post Title</th>
                                        <th scope="col">Post Description</th>
                                        <th scope="col">Post Content</th>
                                        <th scope="col">File Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Sample Post</td>
                                        <td>This is a test description</td>
                                        <td>This is some test content</td>
                                        <td>example.txt</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="alert-container mt-3"></div>
                    </form>
                </div>
            </div> -->
                    <!-- Blog Posts card end -->



                    <!-- Social Icons Card -->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Icon</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-icon" enctype="multipart/form-data" method="POST">
                                <div class="row g-3 mb-5">

                                    <!-- <div class="col-md-4">
                                <label for="user_id" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id"
                                    placeholder="Enter User ID" required>
                            </div> -->

                                    <!-- <div class="col-md-4">
                                        <label for="file_name" class="form-label">File Name</label>
                                        <input type="text" class="form-control" id="file_name" name="file_name"
                                            placeholder="Enter File Name" required>
                                    </div> -->
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
                                            <!-- <tr>
                                                <td>1</td>
                                                <td>twitter.png</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="alert-container mt-3"></div>
                                <!-- <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" id="" name=""
                                        class="btn btn-primary">Update</button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                    <!-- Social Icons Card end -->

                    <!-- Skills To Show Card -->
                    <div class="card mt-3 skill-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Skill List</h5>
                        </div>
                        <div class="card-body">
                            <form id="profile-list" method="POST">
                                <div class="row g-3 mb-5">

                                    <!-- <div class="col-md-4">
                                <label for="user_id" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id"
                                    placeholder="Enter User ID" required>
                            </div> -->
                                    <!-- 
                                    <div class="col-md-4">
                                        <label for="user_id" class="form-label">Skill List Id</label>
                                        <input type="text" class="form-control" id="user_id" name="user_id"
                                            placeholder="Enter Skill-List Id" required>
                                    </div>
                                     -->
                                    <div class=" col-3 mb-3">
                                        <label for="skill-list" class="form-label">Skill List</label>
                                        <select class="form-select" id="skill-list" name="skill-list" required>
                                            <option value="" selected disabled>-- Select Skill List --</option>
                                            <?php $select = "SELECT * FROM `skill_list_types`";
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

                                    <div class="col-3" style="margin-top: 2.9rem;">
                                        <button type="button" class="btn btn-success"
                                            onclick="addRowSkillList()">Add</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0" id="skill-list-table">
                                        <!-- <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Skill List ID</th>
                                            </tr>
                                        </thead> -->
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
                    </div>
                    <!-- Skill Card End-->

                    <!-- <div class="card mt-3 skill-card">
                         <div class="card-header">
                            <h5 class="card-title mb-0">User Icons</h5>
                        </div> -->
                    <!-- <div class="card-body">
                            <div class="mt-4 d-flex justify-content-end gap-2"> -->
                    <!-- <button type="button" class="btn btn-danger">Close</button> 
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div> -->

                    
                </div>
            </div>
            
             <?php
    require_once '../../includes/footer.php';
    ?>
</body>

</html>