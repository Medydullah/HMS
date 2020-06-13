<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SystemAdminSeeder extends Seeder{
    /**
     * Run the database seeds.
     * @return void
     */

    public function run(){

//       $user = new User();
//       $user->email = "armando@gmail.com";
//       $user->phone = "07633286653";
//       $user->dmw_token= "U2019-003-TGA5";
//
//       $user->name = "Braylon Armando";
//       $user->gender = "Male";
//       $user->dob = "1972-01-31";
//
//       $user->password = Hash::make("zxcvbnm");
//       $user->save();

        $user = new \App\SystemAdmin();
        $user->email = "superuser@dmw.com";
        $user->name = "Richard J U Kilonzo";
        $user->password = Hash::make("zxcvbnm");
        $user->save();
    }


}
