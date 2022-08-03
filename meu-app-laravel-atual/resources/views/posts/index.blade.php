
@extends('template.users')
@section('title', 'Listagem de Postagens')
@section('body')

<h1 class="text-white">Listagem de Postagens</h1>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Usuário</th>
            <th scope="col">Titulo</th>
            <th scope="col">Postagem</th>
            <th scope="col">Data de criação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->user->name}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->post}}</td>
            <td>{{ date('d/m/Y H:i', strtotime($post->created_at)) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection