        
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="fal fa-bars font-24"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="dashboard" class="logo">
                            
                            <!-- Logo text -->
                            <span class="logo-text ml-2">
                                <!-- dark Logo text -->
                                <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="assets/images/logo-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="fal fa-bars font-20"></i>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fal fa-ellipsis-v-alt font-20"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
						
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/akun.png" alt="user" class="rounded-circle" width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block"><?php echo $login['nama']; ?> <i class="fal fa-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="assets/images/akun.png" alt="user" class="rounded-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php echo $login['nama']; ?></h4>
                                        <p class=" m-b-0"><?php echo $login['username']; ?></p>
                                    </div>
                                </div>
                                <div class="profile-dis scrollable">
                                    <!-- <a class="dropdown-item" href="user/account">
                                        <i class="fal fa-cog m-r-5 m-l-5"></i> Account Setting
                                    </a> -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="user/logout">
                                        <i class="fal fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="p-15 m-t-20">
                            <a href="sales/new" class="btn btn-block btn-danger create-btn text-white no-block align-items-center">
                                <i class="fal fa-plus"></i> <span class="hide-menu m-l-5">PESANAN BARU</span>
                            </a>
                        </li>
                        
                        <li class="nav-small-cap">
                            <i class="fal fa-ellipsis-h"></i>
                            <span class="hide-menu">DASHBOARD</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard" aria-expanded="false">
                                <i class="fal fa-tachometer-alt"></i><span class="hide-menu">DASHBOARD</span></a></li>
                        
                        <li class="sidebar-item"> 
                          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="fal fa-receipt"></i>
                            <span class="hide-menu">SALES</span>
                          </a>
                          <ul aria-expanded="false" class="collapse first-level">
                              <li class="sidebar-item">
                                <a href="sales/new" class="sidebar-link">
                                  <i class="fal fa-minus"></i>
                                  <span class="hide-menu"> PESANAN BARU</span>
                                </a>
                              </li>
                              <li class="sidebar-item">
                                <a href="sales" class="sidebar-link">
                                  <i class="fal fa-minus"></i>
                                  <span class="hide-menu"> REKAP PESANAN</span>
                                </a>
                              </li>
                          </ul>
                        </li>
                        
                        <li class="sidebar-item">
                          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="fal fa-user-friends"></i>
                            <span class="hide-menu">CUSTOMERS</span>
                          </a>
                          <ul aria-expanded="false" class="collapse first-level">
                              <li class="sidebar-item">
                                <a href="customer" class="sidebar-link">
                                  <i class="fal fa-minus"></i>
                                  <span class="hide-menu"> SEMUA CUSTOMER</span>
                                </a>
                              </li>
                              
                          </ul>
                        </li>
                        <?php if($login['role'] == 'superadmin') { ?>
                          <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                              <i class="fal fa-key"></i>
                              <span class="hide-menu">USER</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                  <a href="user/new" class="sidebar-link">
                                    <i class="fal fa-minus"></i>
                                    <span class="hide-menu"> TAMBAH USER</span>
                                  </a>
                                </li>
                                <li class="sidebar-item">
                                  <a href="user" class="sidebar-link">
                                    <i class="fal fa-minus"></i>
                                    <span class="hide-menu"> MANAGE USER</span>
                                  </a>
                                </li>
                              </ul>
                          </li>
                        <?php } ?>
                        <li class="sidebar-item">
                          <a class="sidebar-link waves-effect waves-dark" href="user/logout" aria-expanded="false">
                            <i class="fal fa-power-off"></i>
                            <span class="hide-menu">LOGOUT</span>
                          </a>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>