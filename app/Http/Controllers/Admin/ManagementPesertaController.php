<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Selectable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class ManagementPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $peserta = User::where('role', '!=', 'Admin')->orderBy('username', 'asc')->get();
        if ($request->ajax()) {
            return DataTables::of($peserta)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $action = '<div class="d-flex justify-content-evenly align-item-center"><a href="javascript:void(0)" class="btn btn-warning text-white" id="edit-peserta" data-toggle="modal" data-id=' . $row->id . '>Edit</a><a href="javascript:void(0)" id="delete-peserta" data-id=' . $row->id . ' class="btn btn-danger text-white delete-peserta mx-3">Delete</a></div>';
                        return $action;
                    })
                    ->addColumn('checkbox', function ($data) {
                        $checkbox = '<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" class="custom-control-input checkbox-select" id="' . $data->id . '" name="ids" value="' . $data->id . '"><label for="' . $data->id . '" class="custom-control-label"></label></div></td>';
                        return $checkbox;
                    })
                    ->editColumn('submited', function($row){
                        if($row->submited === '1') {
                            return 'Sudah';
                        } 
                        else {
                            return 'Belum';
                        }
                    })
                    ->rawColumns(['action', 'checkbox'])
                    ->make(true);
        }
      
        return view('admin.peserta.index', compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {   
        if (($request->id)) {
            $request->validate([
                'email' => 'unique:users,email', Rule::unique('users')->ignore($user),
                'username' => 'required|min:5|unique:users,username', Rule::unique('users')->ignore($user),
            ], 
            [
                // 'email.required' => 'Field Email harus diisi',
                'email.unique' => 'Email sudah terdaftar',
                'username.required' => 'Field username harus diisi',
                'username.unique' => 'Username sudah terdaftar',
                'username.min' => 'Field username harus memiliki panjang minimal 16 karakter',
            ]);
        } elseif (empty($request->id)) {
            $request->validate([
                // 'email' => 'required',
                'username' => 'required|min:5|unique:users,nik',
                'fullname' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string'],
                'password' => ['required', 'string', 'min:5'],
        ],
        [
            'fullname.required' => 'Nama Lengkap Wajib di isi',
            'password.required' => 'Password Wajib di isi',
            // 'email.required' => 'Field Email harus diisi',
            'username.required' => 'Field username harus diisi',
            'username.unique' => 'Username sudah terdaftar',
            'username.min' => 'Field username harus memiliki panjang minimal 16 karakter',
        ]    
        );
        }
        $id = $request->id;

        $user = User::updateOrCreate(
            ['id' => $id],
            [
                'fullname' => $request->fullname,
                'username' => $request->username,
                'role' => $request->role,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'submited' => $request->submited,
            ]
        );

        if (empty($request->id)) {
            $msg = 'Peserta berhasil ditambahkan';
        } else {
            $msg = 'Peserta berhasil diupdate';
        }
        return redirect()->back()->with('success', $msg);
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
        $where = array('id' => $id);
        $peserta = User::where($where)->first();
        return response()->json($peserta);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json([
            'success' => 'Peserta berhasil dihapus'
        ]);
    }

    public function deleteSelected()
    {
        $ids = request()->input('id');
        User::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Semua Peserta berhasil dihapus"]);
    }

}
