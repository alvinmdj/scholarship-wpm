<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim')->unique();
            $table->string('alamat');
            $table->double('ipk', 2, 1);
            $table->double('ips', 2, 1);
            $table->integer('pendapatan_ortu');
            $table->integer('jumlah_saudara');
            $table->integer('biaya_hidup');
            $table->string('foto')->default('photos/default.jpg');
            $table->string('logo_univ')->default('logos/default.jpg');
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
        Schema::dropIfExists('students');
    }
}
