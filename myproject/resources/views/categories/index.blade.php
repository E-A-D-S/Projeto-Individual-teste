@extends('template.users')
@section('title', 'Listagem de Categorias')
@section ('body')
<h1> Listagem de Categorias</h1>
@if(session()->has('create'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Atenção!</strong> {{ session()->get('create') }}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Atenção!</strong> {{ session()->get('edit') }}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('destroy'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Atenção!</strong> {{ session()->get('destroy') }}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-sm mt-2 mb-5">
            <a href="{{ route('categories.create') }}" class="btn btn-outline-dark"> Nova categoria</a>
        </div>
        <div class="col-sm mt-2 mb-5">
            <form action="{{ route('categories.index') }}" method="GET">
                <div class="input-group">
                    <input type="search" class="form-control rounded" name="search" />
                    <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<table class="table">
    <thead class=" text-center">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Data Cadastro</th>
        </tr>
    </thead>
    <tbody class=" text-center">
        @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $category->id}}</th>
            <td>{{ $category->name }}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->update_at}}</td>
            <td>
                <a href="{{ route('categories.show', $category->id) }}"
                    class="btn btn-primary text-white">Visualizar</a>
            </td>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="justify-content-center pagination">
    {{ $categories->links('pagination::bootstrap-4') }}
</div>
</div>
@endsection