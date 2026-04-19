<div class='container_load' id="loader">
  <div class='loader'>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--text'></div>
  </div>
</div>

<div class="layout-wrapper layout-content-navbar" id="content">
    <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.php" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <img src="images/logo-2.png" style="width: 25px;" alt="">
                    </span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2" style="font-size: 17.5px;">ระบบลงทะเบียนกิจกรรม</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- index -->
                <li class="menu-item" id="menu-index">
                    <a href="index.php" class="menu-link">
                        <i class="menu-icon fa-solid fa-house"></i>
                        <div data-i18n="Analytics">หน้าหลัก</div>
                    </a>
                </li>

                <li class="menu-item" id="menu-activities">
                    <a href="activities.php" class="menu-link">
                        <i class="menu-icon fa-solid fa-list-check"></i>
                        <div data-i18n="Analytics">รายชื่อชุมนุมที่เปิดสอน</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.php#news" class="menu-link">
                        <i class="menu-icon fa-solid fa-bullhorn"></i>
                        <div data-i18n="Analytics">ข่าวประกาศ</div>
                    </a>
                </li>

                <!-- Documentation -->
                <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">วันที่</span></li>
                <li class="menu-item">

                </li> -->
                <!-- <li class="menu-item">
              <a
                href="#"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
              </a>
            </li> -->

                <li class="menu-header small text-uppercase"><span class="menu-header-text">เข้าสู่ระบบ</span></li>
                <li class="menu-item">

                  
                  
                  
                  <ul class="menu-inner py-1">
                    <!-- index -->
                    <li class="menu-item" id="menu-index">
                      <a href="login_stu.php" class="menu-link">
                        <i class="fa-solid fa-user-graduate"></i>
                        <div data-i18n="Analytics">  นักเรียน</div>
                      </a>
                    </li>

                    <li class="menu-item" id="menu-activities">
                      <a href="login_tea.php" class="menu-link">
                        <i class="fa-solid fa-user-tie"></i>
                        <div data-i18n="Analytics">  ครูผู้สอน</div>
                      </a>
                    </li>

                    <li class="menu-item" id="menu-activities">
                      <a href="login_tea.php" class="menu-link">
                        <i class="fa-solid fa-user-tie"></i>
                        <div data-i18n="Analytics">  ผู้ดูแลระบบ</div>
                      </a>
                    </li>
                  
                  
                  

                  
                  
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <img src="images/network.gif" alt class="w-px-40 h-auto rounded-circle">
                            <!-- <i class="bx bx-search fs-4 lh-0"></i> -->
                            <!-- <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." /> -->
                        </div>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <?php if (!isset($_SESSION['lognum'])) { ?>
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar <?php echo $avatar; ?>">
                                        <?php echo $login_icon; ?>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <label class="dropdown-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar <?php echo $avatar; ?>">
                                                        <?php echo $login_icon; ?>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">เข้าสู่ระบบ</span>
                                                    <small class="text-muted">กรุณาเลือก</small>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="login_stu.php">
                                            <i class="fa-solid fa-user-graduate"></i>
                                            <span class="align-middle">นักเรียน</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="login_tea.php">
                                            <i class="fa-solid fa-user-tie"></i>
                                            <span class="align-middle">เจ้าหน้าที่/ครู</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="auth-login-basic.html">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">ออกจากระบบ</span>
                                        </a>
                                    </li> -->
                                </ul>
                            </li>
                        <?php } else {
                        ?>
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar <?php echo $avatar; ?>">
                                        <?php echo $login_icon; ?>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <label class="dropdown-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar <?php echo $avatar; ?>">
                                                        <?php echo $login_icon; ?>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">ยินดีต้อนรับ</span>
                                                    <small class="text-muted">สู่ระบบลงทะเบียนกิจกรรม</small>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>

                                    <li>
                                        <?php
                                        if ($_SESSION['lognum'] == 1) {
                                            echo '<a class="dropdown-item" href="checklogout_stu_emp.php">';
                                        }
                                        if ($_SESSION['lognum'] == 2) {
                                            echo '<a class="dropdown-item" href="checklogout_tea_emp.php">';
                                        }
                                        ?>
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">ออกจากระบบ</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php
                        } ?>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">


                    <script>
                        // อ่าน URL ของหน้าเว็บไซต์ปัจจุบัน
                        var currentURL = window.location.href;

                        // หาชื่อไฟล์โดยตัดออกจากพาธและนามสกุล
                        var pathArray = currentURL.split('/');
                        var filenameWithExtension = pathArray.pop();
                        var filename = filenameWithExtension.split('.')[0];

                        if(filename === ""){
                        document.getElementById("menu-index").classList.add("active");
                        }else{
                            document.getElementById("menu-"+filename).classList.add("active");
                        }
                    </script>