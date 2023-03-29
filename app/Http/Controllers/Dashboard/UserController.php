<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
// use DataTables;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $usermodel;

    public function __construct(User $user)
    {
        $this->usermodel = $user;
    }

    // +++++++++++++++++++++++++++++++++ Show "users" ++++++++++++++++++++++++++++++++
    public function index()
    {
        return view('dashboard.users.index');
    }
    // +++++++++++++++++++++++++++++++++ create "new user"  ++++++++++++++++++++++++++++++++
    public function create()
    {
        return view('dashboard.users.add');
    }
    // +++++++++++++++++++++++++++++++++ Show "users" in "dataTable ++++++++++++++++++++++++++++++++
    public function getUsersDatatable()
    {
        // Check if "user" Has "All Permissions" [ if "login user" is "Admin" ]
        if(auth()->user()->can('viewany', $this->usermodel))
        {
            // return all "users data"
            $data = User::select('*');
        }
        else
        {
            // return "login user" data
            $data = User::where('id', auth()->user()->id);
        }
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '';
                // if "user" has "permission" to make "update" on data Then Show "edit button"
                if(auth()->user()->can('update', $row))
                {
                    $btn .= '<a href ="' . Route('dashboard.users.edit', $row->id) . '" class="edit btn btn-success btn-sm">
                    <i class = "fa fa-edit"></i></a>';
                }
                // if "user" has "permission" to make "delete" on data Then Show "delete button"
                if(auth()->user()->can('delete', $row))
                {
                    $btn .= '<a id="deleteBtn" data-id="'.$row->id.'" class="edit btn btn-danger btn-sm" data-toggle= "modal"
                    data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                }
                return $btn;
            })
            ->addColumn('status', function ($row) {
                return $row->status == null ? __('words.notActivated') : __('words'.'.'.$row->status);
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
    // ++++++++++++++++++ store() method : To store "new user" data in "users" table +++++++++++++++++
    public function store(Request $request)
    {
        $this->authorize('update', $this->usermodel);
        // Data Validation : validate "users data"
        $data =
        [
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'status'=>'nullable|in:null,admin,writer',
            'password' => ['required', 'string', 'min:8'],
        ];
        // Apply "Validation" on "users data"
        $validatedData = $request->validate($data);
        // Encrypt "password" of "user"
        $validatedData['password'] = Hash::make($validatedData['password']);
        // Store "user data" in "users table" in DB
        User::create($validatedData);
        // Redirect to "dashboard/users/index.blade.php" page
        return redirect()->route('dashboard.users.index');
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
    // +++++++++++++++++++++++++++ edit() method : Go to "dashboard/users/edit.blade.php" page ++++++++++++++
    public function edit(User $user)
    {
        // if "user" has "permission" to make "update"
        $this->authorize('update', $user);
        // Redirect to "dashboard/users/edit.blade.php" page
        return view('dashboard.users.edit', compact('user'));
    }
    // +++++++++++++++++++++++++++ update() method : update "user" data +++++++++++++++++++++++++++++++++++++++++
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        // Apply "update" to "All user data" That send from "dashboard/users/edit.blade.php" Form
        $user->update($request->all());
        // Redirect to "dashboard/users/index.blade.php" page
        return redirect()->route('dashboard.users.index');
    }

    public function destroy($id)
    {
        //
    }
    // +++++++++++++++++++++++++++ delete() method : delete "user" data +++++++++++++++++++++++++++++++++++++++++
    public function delete(Request $request)
    {
        $this->authorize('delete', $this->usermodel);
        // Check if "user id" That sender from "delete form" modal is "number"
        if(is_numeric($request->id))
        {
            // delete "user data" where "user id" == $request->id
            User::where('id', $request->id)->delete();
        }
        // Redirect to "dashboard/users/index.blade.php" page
        return redirect()->route('dashboard.users.index');
    }
}
