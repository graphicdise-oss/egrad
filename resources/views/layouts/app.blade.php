<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ระบบสมัครเรียน')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    /* ซ่อนเมนูย่อย */
    .dropdown-submenu .dropdown-menu {
        display: none;
        margin-left: 0.7rem;
        margin-top: 0;
    }

    /* โชว์เมนูย่อยเมื่อ hover */
    .dropdown-submenu:hover .dropdown-menu {
        display: block;
        position: absolute;
        left: 100%;
        
        top: 0;
    }

  
</style>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-success ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">VRU Apply</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto"> {{-- mx-auto = margin left/right auto --}}
                    <li class="nav-item">
                        <a class="nav-link" style="color: yellow;"
                            href="https://oldent.vru.ac.th/Webregister/pages/home_admin.php">หน้าแรก</a>
                    </li>

                    {{-- Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown1" role="button"
                            data-bs-toggle="dropdown" style="color: yellow;">
                            จันทร์-ศุกร์
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_tbl_vru_1.php">ข้อมูลการสมัคร</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_tbl_vru_1_payment.php">ผู้มีสิทธิ์เข้าศึกษา</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_report_paper_portfolio_nm.php">เอกสารการสมัคร</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_report_paper_portfolio_history_nm.php">ข้อมูลผู้สมัคร
                                    Profile</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown2" role="button"
                            data-bs-toggle="dropdown" style="color: yellow;">
                            เสาร์อาทิตย์
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_bachelor_register_grpup.php">ข้อมูลการสมัคร</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_bachelor_payment.php">ผู้มีสิทธิ์เข้าศึกษา</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_report_paper_portfolio_bch.php">เอกสารการสมัคร</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown3" role="button"
                            data-bs-toggle="dropdown" style="color: yellow;">
                            บัณฑิต/วิชาชีพครู
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_master_register.php">ข้อมูลการสมัคร</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_master_payment.php">ผู้มีสิทธิ์เข้าศึกษา</a>
                            </li>
                            <li><a class="dropdown-item" href="https://egrad.vru.ac.th/apply-docs">เอกสารการสมัคร</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_regisSearch_mt.php">ค้นหาประวัติผู้สมัคร</a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown3" role="button"
                            data-bs-toggle="dropdown" style="color: yellow;">
                            สัมฤทธิบัตร
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_acm_register.php">ข้อมูลการสมัคร</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_acm_register_type.php">ข้อมูลผู้สมัครเเยกประเภท</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_acm_payment.php">ข้อมูลการชำระเงิน</a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="applyDropdown" role="button"
                            data-bs-toggle="dropdown">
                            ข้อมูลการสมัคร
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="applyDropdown">
                            <li>
                                <h2 class="dropdown-header">เมนูย่อย</h2>
                            </li>
                            <li><a class="dropdown-item" href="#">ใบสมัครโท-เอก</a></li>
                            <li><a class="dropdown-item" href="#">ข้อมูลผู้สมัครแยกประเภท</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">รายการอื่น ๆ</a></li>
                        </ul>
                    </li>




            </div>
        </div>



    </nav>

    {{-- Content --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>