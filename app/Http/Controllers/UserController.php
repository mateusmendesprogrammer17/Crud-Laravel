<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::all();
        return view('users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email', // Validação para email único
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Criando um novo usuário
    $user = new User();
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->password = bcrypt($validated['password']);

    // Salvando o novo usuário no banco de dados
    $user->save();

    return redirect(route('users.index')); // Redireciona para a lista de usuários
}


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        return view('show',compact('user'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return view('edit', compact('user'));

        // Garantir que o 'user' seja passado para a view
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user )
    {

         if($request->has(['name','email','password'])){

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);



         }
         $user->save();
         return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user) {
            // Exclui o usuário
            $user->delete();
            return redirect(route('users.index'))->with('success', 'Usuário excluído com sucesso!');
        }
    
        // Caso o usuário não seja encontrado, redireciona com erro
        return redirect(route('users.index'))->with('error', 'Usuário não encontrado!');
    }
    

}
