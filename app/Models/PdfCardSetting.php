<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdfCardSetting extends Model
{
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
