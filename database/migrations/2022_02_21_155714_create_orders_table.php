<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('customer_id');
            $table->string('number', 15)->unique();
            $table->date('date');
            $table->date('due_date')->nullable();
            $table->unsignedInteger('total');
            $table->unsignedInteger('discount')->nullable();
            $table->string('notes')->nullable();
            $table->enum('sort', ['sale', 'purchase'])->default('sale');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('orders');
    }
}
