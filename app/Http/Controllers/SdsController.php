<?php
// Salvar inscrição mínima
public function inscricaoSalvar(Request $r)
{
$data = $r->validate([
'cargo_id' => 'required|exists:cargos_sds,id',
'nome' => 'required|string|max:120',
'cpf' => 'required|string|max:14|unique:inscricoes,cpf',
'email' => 'nullable|email',
'telefone' => 'nullable|string|max:20',
'data_nascimento' => 'nullable|date',
'nome_social' => 'nullable|string|max:120',
'nis' => 'nullable|string|max:20',
'cras' => 'nullable|string|max:120',
'territorio' => 'nullable|string|max:120',
]);
$data['status_sds'] = 'protocolo';


$insc = Inscricao::create($data);
return redirect()->route('home')->with('ok', 'Inscrição recebida! Protocolo: #'.$insc->id);
}


// Painel simples (listar + ações)
public function admin(Request $r)
{
$q = Inscricao::query()
->select('inscricoes.*','cargos_sds.nome as cargo_nome')
->leftJoin('cargos_sds','cargos_sds.id','=','inscricoes.cargo_id');


if ($r->filled('status')) $q->where('status_sds',$r->status);
if ($r->filled('cargo_id')) $q->where('cargo_id',$r->cargo_id);
if ($r->filled('busca')) {
$b = '%'.$r->busca.'%';
$q->where(function($w) use ($b){
$w->where('nome','like',$b)->orWhere('cpf','like',$b)->orWhere('nis','like',$b)->orWhere('cras','like',$b);
});
}


$inscricoes = $q->orderBy('status_sds')->orderByDesc('pontuacao_total')->paginate(20);
$cargos = CargoSds::orderBy('nome')->get();


return view('admin.index', compact('inscricoes','cargos'));
}


public function status($id, Request $r)
{
$r->validate(['status_sds' => 'required|in:protocolo,em_analise,habilitado,inabilitado,credenciado']);
Inscricao::where('id',$id)->update(['status_sds'=>$r->status_sds]);
return back()->with('ok','Status atualizado');
}


public function entrevista($id, Request $r)
{
$data = $r->validate([
'clareza' => 'required|integer|min:0|max:5',
'conhecimento' => 'required|integer|min:0|max:4',
'postura' => 'required|integer|min:0|max:3',
]);
$data['pontuacao_entrevista'] = $data['clareza'] + $data['conhecimento'] + $data['postura'];
Inscricao::where('id',$id)->update($data);
return back()->with('ok','Entrevista lançada');
}


public function classificar($id, Request $r)
{
$i = Inscricao::findOrFail($id);
$nivel = CargoSds::where('id',$i->cargo_id)->value('nivel');


// Documental — aqui você pode calcular de forma objetiva conforme docs avaliados.
// Para demo, vamos ler do request (ou 0 se não informado):
$doc = (int) $r->input('pontuacao_documental', 0);


// Entrevista já salva em inscricao (se não, usa 0)
$entrevista = (int) ($i->pontuacao_entrevista ?? 0);


// Regras teto por nível (máx 20 somando tudo)
$total = min($doc + $entrevista, 20);


$i->pontuacao_documental = $doc;
$i->pontuacao_total = $total;
// Opcional: decidir status automaticamente
if ($i->status_sds === 'em_analise') {
$i->status_sds = 'habilitado';
}
$i->save();


return back()->with('ok','Classificação: '.$total.' pontos');
    }
}