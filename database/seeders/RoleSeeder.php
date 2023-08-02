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
        $user->name = "Ernawati, S.Kp, M.Kep";
        $user->email = "ernakaru@gmail.com";
        $user->password = bcrypt("erna");
        $user->role_id = 3;
        $user->save();
        $user = new User();
        $user->name = "Ns. Fatmawati, S.Kep";
        $user->email = "fatmai.bj161@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 3;
        $user->save();
        $user = new User();
        $user->name = "Osnila A.Md.Kep";
        $user->email = "osnila.nila@yahoo.com";
        $user->password = bcrypt("123456");
        $user->role_id = 3;
        $user->save();
        $user = new User();
        $user->name = "Evi Hikmawati, S.Kep";
        $user->email = "evoye83@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 3;
        $user->save();
        $user = new User();
        $user->name = "Bs.Nettt Yopita Sannaria H.,S.Kep";
        $user->email = "nettyyopita@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 3;
        $user->save();
        $user = new User();
        $user->name = "Romaida Sinaga Amd.Kep";
        $user->email = "romaidasinaga00@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 3;
        $user->save();
        $user = new User();
        $user->name = "Ns. Sariliti Manalu, S. Kep";
        $user->email = "sarilitimanalu4@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 4;
        $user->save();
        $user = new User();
        $user->name = "Tri Yuniarti, A.Md.Kep";
        $user->email = "triyuniartifirmandez@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 4;
        $user->save();
        $user = new User();
        $user->name = "Ns. Afri husaini, S. Kep";
        $user->email = "afri2997a@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 4;
        $user->save();
        $user = new User();
        $user->name = "Ns. Pusfita Syari, S.kep";
        $user->email = "pusfitasyari@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 4;
        $user->save();
        $user = new User();
        $user->name = "Ns. Weni Aprianur S. Kep";
        $user->email = "weniafrianur24@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 4;
        $user->save();
        $user = new User();
        $user->name = "Ns. Yeyen utami, S. Kep";
        $user->email = "yeyenutami1986@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 4;
        $user->save();
        $user = new User();
        $user->name = "Ns. Witri Deka Dewi, S. Kep";
        $user->email = "wiftridekadewi@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 4;
        $user->save();
        $user = new User();
        $user->name = "Ns. Amirul Mukminin S. Kep";
        $user->email = "amirulkerenam@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 4;
        $user->save();
        $user = new User();
        $user->name = "Rita Haryati Am.kep";
        $user->email = "giyono.rita123@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 4;
        $user->save();
        $user = new User();
        $user->name = "Ns.Icha peronika,S.Kep";
        $user->email = "ichaperonika24@gmail.com";
        $user->password = bcrypt("123456");
        $user->role_id = 4;
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
