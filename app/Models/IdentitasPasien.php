<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentitasPasien extends Model
{
    use HasFactory;

    protected $hidden = ['created_at','updated_at'];

    public function assessment_job()
    {
        return $this->hasOne(AssessmentJob::class,'assessment_job_id','id');
    }

    public function riwayat_kesehatan()
    {
        return $this->hasOne(RiwayatKesehatan::class,'identitas_pasien_id','id');
    }
    public function status_fisik()
    {
        return $this->hasOne(StatusFisikAtauFisiologis::class,'identitas_pasien_id','id');
    }
    public function psiko_sosial_spiritual()
    {
        return $this->hasOne(PsikoSosialSpiritual::class,'identitas_pasien_id','id');
    }
    public function ekonomi()
    {
        return $this->hasOne(Ekonomi::class,'identitas_pasien_id','id');
    }
    public function alergi()
    {
        return $this->hasOne(Alergi::class,'identitas_pasien_id','id');
    }
    public function nyeri()
    {
        return $this->hasOne(Nyeri::class,'identitas_pasien_id','id');
    }
    public function kebutuhan_edukasi()
    {
        return $this->hasOne(KebutuhanEdukasi::class,'identitas_pasien_id','id');
    }
    public function perencanaan_pemulangan_pasien()
    {
        return $this->hasMany(PerencanaanPemulanganPasien::class,'identitas_pasien_id','id');
    }
    public function penggunaan_obat()
    {
        return $this->hasMAny(PenggunaanObat::class,'identitas_pasien_id','id');
    }
    public function populasi_khusus()
    {
        return $this->hasMAny(PopulasiKhusus::class,'identitas_pasien_id','id');
    }
    public function hasil_pemeriksaan_penunjang()
    {
        return $this->hasMany(HasilPemeriksaanPenunjang::class,'identitas_pasien_id','id');
    }
    public function analisis_data()
    {
        return $this->hasMany(AnalisisData::class,'identitas_pasien_id','id');
    }
    public function masalah_keperawatan()
    {
        return $this->hasMany(MasalahKeperawatan::class,'identitas_pasien_id','id');
    }
}
