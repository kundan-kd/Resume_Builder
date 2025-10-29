<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <!-- <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="../assets/images/logo-sm.png" alt="logo" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="../assets/images/logo-light.png" alt="logo" height="24">
                    </span>
                </a> -->
                <!-- <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="../assets/images/logo-sm.png" alt="logo" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="../assets/images/logo-dark.png" alt="logo" height="24">
                    </span>
                </a> -->
                <h3 class="mt-2" style="color: #6589a1;">Resume Builder</h3>
            </div>
            <ul id="side-menu" style="--bs-sidebar-item-hover: var(--bs-sidebar-item); 
    --bs-sidebar-item-active: var(--bs-sidebar-item);">
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
                                <a href="../master/user_qualifications.php" class="tp-link">Qualification Types</a>
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
                                <a href="user_profiles.php" class="tp-link">Profile</a>
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
                    <!-- <div class="collapse" id="logout">
                        <ul class="nav-second-level">
                            <li>
                                <a href="index" class="tp-link">Profiles</a>
                            </li>
                        </ul>
                    </div> -->




                    <!-- <a href="#plans" data-bs-toggle="collapse">
                            <i data-feather="home"></i>
                            <span> Plans </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="plans">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="" class="tp-link">Starter Price</a>
                                </li>
                                <li>
                                    <a href="analytics.html" class="tp-link">Hourly payment</a>
                                </li>
                                <li>
                                    <a href="ecommerce.html" class="tp-link">Full time</a>
                                </li>
                               
                            </ul>
                        </div>
                        

                       <a href="#languages" data-bs-toggle="collapse">
                            <i data-feather="home"></i>
                            <span> Languages </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="languages">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="" class="tp-link">Html</a>
                                </li>
                                <li>
                                    <a href="analytics.html" class="tp-link">Css</a>
                                </li>
                                <li>
                                    <a href="ecommerce.html" class="tp-link">Js</a>
                                </li>
                                <li>
                                    <a href="ecommerce.html" class="tp-link">Php</a>
                                </li>
                                <li>
                                    <a href="ecommerce.html" class="tp-link">Wordpress</a>
                                </li>
                               
                            </ul>
                        </div>

                        <a href="#programmingLanguages" data-bs-toggle="collapse">
                            <i data-feather="home"></i>
                            <span>Programming Languages</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="programmingLanguages">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="" class="tp-link">English</a>
                                </li>
                                <li>
                                    <a href="analytics.html" class="tp-link">French</a>
                                </li>
                                <li>
                                    <a href="ecommerce.html" class="tp-link">Spanish</a>
                                </li>
                               
                            </ul>
                        </div>

                        <a href="#additionalSkills" data-bs-toggle="collapse">
                            <i data-feather="home"></i>
                            <span> Additional Skills </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="additionalSkills">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="" class="tp-link">Bootstrap</a>
                                </li>
                                <li>
                                    <a href="analytics.html" class="tp-link">Materialize</a>
                                </li>
                                <li>
                                    <a href="ecommerce.html" class="tp-link">Stylus</a>
                                </li>
                                <li>
                                    <a href="" class="tp-link">Saas</a>
                                </li>
                                  <li>
                                    <a href="" class="tp-link">Less</a>
                                </li>
                                <li>
                                    <a href="" class="tp-link">Gulp</a>
                                </li>
                                 <li>
                                    <a href="" class="tp-link">Webpack</a>
                                </li>
                                 <li>
                                    <a href="" class="tp-link">Grunt</a>
                                </li>
                                 <li>
                                    <a href="" class="tp-link">Git  Knowledge</a>
                                </li>
                            </ul>
                        </div>

                        <a href="#qualifications" data-bs-toggle="collapse">
                            <i data-feather="home"></i>
                            <span> Qualifications</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="qualifications">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="" class="tp-link">10th</a>
                                </li>
                                <li>
                                    <a href="analytics.html" class="tp-link">12th</a>
                                </li>
                                 <li>
                                    <a href="ecommerce.html" class="tp-link">Bca</a>
                                </li>
                                <li>
                                    <a href="ecommerce.html" class="tp-link">Mca</a>
                                </li>
                                 <li>
                                    <a href="ecommerce.html" class="tp-link">Trainee</a>
                                </li>
                                 <li>
                                    <a href="ecommerce.html" class="tp-link">SDE3</a>
                                </li>
                                 <li>
                                    <a href="ecommerce.html" class="tp-link">SDE2</a>
                                </li>
                                 <li>
                                    <a href="ecommerce.html" class="tp-link">SDE2</a>
                                </li>
                            </ul>
                        </div>

                        <a href="#skillList" data-bs-toggle="collapse">
                            <i data-feather="home"></i>
                            <span>Skill List</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="skillList">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="" class="tp-link">10th</a>
                                </li>
                                <li>
                                    <a href="analytics.html" class="tp-link">Web Development</a>
                                </li>
                                 <li>
                                    <a href="ecommerce.html" class="tp-link">Logo design</a>
                                </li>
                                <li>
                                    <a href="ecommerce.html" class="tp-link">SEO optimization</a>
                                </li>
                                 <li>
                                    <a href="ecommerce.html" class="tp-link">Ui design</a>
                                </li>
                                 <li>
                                    <a href="ecommerce.html" class="tp-link">WordPress Integration</a>
                                </li>
                            </ul>
                        </div> -->

                </li>

                <!-- <li class="menu-title">Pages</li>

                    <li>
                        <a href="#sidebarAuth" data-bs-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Authentication </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarAuth">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="auth-login.html" class="tp-link">Log In</a>
                                </li>
                                <li>
                                    <a href="auth-register.html" class="tp-link">Register</a>
                                </li>
                                <li>
                                    <a href="auth-recoverpw.html" class="tp-link">Recover Password</a>
                                </li>
                                <li>
                                    <a href="auth-lock-screen.html" class="tp-link">Lock Screen</a>
                                </li>
                                <li>
                                    <a href="auth-confirm-mail.html" class="tp-link">Confirm Mail</a>
                                </li>
                                <li>
                                    <a href="email-verification.html" class="tp-link">Email Verification</a>
                                </li>
                                <li>
                                    <a href="auth-logout.html" class="tp-link">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarError" data-bs-toggle="collapse">
                            <i data-feather="alert-octagon"></i>
                            <span> Error Pages </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarError">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="error-404.html" class="tp-link">Error 404</a>
                                </li>
                                <li>
                                    <a href="error-500.html" class="tp-link">Error 500</a>
                                </li>
                                <li>
                                    <a href="error-503.html" class="tp-link">Error 503</a>
                                </li>
                                <li>
                                    <a href="error-429.html" class="tp-link">Error 429</a>
                                </li>
                                <li>
                                    <a href="offline-page.html" class="tp-link">Offline Page</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarExpages" data-bs-toggle="collapse">
                            <i data-feather="file-text"></i>
                            <span> Utility </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarExpages">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="pages-starter.html" class="tp-link">Starter</a>
                                </li>
                                <li>
                                    <a href="pages-profile.html" class="tp-link">Profile</a>
                                </li>
                                <li>
                                    <a href="pages-pricing.html" class="tp-link">Pricing</a>
                                </li>
                                <li>
                                    <a href="pages-timeline.html" class="tp-link">Timeline</a>
                                </li>
                                <li>
                                    <a href="pages-invoice.html" class="tp-link">Invoice</a>
                                </li>
                                <li>
                                    <a href="pages-faqs.html" class="tp-link">FAQs</a>
                                </li>
                                <li>
                                    <a href="pages-gallery.html" class="tp-link">Gallery</a>
                                </li>
                                <li>
                                    <a href="pages-maintenance.html" class="tp-link">Maintenance</a>
                                </li>
                                <li>
                                    <a href="pages-coming-soon.html" class="tp-link">Coming Soon</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-title mt-2">Apps</li>
        
                    <li>
                        <a href="apps-todolist.html" class="tp-link">
                            <i data-feather="columns"></i>
                            <span> Todo List </span>
                        </a>
                    </li>

                    <li>
                        <a href="apps-contacts.html" class="tp-link">
                            <i data-feather="map-pin"></i>
                            <span> Contacts </span>
                        </a>
                    </li>

                    <li>
                        <a href="apps-calendar.html" class="tp-link">
                            <i data-feather="calendar"></i>
                            <span> Calendar </span>
                        </a>
                    </li>

                    <li class="menu-title mt-2">General</li>
        
                    <li>
                        <a href="#sidebarBaseui" data-bs-toggle="collapse">
                            <i data-feather="package"></i>
                            <span> Components </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarBaseui">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="ui-accordions.html" class="tp-link">Accordions</a>
                                </li>
                                <li>
                                    <a href="ui-alerts.html" class="tp-link">Alerts</a>
                                </li>
                                <li>
                                    <a href="ui-badges.html" class="tp-link">Badges</a>
                                </li>
                                <li>
                                    <a href="ui-breadcrumb.html" class="tp-link">Breadcrumb</a>
                                </li>
                                <li>
                                    <a href="ui-buttons.html" class="tp-link">Buttons</a>
                                </li>
                                <li>
                                    <a href="ui-cards.html" class="tp-link">Cards</a>
                                </li>
                                <li>
                                    <a href="ui-collapse.html" class="tp-link">Collapse</a>
                                </li>
                                <li>
                                    <a href="ui-dropdowns.html" class="tp-link">Dropdowns</a>
                                </li>
                                <li>
                                    <a href="ui-video.html" class="tp-link">Embed Video</a>
                                </li>
                                <li>
                                    <a href="ui-grid.html" class="tp-link">Grid</a>
                                </li>
                                <li>
                                    <a href="ui-images.html" class="tp-link">Images</a>
                                </li>
                                <li>
                                    <a href="ui-list.html" class="tp-link">List Group</a>
                                </li>
                                <li>
                                    <a href="ui-modals.html" class="tp-link">Modals</a>
                                </li>
                                <li>
                                    <a href="ui-placeholders.html" class="tp-link">Placeholders</a>
                                </li>
                                <li>
                                    <a href="ui-pagination.html" class="tp-link">Pagination</a>
                                </li>
                                <li>
                                    <a href="ui-popovers.html" class="tp-link">Popovers</a>
                                </li>
                                <li>
                                    <a href="ui-progress.html" class="tp-link">Progress</a>
                                </li>
                                <li>
                                    <a href="ui-scrollspy.html" class="tp-link">Scrollspy</a>
                                </li>
                                <li>
                                    <a href="ui-spinners.html" class="tp-link">Spinners</a>
                                </li>
                                <li>
                                    <a href="ui-tabs.html" class="tp-link">Tabs</a>
                                </li>
                                <li>
                                    <a href="ui-tooltips.html" class="tp-link">Tooltips</a>
                                </li>
                                <li>
                                    <a href="ui-typography.html" class="tp-link">Typography</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="widgets.html" class="tp-link">
                            <i data-feather="aperture"></i>
                            <span> Widgets </span>
                        </a>
                    </li>

                    <li>
                        <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                            <i data-feather="cpu"></i>
                            <span> Extended UI </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarAdvancedUI">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="extended-carousel.html" class="tp-link">Carousel</a>
                                </li>
                                <li>
                                    <a href="extended-notifications.html" class="tp-link">Notifications</a>
                                </li>
                                <li>
                                    <a href="extended-offcanvas.html" class="tp-link">Offcanvas</a>
                                </li>
                                <li>
                                    <a href="extended-range-slider.html" class="tp-link">Range Slider</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarIcons" data-bs-toggle="collapse">
                            <i data-feather="award"></i>
                            <span> Icons </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarIcons">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="icons-feather.html" class="tp-link">Feather Icons</a>
                                </li>
                                <li>
                                    <a href="icons-mdi.html" class="tp-link">Material Design Icons</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarForms" data-bs-toggle="collapse">
                            <i data-feather="briefcase"></i>
                            <span> Forms </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarForms">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="forms-elements.html" class="tp-link">General Elements</a>
                                </li>
                                <li>
                                    <a href="forms-validation.html" class="tp-link">Validation</a>
                                </li>
                                <li>
                                    <a href="forms-quilljs.html" class="tp-link">Quilljs Editor</a>
                                </li>
                                <li>
                                    <a href="forms-pickers.html" class="tp-link">Picker</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarTables" data-bs-toggle="collapse">
                            <i data-feather="table"></i>
                            <span> Tables </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarTables">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="tables-basic.html" class="tp-link">Basic Tables</a>
                                </li>
                                <li>
                                    <a href="tables-datatables.html" class="tp-link">Data Tables</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarCharts" data-bs-toggle="collapse">
                            <i data-feather="pie-chart"></i>
                            <span> Apex Charts </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCharts">
                            <ul class="nav-second-level">
                                <li>
                                    <a href='charts-area.html' class="tp-link">Area</a>
                                </li>
                                <li>
                                    <a href='charts-bar.html' class="tp-link">Bar</a>
                                </li>
                                <li>
                                    <a href='charts-boxplot.html' class="tp-link">Boxplot</a>
                                </li>
                                <li>
                                    <a href='charts-bubble.html' class="tp-link">Bubble</a>
                                </li>
                                <li>
                                    <a href='charts-candlestick.html' class="tp-link">Candlestick</a>
                                </li>
                                <li>
                                    <a href='charts-column.html' class="tp-link">Column</a>
                                </li>
                                <li>
                                    <a href='charts-funnel.html' class="tp-link">Funnel</a>
                                </li>
                                <li>
                                    <a href='charts-heatmap.html' class="tp-link">Heatmap</a>
                                </li>
                                <li>
                                    <a href='charts-line.html' class="tp-link">Line</a>
                                </li>
                                <li>
                                    <a href='charts-mixed.html' class="tp-link">Mixed</a>
                                </li>
                                <li>
                                    <a href='charts-pie.html' class="tp-link">Pie</a>
                                </li>
                                <li>
                                    <a href='charts-polararea.html' class="tp-link">Polar</a>
                                </li>
                                <li>
                                    <a href='charts-radar.html' class="tp-link">Radar</a>
                                </li>
                                <li>
                                    <a href='charts-radialbar.html' class="tp-link">Radialbar</a>
                                </li>
                                <li>
                                    <a href='charts-rangearea.html' class="tp-link">Range Area</a>
                                </li>
                                <li>
                                    <a href='charts-scatter.html' class="tp-link">Scatter</a>
                                </li>
                                <li>
                                    <a href='charts-timeline.html' class="tp-link">Timeline</a>
                                </li>
                                <li>
                                    <a href='charts-treemap.html' class="tp-link">Treemap</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarMaps" data-bs-toggle="collapse">
                            <i data-feather="map"></i>
                            <span> Maps </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMaps">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="maps-google.html" class="tp-link">Google Maps</a>
                                </li>
                                <li>
                                    <a href="maps-vector.html" class="tp-link">Vector Maps</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul> -->

        </div>
        <!-- End Sidebar -->

        <!-- <div class="clearfix"></div> -->

    </div>
</div>