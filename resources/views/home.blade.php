@extends('layouts.app')
@section('content')
<h1 class="title">Chamamento Público – Credenciamento (SDS)</h1>
<p class="subtitle">Inscrições contínuas conforme edital. Selecione um cargo e faça sua inscrição.</p>
<a class="button is-primary" href="{{ route('inscricao.form') }}">Nova inscrição</a>
<hr>
<h2 class="title is-5">Cargos</h2>
<table class="table is-fullwidth">
<thead><tr><th>Cargo</th><th>Nível</th><th>Jornada</th><th>Remuneração</th></tr></thead>
<tbody>
@foreach($cargos as $c)
<tr>
<td>{{ $c->nome }}</td>
<td>{{ $c->nivel }}</td>
<td>{{ $c->jornada_horas_semanais }}h/sem</td>
<td>{{ $c->remuneracao_mensal ? 'R$ '.number_format($c->remuneracao_mensal,2,',','.') : '-' }}</td>
</tr>
@endforeach
</tbody>
</table>
@endsection