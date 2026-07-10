<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StdPg extends Model
{
    protected $connection = 'pgsql';            // ใช้ PostgreSQL
    protected $table = 't_std_profile';         // ตาราง Postgres
    protected $primaryKey = 'name_id';          // primary key เป็น identity
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;                  // มี created_at, updated_at

    protected $fillable = [
        'id_no',
        'name',
        'lname',
        'fac_code',
        'comp_exam_status',   // ✅ เพิ่มฟิลด์ใหม่
        'comp_exam_status2',   // ✅ เพิ่มฟิลด์ใหม่
        'comp_exam_status3',   // ✅ เพิ่มฟิลด์ใหม่

    ];
}
