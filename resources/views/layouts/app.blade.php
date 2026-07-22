<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ระบบสมัครเรียน')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    @font-face {
        font-family: 'THSarabunNew';
        src: url('{{ asset('fonts/THSarabunNew.ttf') }}') format('truetype');
        font-weight: 400;
    }

    @font-face {
        font-family: 'THSarabunNew';
        src: url('{{ asset('fonts/THSarabunNew-Bold.ttf') }}') format('truetype');
        font-weight: 700;
    }

    body {
        margin: 0;
        font-family: 'THSarabunNew', sans-serif;
        font-size: 20px;
    }

    .app-layout {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: 165px;
        flex-shrink: 0;
        background: linear-gradient(180deg, #1f9146, #156a34) !important;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .sidebar .navbar-brand {
        font-size: 1.15rem;
        letter-spacing: .02em;
    }

    .sidebar .nav-item {
        margin-bottom: 2px;
    }

    .sidebar .nav-link {
        color: rgba(255, 255, 255, 0.9);
        border-radius: 8px;
        padding: 8px 10px;
        font-size: 0.95rem;
        font-weight: 700;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link:focus {
        background-color: rgba(255, 255, 255, 0.15);
        color: #fff;
    }

    .sidebar .submenu {
        border-left: 2px solid rgba(255, 255, 255, 0.2);
        margin-left: 14px;
    }

    .sidebar .submenu .nav-item {
        margin-bottom: 2px;
    }

    .sidebar .submenu .nav-link {
        color: rgba(255, 255, 255, 0.75);
        font-size: 0.85rem;
        font-weight: 400;
        padding: 6px 10px;
    }

    .sidebar .caret {
        display: inline-block;
        transition: transform .2s ease;
    }

    .sidebar .nav-link[aria-expanded="true"] .caret {
        transform: rotate(180deg);
    }

    .app-content {
        flex-grow: 1;
        min-width: 0;
    }

    .mobile-topbar {
        display: none;
    }

    @media (max-width: 767px) {
        .app-layout {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
        }

        .sidebar.collapse:not(.show) {
            display: none;
        }

        .mobile-topbar {
            display: flex;
        }
    }

    /* ซ่อนเมนูย่อย (เผื่อมีหน้าอื่นใช้ dropdown แบบเดิม) */
    .dropdown-submenu .dropdown-menu {
        display: none;
        margin-left: 0.7rem;
        margin-top: 0;
    }

    .dropdown-submenu:hover .dropdown-menu {
        display: block;
        position: absolute;
        left: 100%;
        top: 0;
    }
</style>

<body>
    {{-- แถบบนสำหรับมือถือ: ปุ่มเปิด/ปิดเมนู --}}
    <div class="mobile-topbar bg-success text-white align-items-center justify-content-between p-2">
        <span class="fw-bold ps-2">VRU Apply</span>
        <button class="btn btn-sm btn-light me-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu">
            ☰ เมนู
        </button>
    </div>

    <div class="app-layout">
        {{-- เมนูด้านซ้าย --}}
        <nav class="sidebar collapse d-md-block bg-success text-white p-2" id="sidebarMenu">
            <a class="navbar-brand text-white fw-bold d-none d-md-block mb-3" href="#">VRU Apply</a>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="https://oldent.vru.ac.th/Webregister/pages/home_admin.php">หน้าแรก</a>
                </li>
            </ul>

            <hr class="text-white-50 my-2">

            <ul class="nav flex-column">
                {{-- จันทร์-ศุกร์ --}}
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" href="#menuMonFri"
                        data-bs-toggle="collapse" role="button" aria-expanded="false">
                        จันทร์-ศุกร์ <span class="caret">▾</span>
                    </a>
                    <div class="collapse submenu ps-3" id="menuMonFri">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_tbl_vru_1.php">ข้อมูลการสมัคร</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_tbl_vru_1_payment.php">ผู้มีสิทธิ์เข้าศึกษา</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_report_paper_portfolio_nm.php">เอกสารการสมัคร</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_report_paper_portfolio_history_nm.php">ข้อมูลผู้สมัคร
                                    Profile</a></li>
                        </ul>
                    </div>
                </li>

                {{-- เสาร์อาทิตย์ --}}
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" href="#menuSatSun"
                        data-bs-toggle="collapse" role="button" aria-expanded="false">
                        เสาร์อาทิตย์ <span class="caret">▾</span>
                    </a>
                    <div class="collapse submenu ps-3" id="menuSatSun">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_bachelor_register_grpup.php">ข้อมูลการสมัคร</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_bachelor_payment.php">ผู้มีสิทธิ์เข้าศึกษา</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_report_paper_portfolio_bch.php">เอกสารการสมัคร</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- บัณฑิต/วิชาชีพครู --}}
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" href="#menuMaster"
                        data-bs-toggle="collapse" role="button" aria-expanded="false">
                        บัณฑิต/วิชาชีพครู <span class="caret">▾</span>
                    </a>
                    <div class="collapse submenu ps-3" id="menuMaster">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_master_register.php">ข้อมูลการสมัคร</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_master_payment.php">ผู้มีสิทธิ์เข้าศึกษา</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="https://egrad.vru.ac.th/apply-docs">เอกสารการสมัคร</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/view_Admin_regisSearch_mt.php">ค้นหาประวัติผู้สมัคร</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- สัมฤทธิบัตร --}}
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" href="#menuAcm"
                        data-bs-toggle="collapse" role="button" aria-expanded="false">
                        สัมฤทธิบัตร <span class="caret">▾</span>
                    </a>
                    <div class="collapse submenu ps-3" id="menuAcm">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_acm_register.php">ข้อมูลการสมัคร</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_acm_register_type.php">ข้อมูลผู้สมัครเเยกประเภท</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="https://oldent.vru.ac.th/Webregister/pages/View_Admin_tbl_acm_payment.php">ข้อมูลการชำระเงิน</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- ข้อมูลการสมัคร (เมนูย่อยเดิม) --}}
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" href="#menuApply"
                        data-bs-toggle="collapse" role="button" aria-expanded="false">
                        ข้อมูลการสมัคร <span class="caret">▾</span>
                    </a>
                    <div class="collapse submenu ps-3" id="menuApply">
                        <ul class="nav flex-column">
                            <li class="px-2 pt-1"><small class="text-white-50 text-uppercase">เมนูย่อย</small></li>
                            <li class="nav-item"><a class="nav-link" href="#">ใบสมัครโท-เอก</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">ข้อมูลผู้สมัครแยกประเภท</a></li>
                            <li>
                                <hr class="text-white-50 my-1">
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">รายการอื่น ๆ</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>

        {{-- Content --}}
        <div class="app-content">
            <div class="container-fluid mt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
