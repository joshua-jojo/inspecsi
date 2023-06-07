<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPemeriksaanPenunjang extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at'];

    public function setLainnyaAttribute($value)
    {
       $this->attributes['lainnya'] = $value ?? '-';
    }

    public function setRongentAttribute($value)
    {
       $this->attributes['rongent'] = $value ?? '-';
    }
    
    public function setLaboratoriumAttribute($value)
    {
       $this->attributes['laboratorium'] = $value ?? '-';
    }
}
