<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExpensesTable extends Migration
{
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->unsignedInteger('expense_category_id')->nullable();
            $table->foreign('expense_category_id', 'expense_category_fk_1815291')->references('id')->on('expense_categories');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_1845351')->references('id')->on('employees');
            $table->unsignedInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_1845352')->references('id')->on('employees');
        });
    }
}
