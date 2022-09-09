<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Sede;
use App\Models\User;
use App\Models\Area;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puesto_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Sede::class);
            $table->foreignIdFor(Area::class);
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
        Schema::dropIfExists('puesto_trabajos');
    }
};
