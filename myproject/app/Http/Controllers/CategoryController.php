<?php

namespace App\Http\Controllers;

use App\Exceptions\CategoryControllerException;
use App\Models\Category;
use App\Http\Requests\StoreUpdateProductFormRequest;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function index(Request $request)
    {
        $categories = $this->model->getCategories(
            $request->search ?? ''
        );

        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        
        $category = Category::find($id);

        if ($category) {

            return view('categories.show', compact('category'));
        } else {

            throw new CategoryControllerException('Categoria não encontrada');
        }

    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreUpdateProductFormRequest $request)
    {


        $data = $request->all();
        $data['password'] = bcrypt($request->password);


        if ($request->image) {
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image'] = $path;
        }

        $this->model->create($data);

        return redirect()->route('categories.index')->with('create', 'Categoria cadastrada com sucesso');
    }

    public function edit($id)
    {
        if (!$category = $this->model->find($id))
            return redirect()->route('categories.index');

        return view('categories.edit', compact('category'));
    }

    public function update(StoreUpdateProductFormRequest $request, $id)
    {

        if (!$category = $this->model->find($id))
            return redirect()->route('categories.index');

        $data = $request->all();

        
        if ($request->image) {
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image'] = $path;
        }
        
        $category->update($data);

        return redirect()->route('categories.index')->with('edit', 'categoria atualizada com sucesso');
    }

    public function destroy($id)
    {

        if (!$category = $this->model->find($id))
            return redirect()->route('categories.index');

        $category->delete();

        return redirect()->route('categories.index')->with('destroy', 'Categoria deletada com sucesso');
    }

    public function admin()
    {
        return view('admin.index');
    }
}
