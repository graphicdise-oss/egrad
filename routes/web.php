<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Q_aController;
use App\Http\Controllers\LoginqandaController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\StaffProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StdProfileController;
use App\Http\Controllers\ApplyDocController;
use App\Http\Controllers\StdvruController;
use App\Http\Controllers\StdLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginGradController;
use App\Http\Controllers\LoginApplyController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PdfCardController;
use App\Http\Controllers\PdfCardSettingController;
use App\Http\Controllers\FeeSlipController;


Route::get('/apply-docs', [ApplyDocController::class, 'index'])
    ->name('apply.docs.index');

// ตั้งค่าข้อความหัวบัตรประจำตัวผู้สมัคร (แยกตามหลักสูตร/เทอม ปีปัจจุบันอัตโนมัติ)
Route::get('/pdf-settings/{degree}/{term}', [PdfCardSettingController::class, 'edit'])
    ->whereIn('degree', ['master', 'doctor', 'teacher'])
    ->whereIn('term', [1, 2])
    ->name('pdfsettings.edit');
Route::put('/pdf-settings/{degree}/{term}', [PdfCardSettingController::class, 'update'])
    ->whereIn('degree', ['master', 'doctor', 'teacher'])
    ->whereIn('term', [1, 2])
    ->name('pdfsettings.update');

// พิมพ์บัตรประจำตัวผู้สมัคร (PDF)
Route::get('/pdf-card/{name_id}', [PdfCardController::class, 'show'])
    ->name('pdfcard.show');

// ค้นหาผู้สมัครด้วยเลขบัตรประชาชน เพื่อพิมพ์ใบค่าธรรมเนียม
Route::get('/print-fee/{scope}', [FeeSlipController::class, 'search'])
    ->whereIn('scope', ['grad', 'teacher'])
    ->name('feeslip.search');

Route::get('/money', function () {
    return view('money');
});


// ✅ PDF แอดมิน

// ✅ PDF Visa เฉพาะนักศึกษา


Route::get('/gradstd/login', [StdLoginController::class, 'showLoginForm'])->name('gradstd.login');
Route::post('/gradstd/login', [StdLoginController::class, 'login'])->name('gradstd.login.submit');
Route::get('/gradstd/logout', [StdLoginController::class, 'logout'])->name('gradstd.logout');



Route::middleware(['gradstdauth'])->group(function () {
    Route::get('/studentsstd/edit/{id_no}', [StudentProfileController::class, 'editStd'])
        ->name('studentsstd.edit');

    Route::get('/studentsstd/section/{section}/{id_no}', [StudentProfileController::class, 'showSectionStd'])
        ->name('studentstd.section.show');

    Route::post('/studentsstd/section/{section}/{id_no}/save', [StudentProfileController::class, 'saveSectionStd'])
        ->name('studentstd.section.save');

    // ✅ PDF นักศึกษา
    Route::get('/studentpdf/{id}/pdfstd', [\App\Http\Controllers\StdProfileController::class, 'pdfstd'])
        ->name('studentsstd.pdf');

    Route::get('/studentpdf/{id}/pdfvisa_std', [\App\Http\Controllers\StdProfileController::class, 'pdfvisa_std'])
        ->name('studentsstd.pdfvisa_std');

    // ✅ PDF Visa นักศึกษา


});
// 🔒 ผู้สมัคร
// หน้าเอกสารผู้สมัคร (ต้อง login ก่อน)


Route::get('/apply-docs', [ApplyDocController::class, 'index'])
    ->middleware('applyauth')
    ->name('apply.docs.index');
    
// login ผู้สมัคร
Route::get('/loginapply', [LoginApplyController::class, 'showForm']);
Route::post('/loginapply', [LoginApplyController::class, 'login']);

Route::post('/logoutapply', [LoginApplyController::class, 'logout']);


// หน้า login
Route::get('/grad/login', [LoginGradController::class, 'showForm'])->name('grad.login');
// ตรวจสอบ login
Route::post('/grad/login', [LoginGradController::class, 'login'])->name('grad.login.submit');
// logout
Route::get('/grad/logout', [LoginGradController::class, 'logout'])->name('grad.logout');



