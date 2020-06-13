<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions #General
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'view_basic_info']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'view_medical_background']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'update_medical_background']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'view_medical_journal']);


        // create permissions #Visit Form
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'add_symptoms']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'view_symptoms']);

        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'recommend_test']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'view_recommended_test']);

        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'add_test_result']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'view_test_results']);

        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'add_prescription']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'view_prescription']);

        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'issue_medicine']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'view_issued_medicine']);

        // create permissions #Visit Fees
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'verify_consultation_fee']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'check_consultation_fee']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'verify_lab_fee']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'check_lab_fee']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'verify_medicine_fee']);
        Permission::create(['guard_name' => 'health_care_employee', 'name' => 'check_medicine_fee']);

        // create roles and assign created permissions
        // this can be done as separate statements
        Role::create(['guard_name' => 'health_care_employee', 'name' => 'doctor']);
        Role::create(['guard_name' => 'health_care_employee', 'name' => 'nurse']);
        Role::create(['guard_name' => 'health_care_employee', 'name' => 'lab']);
        Role::create(['guard_name' => 'health_care_employee', 'name' => 'pharmacist']);
        Role::create(['guard_name' => 'health_care_employee', 'name' => 'receptionist']);

    }
}
