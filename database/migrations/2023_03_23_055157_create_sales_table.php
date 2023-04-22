<?php

use App\Models\Sale;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('app', 10)->nullable();
            $table->integer('app_id')->nullable();
            $table->string('contact')->nullable();
            $table->string('phone')->nullable();
            $table->enum('status', [Sale::PENDIENTE, Sale::RECIBIDO, Sale::ENVIADO, Sale::ENTREGADO, Sale::ANULADO])->default(Sale::PENDIENTE);
            $table->enum('asc_points', [Sale::PTS_ASIGNAR, Sale::PTS_ASIGNADOS, Sale::PTS_SUMADOS])->default(Sale::PTS_ASIGNAR);
            $table->enum('envio_type', [Sale::REGISTRO, Sale::VIRTUAL, Sale::TANGIBLE])->default(Sale::REGISTRO);
            $table->float('shipping_cost');
            $table->float('iva');
            $table->float('total');
            $table->float('pts');
            $table->json('content')->nullable();



            /* $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade');

            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade');

            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade'); */

            $table->string('address')->nullable();
            $table->string('references')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
