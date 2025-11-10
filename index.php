<?php
require_once 'admin/includes/header.php';

$row = null;

// Check if user is logged in via session
if (!empty($_SESSION['user_email'])) {
    $email = mysqli_real_escape_string($conn, $_SESSION['user_email']);
    $query = "SELECT * FROM `user_registrations` WHERE `email` = '$email'";
} 
// If not logged in, check for token in URL
elseif (!empty($_GET['token'])) {
    $token = mysqli_real_escape_string($conn, $_GET['token']);
    $query = "SELECT * FROM `user_registrations` WHERE `token` = '$token'";
} 
// If neither session nor token is available
else {
    echo "Access denied: No session or token provided.";
    exit;
}

// Execute query if set
if (isset($query)) {
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No user found.";
        exit;
    }
}

// Now you can use $row for further processing
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
  <link rel="shortcut icon" href="img/thumbnail.ico" type="image/x-icon">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/plugins/bootstrap.min.css">
  <!-- font awesome css -->
  <link rel="stylesheet" href="css/plugins/font-awesome.min.css">
  <!-- swiper css -->
  <link rel="stylesheet" href="css/plugins/swiper.min.css">
  <!-- fancybox css -->
  <link rel="stylesheet" href="css/plugins/fancybox.min.css">
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css">

  <title>Resume</title>
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
                <a data-fancybox="avatar" href="admin/uploads/profile/<?php echo $row['profile_image']?>" class="art-avatar-curtain">
                  <img src="admin/uploads/profile/<?php echo $row['profile_image']?>" alt="avatar">
                  <i class="fas fa-expand"></i>
                </a>
                <!-- available -->
                <div class="art-lamp-light">
                  <!-- add class 'art-not-available' if not available-->
                  <div class="art-available-lamp"></div>
                </div>
              </div>
              <!-- avatar end -->
              <!-- name -->
              <h5 class="art-name mb-10"><?= $row['first_name']?> <?= $row['last_name']?></h5>
              <!-- post -->
              <div class="art-sm-text"><?= $row['designation']?></div>
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
                    <h6>Residence:</h6><span><?= $row['address']?></span>
                  </li>
                  <!-- city -->
                  <li>
                    <h6>City:</h6><span><?= $row['city']?></span>
                  </li>
                  <!-- age -->
                  <li>
                    <h6>Age:</h6><span>26</span>
                  </li>
                </ul>
              </div>
              <!-- info bar about end -->

              <!-- divider -->
              <div class="art-ls-divider"></div>

              <!-- language skills -->
              <div class="art-lang-skills p-30-15">

                <!-- skill -->  
                 <?php 
                 $counter = 1;
                 $query = "SELECT language_id,user_efficiency FROM user_languages WHERE user_id = $row[id]";
                 $result = mysqli_query($conn,$query);
                 if($result && mysqli_num_rows($result) > 0){
                  while($language = mysqli_fetch_assoc($result)){
                    $language_id = $language['language_id'];
                    $efficiency = $language['user_efficiency']; // Assuming this is a value between 0 and 100
                    $language_name = getdatafromtable($conn,"language_types","name","id = $language_id");

                    ?>
        
                <div class="art-lang-skills-item">
                  <div id="circleprog<?php echo $counter;?>" class="art-cirkle-progress" data-efficiency="<?php echo $efficiency;?>"></div>
                  <!-- title -->
                  <h6><?=$language_name?></h6>
                </div>
                  <?php
                  $counter++;
                  }
                 }
                 ?>
                <!-- skill end -->


              </div>
              <!-- language skills end -->

              <!-- divider -->
              <div class="art-ls-divider"></div>

              <!-- hard skills -->
              <div class="art-hard-skills p-30-15">

                <!-- skill -->

                <?php 
                 $counter = 1;
                 $query = "SELECT programming_language_id,user_efficiency FROM user_programming_languages WHERE user_id = $row[id]";
                 $result = mysqli_query($conn,$query);
                 if($result && mysqli_num_rows($result) > 0){
                  while($language = mysqli_fetch_assoc($result)){
                    $language_id = $language['programming_language_id'];
                    $efficiency = $language['user_efficiency']; // Assuming this is a value between 0 and 100
                    $language_name = getdatafromtable($conn,"programming_skill_types","name","id = $language_id");

                    ?>
        
                <div class="art-hard-skills-item">
                  <div class="art-skill-heading">
                    <!-- title -->
                    <h6><?php echo $language_name;?></h6>
                  </div>
                  <!-- progressbar frame -->
                  <div class="art-line-progress" data-efficiency="<?php echo $efficiency;?>">
                    <!-- progressbar -->
                    <div id="lineprog<?php echo $counter;?>"></div>
                  </div>
                  <!-- progressbar frame end -->
                </div>
                  <?php
                  $counter++;
                  }
                 }
                 ?>

                <!-- skill end -->

              </div>
              <!-- language skills end -->

              <!-- divider -->
              <div class="art-ls-divider"></div>

              <!-- knowledge list -->
              <ul class="art-knowledge-list p-15-0">
                <?php 
                  $query = "SELECT * FROM user_extra_skills WHERE user_id =$row[id]";
                  $result = mysqli_query($conn,$query);
                  if($result && mysqli_num_rows($result) > 0){
                    while($extraSkill = mysqli_fetch_assoc($result)){
                      $id = $extraSkill['skill_list_id'];
                      $extarName = getdatafromtable($conn,"extra_skill_types","name","id=$id");
                      ?>

                     
                <!-- list item -->
                <li><?=$extarName?></li>
                 <?php
                    }
                  }
                ?>
              </ul>
              <!-- knowledge list end -->

              <!-- divider -->
            
              <!-- links frame end -->

            </div>
            <!-- scroll frame end -->

            <!-- sidebar social -->
            <div class="art-ls-social">
              <!-- social link -->
              <a href="#." target="_blank"><i class="far fa-circle"></i></a>
              <!-- social link -->
              <a href="#." target="_blank"><i class="far fa-circle"></i></a>
              <!-- social link -->
              <a href="#." target="_blank"><i class="far fa-circle"></i></a>
              <!-- social link -->
              <a href="#." target="_blank"><i class="far fa-circle"></i></a>
              <!-- social link -->
              <a href="#." target="_blank"><i class="far fa-circle"></i></a>
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
          <div class="art-top-bg" style="background-image: url(img/bg.jpg)">
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

                    <!-- banner -->
                    <div class="art-a art-banner" style="background-image: url(img/bg.jpg)">
                      <!-- banner back -->
                      <div class="art-banner-back"></div>
                      <!-- banner dec -->
                      <div class="art-banner-dec"></div>
                      <!-- banner overlay -->
                      <div class="art-banner-overlay">
                        <!-- main title -->
                        <div class="art-banner-title">
                          <!-- title -->
                          <h1 class="mb-15"><?=$row['punchline']?></h1>
                          <!-- suptitle -->
                          <div class="art-lg-text art-code mb-25">&lt;<i>code</i>&gt; I build <span class="txt-rotate" data-period="2000"
                              data-rotate='[ "web interfaces.", "ios and android applications.", "design mocups.", "automation tools." ]'></span>&lt;/<i>code</i>&gt;</div>
                          <div class="art-buttons-frame">
                            <!-- button -->
                            <a href="#." class="art-btn art-btn-md"><span>Explore now</span></a>
                            <!-- button -->
                            <a href="#." class="art-link art-white-link art-w-chevron">Hire me</a>
                          </div>
                        </div>
                        <!-- main title end -->
                        <!-- photo -->
                        <img src="img/face-2.png" class="art-banner-photo" alt="Your Name">
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
              <div class="container-fluid">

                <!-- row -->
                <div class="row p-30-0">

                  <!-- col -->
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter"><?=$row['experience']?></span><span class="art-counter-plus">+</span>
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
                        <span class="art-counter"><?=$row['project']?></span>
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
                        <span class="art-counter"><?=$row['customer_count']?></span>
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
                        <span class="art-counter"><?=$row['award_count']?></span><span class="art-counter-plus">+</span>
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

                  <!-- col -->
                   <?php
                   $query = "SELECT name,description FROM user_services WHERE user_id = $row[id]"; 
                   $result = mysqli_query($conn,$query);
                   if($result && mysqli_num_rows($result) > 0){
                     while($data = mysqli_fetch_assoc($result)){
                      ?>
                         <div class="col-lg-4 col-md-6">

                    <!-- service -->
                    <div class="art-a art-service-icon-box">
                      <!-- service content -->
                      <div class="art-service-ib-content">
                       
                        <!-- title -->
                        <h5 class="mb-15"><?=$data['name']?></h5>
                        <!-- text -->
                        <div class="mb-15"><?=$data['description']?></div>
                        <!-- button -->
                        <div class="art-buttons-frame"><a href="#." class="art-link art-color-link art-w-chevron">Order now</a></div>
                      </div>
                      <!-- service content end -->
                    </div>
                    <!-- service end -->

                  </div>
                      <?php
                     }
                   }
                   ?>
               
                  

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->
              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
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
                        <div class="art-filter">
                          <!-- filter link -->
                          <a href="#" data-filter="*" class="art-link art-current">All Categories</a>
                          <!-- filter link -->
                          <!-- <a href="#" data-filter=".webTemplates" class="art-link">Web Templates</a>
                          <a href="#" data-filter=".logos" class="art-link">Logos</a>
                          <a href="#" data-filter=".drawings" class="art-link">Drawings</a>
                          <a href="#" data-filter=".ui" class="art-link">UI Elements</a> -->
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
                  $query = "SELECT title,file_name, description FROM user_projects WHERE user_id = $row[id]";
                  $result = mysqli_query($conn, $query);
                  if ($result && mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                      $imagePath = htmlspecialchars($data['file_name']);
                      $title = htmlspecialchars($data['title']);
                      $description = htmlspecialchars($data['description']);
                  ?>
                    <!-- grid item -->
                    <div class="art-grid-item webTemplates">
                      <!-- grid item frame -->
                      <a data-fancybox="gallery" href="admin/uploads/projects/<?= $imagePath ?>" class="art-a art-portfolio-item-frame art-horizontal">
                        <!-- img -->
                        <img src="admin/uploads/projects/<?= $imagePath ?>" alt="Project Image">
                        <!-- zoom icon -->
                        <span class="art-item-hover"><i class="fas fa-expand"></i></span>
                      </a>
                      <!-- grid item frame end -->
                      <!-- description -->
                      <div class="art-item-description">
                        <!-- title -->
                        <h5 class="mb-15"><?= $title ?></h5>
                        <h6 class="mb-15"><?= $description ?></h6>
                        <!-- button -->
                        <a href="#." class="art-link art-color-link art-w-chevron">Read more</a>
                      </div>
                      <!-- description end -->
                    </div>
                    <!-- grid item end -->
                  <?php
                    }
                  }
                  ?>
                  </div>

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

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

                    <!-- timeline -->
                    <div class="art-timeline art-gallery" id="history">
                      <?php 
                        $query = "SELECT  * FROM user_qualification_details WHERE user_id = $row[id] && qualification_type = 'Education'";
                        $result = mysqli_query($conn,$query);
                        if ($result && mysqli_num_rows($result) > 0) {
                          while ($qualification = mysqli_fetch_assoc($result)) {
                         $q_name = getdatafromtable($conn, "education_types", "name", "id = {$qualification['education_id']}");

                      ?>
                      <div class="art-timeline-item">
                        <div class="art-timeline-mark-light"></div>
                        <div class="art-timeline-mark"></div>

                        <div class="art-a art-timeline-content">
                          <div class="art-card-header">
                            <div class="art-left-side">
                              <h5><?=$q_name;?></h5>
                              <div class="art-el-suptitle mb-15"><?=$qualification['qualification_title'];?></div>
                            </div>
                            <div class="art-right-side">
                              <span class="art-date"><?=$qualification['start_date']?> - <?=$qualification['end_date']?></span>
                            </div>
                          </div>
 

                          <p><?=$qualification['description'];?></p>
                          <!-- <a data-fancybox="diplome" href="files/certificate.jpg" class="art-link art-color-link art-w-chevron">Diplome</a> -->
                        </div>
                      </div>
                      <?php }}?>
                  
                  

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

                    <!-- timeline -->
                    <div class="art-timeline">
                      <?php 
                        $query = "SELECT  * FROM user_qualification_details WHERE user_id = $row[id] && qualification_type = 'Work'";
                        $result = mysqli_query($conn,$query);
                        if ($result && mysqli_num_rows($result) > 0) {
                          while ($qualification = mysqli_fetch_assoc($result)) {
                        // $q_name = getdatafromtable($conn, "qualification_types", "name", "id = {$qualification['qualification_id']}");

                      ?>
                      <div class="art-timeline-item">
                        <div class="art-timeline-mark-light"></div>
                        <div class="art-timeline-mark"></div>


                        <div class="art-a art-timeline-content">
                          <div class="art-card-header">
                            <div class="art-left-side">
                              <h5><?=$qualification['qualification_title']?></h5>
                              <div class="art-el-suptitle mb-15">Template author</div>
                            </div>
                            <div class="art-right-side">
                              <span class="art-date"><?=$qualification['start_date']?> - <?=$qualification['end_date']?></span>
                            </div>
                          </div>
                          <p><?=$qualification['description'];?></p>
                        </div>
                      </div>
                    <?php }}?>
                   

                    


                    </div>
                    <!-- timeline end -->

                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->
              <!-- container -->
              <div class="container-fluid">

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
                            <h6>Country:</h6><span><?=$row['country']?></span>
                          </li>
                          <li>
                            <h6>City:</h6><span><?=$row['city']?></span>
                          </li>

                          <li>
                            <h6>Streat:</h6><span><?=$row['address']?></span>
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
                            <h6>Email:</h6><span><?=$row['email']?></span>
                          </li>
                          <li>
                            <h6>Telegram:</h6><span><?=$row['telegram']?></span>
                          </li>
                          <li>
                            <h6>Skype:</h6><span><?=$row['skype']?></span>
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
                            <h6>Support service:</h6><span><?=$row['support_no']?></span>
                          </li>
                          <li>
                            <h6>Office:</h6><span><?=$row['office_no']?></span>
                          </li>
                          <li>
                            <h6>Personal:</h6><span><?=$row['personal_no']?></span>
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
                      <form id="form_contact" class="art-contact-form">
                        <!-- form field -->
                        <div class="art-form-field">
                          <!-- name input -->
                          <input id="contact_name" name="name" class="art-input" type="text" placeholder="Name" required>
                          <!-- label -->
                          <label for="name"><i class="fas fa-user"></i></label>
                        </div>
                        <!-- form field end -->
                        <!-- form field -->
                        <div class="art-form-field">
                          <!-- email input -->
                          <input id="contact_email" name="email" class="art-input" type="email" placeholder="Email" required>
                          <!-- label -->
                          <label for="email"><i class="fas fa-at"></i></label>
                        </div>
                        <!-- form field end -->
                        <!-- form field -->
                        <div class="art-form-field">
                          <!-- message textarea -->
                          <textarea id="contact_message" name="text" class="art-input" placeholder="Message" required></textarea>
                          <!-- label -->
                          <label for="message"><i class="far fa-envelope"></i></label>
                        </div>
                        <!-- form field end -->
                        <!-- button -->
                        <div class="art-submit-frame">
                          <button class="art-btn art-btn-md art-submit" type="submit"><span>Send message</span></button>
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
                    <img class="art-brand" src="img/brands/1.png" alt="brand">
                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-6 col-lg-3">
                    <!-- brand -->
                    <img class="art-brand" src="img/brands/2.png" alt="brand">
                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-6 col-lg-3">
                    <!-- brand -->
                    <img class="art-brand" src="img/brands/3.png" alt="brand">
                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-6 col-lg-3">
                    <!-- brand -->
                    <img class="art-brand" src="img/brands/1.png" alt="brand">
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
                  <div>© 2025 Knack Media</div>
                  <!-- author ( Please! Do not delete it. You are awesome! :) -->
                  <div>Template author:&#160; <a href="#" target="_blank">Knack Media</a></div>
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
    <div class="art-preloader">
      <!-- preloader content -->
      <div class="art-preloader-content">
        <!-- title -->
        <h4>Resume Builder</h4>
        <!-- progressbar -->
        <div id="preloader" class="art-preloader-load"></div>
      </div>
      <!-- preloader content end -->
    </div>
    <!-- preloader end -->

  </div>
  <!-- app end -->
  <div id="swupMenu"></div>

  <!-- jquery js -->
  <script src="js/plugins/jquery.min.js"></script>
  <!-- anime js -->
  <script src="js/plugins/anime.min.js"></script>
  <!-- swiper js -->
  <script src="js/plugins/swiper.min.js"></script>
  <!-- progressbar js -->
  <script src="js/plugins/progressbar.min.js"></script>
  <!-- smooth scrollbar js -->
  <script src="js/plugins/smooth-scrollbar.min.js"></script>
  <!-- overscroll js -->
  <script src="js/plugins/overscroll.min.js"></script>
  <!-- typing js -->
  <script src="js/plugins/typing.min.js"></script>
  <!-- isotope js -->
  <script src="js/plugins/isotope.min.js"></script>
  <!-- fancybox js -->
  <script src="js/plugins/fancybox.min.js"></script>
  <!-- swup js -->
  <script src="js/plugins/swup.min.js"></script>

  <!-- main js -->
  <script src="js/main.js"></script>

  <script>


          // progressbars
