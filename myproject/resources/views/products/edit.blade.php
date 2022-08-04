@extends('template.users')
@section('title', "product {$product->name}")
@section ('body')


<h1 class="text-white"> Produtos</H1>
@if($errors->any())

<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error)
    {{ $error }}<br>
    @endforeach
</div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3"><b>
            <label for="name" class="form-label text-white">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label text-white">Descrição</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="mb-3">
        <label for="category" class="form-label text-white">Categoria</label>
        <input type="text" class="form-control" id="category" name="category">
    </div>
    <div class="mb-3">
        <label for="color" class="form-label text-white">Cor</label>
        <input type="text" class="form-control" id="color" name="color">
    </div>
    <div class="mb-3">
        <label for="size" class="form-label text-white">Tamanho</label>
        <input type="text" class="form-control" id="size" name="size">
    </div>
    <div class="mb-3">
        <label for="brand" class="form-label text-white">Marca</label>
        <input type="text" class="form-control" id="brand" name="brand">
    </div>
    <div class="mb-3">
        <label for="cost" class="form-label text-white">Preço de Custo</label>
        <input type="float" class="form-control" id="cost" name="cost">
    </div>
    <div class="mb-3">
        <label for="sale" class="form-label text-white">Preço de Venda</label>
        <input type="float" class="form-control" id="sale" name="sale">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label text-white"> Selecione uma Imagem</label>
        <input type="file" class="form-control form control-md" id="image" name="image" />
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
@endsection