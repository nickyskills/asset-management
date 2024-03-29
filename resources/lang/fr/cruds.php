<?php

return [
    'userManagement'    => [
        'title'          => 'Gestion des utilisateurs',
        'title_singular' => 'Gestion des utilisateurs',
    ],
    'permission'        => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'              => [
        'title'          => 'Rôles',
        'title_singular' => 'Rôle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'              => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateur',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'expenseManagement' => [
        'title'          => 'Gestion des dépenses',
        'title_singular' => 'Gestion des dépenses',
    ],
    'expenseCategory'   => [
        'title'          => 'Catégories de dépenses',
        'title_singular' => 'Catégorie de dépenses',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'incomeCategory'    => [
        'title'          => 'Catégories de revenu',
        'title_singular' => 'Catégorie de revenu',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'expense'           => [
        'title'          => 'Dépenses',
        'title_singular' => 'Dépense',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'expense_category'        => 'Expense Category',
            'expense_category_helper' => '',
            'entry_date'              => 'Entry Date',
            'entry_date_helper'       => '',
            'amount'                  => 'Amount',
            'amount_helper'           => '',
            'description'             => 'Description',
            'description_helper'      => '',
            'created_at'              => 'Created at',
            'created_at_helper'       => '',
            'updated_at'              => 'Updated At',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Deleted At',
            'deleted_at_helper'       => '',
            'status'                  => 'Status',
            'status_helper'           => '',
            'due_date'                => 'Due Date',
            'due_date_helper'         => '',
            'created_by'              => 'Created By',
            'created_by_helper'       => '',
            'updated_by'              => 'Updated By',
            'updated_by_helper'       => '',
        ],
    ],
    'income'            => [
        'title'          => 'Revenus',
        'title_singular' => 'Revenus',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'income_category'        => 'Income Category',
            'income_category_helper' => '',
            'entry_date'             => 'Entry Date',
            'entry_date_helper'      => '',
            'amount'                 => 'Amount',
            'amount_helper'          => '',
            'description'            => 'Description',
            'description_helper'     => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
        ],
    ],
    'expenseReport'     => [
        'title'          => 'Rapport mensuel',
        'title_singular' => 'Rapport mensuel',
        'reports'        => [
            'title'             => 'Rapports',
            'title_singular'    => 'Rapport',
            'incomeReport'      => 'Rapport de revenus',
            'incomeByCategory'  => 'Revenu par catégorie',
            'expenseByCategory' => 'Dépenses par catégorie',
            'income'            => 'Revenus',
            'expense'           => 'Dépense',
            'profit'            => 'Gains',
        ],
    ],
    'auditLog'          => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'description'         => 'Description',
            'description_helper'  => '',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => '',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => '',
            'user_id'             => 'User ID',
            'user_id_helper'      => '',
            'properties'          => 'Properties',
            'properties_helper'   => '',
            'host'                => 'Host',
            'host_helper'         => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
        ],
    ],
    'management'        => [
        'title'          => 'Management',
        'title_singular' => 'Management',
    ],
    'branch'            => [
        'title'          => 'Branches',
        'title_singular' => 'Branche',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'name'                  => 'Name',
            'name_helper'           => 'Branch name',
            'address'               => 'Address',
            'address_helper'        => '',
            'contact_person'        => 'Contact Person',
            'contact_person_helper' => '',
            'department'            => 'Department',
            'department_helper'     => '',
            'zone'                  => 'Zone',
            'zone_helper'           => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],
    'department'        => [
        'title'          => 'Départments',
        'title_singular' => 'Département',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'description'        => 'Description',
            'description_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'employee'          => [
        'title'          => 'Employé',
        'title_singular' => 'Employé',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'employee_number'        => 'Employee Number',
            'employee_number_helper' => '',
            'first_name'             => 'First Name',
            'first_name_helper'      => '',
            'middle_name'            => 'Middle Name',
            'middle_name_helper'     => '',
            'surname'                => 'Surname',
            'surname_helper'         => '',
            'address'                => 'Address',
            'address_helper'         => '',
            'branch'                 => 'Branch',
            'branch_helper'          => '',
            'user'                   => 'User',
            'user_helper'            => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => '',
        ],
    ],
    'cartegory'         => [
        'title'          => 'catégorie',
        'title_singular' => 'catégorie',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'description'        => 'Description',
            'description_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'service'           => [
        'title'          => 'Services',
        'title_singular' => 'Service',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'cartegory'         => 'Cartegory',
            'cartegory_helper'  => 'Select category for this expense',
            'status'            => 'Status',
            'status_helper'     => '',
            'priority'          => 'Priority',
            'priority_helper'   => '',
            'usage'             => 'Usage',
            'usage_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
];
