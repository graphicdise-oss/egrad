<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Social Hover Test</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        
        .social-floating {
            position: fixed;
            top: 50%;
            right: 0;
            /* ✅ ด้านขวา */
            transform: translateY(-50%);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .social-item {
            position: relative;
            width: 45px;
            height: 75px;
            overflow: visible;
        }

        .social-item a {
            position: absolute;
            top: 0;
            right: 0;
            /* ✅ ด้านขวา */
            left: auto;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            padding: 10px;
            width: 55px;
            height: 70px;
            border-radius: 25px 0 0 25px;
            /* ✅ โค้งฝั่งซ้าย */
            overflow: hidden;
            transition: width 0.3s ease;
            background-color: #333;
        }

        .social-item.facebook a {
            background-color: #1877F2;
        }

        .social-item.messenger a {
            background-color: #0084FF;
        }

        .social-item.line a {
            background-color: #00C300;
        }

        .social-item a:hover {
            width: 180px;
        }

        .social-item i {
            font-size: 30px;
            /* 👈 ขนาดใหญ่ขึ้น (ค่าปกติคือ 20px) */
            z-index: 1;
        }

        .social-item span {
            margin-left: 12px;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s ease;
            font-size: 20px;
            /* 👈 ปรับขนาดตัวอักษรตรงนี้ */
            font-weight: 500;
            /* 👈 เพิ่มน้ำหนักตัวอักษร (option) */
        }


        .social-item a:hover span {
            opacity: 1;
        }
    </style>



</head>


<body>
    <!-- เนื้อหาอื่น ๆ -->
    <div class="social-floating">
        <div class="social-item facebook">
            <a href="https://www.facebook.com/grad.vru.2025?" target="_blank">
                <i class="fa-brands fa-facebook"></i><span>Facebook</span>
            </a>
        </div>
        <div class="social-item messenger">
            <a href="https://wechat.com/" target="_blank" style="background-color: #09b83e;">
                <i class="ri-wechat-fill"></i><span>wechat</span>
            </a>

        </div>
        <div class="social-item line">
            <a href="https://line.me/ti/p/8Jzy7jqTRb" target="_blank">
                <i class="fa-brands fa-line"></i><span>LINE</span>
            </a>
        </div>
    </div>



</body>