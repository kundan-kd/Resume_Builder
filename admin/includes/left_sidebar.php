<div class="app-sidebar-menu">
  <div class="h-100" data-simplebar>
    <!-- Sidebar -->
    <div id="sidebar-menu">

      <!-- Logo -->
      <div class="logo-box">
        <h3 class="mt-2" style="color: #6589a1;">Resume Builder</h3>
      </div>

      <!-- Menu -->
      <ul id="side-menu">
        <li><a href="../home/dashboard.php" class="tp-link">Dashboard</a></li>
        <!-- Master Section -->
        <li>
          <a href="#categories" data-bs-toggle="collapse">
            <i data-feather="settings"></i>
            <span>Master</span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="categories">
            <ul class="nav-second-level">
              <li><a href="../master/user_categories.php" class="tp-link">Categories</a></li>
              <li><a href="../master/user_designations.php" class="tp-link">Designation Types</a></li>
              <li><a href="../master/user_plans.php" class="tp-link">Plan Types</a></li>
              <li><a href="../master/user_programming_skills.php" class="tp-link">Programming Skill Types</a></li>
              <li><a href="../master/user_langs.php" class="tp-link">Language Types</a></li>
              <li><a href="../master/user_extra_skills.php" class="tp-link">Extra Skill Types</a></li>
              <li><a href="../master/user_qualifications.php" class="tp-link">Education Types</a></li>
              <li><a href="../master/user_skill_lists.php" class="tp-link">Skill List Types</a></li>
            </ul>
          </div>
        </li>

        <!-- Resume Section -->
        <li>
          <a href="#users" data-bs-toggle="collapse">
            <i data-feather="users"></i>
            <span>Resume</span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="users">
            <ul class="nav-second-level">
              <li><a href="registered_users.php" class="tp-link">Users</a></li>
            </ul>
          </div>
        </li>

        <!-- My Profiles Section -->
        <li>
          <a href="#profiles" data-bs-toggle="collapse">
            <i data-feather="user"></i>
            <span>My Profiles</span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="profiles">
            <ul class="nav-second-level">
              <li><a href="../master/user_profiles.php" class="tp-link">Profile</a></li>
              <!-- Future: Contacts -->
            </ul>
          </div>
        </li>

        <!-- Logout -->
        <li>
          <a onclick="logout()" style="cursor: pointer;">
            <i data-feather="log-out"></i>
            <span>Logout</span>
          </a>
        </li>

        <!-- Publish -->
        <li>
            <a data-bs-toggle="modal" data-bs-target="#resumeLink" style="cursor: pointer;">
                <i data-feather="upload"></i>
                <span>Publish</span>
            </a>
            </li>


      </ul>
    </div>
    <!-- End Sidebar -->
  </div>
</div>

<!-- Resume Link Modal -->
<div class="modal fade" id="resumeLink" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header" style="padding:9px 9px;">
        <h5 class="modal-title categoryTitle">Resume link</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <a target="_blank" href="http://localhost/resume_builder/index.php?token=9a97eec5ec234a8d8ba8fd03deba967c1">
          http://localhost/resume_builder/index.php?token=9a97eec5ec234a8d8ba8fd03deba967c1
        </a>
      </div>

    </div>
  </div>
</div>