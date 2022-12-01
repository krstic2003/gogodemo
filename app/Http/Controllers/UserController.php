<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function indexDataTable(Request $request){   
        if (request()->ajax()) {

            /*----------  Make DataTable  ----------*/
            
            return DataTables::of(User::select())
            ->addColumn('role_formated', function ($user) {
                $role_formated = '';

                if( isset( $user->role ) ){
                    if( $user->role == 2 ){
                        $role_formated = 'Administrator';
                    }else{
                        $role_formated = 'Korisnik';
                    }
                    
                }
                return $role_formated;
            })
            ->editColumn('actions', function ($user) {
                $edit_btn = '<a href="user/'.$user->id.'">Izmeni</a>';
                return $edit_btn;
            })
            ->editColumn('delete', function ($user) {
                $del_btn = '<a href="user/'.$user->id.'/delete">Obriši</a>';
                return $del_btn;
            })
            ->rawColumns(['actions', 'delete'])
            ->make();
        }

        return view('users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);//Get user with the given id
        
        //Validate user new data
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);


        if ($validator->fails()) {

            return redirect(url()->previous())
                        ->withErrors($validator)
                        ->withInput();
        } 

        

        $user->update($request->all());

       // dd($user);

        return back()->with('status', 'Podaci su ažurirani uspešno.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('status', 'Korinsik je uspešno obrisan.');
    }
}
