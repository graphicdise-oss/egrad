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
        overflow: hidden;
        background: linear-gradient(180deg, #1f9146, #156a34) !important;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        transition: width .25s ease, padding .25s ease;
    }

    .sidebar.sidebar-closed {
        width: 0 !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    .sidebar.sidebar-closed .nav-link,
    .sidebar.sidebar-closed .navbar-brand {
        white-space: nowrap;
    }

    .sidebar .navbar-brand {
        font-size: 1.15rem;
        letter-spacing: .02em;
        margin-top: 40px;
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

    /* ปุ่มเปิด/ปิดเมนู ติดอยู่ที่ขอบบนซ้ายสุดพอดี (ไม่มีช่องว่าง) */
    .sidebar-toggle-btn {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1050;
        border-radius: 0 0 8px 0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 767px) {
        .app-layout {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
        }

        .sidebar.sidebar-closed {
            width: 100% !important;
            height: 0;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
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
    {{-- ปุ่มเปิด/ปิดเมนู (ลอยอยู่มุมซ้ายบนตลอด ใช้ได้ทั้งจอใหญ่/จอเล็ก) --}}
    <button id="sidebarToggleBtn" class="btn btn-success btn-sm sidebar-toggle-btn" type="button"
        title="เปิด/ปิดเมนู">☰</button>

    <div class="app-layout">
        {{-- เมนูด้านซ้าย --}}
        <nav class="sidebar bg-success text-white p-2" id="sidebarMenu">
            <a class="navbar-brand text-white fw-bold mb-3" href="#">VRU Apply</a>

            <ul class="nav flex-column">
                {{-- ข้อมูลนักศึกษา (ลิงก์มาหน้าตารางเอกสารการสมัครที่มีอยู่) --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('apply.docs.index') }}">ข้อมูลนักศึกษา</a>
                </li>
            </ul>

            <hr class="text-white-50 my-2">

            <ul class="nav flex-column">
                {{-- การจัดการ --}}
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" href="#menuManage"
                        data-bs-toggle="collapse" role="button" aria-expanded="false">
                        การจัดการ <span class="caret">▾</span>
                    </a>
                    <div class="collapse submenu ps-3" id="menuManage">
                        <ul class="nav flex-column">
                            {{-- พิมพ์ใบค่าธรรมเนียม --}}
                            <li class="nav-item">
                                <a class="nav-link d-flex justify-content-between align-items-center"
                                    href="#menuFeeSlip" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false">
                                    พิมพ์ใบค่าธรรมเนียม <span class="caret">▾</span>
                                </a>
                                <div class="collapse submenu ps-3" id="menuFeeSlip">
                                    <ul class="nav flex-column">
                                        <li class="nav-item"><a class="nav-link" href="#">โท-เอก</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#">วิชาชีพครู</a></li>
                                    </ul>
                                </div>
                            </li>
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
    <script>
        document.getElementById('sidebarToggleBtn').addEventListener('click', function () {
            document.getElementById('sidebarMenu').classList.toggle('sidebar-closed');
        });
    </script>
</body>

</html>
