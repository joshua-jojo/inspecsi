<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleAkses;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ['super admin', 'admin', 'kepala ruangan', 'ketua tim'];

        foreach ($role as $key => $value) {
            $role_model = new Role();
            $role_model->nama = $value;

            $role_model->save();
        }

        $user = new User();
        $user->name = "super admin";
        $user->password = bcrypt('superadmin');
        $user->email = "superadmin@gmail.com";
        $user->role_id = 1;
        $user->save();

        // $user = new User();
        // $user->name = "admin";
        // $user->password = bcrypt(123123123);
        // $user->email = "admin@admin.com";
        // $user->role_id = 2;
        // $user->save();

        $user = new User();
        $user->name = "Ns. Fatmawati, S.Kep";
        $user->email = "fatmai.bj161@gmail.com";
        $user->password = bcrypt("fatmawati");
        $user->role_id = 3;
        $user->save();
        $user = new User();
        $user->name = "Osnila A.Md.Kep";
        $user->email = "osnila.nila@yahoo.com";
        $user->password = bcrypt("osnila");
        $user->role_id = 3;
        $user->save();

        // for ($i = 1; $i <= 20; $i++) {
        //     $user = new User();
        //     $user->name = "Ketua Tim $i";
        //     $user->password = bcrypt(123123123);
        //     $user->email = "ketua$i@ketua.com";
        //     $user->role_id = 4;
        //     $user->save();
        // }
    }
}
