<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdfCardSetting extends Model
{
    // ตารางนี้เป็นข้อมูลตั้งค่าของแอปเอง ต้องอยู่คนละฐานกับข้อมูลนักศึกษา (sqlsrv_remote)
    protected $connection = 'pgsql_local';

    protected $fillable = [
        'degree',
        'term',
        'year',
        'exam_announce_text',
        'exam_date_text',
        'admit_announce_text',
        'semester_start_text',
    ];
}
