<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Perfil;
use App\CentroDeSalud;
use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use Hash;






class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){

        $this->middleware('auth');
        $this->middleware('perfiles:jss', ['except' => ['edit', 'update']] );  

    }

    public function index()
    {
        $users = User::where('visible' , '1')->get();


        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $perfiles = Perfil::pluck('display_name', 'codigo');
        $centrosdesalud = CentroDeSalud::all();
          return view('users.crear', compact('perfiles', 'centrosdesalud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



        public function store(UsersCreateRequest $request)
    {
        

        $user= (new User)->fill($request->all());

        if($request->hasFile('avatar')){
        $file = $request->file('avatar');
        $nameFile = time().$file->getClientOriginalName();
        $file->move(public_path().'/images/', $nameFile);
        
        }else{
        $file = $request->file('avatar');
        $nameFile ='default.png';
      
        }
        $user->password = bcrypt($user->password);
        $user->avatar = $nameFile;
        $user->save();
        $user->perfiles()->attach($request->perfiles);
        return redirect()->route('users.index')->with('status','USUARIO CREADO CON ÉXITO');
    }


    /**

        public function store(UsersCreateRequest $request)
    {
        

        $user= (new User)->fill($request->all());

        if($request->hasFile('avatar')){
        $user->avatar = $request->file('avatar')->store('public');
        }
        $user->save();
        $user->perfiles()->attach($request->perfiles);
        return redirect()->route('users.index')->with('status','USUARIO CREADO CON ÉXITO');
    }
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $perfiles = Perfil::pluck('display_name', 'codigo');

       return view('users.ver' , compact('user', 'perfiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);
      

        $this->authorize('edit', $user);

         $perfiles = Perfil::pluck('display_name', 'codigo');
         $centrosdesalud = CentroDeSalud::all();

        return view('users.editar', compact('user', 'perfiles', 'centrosdesalud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest $request, $id)
    {
    
        $user=User::findOrFail($id);

        $this->authorize('update', $user);

        $user->name = $request->input('name'); 
        $user->email= $request->input('email');
        $user->telefono = $request->input('telefono');
        $user->rut = $request->input('rut');
        $user->apellidos= $request->input('apellidos');
        $user->centrodesalud_codigo= $request->input('centrodesalud_codigo');
        $user->fech_de_nac = $request->input('fech_de_nac');
        if($request->hasFile('avatar')){
        $file = $request->file('avatar');
        $nameFile = time().$file->getClientOriginalName();
        $file->move(public_path().'/images/', $nameFile);

        $user->avatar = $nameFile;
        }
        
        $user->update();


        $user->perfiles()->sync($request->perfiles);
        return back()->with('status','USUARIO EDITADO CON ÉXITO');
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user=User::findOrFail($id);

        $this->authorize('update', $user);
        $user->visible=0;
        $user->update($request->all());

        $user->perfiles()->sync($request->perfiles);
        return redirect()->route('users.index')->with('statusDeleted','USUARIO ELIMINADO CON ÉXITO');
    }
}
