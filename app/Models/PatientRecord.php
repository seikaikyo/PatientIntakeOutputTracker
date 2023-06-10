<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    use HasFactory;

    protected $dates = ['dateTime'];
    protected $fillable = ['dateTime', 'type', 'content', 'unit'];  // 添加這行

    public function getFormattedDateTimeAttribute()
    {
        return $this->dateTime ? $this->dateTime->format('Y-m-d H:i:s') : null;
    }
}
