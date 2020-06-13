<?php

use App\User;
use Illuminate\Database\Seeder;
use App\VitalSign;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class VitalSignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {

        VitalSign::create([
            'name'=>'Weight',
            'code'=>'vs001',
            'si_unit'=>'Kg',
            'icon'=>'fa-tachometer-alt',
            'color'=>'4A235A',
        ]);

        VitalSign::create([
            'name'=>'Height',
            'code'=>'vs002',
            'si_unit'=>'Meters',
            'icon'=>'fa-ruler-vertical',
            'color'=>'4A235A',
        ]);

        VitalSign::create([
            'name'=>'BMI',
            'code'=>'vs008',
            'si_unit'=>'',
            'icon'=>'fa-ruler-vertical',
            'color'=>'4A235A',
        ]);

        VitalSign::create([
            'name'=>'Blood pressure',
            'code'=>'vs003',
            'si_unit'=>'mmHg',
            'icon'=>'fa-stopwatch',
            'color'=>'C0392B',
        ]);

        VitalSign::create([
            'name'=>'Blood Sugar level',
            'code'=>'vs004',
            'si_unit'=>'mmol/L',
            'icon'=>'fa-tint',
            'color'=>'C0392B',
        ]);

        VitalSign::create([
            'name'=>'Heart rate (Rested)',
            'code'=>'vs005',
            'si_unit'=>'bpm',
            'icon'=>'fa-heartbeat',
            'color'=>'C0392B',
        ]);

        
        VitalSign::create([
            'name'=>'Total cholesterol',
            'code'=>'vs006',
            'si_unit'=>'mg',
            'icon'=>'fa-tint',
            'color'=>'4A235A',
        ]);

    }
}
