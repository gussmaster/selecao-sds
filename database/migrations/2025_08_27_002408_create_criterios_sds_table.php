<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('criterios_sds', function (Blueprint $table) {
$table->id();
$table->enum('nivel', ['SUPERIOR','MEDIO_FUND']);
$table->string('codigo', 50);
$table->string('descricao');
$table->unsignedTinyInteger('max_pontos');
$table->boolean('ativo')->default(true);
$table->timestamps();
});
}
public function down(): void
{
Schema::dropIfExists('criterios_sds');
}
};