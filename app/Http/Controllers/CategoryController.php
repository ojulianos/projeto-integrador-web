<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function store(Request $request)
    {

        if ($this->categories->create($category)) {
            return response(['message' => 'category cadastrada', 'status' => true]);
        }
        return response(['message' => 'category não cadastrada', 'status' => false]);
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
    public function update(Request $request, $id)
    {
        $category = $this->category->find($id);
        
        foreach ($request->except('_token') as $key => $value) {
            $category->$key = $value;
        }

        if ($category->save()) {
            return response(['message' => 'Catergoria atualizada', 'status' => true]);
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
        $category = $this->category->find($id);

        if ($category->delete()) {
            return response(['message' => 'Categoria excluída', 'status' => true]);
        }
        return response(['message' => 'Categoria não excluída', 'status' => false]);
    }
}
