<?php

namespace App\Http\Controllers;

use App\Models\UserHasRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserHasRoleController
 * @package App\Http\Controllers
 */
class UserHasRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userHasRoles = UserHasRole::paginate();

        return view('user-has-role.index', compact('userHasRoles'))
            ->with('i', (request()->input('page', 1) - 1) * $userHasRoles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userHasRole = new UserHasRole();
        $role= new Role();
        $user= new User();
        return view('user-has-role.create', compact('userHasRole','role','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UserHasRole::$rules);

        $userHasRole = UserHasRole::create($request->all());

        return redirect()->route('user-has-roles.index')
            ->with('success', 'UserHasRole created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userHasRole = UserHasRole::find($id);

        return view('user-has-role.show', compact('userHasRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userHasRole = UserHasRole::find($id);
        $role= new Role();
        $user= new User();
        return view('user-has-role.edit', compact('userHasRole','role','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UserHasRole $userHasRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserHasRole $userHasRole)
    {
        request()->validate(UserHasRole::$rules);

        $userHasRole->update($request->all());

        return redirect()->route('user-has-roles.index')
            ->with('success', 'UserHasRole updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userHasRole = UserHasRole::find($id)->delete();

        return redirect()->route('user-has-roles.index')
            ->with('success', 'UserHasRole deleted successfully');
    }
}
