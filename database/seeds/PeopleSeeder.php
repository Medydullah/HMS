<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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

        $user = new User();
        $user->email = "adrian@gmail.com";
        $user->phone = "0738862068";
        $user->dmw_token= "U2019-003-TGA6";

        $user->name = "Adrian Bentekhe";
        $user->gender = "Male";
        $user->dob = "1989-05-5";

        $user->password = Hash::make("zxcvbnm");
        $user->save();

    }
}
