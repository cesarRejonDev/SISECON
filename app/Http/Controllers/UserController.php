<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function service()
    {
        return datatables()
            ->eloquent(User::with('roles'))
            ->editColumn('created_at', function ($user) {
                return [
                    'fecha' => e($user->created_at->format('d/m/Y h:i A')),
                ];
            })->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y %h%:%i') LIKE ?", ["%$keyword%"]);
            })
            ->addColumn('btn', 'users.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        $roles = Role::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');

        return view('users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $data = [
            'name' => $request->name,
            'paternal_last_name' => $request->paternal_last_name,
            'maternal_last_name' => $request->maternal_last_name,
            'full_name' => "$request->name $request->paternal_last_name $request->maternal_last_name",
            'avatar' => 'https://static.vecteezy.com/system/resources/previews/027/951/137/non_2x/stylish-spectacles-guy-3d-avatar-character-illustrations-png.png',
            'ulid' => Str::ulid(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($data);
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index')->with('success_msg', 'Usuario registrado exitosamente.');
    }

    public function edit(User $user)
    {
        $roles = Role::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->name = $request['name'];
        $user->paternal_last_name = $request['paternal_last_name'];
        $user->maternal_last_name = $request['maternal_last_name'];
        $user->full_name = "$user->name $user->paternal_last_name $user->maternal_last_name";
        $user->email = $request['email'];
        $user->save();

        if ($request['password'] != '') {
            $user->password = Hash::make($request['password']);
            $user->save();
        }

        $user->save();

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index')->with('success_msg', 'Usuario actualizado con éxito.');
    }

    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();

            return back()->with('danger_msg', 'Usuario eliminado.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->withInput()->with('danger_msg', 'Error al eliminar usuario.');
        }
    }
}
