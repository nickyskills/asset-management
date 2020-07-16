<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_1844163')->references('id')->on('branches');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_1844164')->references('id')->on('users');
        });
    }
}
