@extends('layouts.app')
<select name="cargo_id" required>
<option value="">Selecione...</option>
@foreach($cargos as $c)
<option value="{{ $c->id }}">{{ $c->nome }}</option>
@endforeach
</select>
</div>
</div>
</div>
</div>
<div class="column">
<div class="field">
<label class="label">CPF</label>
<div class="control">
<input class="input" type="text" name="cpf" placeholder="000.000.000-00" required>
</div>
</div>
</div>
</div>


<div class="columns">
<div class="column">
<div class="field">
<label class="label">Nome completo</label>
<div class="control"><input class="input" name="nome" required></div>
</div>
</div>
<div class="column">
<div class="field">
<label class="label">Nome social (opcional)</label>
<div class="control"><input class="input" name="nome_social"></div>
</div>
</div>
</div>


<div class="columns">
<div class="column">
<div class="field">
<label class="label">E-mail</label>
<div class="control"><input class="input" type="email" name="email"></div>
</div>
</div>
<div class="column">
<div class="field">
<label class="label">Telefone</label>
<div class="control"><input class="input" name="telefone" placeholder="(DDD) 9XXXX-XXXX"></div>
</div>
</div>
<div class="column">
<div class="field">
<label class="label">Data de Nascimento</label>
<div class="control"><input class="input" type="date" name="data_nascimento"></div>
</div>
</div>
</div>


<div class="columns">
<div class="column">
<div class="field">
<label class="label">NIS</label>
<div class="control"><input class="input" name="nis"></div>
</div>
</div>
<div class="column">
<div class="field">
<label class="label">CRAS</label>
<div class="control"><input class="input" name="cras"></div>
</div>
</div>
<div class="column">
<div class="field">
<label class="label">Território</label>
<div class="control"><input class="input" name="territorio"></div>
</div>
</div>
</div>


<div class="field is-grouped">
<div class="control"><button class="button is-primary" type="submit">Enviar inscrição</button></div>
<div class="control"><a class="button is-light" href="{{ route('home') }}">Cancelar</a></div>
</div>


@if ($errors->any())
<article class="message is-danger mt-4">
<div class="message-header"><p>Erros</p></div>
<div class="message-body">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
</article>
@endif
</form>
@endsection