@extends('template.users')
@section('title', $category->name)
@section ('body')
        <h1>Categorias {{ $category->name }}</h1>
        <table class="table">
             <thead class=" text-center">
                <tr>
                 <th scope="col">ID</th>
                 <th scope="col">NOME</th>
                 <th scope="col">DATA CADASTRO</th>
                 <th scope="col">Visualizar</th>
                 <th scope="col">Deletar</th>
 
               </tr>
            </thead>
            <tbody class=" text-center">
                 <tr>
                 <th scope="row">{{ $category->id}}</th>
                 <td> {{ $category->name}} </td>
                 <td>{{ date ('d/m/Y - H:i', strtotime($category->created_at)) }}</td>
                 <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning text-white">Editar</a>
                 </td>
                 <td>
                    <form action="{{ route('categories.destroy', $category->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger text-white">Deletar</button>
                </form>
           </td>
     </tr>
                
           </tbody>
     </table>
@endsection