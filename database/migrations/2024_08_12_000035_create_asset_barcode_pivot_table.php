<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetBarcodePivotTable extends Migration
{
    public function up()
    {
        Schema::create('asset_barcode', function (Blueprint $table) {
            $table->unsignedBigInteger('barcode_id');
            $table->foreign('barcode_id', 'barcode_id_fk_10001362')->references('id')->on('barcodes')->onDelete('cascade');
            $table->unsignedBigInteger('asset_id');
            $table->foreign('asset_id', 'asset_id_fk_10001362')->references('id')->on('assets')->onDelete('cascade');
        });
    }
}
