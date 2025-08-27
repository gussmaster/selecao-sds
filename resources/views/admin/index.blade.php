@extends('layouts.app')
</div>
</div>
</div>
<div class="column is-3">
<div class="field">
<label class="label">Cargo</label>
<div class="control">
<div class="select is-fullwidth">
<select name="cargo_id">
<option value="">Todos</option>
@foreach($cargos as $c)
<option value="{{ $c->id }}" @selected(request('cargo_id')==$c->id)>{{ $c->nome }}</option>
@endforeach
</select>
</div>
</div>
</div>
</div>
<div class="column is-4">
<label class="label">Busca (nome/CPF/NIS/CRAS)</label>
<input class="input" name="busca" value="{{ request('busca') }}">
</div>
<div class="column is-2">
<label class="label">&nbsp;</label>
<button class="button is-link is-fullwidth">Filtrar</button>
</div>
</div>
</form>


<table class="table is-striped is-fullwidth">
<thead>
<tr>
<th>ID</th><th>Nome</th><th>CPF</th><th>Cargo</th><th>Status</th><th>Pontos</th><th>Ações</th>
</tr>
</thead>
<tbody>
@foreach($inscricoes as $i)
<tr>
<td>{{ $i->id }}</td>
<td>{{ $i->nome }}</td>
<td>{{ $i->cpf }}</td>
<td>{{ $i->cargo_nome }}</td>
<td>
<form method="POST" action="{{ route('admin.status',$i->id) }}" class="d-inline">
@csrf
<div class="select">
<select name="status_sds" onchange="this.form.submit()">
@foreach(['protocolo','em_analise','habilitado','inabilitado','credenciado'] as $s)
<option value="{{ $s }}" @selected($i->status_sds===$s)>{{ $s }}</option>
@endforeach
</select>
</div>
</form>
</td>
<td>{{ $i->pontuacao_total ?? '-' }}</td>
<td>
<details>
<summary class="button is-small is-light">Entrevista</summary>
<form method="POST" action="{{ route('admin.entrevista',$i->id) }}" class="mt-2">
@csrf
<div class="field is-grouped">
<p class="control"><input class="input" type="number" name="clareza" min="0" max="5" value="{{ $i->clareza ?? 0 }}" placeholder="clareza"></p>
<p class="control"><input class="input" type="number" name="conhecimento" min="0" max="4" value="{{ $i->conhecimento ?? 0 }}" placeholder="conhecimento"></p>
<p class="control"><input class="input" type="number" name="postura" min="0" max="3" value="{{ $i->postura ?? 0 }}" placeholder="postura"></p>
<p class="control"><button class="button is-info is-light">Salvar</button></p>
</div>
</form>
</details>


<form method="POST" action="{{ route('admin.classificar',$i->id) }}" class="mt-2">
@csrf
<div class="field has-addons">
<p class="control is-expanded">
<input class="input" type="number" name="pontuacao_documental" min="0" max="20" step="1" placeholder="Doc." value="{{ $i->pontuacao_documental ?? 0 }}">
</p>
<p class="control">
<button class="button is-primary">Classificar</button>
</p>
</div>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>


{{ $inscricoes->withQueryString()->links() }}
@endsection