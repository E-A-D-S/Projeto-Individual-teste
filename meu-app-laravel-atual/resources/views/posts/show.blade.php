@extends ('template.users')
@section('title', "Listagem de postagens do {$user->name}")
@section('body')
<h1>Postagens do {{$user->name}}</h1>

@foreach($posts as $post)
    <div class="mb-3">
        <label class="form-label">Identificação Nº:<b>{{ $post->id }}</label>
            <br>
        <label class="form-label">Status:<b>{{ $post->active?'Ativo':'Inativo' }}</label>
             <br>
        <label class="form-label">Título:<b>{{ $post->title }}</b></label>
            <br>
        <label class="form-label"><b>Postagem:</b></label>
             <br>
        <textarea class="form-control" rows="5">{{ $post->post }}</textarea>
    </div>
    
    @endforeach
@endsection

