<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    private Category $categories;

    public function __construct(Category $category){
        
        $this->categories = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.categories.list', [
            'categories' => $this->categories->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.categories.form', [
            'category' => $this->categories, 
            'form_action' => route('category.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if ($this->categories->create($request -> all())) {
            return response(['message' => 'Categoria cadastrada', 'status' => true]);
        }
        return response(['message' => 'Categoria não cadastrada', 'status' => false]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.categories.form', [
            'category' => $this->categories->find($id),
            'form_action' => route('category.store')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categories->find($id);
        
        foreach ($request->except('_token') as $key => $value) {
            $category->$key = $value;
        }

        if ($category->save()) {
            return response(['message' => 'Categoria atualizada', 'status' => true]);
        }
        return response(['message' => 'Categoria não atualizada', 'status' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categories->find($id);

        if ($category->delete()) {
            return response(['message' => 'Categoria excluída', 'status' => true]);
        }
        return response(['message' => 'Categoria não excluída', 'status' => false]);
    }

    public function relatorio_aluno_categoria(Request $request)
    {
        $categoria = $request->category_id;
        $alunos = [];

        if ($categoria) {
            $idades = Category::find($categoria);
            
            $alunos = (new Category())->relatorioAlunos($idades->age_min, $idades->age_max, $idades->name);
        }
        
        $categorias = Category::all();
        
        return view('relatorios.alunos_x_categoria', ['alunos' => $alunos, 'categorias' => $categorias]);
    }
}
