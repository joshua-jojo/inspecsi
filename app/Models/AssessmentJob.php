<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentJob extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function identitas_pasien()
    {
        return $this->hasOne(IdentitasPasien::class,'assessment_job_id','id');
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
