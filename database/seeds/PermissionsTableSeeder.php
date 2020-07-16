<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'expense_management_access',
            ],
            [
                'id'    => '18',
                'title' => 'expense_category_create',
            ],
            [
                'id'    => '19',
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => '20',
                'title' => 'expense_category_show',
            ],
            [
                'id'    => '21',
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => '22',
                'title' => 'expense_category_access',
            ],
            [
                'id'    => '23',
                'title' => 'income_category_create',
            ],
            [
                'id'    => '24',
                'title' => 'income_category_edit',
            ],
            [
                'id'    => '25',
                'title' => 'income_category_show',
            ],
            [
                'id'    => '26',
                'title' => 'income_category_delete',
            ],
            [
                'id'    => '27',
                'title' => 'income_category_access',
            ],
            [
                'id'    => '28',
                'title' => 'expense_create',
            ],
            [
                'id'    => '29',
                'title' => 'expense_edit',
            ],
            [
                'id'    => '30',
                'title' => 'expense_show',
            ],
            [
                'id'    => '31',
                'title' => 'expense_delete',
            ],
            [
                'id'    => '32',
                'title' => 'expense_access',
            ],
            [
                'id'    => '33',
                'title' => 'income_create',
            ],
            [
                'id'    => '34',
                'title' => 'income_edit',
            ],
            [
                'id'    => '35',
                'title' => 'income_show',
            ],
            [
                'id'    => '36',
                'title' => 'income_delete',
            ],
            [
                'id'    => '37',
                'title' => 'income_access',
            ],
            [
                'id'    => '38',
                'title' => 'expense_report_create',
            ],
            [
                'id'    => '39',
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => '40',
                'title' => 'expense_report_show',
            ],
            [
                'id'    => '41',
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => '42',
                'title' => 'expense_report_access',
            ],
            [
                'id'    => '43',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '44',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '45',
                'title' => 'management_access',
            ],
            [
                'id'    => '46',
                'title' => 'branch_create',
            ],
            [
                'id'    => '47',
                'title' => 'branch_edit',
            ],
            [
                'id'    => '48',
                'title' => 'branch_show',
            ],
            [
                'id'    => '49',
                'title' => 'branch_delete',
            ],
            [
                'id'    => '50',
                'title' => 'branch_access',
            ],
            [
                'id'    => '51',
                'title' => 'department_create',
            ],
            [
                'id'    => '52',
                'title' => 'department_edit',
            ],
            [
                'id'    => '53',
                'title' => 'department_show',
            ],
            [
                'id'    => '54',
                'title' => 'department_delete',
            ],
            [
                'id'    => '55',
                'title' => 'department_access',
            ],
            [
                'id'    => '56',
                'title' => 'employee_create',
            ],
            [
                'id'    => '57',
                'title' => 'employee_edit',
            ],
            [
                'id'    => '58',
                'title' => 'employee_show',
            ],
            [
                'id'    => '59',
                'title' => 'employee_delete',
            ],
            [
                'id'    => '60',
                'title' => 'employee_access',
            ],
            [
                'id'    => '61',
                'title' => 'cartegory_create',
            ],
            [
                'id'    => '62',
                'title' => 'cartegory_edit',
            ],
            [
                'id'    => '63',
                'title' => 'cartegory_show',
            ],
            [
                'id'    => '64',
                'title' => 'cartegory_delete',
            ],
            [
                'id'    => '65',
                'title' => 'cartegory_access',
            ],
            [
                'id'    => '66',
                'title' => 'service_create',
            ],
            [
                'id'    => '67',
                'title' => 'service_edit',
            ],
            [
                'id'    => '68',
                'title' => 'service_show',
            ],
            [
                'id'    => '69',
                'title' => 'service_delete',
            ],
            [
                'id'    => '70',
                'title' => 'service_access',
            ],
            [
                'id'    => '71',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
