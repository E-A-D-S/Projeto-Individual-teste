@extends('template.users')
@section('title', 'Listagem de Produtos')
@section ('body')
<h1> Listagem de Produtos</h1>
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
            <a href="{{ route('products.create') }}" class="btn btn-outline-dark"> Novo Produto</a>
        </div>
        <div class="col-sm mt-2 mb-5">
            <form action="{{ route('products.index') }}" method="GET">
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
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Codigo de Barras</th>
            <th scope="col">Data Cadastro</th>
            <th scope="col">Cor</th>
            <th scope="col">Tamanho</th>
            <th scope="col">Marca</th>
            <th scope="col">Preço de custo</th>
            <th scope="col">Preço de Venda</th>
            <th scope="col">Categoria</th>
        </tr>
    </thead>
    <tbody class=" text-center">
        @foreach($products as $product)
        <tr>
            @if($product->image)
            <th><img src=" {{ asset('storage/'.$product->image) }}" width="50px" height="50px" class="rounded-circle" />
            </th>
            @else
            <th><img src=" {{ asset('storage/profile/avatar.png') }}" width="50px" height="50px"
                    class="rounded-circle" /></th>
            @endif
            <td>{{ $product->name }}</td>
            <td>{{$product->description }}</td>
            <td>{{$product->code_bars }}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->color}}</td>
            <td>{{$product->size}}</td>
            <td>{{$product->brand}}</td>
            <td>{{$product->cost}}</td>
            <td>{{$product->sale}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->update_at}}</td>


            <td>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary text-white">Visualizar</a>
            </td>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<div class="justify-content-center pagination">
    {{ $products->links('pagination::bootstrap-4') }}
</div>
</div>
@endsection