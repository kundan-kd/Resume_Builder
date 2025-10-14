<?php
session_start();
require_once('admin/includes/connection.php');

// ✅ Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    die('User not logged in.');
}

$user_id = 1; //intval($_SESSION['user_id']); // Sanitize user ID

// ✅ Fetch user registration details
$select_user = "SELECT * FROM `user_registrations` WHERE `id` = $user_id";
$user_data = mysqli_fetch_assoc(mysqli_query($conn, $select_user));

// ✅ Fetch profile details
$select_profile = "SELECT `residence`, `city`, `dob`, `file_name` FROM `user_profiles` WHERE `user_id` = $user_id";
$profile_data = mysqli_fetch_assoc(mysqli_query($conn, $select_profile));

// ✅ Utility function to check if user data exists in a table
function itExists($tableName, $conn, $user_id)
{
    $select = "SELECT COUNT(1) AS count FROM `$tableName` WHERE `user_id` = $user_id";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($result);
    return $row['count'] > 0;
}
?>

<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- color of address bar in mobile browser -->
  <meta name="theme-color" content="#2B2B35">
  <!-- favicon  -->
  <link rel="shortcut icon" href="assets/img/thumbnail.ico" type="image/x-icon">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="assets//css/plugins/bootstrap.min.css">
  <!-- font awesome css -->
  <link rel="stylesheet" href="assets/css/plugins/font-awesome.min.css">
  <!-- swiper css -->
  <link rel="stylesheet" href="assets/css/plugins/swiper.min.css">
  <!-- fancybox css -->
  <link rel="stylesheet" href="assets/css/plugins/fancybox.min.css">
  <!-- main css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/custom.css">

  <title><?php echo $GLOBALS['fname']; ?> onepage</title>
</head>

