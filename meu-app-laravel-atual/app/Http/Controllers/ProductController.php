<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductControllerException;
use App\Models\Product;
use App\Http\Requests\StoreUpdateProductFormRequest;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function index(Request $request)
    {
        $products = $this->model->getProducts(
            $request->search ?? ''
        );

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        // $user = User::where('id', $id)->first();
        // $user = User::findOrFail($id);
        // $user = User::find($id);
        // return $user;

        //if(!$user = User::findOrFail($id)) {
        //return redirect()->route('users.index');
        $product = Product::find($id);

        if ($product) {

            return view('products.show', compact('product'));
        } else {

            throw new ProductControllerException('Produto não encontrado');
        }

        //return view('users.show', compact('user'));

        // return view('users.show', compact('user', 'title'));

        //$team = Team::find($id);
        //$team->load('users');

        // return $team;

        // $user->load('teams');
        // $title = "Usuário ".$user->name;
        // return $user;

    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreUpdateProductFormRequest $request)
    {

        //$user = new User;
        //$user->name = $request->name;
        //$user->email = $request->email;
        //$user->password = bcrypt($request->password);
        //$user->save();

        $data = $request->all();
        $data['password'] = bcrypt($request->password);


        if ($request->image) {
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image'] = $path;
        }

        $this->model->create($data);

        return redirect()->route('products.index')->with('create', 'Produto cadastrado com sucesso');
    }

    public function edit($id)
    {
        if (!$product = $this->model->find($id))
            return redirect()->route('products.index');

        return view('products.edit', compact('product'));
    }

    public function update(StoreUpdateProductFormRequest $request, $id)
    {

        if (!$product = $this->model->find($id))
            return redirect()->route('products.index');

        $data = $request->all();

        
        if ($request->image) {
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image'] = $path;
        }
        
        $product->update($data);

        return redirect()->route('products.index')->with('edit', 'Produto atualizado com sucesso');
    }

    public function destroy($id)
    {

        if (!$product = $this->model->find($id))
            return redirect()->route('products.index');

        $product->delete();

        //return redirect()->route('users.index');

        return redirect()->route('products.index')->with('destroy', 'Produto deletado com sucesso');
    }

    public function admin()
    {
        return view('admin.index');
    }
}
