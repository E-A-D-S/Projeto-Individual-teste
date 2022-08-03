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
        // $user = User::where('id', $id)->first();
        // $user = User::findOrFail($id);
        // $user = User::find($id);
        // return $user;

        //if(!$user = User::findOrFail($id)) {
        //return redirect()->route('users.index');
        $category = Category::find($id);

        if ($category) {

            return view('categories.show', compact('category'));
        } else {

            throw new CategoryControllerException('Categoria não encontrada');
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
        return view('categories.create');
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

        //return redirect()->route('users.index');

        return redirect()->route('categories.index')->with('destroy', 'Categoria deletada com sucesso');
    }

    public function admin()
    {
        return view('admin.index');
    }
}