<body>

  <!-- app -->
  <div class="art-app art-app-onepage">

    <!-- mobile top bar -->
    <div class="art-mobile-top-bar"></div>

    <!-- app wrapper -->
    <div class="art-app-wrapper">

      <!-- app container end -->
      <div class="art-app-container">

        <!-- info bar -->
        <div class="art-info-bar">

          <!-- menu bar frame -->
          <div class="art-info-bar-frame">

            <!-- info bar header -->
            <div class="art-info-bar-header">
              <!-- info bar button -->
              <a class="art-info-bar-btn" href="#.">
                <!-- icon -->
                <i class="fas fa-ellipsis-v"></i>
              </a>
              <!-- info bar button end -->
            </div>
            <!-- info bar header end -->

            <!-- info bar header -->
            <div class="art-header">
              <!-- avatar -->
              <div class="art-avatar">
                <a data-fancybox="avatar" href="admin/assets/images/profile_pics/<?php echo $user_pic['file_name']; ?>"
                  class="art-avatar-curtain">
                  <img src="admin/assets/images/profile_pics/<?php echo $user_pic['file_name']; ?>" alt="avatar">
                  <i class="fas fa-expand"></i>
                </a>
                <!-- available -->
                <div class="art-lamp-light">
                  <!-- add class 'art-not-available' if not available-->
                  <div class="art-available-lamp"></div>
                </div>
              </div>
              <!-- avatar end -->
              <?php
              // $select1 = "SELECT * FROM `user_registrations` WHERE `id` = "" ";
              // $result = mysqli_query($conn, $select1);
              // $row = mysqli_fetch_assoc($result);
              
              // $row['first_name'] . $row['last_name'];
              
              ?>
              <!-- name -->

              <h5 class="art-name mb-10"><?php echo $user_global['first_name'] . ' ' . $user_global['last_name']; ?>
              </h5>
              <!-- post -->
              <?php
              $select_designation_types = "SELECT `designation_id` FROM `user_profiles` WHERE `user_id` = " . $GLOBALS['id'] . " ";
              $result_designation = mysqli_query($conn, $select_designation_types);

              if (mysqli_num_rows($result_designation) > 0) {
                $row_designation = mysqli_fetch_assoc($result_designation);
                $designations = explode(',', str_replace("'", "", $row_designation['designation_id']));
                //$desg_arr = [];

                for ($i = 0; $i < count($designations); $i++) {
                  $select_designation_name = "SELECT `name` FROM `designation_types` WHERE `id` = " . $designations[$i] . " ";
                  $row_desgn_name = mysqli_fetch_assoc(mysqli_query($conn, $select_designation_name));

                  //array_push($desg_arr, $row_desgn_name['name']);
              
              ?>
              <div class="art-sm-text"><?php echo $row_desgn_name['name'].' ,'.'<br>'; ?></div>
              <!-- <div class="art-sm-text">Front-end Developer <br>Ui/UX Designer, </div> -->
            <?php
                }
              }
            ?>
            </div>
            <!-- info bar header end -->

            <!-- scroll frame -->
            <div id="scrollbar2" class="art-scroll-frame">

              <!-- info bar about -->
              <div class="art-table p-15-15">
                <!-- about text -->
                <ul>
                  <!-- country -->
                  <li>
                    <h6>Residence:</h6><span><?php echo $user_profile['residence'] ?></span>
                  </li>
                  <!-- city -->
                  <li>
                    <h6>City:</h6><span><?php echo $user_profile['city']; ?></span>
                  </li>
                  <!-- age -->
                  <li>
                    <h6>Age:</h6><span><?php echo $user_profile['dob']; ?></span>
                  </li>
                </ul>
              </div>
              <!-- info bar about end -->

              <!-- divider -->
              <div class="art-ls-divider"></div>

              <!-- Language skills -->
              <div class="art-lang-skills p-30-15">


                <?php

                // $check = "SELECT * FROM `user_languages` WHERE `user_id` = ".$GLOBALS['id']." ";
                if (itExists('user_languages', $conn)) {
                  $select_lang = "SELECT `language_id`, `user_efficiency` FROM `user_languages` WHERE `user_id` = '" . $GLOBALS['id'] . "' ";
                  $result_lang = mysqli_query($conn, $select_lang);

                  while ($row_lang = mysqli_fetch_assoc($result_lang)) {
                    $select_lang_name = "SELECT `name` FROM `language_types` WHERE `id` = '" . $row_lang['language_id'] . "'";
                    $row_lang_name = mysqli_fetch_assoc(mysqli_query($conn, query: $select_lang_name));
                    ?>

                    <div class="art-lang-skills-item">
                      <div id="circleprog1" class="art-cirkle-progress" style="position: relative;"></div>
                      <h6><?php echo $row_lang_name['name']; ?></h6>
                    </div>

                    <?php
                  }
                }


                ?>

                <!-- skill -->
                <!-- <div class="art-lang-skills-item">
                    <div id="circleprog2" class="art-cirkle-progress"></div> -->
                <!-- title -->
                <!-- <h6>English</h6>
                  </div> -->
                <!-- skill end -->

                <!-- skill -->
                <!-- <div class="art-lang-skills-item">
                    <div id="circleprog3" class="art-cirkle-progress"></div> -->
                <!-- title -->
                <!-- <h6>Spanish</h6>
                  </div> -->
                <!-- skill end -->

              </div>

              <!-- Language skills end -->

              <!-- divider -->
              <div class="art-ls-divider"></div>

              <!-- Programming skills -->
              <?php
              // $select1 = "SELECT * FROM `user_programming_languages` WHERE `id` = '$uid'";
              // $result = mysqli_query($conn,$select1);
              // if(mysqli_num_rows($result) > 0){
              //     while ($row1 = myssqli_fetch_assoc($result)) { 
              //         $select2 = "SELECT `name` FROM `programming_skill_types` WHERE `id` = "$row['programming_language_id']" ";
              //         $row2 = mysqli_fetch_assoc(mysqli_query($conn, $select2));
              //         echo $row2['name'];
              //         
              //     }
              // }
              // echo $row1['user_efficiency'];
              // else{
              //    //insert code here
              // }
              
              ?>
              <div class="art-hard-skills p-30-15">
                <?php
                $select1 = "SELECT * FROM `user_programming_languages` WHERE `user_id` = 9";
                $result = mysqli_query($conn, $select1);
                if (mysqli_num_rows($result) > 0) {
                  while ($row1 = mysqli_fetch_assoc($result)) {
                    $select2 = "SELECT `name` FROM `programming_skill_types` WHERE `id` = " . $row1['programming_language_id'] . " ";
                    $row2 = mysqli_fetch_assoc(mysqli_query($conn, $select2));
                    ?>

                    <!-- skill -->
                    <div class="art-hard-skills-item">
                      <div class="art-skill-heading">
                        <!-- title -->
                        <h6><?php echo $row2['name']; ?></h6>
                      </div>
                      <!-- progressbar frame -->
                      <div class="art-line-progress">
                        <!-- progressbar -->
                        <div id="lineprog1"></div>
                      </div>
                      <!-- progressbar frame end -->
                    </div>
                    <!-- skill end -->
                    <?php
                  }
                }
                ?>


              </div>
              <!-- Programming skills end -->

              <!-- divider -->
              <div class="art-ls-divider"></div>

              <!-- knowledge list -->
             
              <ul class="art-knowledge-list p-15-0">
                <!-- list item -->
                 <?php
                  $select_sk = "SELECT 1 FROM `user_skills_to_show` WHERE `user_id` = ".$GLOBALS['id']." ";
                  $result_sk = mysqli_query($conn, $select_sk);
                  if(mysqli_num_rows($result_sk) > 0){
                    $select_skills = "SELECT  `skill_list_id` FROM `user_skills_to_show` WHERE `user_id` = ".$GLOBALS['id']." ";
                    $result_skills = mysqli_query($conn, $select_skills);

                    while($row_skills = mysqli_fetch_assoc($result_skills)){
                      $select_skill_type = "SELECT `name` FROM  `extra_skill_types` WHERE `id` = ".$row_skills['skill_list_id']." ";
                      $row_skill_type = mysqli_fetch_assoc(mysqli_query($conn, $select_skill_type));

                 ?>
                  <li> <?php echo $row_skill_type['name'];  ?></li>
              <?php
                    }
                  }
              ?>
              </ul>
              <!-- knowledge list end -->

              <!-- divider -->
              <div class="art-ls-divider"></div>

              <!-- links frame -->
              <div class="art-links-frame p-15-15">

                <!-- download cv button -->
                <a href="files/cv.txt" class="art-link" download>Download cv <i class="fas fa-download"></i></a>

              </div>
              <!-- links frame end -->

            </div>
            <!-- scroll frame end -->

            <!-- sidebar social -->
            <div class="art-ls-social">
              <?php
              $select_icon = "SELECT * FROM `user_social_icons` WHERE `user_id` = " . $GLOBALS['id'] . " ";
              $result_icon = mysqli_query($conn, $select_icon);
              if (mysqli_num_rows($result_icon) > 0) {
                //echo $GLOBALS['id'];
                while ($row_icon = mysqli_fetch_assoc($result_icon)) {
                  ?>
                  <a href="<?php echo $row_icon['url']; ?>" target="_blank">
                    <img src="<?php echo "admin/assets/images/sm_icons/" . $row_icon['filename']; ?>" alt="nothing"
                      width="15" height="15">
                  </a>
                  <?php
                }
              }
              ?>
            </div>
            <!-- sidebar social end -->

          </div>
          <!-- menu bar frame end -->

        </div>
        <!-- info bar end -->

        <!-- content -->
        <div class="art-content">

          <!-- curtain -->
          <div class="art-curtain"></div>

          <!-- top background -->
          <div class="art-top-bg" style="background-image: url(assets/img/bg.jpg)">
            <!-- overlay -->
            <div class="art-top-bg-overlay"></div>
            <!-- overlay end -->
          </div>
          <!-- top background end -->

          <!-- swup container -->
          <div class="transition-fade" id="swup">

            <!-- scroll frame -->
            <div id="scrollbar" class="art-scroll-frame">

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row p-60-0 p-lg-30-0 p-md-15-0">
                  <!-- col -->
                  <div class="col-lg-12">
                    <?php
                    $select_prof = "SELECT * FROM `user_profiles` WHERE `user_id` = " . $user_global['id'] . " ";
                    $result = mysqli_query($conn, $select_prof);
                    $user_profile = mysqli_fetch_assoc($result);
                    $user_services = [];
                    $check_service = "SELECT `name` FROM `user_services` WHERE `user_id` =  " . $user_global['id'] . " ";
                    $result_service = mysqli_query($conn, $check_service);
                    if (mysqli_num_rows($result_service) > 0) {
                      while ($row_service = mysqli_fetch_assoc($result_service)) {
                        array_push($user_services, ($row_service['name']));
                      }
                    }
                    // $row = $result->fetch_assoc();
                    // echo $row['experience'];
                    // echo $row['projects_completed'];
                    // echo $row['customer_count'];
                    // echo $row['award_count'];
                    ?>

                    <!-- banner -->
                    <div class="art-a art-banner" style="background-image: url(assets/img/bg.jpg)">
                      <!-- banner back -->
                      <div class="art-banner-back"></div>
                      <!-- banner dec -->
                      <div class="art-banner-dec"></div>
                      <!-- banner overlay -->
                      <div class="art-banner-overlay">
                        <!-- main title -->
                        <div class="art-banner-title">
                          <!-- title -->
                          <h1 class="mb-15"><?php echo $user_profile['punchline']; ?></h1>
                          <!-- suptitle -->
                          <div class="art-lg-text art-code mb-25">&lt;<i>code</i>&gt; I build <span class="txt-rotate"
                              data-period="2000"
                              data-rotate='<?php echo json_encode($user_services); //foreach($user_services as $us){ echo $us . ' ';} ?>'></span>&lt;/<i>code</i>&gt;
                          </div>
                          <div class="art-buttons-frame">
                            <!-- button -->
                            <a href="#." class="art-btn art-btn-md"><span>Explore now</span></a>
                            <!-- button -->
                            <a href="#." class="art-link art-white-link art-w-chevron">Hire me</a>
                          </div>
                        </div>
                        <!-- main title end -->
                        <!-- photo -->
                        <img src="assets/img/face-2.png" class="art-banner-photo" alt="Your Name">
                      </div>
                      <!-- banner overlay end -->
                    </div>
                    <!-- banner end -->

                  </div>
                  <!-- col end -->
                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid"> <!-- Experience and Projects -->

                <!-- row -->
                <div class="row p-30-0">

                  <!-- col -->
                  <div class="col-md-3 col-6">


                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter"><?php echo $user_profile['experience']; ?></span><span
                          class="art-counter-plus">+</span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Years Experience</h6>
                    </div>
                    <!-- couner frame end -->
                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter"><?php echo $user_profile['projects_completed']; ?></span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Completed Projects</h6>
                    </div>
                    <!-- couner frame end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter"><?php echo $user_profile['customer_count']; ?></span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Happy Customers</h6>
                    </div>
                    <!-- couner frame end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter"><?php echo $user_profile['award_count']; ?></span><span
                          class="art-counter-plus">+</span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Honors and Awards</h6>
                    </div>
                    <!-- couner frame end -->

                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row">

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>My Services</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                  </div>
                  <!-- col end -->

                  <?php
                  if (itExists('user_services', $conn)) {
                    $select_service = "SELECT `name`, `description` FROM `user_services` WHERE `user_id` = " . $GLOBALS['id'] . " ";
                    $result_service = mysqli_query($conn, $select_service);

                    while ($row_user_service = mysqli_fetch_assoc($result_service)) {
                        

                   ?>


                      <!-- col -->
                      <div class="col-lg-4 col-md-6">

                        <!-- service -->
                        <div class="art-a art-service-icon-box">
                          <!-- service content -->
                          <div class="art-service-ib-content">
                            <!-- title -->
                            <h5 class="mb-15"><?php echo $row_user_service['name']; ?></h5>
                            <!-- text -->
                            <div class="mb-15"><?php echo $row_user_service['description']; ?></div>
                            <!-- button -->
                            <div class="art-buttons-frame"><a href="#." class="art-link art-color-link art-w-chevron">Order
                                now</a></div>
                          </div>
                          <!-- service content end -->
                        </div>
                        <!-- service end -->

                      </div>
                      <?php
                    }
                  }
                  ?>
                  <!-- col end -->

                  <!-- col -->

                  <!-- col end -->

                  <!-- col -->

                  <!-- col end -->

                  <!-- col -->

                  <!-- col end -->

                  <!-- col -->


                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row p-0-0">

                  <!-- col -->
                  <div class="col-lg-12">

                    <?php
                    // $select1 = "SELECT * FROM `user_plan_prices` WHERE `user_id` = "" ";
                    // $result = mysqli_query($conn, $result);
                    
                    // while ($row1 = mysql_fetch_assoc($result)){
                    //   $select2 = "SELECT * FROM `plan_types` WHERE `id` = "$row1['plan_type_id']" ";
                    //   $row2 = mysqli_fetch_assoc(mysqli_query($conn, $select2));
                    //   echo $row2['name'];
                    
                    //   $select3 = "SELECT * FROM `plan_types` WHERE `id` = "$row1['skill_types']" ";
                    //   $row3 = mysqli_fetch_assoc(mysqli_query($conn, $select3));
                    //   echo $row3['name'];
                    //   echo $row1['popularity'];
                    // }
                    ?>

                    <?php
                    // $select = "SELECT * FROM `user_reviews` WHERE `user_id` = ".." ";
                    // $result = mysqli_query($conn, $select);
                    // while($row1= mysqli_fetch_assoc($result)){
                    //     echo $row1['name'];
                    //     echo $row2['review'];
                    //     echo $row2['rating'];
                    // }
                    
                    ?>

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Price Plans</h4> <!-- Plan  -->
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <?php
                  if (itExists('user_plan_prices', $conn)) {
                    //echo $user_global['id'];
                    $select_plan = "SELECT * FROM `user_plan_prices` WHERE `user_id` = 62 ";
                    $result_plan = mysqli_query($conn, $select_plan);

                    while ($row_plan = mysqli_fetch_assoc($result_plan)) {
                      $select_plan_type = "SELECT `name` FROM `plan_types` WHERE `id` = '" . $row_plan['plan_type_id'] . "'";
                      $row_plan_type = mysqli_fetch_assoc(mysqli_query($conn, $select_plan_type));

                      $select_skill_type = "SELECT `name` FROM `programming_skill_types` WHERE `id`= '" . $row_plan['skill_types'] . "' ";
                      $row_skill_type = mysqli_fetch_assoc(mysqli_query($conn, $select_skill_type));

                      $planTypeName = $row_plan_type['name'];
                      $skillTypeName = $row_skill_type['name'];
                      ?>

                      <div class="col-lg-4">

                        <!-- price -->
                        <div class="art-a art-price">
                          <!-- price body -->
                          <div class="art-price-body">
                            <h5 class="mb-30"><?php echo $planTypeName; ?></h5>
                            <!-- price cost -->
                            <div class="art-price-cost">
                              <div class="art-number"><?php echo $row_plan['price']; ?><sup>*</sup></div>
                            </div>
                            <!-- price cost end -->
                            <!-- price list -->
                            <ul class="art-price-list">
                              <!-- list item -->
                              <li>Ui Design</li>
                              <!-- list item -->
                              <li>Web Development</li>
                              <!-- list item -->
                              <li class="art-empty-item">Logo design</li>
                              <!-- list item -->
                              <li class="art-empty-item">SEO optimization</li>
                              <!-- list item -->
                              <li class="art-empty-item">Wordpress integration</li>
                            </ul>
                            <!-- price list end -->
                            <!-- button -->
                            <a href="#." class="art-link art-color-link art-w-chevron">Order now</a>
                            <div class="art-asterisk"><sup>*</sup>Free only when ordering paid services</div>
                          </div>
                          <!-- price body end -->
                        </div>
                        <!-- price end -->

                      </div>
                      <?php
                    }
                  }

                  ?>

                  <!-- grid -->

                  <!-- col -->

                  <!-- col end -->

                  <!-- col -->

                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row">

                  <!-- col -->
                  <!-- <div class="col-lg-12">

                    <div class="art-section-title">
                      <div class="art-title-frame">
                        <h4>Recommendations</h4>
                      </div>
                    </div>
                  </div> -->
                  <!-- col end -->
                  <!--  Review col -->
                  <!-- Review col end -->
                  <!-- col -->
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- Project row -->
                <div class="row p-30-0">
                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Works</h4>
                      </div>
                      <!-- title frame end -->
                      <!-- right frame -->
                      <div class="art-right-frame">
                        <!-- filter -->
                        <div class="art-filter"> <!-- Categories -->
                          <!-- <a href="#" data-filter="*" class="art-link art-current">All Categories</a> -->
                          <?php
                          $check = "SELECT * FROM `user_projects` WHERE `user_id` = ".$GLOBALS['id']." ";
                          $result = mysqli_query($conn, $check);
                          if (mysqli_num_rows($result) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result)) {
                              $select = "SELECT * FROM `categories` WHERE `id` = " . $row1['category_id'] . "  ";
                              $row2 = mysqli_fetch_assoc(mysqli_query($conn, $select));
                              ?>
                              <!-- <a href="#" data-filter="" class="art-link"><?php // echo $row2['name']; ?></a> -->

                              <!-- <a href="#" data-filter=".webTemplates" class="art-link">Web Templates</a>
                          <a href="#" data-filter=".logos" class="art-link">Logos</a>
                          <a href="#" data-filter=".drawings" class="art-link">Drawings</a> -->


                              <!-- <a href="#" data-filter=".ui" class="art-link">UI Elements</a> -->
                              <?php
                            }
                          }
                          ?>
                        </div>
                        <!-- filter end -->
                      </div>
                      <!-- right frame end -->
                    </div>
                    <!-- section title end -->

                  </div>
                  <!-- col end -->

                  <div class="art-grid art-grid-3-col art-gallery">

                    <?php
                    $select_project = "SELECT `file_name`, `category_id`, `title`, `description` FROM `user_projects` WHERE `user_id` = 62 ";
                    $result_project = mysqli_query($conn, $select_project);

                    while ($row_project = mysqli_fetch_assoc($result_project)) {
                      // $source = 'admin/assets/images/project_headers/' . $row_project['file_name'];
                      // $dest = 'assets/img/works/user_projects/';
                      // if (!copy($source, $dest)){
                      //     echo "Failed to render";
                      // }
                      $select_catgeory = "SELECT * FROM `categories` WHERE `id` = " . $row_project['category_id'] . "";
                      $row_category = mysqli_fetch_assoc(mysqli_query($conn, $select_catgeory));
                      ?>
                      <div class="art-grid-item <?php echo $row_category['name']; ?>">
                        <!-- grid item frame -->
                        <a data-fancybox="gallery"
                          href="admin/assets/images/project_headers/<?php echo $row_project['file_name']; ?>"
                          class="art-a art-portfolio-item-frame art-horizontal">

                          <!-- img -->
                          <img src="admin/assets/images/project_headers/<?php echo $row_project['file_name']; ?>"
                            alt="item">
                          <!-- zoom icon -->
                          <span class="art-item-hover"><i class="fas fa-expand"></i></span>
                        </a>
                        <!-- grid item frame end -->
                        <!-- description -->
                        <div class="art-item-description">
                          <!-- title -->
                          <h5 class="mb-15"><?php echo $row_project['title']; ?></h5>
                          <!-- button -->
                          <a href="#."
                            class="art-link art-color-link art-w-chevron"><?php echo $row_project['description']; ?></a>
                        </div>
                        <!-- description end -->
                      </div>
                      <?php
                    }
                    ?>

                  </div>

                </div>
                <!-- Project row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid"> <!-- Work and Education -->

                <!-- row -->
                <div class="row">

                  <!-- col -->
                  <div class="col-lg-6">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Education</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->
                    <?php
                    $select1 = "SELECT * FROM `user_qualification_details` WHERE `user_id` =   " . $user_global['id'] . "   ";
                    $result = mysqli_query($conn, $select1);
                    if (mysqli_num_rows($result) > 0) {
                      while ($row1 = $result->fetch_assoc()) {
                        if ($row1['type'] == 'edu') {
                          $select2 = "SELECT * FROM `qualification_types` WHERE `id` = " . $row1['qualification_id'] . " ";
                          $row2 = mysqli_fetch_assoc(mysqli_query($conn, $select2));
                          // echo $row2['start_date'];
                          // echo $row2['end_date'];
                          // echo $row2['description'];
                          // echo $row2['certification'];
                    
                          ?>

                          <!-- Education timeline -->
                          <div class="art-timeline art-gallery" id="history">

                            <div class="art-timeline-item">
                              <div class="art-timeline-mark-light"></div>
                              <div class="art-timeline-mark"></div>

                              <div class="art-a art-timeline-content">
                                <div class="art-card-header">
                                  <div class="art-left-side">
                                    <h5><?php echo $row2['name']; ?></h5>
                                    <div class="art-el-suptitle mb-15">
                                      <?php echo $user_global['first_name'] . ' ' . $user_global['last_name']; ?>
                                    </div>
                                  </div>
                                  <div class="art-right-side">
                                    <span class="art-date"><?php echo $row1['start_date'] . ' ' . $row1['end_date']; ?></span>
                                  </div>
                                </div>

                                <p><?php echo $row1['description']; ?></p>
                                <a data-fancybox="diplome" href="files/certificate.jpg"
                                  class="art-link art-color-link art-w-chevron"><?php echo $row1['certification']; ?></a>
                              </div>
                            </div>

                            <?php
                        }
                      }
                    }

                    ?>



                    </div>
                    <!-- timeline end -->

                  </div>
                  <div class="col-lg-6">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Work History</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->
                    <?php
                    if (itExists('user_qualification_details', $conn)) {
                      //$select_work = "SELECT `us` FROM `user_qualification_details` WHERE `user_id` = ".$GLOBALS['id']."";
                      $select_work = "SELECT `qualification_id`, `type`, `start_date`, `end_date`, `description`, `certification`
                          FROM `user_qualification_details` 
                          WHERE `user_id` = " . $GLOBALS['id'] . "";
                      $result_work = mysqli_query($conn, $select_work);

                      while ($row_work = mysqli_fetch_assoc($result_work)) {
                        if ($row_work['type'] == 'job') {
                          $select_qual_name = "SELECT `name` FROM `qualification_types` WHERE `id` = " . $row_work['qualification_id'] . " ";
                          $row_qual_name = mysqli_fetch_assoc(mysqli_query($conn, $select_qual_name));
                          ?>

                          <!-- timeline -->
                          <div class="art-timeline">

                            <div class="art-timeline-item">
                              <div class="art-timeline-mark-light"></div>
                              <div class="art-timeline-mark"></div>


                              <div class="art-a art-timeline-content">
                                <div class="art-card-header">
                                  <div class="art-left-side">
                                    <h5><?php echo $row_qual_name['name']; ?></h5>
                                    <div class="art-el-suptitle mb-15">
                                      <?php echo $user_global['first_name'] . ' ', $user_global['last_name']; ?>
                                    </div>
                                  </div>
                                  <div class="art-right-side">
                                    <span
                                      class="art-date"><?php echo $row_work['start_date'] . ' ' . $row_work['end_date']; ?></span>
                                  </div>
                                </div>
                                <p><?php echo $row_work['description']; ?></p>
                              </div>
                            </div>
                            <?php
                        }
                      }
                    }
                    ?>

                    </div>
                    <!-- timeline end -->

                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- (Blog Post) container -->

              <!-- (Blog Post) container end -->

              <!-- container -->
              <div class="container-fluid">
                <?php
                // $select1 = "SELECT * FROM `user_registrations` WHERE `id` = "" ";
                // $result = mysqli_query($conn, $select1);
                // $row1 = mysqli_fetch_assoc($result);
                // echo $row1['country'];
                // echo $row1['street'];
                // echo $row1['email'];
                // echo $row1['telegram'];
                // echo $row1['skype'];
                // echo $row1['personal_no'];
                // echo $row1['support_no'];
                // echo $row1['office_no'];
                // $select2 = "SELECT `city`, `residence` FROM `user_profiles` WHERE `id` = ""  ";
                // $result = mysqli_query($conn, $select2); 
                // $row2 = mysqli_fetch_assoc($result);
                // echo $row2['city'];
                // echo $row2['residence'];
                ?>

                <!-- row -->
                <div class="row p-30-0">

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Contact information</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                  </div>
                  <!-- col end -->
                  <!-- col -->
                  <div class="col-lg-4">
                    <!-- contact card -->
                    <div class="art-a art-card">
                      <div class="art-table p-15-15">
                        <ul>
                          <li>
                            <h6>Country:</h6><span><?php echo $user_global['country']; ?></span>
                          </li>
                          <li>
                            <h6>City:</h6><span>Toronto</span>
                          </li>

                          <li>
                            <h6>Streat:</h6><span><?php echo $user_global['street']; ?></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- contact card end -->
                  </div>
                  <!-- col end -->
                  <!-- col -->
                  <div class="col-lg-4">
                    <!-- contact card -->
                    <div class="art-a art-card">
                      <div class="art-table p-15-15">
                        <ul>
                          <li>
                            <h6>Email:</h6><span><?php echo $user_global['email']; ?></span>
                          </li>
                          <li>
                            <h6>Telegram:</h6><span><?php echo $user_global['telegram']; ?></span>
                          </li>
                          <li>
                            <h6>Skype:</h6><span><?php echo $user_global['skype']; ?> </span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- contact card end -->
                  </div>
                  <!-- col end -->
                  <!-- col -->
                  <div class="col-lg-4">
                    <!-- contact card -->
                    <div class="art-a art-card">
                      <div class="art-table p-15-15">
                        <ul>
                          <li>
                            <h6>Support service:</h6><span><?php echo $user_global['support_no']; ?></span>
                          </li>
                          <li>
                            <h6>Office:</h6><span><?php echo $user_global['office_no']; ?></span>
                          </li>
                          <li>
                            <h6>Personal:</h6><span><?php echo $user_global['personal_no']; ?> </span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- contact card end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Get in touch</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                    <!-- contact form frame -->
                    <div class="art-a art-card">

                      <!-- contact form -->
                      <form id="form" class="user-contact-form">
                        <!-- form field -->
                        <input type="hidden" id="user_id" value="62"></input>
                        <div class="art-form-field">
                          <!-- name input -->
                          <input id="customer_name" name="customer_name" class="art-input" type="text"
                            placeholder="Name" required>
                          <!-- label -->
                          <label for="cutomer_name"><i class="fas fa-user"></i></label>
                        </div>
                        <!-- form field end -->
                        <!-- form field -->
                        <div class="art-form-field">
                          <!-- email input -->
                          <input id="customer_email" name="customer_email" class="art-input" type="email"
                            placeholder="Email" required>
                          <!-- label -->
                          <label for="customer_email"><i class="fas fa-at"></i></label>
                        </div>
                        <div class="art-form-field">
                          <input id="customer_no" name="customer_no" class="art-input" type="number"
                            placeholder="Number">
                          <label for="customer_no"><i class="fas fa-user"></i></label>
                        </div>
                        <!-- form field end -->
                        <!-- form field -->
                        <div class="art-form-field">
                          <!-- message textarea -->
                          <textarea id="customer_message" name="text" class="art-input" placeholder="Message"
                            required></textarea>
                          <!-- label -->
                          <label for="customer_message"><i class="far fa-envelope"></i></label>
                        </div>
                        <!-- form field end -->
                        <!-- button -->
                        <div class="art-submit-frame">
                          <button class="art-btn art-btn-md art-submit" type="button"
                            onclick="submitContactForm()"><span>Send message</span></button>
                          <!-- success -->
                          <div class="art-success">Success <i class="fas fa-check"></i></div>
                        </div>
                      </form>
                      <!-- contact form end -->

                    </div>
                    <!-- contact form frame end -->

                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row">

                  <!-- col -->
                  <div class="col-6 col-lg-3">
                    <!-- brand -->
                    <img class="art-brand" src="assets/img/brands/1.png" alt="brand">
                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-6 col-lg-3">
                    <!-- brand -->
                    <img class="art-brand" src="assets/img/brands/2.png" alt="brand">
                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-6 col-lg-3">
                    <!-- brand -->
                    <img class="art-brand" src="assets/img/brands/3.png" alt="brand">
                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-6 col-lg-3">
                    <!-- brand -->
                    <img class="art-brand" src="assets/img/brands/1.png" alt="brand">
                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- footer -->
                <footer>
                  <!-- copyright -->
                  <div>© <?php echo date('Y') . ' ' . $user_global['first_name'] . ' ' . $user_global['last_name']; ?>
                  </div>
                  <!-- author ( Please! Do not delete it. You are awesome! :) -->
                  <div>Template author:&#160; <a href="https://themeforest.net/user/millerdigitaldesign"
                      target="_blank">Nazar Miller</a></div>
                </footer>
                <!-- footer end -->

              </div>
              <!-- container end -->

            </div>
            <!-- scroll frame end -->

          </div>
          <!-- swup container end -->

        </div>
        <!-- content end -->

      </div>
      <!-- app container end -->

    </div>
    <!-- app wrapper end -->

    <!-- preloader -->
    <!-- <div class="art-preloader"> -->
    <!-- preloader content -->
    <!-- <div class="art-preloader-content"> -->
    <!-- title -->
    <!-- <h4>Artur Carter</h4> -->
    <!-- progressbar -->
    <!-- <div id="preloader" class="art-preloader-load"></div> -->
    <!-- </div> -->
    <!-- preloader content end -->
    <!-- </div> -->
    <!-- preloader end -->

  </div>
  <!-- app end -->
  <div id="swupMenu"></div>

  <!-- jquery js -->
  <script src="assets/js/plugins/jquery.min.js"></script>
  <!-- anime js -->
  <script src="assets/js/plugins/anime.min.js"></script>
  <!-- swiper js -->
  <script src="assets/js/plugins/swiper.min.js"></script>
  <!-- progressbar js -->
  <script src="assets/js/plugins/progressbar.min.js"></script>
  <!-- smooth scrollbar js -->
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- overscroll js -->
  <script src="assets/js/plugins/overscroll.min.js"></script>
  <!-- typing js -->
  <script src="assets/js/plugins/typing.min.js"></script>
  <!-- isotope js -->
  <script src="assets/js/plugins/isotope.min.js"></script>
  <!-- fancybox js -->
  <script src="assets/js/plugins/fancybox.min.js"></script>
  <!-- swup js -->
  <script src="assets/js/plugins/swup.min.js"></script>
  <!-- main js -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>