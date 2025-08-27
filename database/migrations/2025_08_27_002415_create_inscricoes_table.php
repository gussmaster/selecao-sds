<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('inscricoes', function (Blueprint $table) {
$table->id();
$table->foreignId('cargo_id')->constrained('cargos_sds')->cascadeOnDelete();


// Dados pessoais mínimos
$table->string('nome');
$table->string('cpf')->unique();
$table->string('email')->nullable();
$table->string('telefone')->nullable();
$table->date('data_nascimento')->nullable();
$table->string('nome_social')->nullable();


// Campos sociais SDS
$table->string('nis', 20)->nullable()->index();
$table->string('cras', 120)->nullable()->index();
$table->string('territorio', 120)->nullable();


// Entrevista/opcionais de pontuação
$table->unsignedTinyInteger('clareza')->nullable(); // 0-5
$table->unsignedTinyInteger('conhecimento')->nullable(); // 0-4
$table->unsignedTinyInteger('postura')->nullable(); // 0-3


$table->unsignedTinyInteger('pontuacao_documental')->nullable();
$table->unsignedTinyInteger('pontuacao_entrevista')->nullable();
$table->unsignedTinyInteger('pontuacao_total')->nullable(); // 0-20


$table->enum('status_sds', ['protocolo','em_analise','habilitado','inabilitado','credenciado'])
->default('protocolo')->index();


$table->timestamps();
});
}
public function down(): void
{
Schema::dropIfExists('inscricoes');
}
};