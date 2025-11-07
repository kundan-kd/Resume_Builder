<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <h3 class="mt-2" style="color: #6589a1;">Resume Builder</h3>
            </div>
            <ul id="side-menu" style="--bs-sidebar-item-hover: var(--bs-sidebar-item);  --bs-sidebar-item-active: var(--bs-sidebar-item);">
                <!-- <li class="menu-title">Menu</li> -->
                <li>
                    <a href="#categories" data-bs-toggle="collapse">
                        <i data-feather="home"></i>
                        <span> Master </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="categories">
                        <ul class="nav-second-level">
                            <li>
                                <a href="../master/user_categories.php" class="tp-link">Categories</a>
                            </li>
                            <li>
                                <a href="../master/user_designations.php" class="tp-link">Designation Types</a>
                            </li>
                            <li>
                                <a href="../master/user_plans.php" class="tp-link">Plan Types</a>
                            </li>
                            <li>
                                <a href="../master/user_programming_skills.php" class="tp-link">Programing Skill Types</a>
                            </li>
                            <li>
                                <a href="../master/user_langs.php" class="tp-link">Language Types</a>
                            </li>
                             <li>
                                <a href="../master/user_extra_skills.php" class="tp-link">Extra Skill Types</a>
                            </li>
                            <li>
                                <a href="../master/user_qualifications.php" class="tp-link">Education Types</a>
                            </li>
                            <li>
                                <a href="../master/user_skill_lists.php" class="tp-link">Skill List Types</a>
                            </li>
                        </ul>
                    </div>

                    <a href="#users" data-bs-toggle="collapse">
                        <i data-feather="home"></i>
                        <span> Resume </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav-second-level">
                            <li>
                                <a href="registered_users.php" class="tp-link">Users</a>
                            </li>
                        </ul>
                    </div>

                    <a href="#profiles" data-bs-toggle="collapse">
                        <i data-feather="home"></i>
                        <span>My Profiles</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="profiles">
                        <ul class="nav-second-level">
                            <li>
                                <!-- <a href="#" class="tp-link">Profile</a> -->
                                <a href="../master/user_profiles.php" class="tp-link">Profile</a>
                            </li>
                            <li>
                                <!-- <a href="#" class="tp-link">Contacts</a> -->
                                <!-- <a href="user_contacts.php" class="tp-link">Contacts</a> -->
                            </li>
                        </ul>
                    </div>

                    <a  onclick="logout()">
                        <i data-feather="home"></i>
                        <span>Logout</span>
                        <!-- <span class="menu-arrow"></span> -->
                    </a>
                   
                     <li>
                                <a data-bs-toggle="modal" data-bs-target="#resumeLink">Publish</a>
                            </li>
             

        </div>
        <!-- End Sidebar -->

        <!-- <div class="clearfix"></div> -->
              
    </div>
</div>


   <div class="modal fade" id="resumeLink" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header" style="padding:9px 9px;">
          <h5 class="modal-title categoryTitle">Resume link</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
      
          <div class="modal-body">
            <!-- <label for="resumeLink" class="mb-2 text-primary">http://localhost/resume_builder/index.php?token=9a97eec5ec234a8d8ba8fd03deba967c1</label> -->
                <a target="_blank" href="http://localhost/resume_builder/index.php?token=9a97eec5ec234a8d8ba8fd03deba967c1">http://localhost/resume_builder/index.php?token=9a97eec5ec234a8d8ba8fd03deba967c1</a>
          </div>
       

      </div>
    </div>
  </div>