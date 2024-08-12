<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetBonPivotTable extends Migration
{
    public function up()
    {
        Schema::create('asset_bon', function (Blueprint $table) {
            $table->unsignedBigInteger('bon_id');
            $table->foreign('bon_id', 'bon_id_fk_10001390')->references('id')->on('bons')->onDelete('cascade');
            $table->unsignedBigInteger('asset_id');
            $table->foreign('asset_id', 'asset_id_fk_10001390')->references('id')->on('assets')->onDelete('cascade');
        });
    }
}
