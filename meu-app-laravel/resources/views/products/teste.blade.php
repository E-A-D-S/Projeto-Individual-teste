@extends('template.users')
@section('title', 'Novo Produto')
@section ('body')

<h1 class="text-white">Novo Produto</h1>


@if($errors->any())
<div class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)
  {{ $error }}<br>
  @endforeach
</div>
@endif


<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="container">
  @csrf
  <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        Nome: <input type="text" name="nome" class="form-control" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        Descrição: <input type="text" name="description" class="form-control" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        Categoria: <input type="text" name="category" id="category" class="form-control" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        Cor: <input type="text" name="color" class="form-control" />
                    </div>
                </div>
                 <div class="col-8">
                    <div class="form-group">
                        Tamanho: <input type="text" name="size" class="form-control" />
                        </div>
                    </div>
                <div class="col-1">
                    <div class="form-group">
                        Marca: <input type="text" name="brand" class="form-control" />
                        </div>
                    </div>
                <div class="col-3">
                    <div class="form-group">
                        Preço de custo <input type="text" name="cost" class="form-control" />
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        Preço de venda: <input type="text" name="sale" class="form-control" />
                    </div>
                </div>
                    <div class="col-4">
                        <div class="form-group">
                        Cep: <input type="text" name="cep" id="cep" class="form-control" />
                    </div>
                </div>
                    <div class="col-4">
                        <div class="form-group">
                        Estado: <input type="text" name="estado" class="form-control" />
                    </div>
                </div>
             </div>
          
                   <br><input type="submit" value="Cadastrar" class="btn btn-success btn-sm" /><br>
             
    </form>
</div>
@endsection
