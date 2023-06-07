<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\AssessmentJob;
use Illuminate\Database\Seeder;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d");
        $asesmen = new Assessment();
        $asesmen->judul = "Test";
        $asesmen->waktu_buat = $now;
        $asesmen->waktu_berakhir = date('Y-m-d',strtotime($now.' + 4day'));
        $asesmen->user_id = 3;
        $asesmen->save();

        $asesmen_job = new AssessmentJob();
        $asesmen_job->user_id = 4;
        $asesmen_job->assessment_id = 1;
        $asesmen_job->complete = 0;
        $asesmen_job->save();
    }
}
