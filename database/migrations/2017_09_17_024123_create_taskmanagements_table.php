<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskmanagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('taskmanagements', function (Blueprint $table) {
        $table->increments('id');
        $table->string('task_desc');
        $table->enum('task_type',['bug','feature','enhancement']);
        $table->enum('task_status',['new','in_progress','closed']);
        $table->timestamps();
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taskmanagements');
    }
}