Route::middleware(['gradauth'])->group(function () {
    Route::view('/egard', 'egard.index');
    Route::view('/students', 'students.index');
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index');



    // ลิงก์สำหรับเปิดหน้าฟอร์ม
    Route::get('/warn', [NotificationController::class, 'index'])->name('warn.index');

    // ลิงก์สำหรับบันทึกข้อมูล (กดปุ่ม Save)
    Route::post('/warn/save', [NotificationController::class, 'update'])->name('warn.update');


    Route::get('/studentpdf/{id}/pdf', [\App\Http\Controllers\StdProfileController::class, 'pdf'])
        ->name('students.pdf');

    // ✅ PDF Visa แอดมิน
    Route::get('/studentpdf/{id}/pdfvisa', [\App\Http\Controllers\StdProfileController::class, 'pdfvisa'])
        ->name('students.pdfvisa');


    Route::get('/students/export/all', [StudentProfileController::class, 'exportAll'])->name('students.exportAll');
    Route::get('/students/export/current', [StudentProfileController::class, 'exportCurrent'])->name('students.exportCurrent');


    Route::get('/visatime/export/all', [StudentProfileController::class, 'exportVisaAll'])->name('visatime.exportAll');
    Route::get('/visatime/export/page', [StudentProfileController::class, 'exportVisaCurrent'])->name('visatime.exportCurrent');

    Route::get('/alumni/export-all', [StudentProfileController::class, 'exportAlumniAll'])->name('alumni.exportAll');




    Route::get('/students', [StudentProfileController::class, 'index'])->name('students.index');
    Route::get('/students/export-all', [StudentProfileController::class, 'exportAll'])->name('students.export.all');
    Route::get('/students/export-current', [StudentProfileController::class, 'exportCurrent'])->name('students.export.current');
    ;

    // Student Profile
    Route::get('students/{id_no}/edit', [StudentProfileController::class, 'edit'])->name('students.edit');
    Route::put('students/{id_no}', [StudentProfileController::class, 'update'])->name('students.update');
    Route::delete('students/{id_no}', [StudentProfileController::class, 'destroy'])->name('students.destroy');

    // Payments
    Route::get('students/{id_no}/payments', [StudentProfileController::class, 'payments'])->name('students.payments');

    // Section system (dynamic)
    Route::get('/section/{section}/{id_no}', [StudentProfileController::class, 'showSection'])->name('student.section.show');
    Route::post('/section/{section}/{id_no}/save', [StudentProfileController::class, 'saveSection'])->name('student.section.save');


    Route::get('/studentslist', [StudentController::class, 'index'])->name('studentslist.index');
    Route::get('/indexcourse', fn() => view('students.indexcourse'));

    Route::post('/insert_study', [StudentProfileController::class, 'store'])->name('study.store');

    // VisaTime

    Route::get('/visatime', [StudentProfileController::class, 'visatime'])->name('visatime');


    Route::get('/alumni', [StudentProfileController::class, 'alumni'])->name('alumni');
    // Staff
    Route::get('/staff', [StaffProfileController::class, 'index'])->name('staff.index');
    Route::get('/staff/{id}/edit', [StaffProfileController::class, 'edit'])->name('staff.edit');
    Route::put('/staff/{id}', [StaffProfileController::class, 'update'])->name('staff.update');
    Route::delete('/staff/{id}', [StaffProfileController::class, 'destroy'])->name('staff.destroy');

    // Static pages

    // Test staff
    Route::get('/test-staff-list', fn() => view('students.index_teacher', ['staff' => collect()]));
    Route::get('/test-staff-list2', fn() => view('students.editteacher.index_teacher', ['staff' => collect()]));

    // Student PDF



    // Login
    Route::get('/login', fn() => view('loginegrad'));

    // Debug
    Route::get('/phpinfo', fn() => phpinfo());

    // routes/web.php




    Route::get('/indexcourse', [StudentController::class, 'indexCourse'])->name('indexcourse');




    // ✅ ป้องกันการเข้าหน้า students โดยเช็ค session
    Route::get('/stdpanel', function () {
        if (!session('std_logged_in')) {
            return redirect()->route('stdlogin.form'); // ถ้าไม่ได้ login ให้กลับไปหน้า login
        }
        return view('students.index'); // ถ้า login แล้ว แสดงหน้านี้
    });

    Route::get('/stdpanel/profile', function () {
        if (!session('std_logged_in')) {
            return redirect()->route('stdlogin.form');
        }
        return view('students.profile');
    });

});




$studentAuth = function ($request, $next) {

    if (!session('std_logged_in')) {
        return redirect()->route('stdlogin.form');
    }
    return $next($request);
};