//  var bar = new ProgressBar.Circle(circleprog1, {
//     strokeWidth: 7,
//     easing: 'easeInOut',
//     duration: 1400,
//     delay: 2500,
//     trailWidth: 7,
//     step: function(state, circle) {
//       var value = Math.round(circle.value() * 10);
//       if (value === 0) {
//         circle.setText('');
//       } else {
//         circle.setText(value);
//       }
//     }
//   });
//   bar.animate(1);



document.addEventListener("DOMContentLoaded", function () {
  const circles = document.querySelectorAll(".art-cirkle-progress");

  circles.forEach((circle) => {
    if (!(circle instanceof HTMLElement)) return;

    const efficiency = parseInt(circle.getAttribute("data-efficiency")) || 0;
    const normalizedValue = efficiency / 100;

    const bar = new ProgressBar.Circle(circle, {
      strokeWidth: 7,
      easing: 'easeInOut',
      duration: 1400,
      trailWidth: 7,
      text: {
        value: '',
        className: 'progress-text',
        style: {
          color: '#ffffffff',
          position: 'absolute',
          left: '50%',
          top: '50%',
          padding: 0,
          margin: 0,
          transform: 'translate(-50%, -50%)'
        }
      },
      step: function (state, circle) {
        const value = Math.round(circle.value() * 100);
        circle.setText(value > 0 ? value + "%" : '');
      }
    });

    bar.animate(normalizedValue);
  });

  // Line Progress Bars
  const lines = document.querySelectorAll(".art-line-progress");

  lines.forEach((line) => {
    if (!(line instanceof HTMLElement)) return;

    const efficiency = parseInt(line.getAttribute("data-efficiency")) || 0;
    const normalizedValue = efficiency / 100;

    const bar = new ProgressBar.Line(line, {
      strokeWidth: 1.72,
      easing: 'easeInOut',
      duration: 1400,
      delay: 2800,
      trailWidth: 1.72,
      svgStyle: {
        width: '100%',
        height: '100%'
      },
      text: {
        value: '',
        className: 'progress-text',
        style: {
          color: '#ffffffff',
          position: 'absolute',
          right: '0',
          top: '50%',
          transform: 'translateY(-50%)',
          padding: 0,
          margin: 0
        }
      },
      step: (state, bar) => {
        const value = Math.round(bar.value() * 100);
        bar.setText(value + ' %');
      }
    });

    bar.animate(normalizedValue);
  });
});



$('#form_contact').on('submit', function(e) {
  e.preventDefault();

  let name = $('#contact_name').val();
  let email = $('#contact_email').val();
  let message = $('#contact_message').val();
  let id = <?php echo json_encode($row['id']); ?>; // safer output

  $.ajax({
    url: "action.php",
    type: "POST",
    data: {
      id: id,
      contactName: name,
      email: email,
      message: message
    },
     dataType: "json", // jQuery will parse response automatically
    success: function(response) {
      if (response.success) {
        $('#form_contact')[0].reset();
        alert(response.success);
      } else if (response.error_success) {
        alert(response.error_success);
      } else {
        alert('Something went wrong!');
      }
    },
    error: function(xhr, status, error) {
      console.error('AJAX error:', error);
      alert('Server error. Please try again later.');
    }
  });
});

  </script>

</body>

</html>
