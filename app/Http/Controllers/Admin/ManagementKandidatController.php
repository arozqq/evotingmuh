<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ManagementKandidatController extends Controller
{
    public function index(Request $request)
    {   
        $kandidat = Kandidat::get();
        if ($request->ajax()) {
            return DataTables::of($kandidat)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $action = '<div class="d-flex justify-content-evenly align-item-center"><a href="management-kandidat/'.$row->id.'/edit" class="btn btn-warning text-white" id="edit-kandidat">Ubah</a><a href="javascript:void(0)" id="delete-kandidat" data-id=' . $row->id . ' class="btn btn-danger text-white delete-kandidat mx-3">Hapus</a></div>';
                        return $action;
                    })
                    ->addColumn('checkbox', function ($data) {
                        $checkbox = '<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" class="custom-control-input checkbox-select" id="' . $data->id . '" name="ids" value="' . $data->id . '"><label for="' . $data->id . '" class="custom-control-label"></label></div></td>';
                        return $checkbox;
                    })
                    ->editColumn('status', function($row){
                        if($row->status === 1) {
                            return 'Aktif';
                        } 
                        else {
                            return 'Tidak Aktif';
                        }
                    })
                    ->rawColumns(['action', 'checkbox'])
                    ->make(true);
        }
      
        return view('admin.kandidat.index', compact('kandidat'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kandidat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto_kandidat' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_kandidat' => 'required|string',
            // 'nbm' => 'unique:kandidats,nbm'
        ], [
            // 'nama_kandidat.required' => 'Nama Kandidat Wajib Di Isi',
            // 'nbm.unique' => 'NBM sudah terpakai'
        ]);


        $fotoInput = $request->file('foto_kandidat');
        if ($request->hasFile('foto_kandidat')) {
            $fotoInput = $request->file('foto_kandidat');
            $imageName = date('YmdHis').'-'.strtolower(str_replace(" ", "-", $fotoInput->getClientOriginalName()));
            $fotoInput->move(public_path('foto'), $imageName);
            $foto = 'foto/' . strtolower(str_replace(" ", "-", $imageName));
        } else {
            $foto = null;
        }

        Kandidat::create([
            'nama_kandidat' => $request->nama_kandidat,
            'jabatan' => $request->jabatan,
            'foto_kandidat' => $foto,
            'nbm' => $request->nbm,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'status' => $request->status
        ]);

        return redirect()->route('management-kandidat.index')->with(['success' => 'Kandidat added.']);
        
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
        $kandidat  = Kandidat::findOrFail($id);
        return view('admin.kandidat.edit', compact('kandidat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kandidat $kandidat)
    {   

        $request->validate([
            'nama_kandidat' => 'required|string',
            'nbm' => 'unique:users,username', Rule::unique('kandidats')->ignore($kandidat),
        ], [
            'nama_kandidat.required' => 'Nama Kandidat Wajib Di Isi',
            'nbm.unique' => 'NBM sudah terpakai'
        ]);

        $kandidat = Kandidat::findOrFail($request->id);
        $kandidat->nama_kandidat = $request->nama_kandidat;
        $kandidat->jabatan = $request->jabatan;
        $kandidat->nbm = $request->nbm;
        $kandidat->tempat_lahir = $request->tempat_lahir;
        $kandidat->tanggal_lahir = $request->tanggal_lahir;
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        $kandidat->status = $request->status;

        $fotoInput = $request->file('foto_kandidat');
        if ($request->hasFile('foto_kandidat')) {
            $path = public_path($kandidat->foto_kandidat);
            if (File::exists($path)) {
                File::delete($path);
            } 
            $fotoInput = $request->file('foto_kandidat');
            $imageName = date('YmdHis').'-'.strtolower(str_replace(" ", "-", $fotoInput->getClientOriginalName()));
            $fotoInput->move(public_path('foto'), $imageName);
            $kandidat->foto_kandidat = 'foto/'.strtolower(str_replace(" ", "-", $imageName));
        }
        
  
        $kandidat->update();
        
        return redirect()->route('management-kandidat.index')->with(['success' => 'Kandidat Updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kandidat =  Kandidat::findOrFail($id);

        // hapus gambar 
        if($kandidat->foto_kandidat) {
            $path = public_path($kandidat->foto_kandidat);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $kandidat->delete();

        return response()->json([
            'success' => 'Kandidat berhasil dihapus'
        ]);
    }

    public function deleteSelected()
    {
        $ids = request()->input('id');
        $data = Kandidat::whereIn('id', explode(",", $ids))->select("foto_kandidat")->get();
        foreach ($data as $d) {
            File::delete($d->foto_kandidat);
        }
        Kandidat::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Semua Kandidat berhasil dihapus"]);
    }
}
