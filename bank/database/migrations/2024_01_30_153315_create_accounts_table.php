<?php

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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('accountNumber', 64);
            $table->unsignedBigInteger('client_id')->nullable(); //reikalingas apjungiant lenteles, per ID susiejam. Rysi daro mechanic_id stulpelis su references id mechaniku lenteleje.
            $table->foreign('client_id')->references('id')->on('clients'); //rysio aprasas
            $table->bigInteger('balance');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
