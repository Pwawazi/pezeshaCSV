<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->string('InvoiceNo');
            $table->string('StockCode');
            $table->text('Description');
            $table->string('Quantity');
            $table->string('InvoiceDate');
            $table->string('UnitPrice');
            $table->string('CustomerId');
            $table->string('Country');
            $table->string('I')->nullable();
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
        Schema::dropIfExists('invoice');
    }
}
