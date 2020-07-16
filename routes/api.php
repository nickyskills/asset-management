<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Expense Categories
    Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

    // Income Categories
    Route::apiResource('income-categories', 'IncomeCategoryApiController');

    // Expenses
    Route::apiResource('expenses', 'ExpenseApiController');

    // Incomes
    Route::apiResource('incomes', 'IncomeApiController');

    // Branches
    Route::apiResource('branches', 'BranchApiController');

    // Departments
    Route::post('departments/media', 'DepartmentApiController@storeMedia')->name('departments.storeMedia');
    Route::apiResource('departments', 'DepartmentApiController');

    // Employees
    Route::apiResource('employees', 'EmployeeApiController');

    // Cartegories
    Route::apiResource('cartegories', 'CartegoryApiController');

    // Services
    Route::post('services/media', 'ServiceApiController@storeMedia')->name('services.storeMedia');
    Route::apiResource('services', 'ServiceApiController');
});
