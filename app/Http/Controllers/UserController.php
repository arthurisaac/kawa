<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Localisation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('/user.index', compact('users'));
    }

    public function liste()
    {
        $user = Auth::user();
        if($user->localisation_id<>1){
            return view('/user.index')->withUsers(User::where('localisation_id','=',$user->localisation_id)->get());
        }else{
            $users = User::all();
            return view('/user.index', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::all();
        $accesses = Access::all();
        $localisations = Localisation::all();
        return view('/user.create', compact('roles', 'accesses', 'localisations'));
    }

    public function login()
    {
        $user = json_encode(session('user'));
        return view('/user.login', compact( 'user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function auth(Request $request)
    {
        $compte = $request->get('compte');
        $password = $request->get('password');
        $user = DB::table('users')
            ->where('compte', '=', $compte)
            ->where('password', '=', $password)
            ->get();
        if (count($user)>0) {
            session(['user' => $user[0]]);
            return redirect('/')->with('success', 'Authentification réussie');
        }
        return redirect('/login')->with('error', 'Erreur authentification');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $action = $request->get('action');
        switch ($action) {
            case 'role':
                $this->storeRole($request);
                return redirect('/user/create')->with('success-role', 'Rôle ajouté');
                break;
            case 'user':
                try {
                    $this->storeUser($request);
                } catch (\Exception $e) {
                    return redirect('/user/create')->with('success-user-error', $e->getMessage());
                }
                return redirect('/user/create')->with('success-user', 'Utilisateur ajouté');
            break;
            case 'access':
                $this->storeAccess($request);
                return redirect('/user/create')->with('success-access', 'Accès modifiés');
            break;
        }
    }


    public function storeRole(Request $request)
    {
        $role = new Role([
            'role' => $request->get('role')
        ]);
        $role->save();
    }
    public function storeUser(Request $request)
    {
        $user = new User([
            'nom' => $request->get('nom'),
            'compte' => $request->get('compte'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'password' => bcrypt('password'),
            'localisation_id' => $request->get('localisation_id'),

        ]);
        $user->save();
    }
    public function storeAccess(Request $request)
    {
        $accessID = $request->get('accessID');
        if ($accessID) {
            $access = Access::find($accessID);
            $access->services = implode(',', $request->get('services'));
            $access->save();
        } else {
            $access = new Access([
                'role' => $request->get('role'),
                'services' => implode(',', $request->get('services'))
            ]);
            $access->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