Route::get('/apply/list', function () {
    return view('apply.table.list');
})->name('apply.list'); // 🔁 ตั้งชื่อ route ไว้ใช้งานในลิงก์อื่น


Route::get('/test', [StdvruController::class, 'index'])->name('test.index');
Route::post('/test', [StdvruController::class, 'store'])->name('test.store');


// เปลี่ยนภาษา
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

// แบบฟอร์มสมัคร
Route::get('/apply/form', [ApplyController::class, 'create'])->name('apply.form');
Route::get('/apply/form/teacher', [ApplyController::class, 'createTeacher'])->name('apply.form.teacher');
Route::post('/apply/store', [ApplyController::class, 'store'])->name('apply.store');



// หน้าแสดงรายการผู้สมัคร (list)



Route::get('/apply/list', [ApplyController::class, 'index'])->name('apply.index');

Route::post('/apply/status/bulk-update', [ApplyController::class, 'bulkUpdate'])->name('apply.status.bulkUpdate');


// หน้าแก้ไข
Route::get('/apply/tebel/edit/{id}', [ApplyController::class, 'edit'])->name('apply.edit');
Route::put('/apply/tebel/update/{id}', [ApplyController::class, 'update'])->name('apply.update');
Route::patch('/apply/status/{id}', [ApplyController::class, 'updateStatus'])->name('apply.status.update');

// ลบข้อมูล
// routes/web.php
Route::delete('/apply/{id}', [ApplyController::class, 'destroy'])->name('apply.delete');




Route::get('/test2', function () {
    return view('test2');
});



Route::get('/insert_teacher', function () {
    return view('egard.insert_teacher');
});


Route::get('/insert_president', function () {
    return view('egard.insert_president');
});


Route::get('/egardedit', function () {
    return view('egard.egardedit');
});

Route::get('egard/login', function () {
    return view('egard.egard_login');
});


//Q&A

Route::get('/qanda/answer', function () {
    return view('qanda.answer');
});

Route::get('/qanda/question', function () {
    return view('qanda.question');
});

Route::get('/qanda/tableanswer', function () {
    return view('qanda.tableanswer');
});

Route::get('/qanda/qanda_fa', function () {
    return view('qanda.qanda_fa');
});

// ใช้อันนี้เท่านั้น
Route::get('/qanda/tableanswer', [Q_aController::class, 'tableanswer'])->name('qanda.tableanswer');

// ❌ ลบ/คอมเมนต์อันนี้ทิ้ง
// Route::get('/qanda/tableanswer', function () { return view('qanda.tableanswer'); });



// ฟอร์มถาม-ตอบทั่วไป (ไม่ต้องล็อกอิน)
Route::get('/q-a/form', [Q_aController::class, 'create'])->name('q_a.create');
Route::post('/q-a/submit', [Q_aController::class, 'store'])->name('q_a.store');
Route::get('/q-a/list', [Q_aController::class, 'index'])->name('q_a.index');
Route::get('/qanda/tableanswer', [Q_aController::class, 'tableanswer']);

// ล็อกอิน
Route::get('/qanda/login', [LoginqandaController::class, 'showLogin'])->name('qanda.login.form');
Route::post('/qanda/login', [LoginqandaController::class, 'login'])->name('qanda.login');
Route::get('/qanda/logout', [LoginqandaController::class, 'logout'])->name('qanda.logout');

// ✅ ลบอันนี้ออก เพราะซ้ำกับ route ข้างบน (return view ตรง ๆ)
// Route::get('qanda/login', function () {
//     return view('qanda/qandalogin');
// });

// เข้าถึง Q&A edit เฉพาะคนล็อกอินเท่านั้น
Route::get('/qanda/edit', [Q_aController::class, 'index'])->name('qanda.index');
Route::get('/qanda/edit/{id}', [Q_aController::class, 'edit'])->name('qanda.edit');
Route::put('/qanda/edit/{id}', [Q_aController::class, 'update'])->name('qanda.update');
Route::delete('/qanda/edit/{id}', [Q_aController::class, 'destroy'])->name('qanda.destroy');

Route::get('/qanda/create', [Q_aController::class, 'create'])->name('q_a.create');
//เเยก


Route::get('/qanda/show/{id}', [Q_aController::class, 'show'])->name('qanda.show');



// routes/นักศึกษา


