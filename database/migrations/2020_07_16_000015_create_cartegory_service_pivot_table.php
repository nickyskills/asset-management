<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartegoryServicePivotTable extends Migration
{
    public function up()
    {
        Schema::create('cartegory_service', function (Blueprint $table) {
            $table->unsignedInteger('service_id');
            $table->foreign('service_id', 'service_id_fk_1845286')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedInteger('cartegory_id');
            $table->foreign('cartegory_id', 'cartegory_id_fk_1845286')->references('id')->on('cartegories')->onDelete('cascade');
        });
    }
}
