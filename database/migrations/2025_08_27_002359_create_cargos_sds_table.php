<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('cargos_sds', function (Blueprint $table) {
$table->id();
$table->string('nome');
$table->enum('nivel', ['SUPERIOR','MEDIO','FUNDAMENTAL']);
$table->unsignedSmallInteger('jornada_horas_semanais')->default(30);
$table->decimal('remuneracao_mensal', 10, 2)->nullable();
$table->timestamps();
});
}
public function down(): void
{
Schema::dropIfExists('cargos_sds');
 }
};