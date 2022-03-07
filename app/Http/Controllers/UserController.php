<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:usuarios_view')->only('index');
        $this->middleware('can:usuarios_create')->only('create');
        $this->middleware('can:usuarios_create')->only('store');
        $this->middleware('can:usuarios_edit')->only('edit');
        $this->middleware('can:usuarios_edit')->only('update');
        $this->middleware('can:usuarios_destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

                $user = new User();
                $user = $user->all();
                return view('usuarios.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $roles  = new Role();
        $roles = $roles->all();
        return view('usuarios.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name =  $request->name;
        $user->username =  $request->username;
        $user->password = Hash::make($request->password);
        $user->usuario_creo = Auth::user()->id;
        $user->save();
        $userRol = User::find($user->id);
        $userRol->assignRole($request->rol);
     return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $usuarios = User::findorfail($id);

          return view('usuarios.perfil',compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles  = new Role();
        $roles = $roles->all();
         $usuarios = User::findorfail($id);

          return view('usuarios.edit',compact('usuarios','roles'));
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

        $usuarios = User::findorfail($id);
        $usuarios->name =  $request->name;
        if ($request->password)
        {
           $usuarios->password = Hash::make($request->password);
        }
        $usuarios->ultimo_usuario_modifico = Auth::user()->id;
        $usuarios->save();
        DB::table('model_has_roles')->where('model_id', $usuarios->id)->delete();
        $user = User::find($usuarios->id);
        $user->assignRole($request->rol);
       return redirect('/usuarios');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = User::findorfail($id);
        $cliente->usuario_elimino = Auth::user()->id;
        $cliente->save();
        $cliente->delete();
        return redirect('usuarios');
    }
}
