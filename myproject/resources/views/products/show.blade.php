@extends('template.users')
@section('title', $product->name)
@section ('body')
<h1>Usuário {{ $product->name }}</h1>
<table class="table">
    <thead class=" text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Codigo de Barras</th>
            <th scope="col">Cor</th>
            <th scope="col">Tamanho</th>
            <th scope="col">Marca</th>
            <th scope="col">Preço de Custo</th>
            <th scope="col">Preço de Venda</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagem</th>
            <th scope="col">Data Cadastro</th>
            <th scope="col">Visualizar</th>
            <th scope="col">Deletar</th>


        </tr>
    </thead>
    <tbody class=" text-center">
        <tr>
            <th scope="row">{{ $product->id}}</th>
            <td> {{ $product->name}} </td>
            <td>{{$product->description }}</td>
            <td>{{$product->code_bars }}</td>
            <td>{{$product->color}}</td>
            <td>{{$product->size}}</td>
            <td>{{$product->brand}}</td>
            <td>{{$product->cost}}</td>
            <td>{{$product->sale}}</td>
            <td>{{$product->category}}</td>

            <td><img src=" {{ asset('storage/'.$product->image) }}" width="50px" height="50px" class="rounded-circle" />
            </td>
            <td>{{ date ('d/m/Y - H:i:s', strtotime($product->created_at)) }}</td>


            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning text-white">Editar</a>
            </td>
            <td>
                <form action="{{ route('products.destroy', $product->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger text-white">Deletar</button>
                </form>
            </td>
        </tr>

    </tbody>
</table>
@endsection