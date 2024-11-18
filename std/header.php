  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center bg-light text-light">

      <div class="d-flex align-items-center justify-content-between">
          <a href="index.php" class="logo d-flex align-items-center">
              <img src="./../assets/img/bcd.png" alt="Logo" style="width: 30px; height: 50px;">
              <span style="font-size: 22px;color: #004aad(14, 24, 205);">ระบบกิจกรรมนักศึกษา</span>
          </a>
          <i class="bi bi-list toggle-sidebar-btn" style="font-size: 28px;color: #004aad(250, 250, 250);"></i>
      </div><!-- End Logo -->


      <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">

              <li class="nav-item d-block d-lg-none">
                  <a class="nav-link nav-icon search-bar-toggle " href="#">
                      <i class="bi bi-search"></i>
                  </a>
              </li><!-- End Search Icon-->

              <li class="nav-item dropdown">
              </li><!-- End Notification Nav -->

              <li class="nav-item dropdown">
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">

                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li class="dropdown-footer">
                          <a href="#">Show all messages</a>
                      </li>

                  </ul><!-- End Messages Dropdown Items -->

              </li><!-- End Messages Nav -->

              <li class="nav-item dropdown pe-3">

                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                      <!-- <img src="./../assets/img/ad.jpg" alt="Profile" class="rounded-circle"> -->

                      <span class="d-none d-md-block dropdown-toggle ps-2" style="font-size: 16px;color: #004aad(51, 108, 194);">นักศึกษา</span>
                  </a><!-- End Profile Iamge Icon -->

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                      <li class="dropdown-header">
                          <h6>นักศึกษา</h6>
                          <span>นักศึกษา</span>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li>
                          <a class="dropdown-item d-flex align-items-center" href="./">
                              <i class="bi bi-person"></i>
                              <span>ข้อมูลส่วนตัว</span>
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li>
                          <a class="dropdown-item d-flex align-items-center" href="./">
                              <i class="bi bi-gear"></i>
                              <span>แก้ไขข้อมูลส่วนตัว</span>
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li>
                          <a class="dropdown-item d-flex align-items-center" href="./../logout.php">
                              <i class="bi bi-box-arrow-right"></i>
                              <span>ออกจากระบบ</span>
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>


                  </ul><!-- End Profile Dropdown Items -->
              </li><!-- End Profile Nav -->

          </ul>
      </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link collapsed" href="./index.php">
                  <i class="bi bi-house"></i>
                  <span>หน้าแรก</span>
              </a>
          </li><!-- End Profile Page Nav -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="./activity.php">
                  <i class="bi bi-pencil"></i>
                  <span>ข้อมูลกิจกรรม</span>
              </a>
          </li><!-- End F.A.Q Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="./../logout.php">
                  <i class="bi bi-pencil"></i>
                  <span>ออกจากระบบ</span>
              </a>
          </li>


      </ul>

  </aside>