<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $title ?? 'SDS – Credenciamento' }}</title>
<!-- Bootstrap & Bulma via CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
</head>
<body>
<nav class="navbar is-dark" role="navigation">
<div class="navbar-brand">
<a class="navbar-item" href="{{ route('home') }}"><strong>SDS – Credenciamento</strong></a>
</div>
<div class="navbar-menu">
<div class="navbar-start">
<a class="navbar-item" href="{{ route('inscricao.form') }}">Inscrever-se</a>
<a class="navbar-item" href="{{ route('admin.index') }}">Comissão</a>
</div>
</div>
</nav>
<section class="section">
<div class="container">
@if (session('ok'))
<div class="notification is-success">{{ session('ok') }}</div>
@endif
{{ $slot ?? '' }}
@yield('content')
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>