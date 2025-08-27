<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SdsCargosECriteriosSeeder extends Seeder
{
public function run(): void
{
// CARGOS (ajuste valores conforme ato administrativo)
$cargos = [
['nome' => 'Técnico Socioassistencial I', 'nivel' => 'SUPERIOR', 'jornada_horas_semanais' => 30, 'remuneracao_mensal' => 2917.84],
['nome' => 'Técnico Socioassistencial II', 'nivel' => 'SUPERIOR', 'jornada_horas_semanais' => 40, 'remuneracao_mensal' => 2917.84],
['nome' => 'Técnico Socioassistencial III', 'nivel' => 'SUPERIOR', 'jornada_horas_semanais' => 40, 'remuneracao_mensal' => 2917.84],
['nome' => 'Técnico Socioassistencial IV', 'nivel' => 'SUPERIOR', 'jornada_horas_semanais' => 30, 'remuneracao_mensal' => 3500.00],
['nome' => 'Agente Socioassistencial', 'nivel' => 'MEDIO', 'jornada_horas_semanais' => 40, 'remuneracao_mensal' => 1700.00],
['nome' => 'Auxiliar Socioassistencial', 'nivel' => 'FUNDAMENTAL', 'jornada_horas_semanais' => 40, 'remuneracao_mensal' => 1700.00],
['nome' => 'Auxiliar Socioassistencial I', 'nivel' => 'MEDIO', 'jornada_horas_semanais' => 40, 'remuneracao_mensal' => 1700.00],
];
DB::table('cargos_sds')->insert($cargos);


// CRITÉRIOS — Nível Superior
$sup = [
['nivel' => 'SUPERIOR','codigo' => 'FORMACAO','descricao' => 'Formação acadêmica (graduação na área exigida)','max_pontos' => 5],
['nivel' => 'SUPERIOR','codigo' => 'EXPERIENCIA','descricao' => 'Experiência profissional até 1 ano','max_pontos' => 2],
['nivel' => 'SUPERIOR','codigo' => 'CURSOS','descricao' => 'Cursos de capacitação na área (1 ponto por curso)','max_pontos' => 20],
['nivel' => 'SUPERIOR','codigo' => 'ENT_CLAREZA','descricao' => 'Entrevista: clareza na comunicação','max_pontos' => 5],
['nivel' => 'SUPERIOR','codigo' => 'ENT_CONHEC','descricao' => 'Entrevista: conhecimento técnico','max_pontos' => 4],
['nivel' => 'SUPERIOR','codigo' => 'ENT_POSTURA','descricao' => 'Entrevista: postura ética','max_pontos' => 3],
];


// CRITÉRIOS — Médio/Fundamental
$mf = [
['nivel' => 'MEDIO_FUND','codigo' => 'ESCOLARIDADE','descricao' => 'Escolaridade (Fund. 2 / Médio 3)','max_pontos' => 3],
['nivel' => 'MEDIO_FUND','codigo' => 'EXPERIENCIA','descricao' => 'Experiência (até 6m =1 / >6m =2)','max_pontos' => 2],
['nivel' => 'MEDIO_FUND','codigo' => 'CURSOS','descricao' => 'Cursos de capacitação (2 pontos por curso)','max_pontos' => 20],
['nivel' => 'MEDIO_FUND','codigo' => 'ENT_CLAREZA','descricao' => 'Entrevista: clareza','max_pontos' => 5],
['nivel' => 'MEDIO_FUND','codigo' => 'ENT_CONHEC','descricao' => 'Entrevista: conhecimento técnico básico','max_pontos' => 4],
['nivel' => 'MEDIO_FUND','codigo' => 'ENT_POSTURA','descricao' => 'Entrevista: postura ética e comunicativa','max_pontos' => 3],
];


DB::table('criterios_sds')->insert(array_merge($sup, $mf));
}
}