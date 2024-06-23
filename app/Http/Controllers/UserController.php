<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private User $users;

    public function __construct(User $user)
    {
        $this->users = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.users.list', [
            'users' => $this->users->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.form', [
            'user' => $this->users,
            'form_action' => route('user.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->all();
        $user['password'] = bcrypt($request->password);

        if ($this->users->create($user)) {
            return response(['message' => 'Usuário cadastrado', 'status' => true]);
        }
        return response(['message' => 'Usuário não cadastrado', 'status' => false]);
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
        $parametros = [
            'user' => $this->users->find($id),
            'form_action' => route('user.store')
        ];

        return view('pages.users.form', $parametros);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->users->find($id);
        
        foreach ($request->except('_token') as $key => $value) {
            if ($key == 'password' and empty(trim($value))) {
                continue;
            }
            if (empty(trim($value))) {
                continue;
            }
            $user->$key = $value;
        }

        if ($user->save()) {
            return response(['message' => 'Usuário atualizado', 'status' => true]);
        }
        return response(['message' => 'Usuário não atualizado', 'status' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->users->find($id);

        if (auth()->user()->id == $id) {
            return response(['message' => 'Você não pode excluir o usuário autenticado', 'status' => false]);
        }

        if ($user->delete()) {
            return response(['message' => 'Usuário excluído', 'status' => true]);
        }
        return response(['message' => 'Usuário não excluído', 'status' => false]);
    }

    public function profile() {
        // return('data');

        return view('pages.users.profile', [
            'user' => Auth::user()
        ]);
    }
}
