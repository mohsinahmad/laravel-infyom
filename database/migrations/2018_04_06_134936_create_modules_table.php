<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');

//            'table_name', 'name', 'slug', 'icon', 'config', 'menu'
            $table->string('name');
            $table->string('slug');
            $table->string('table_name');
            $table->string('icon');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_module')->default(0);
            $table->text('config')->nullable();
            $table->tinyInteger('is_protected')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
