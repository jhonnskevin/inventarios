<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_transacciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaccion_id')->constrained('transacciones');
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId(column: 'lote_id')->constrained('lotes');
            $table->integer('cantidad');
            $table->decimal('precio_unitario');
            $table->decimal('subtotal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalleTransacciones');
    }
};
