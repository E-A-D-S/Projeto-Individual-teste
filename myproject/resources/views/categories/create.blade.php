@extends('template.users')
@section('title', 'Nova Categoria')
@section ('body')

<h1>Nova Categoria</h1>


@if($errors->any())
<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error)
    {{ $error }}<br>
    @endforeach
</div>
@endif

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="Name">
    </div>

    <button type="submit" class="btn btn-primary">enviar</button>
</form>
</div>
</div>
@endsection