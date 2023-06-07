<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assessment_job()
    {
        return $this->hasMany(AssessmentJob::class,'assessment_id','id');
    }
}
