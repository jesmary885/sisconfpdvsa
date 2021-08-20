<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportegeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportegenerals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('reporte_plan');
            $table->integer('reporte_real');
            $table->integer('reporte_desviacion');
            $table->integer('reporte_cumplimiento');
            $table->unsignedBigInteger('avance_id');
            $table->foreign('avance_id')->references('id')->on('avances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportegenerals');
    }
}
