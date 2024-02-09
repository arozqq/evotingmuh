<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function index(Request $request) {
        $items = Kandidat::withCount('users')->orderByDesc('users_count')->get();
        $total_user_milih = User::where('role', 'User')->where('submited', 1)->count();
        $total_user = User::where('role', 'User')->count();
        $nilaiAwal = 0;
        $total_suara_masuk = $nilaiAwal == 0 ? 0 : ( $total_user_milih / $total_user * 100 );
        // $total_suara_masuk = $total_user_milih / $total_user * 100 ;
       return view('admin.report.index', compact('items', 'total_user_milih', 'total_user','total_suara_masuk'));
    //    return view('admin.report.index', compact('items', 'total_user_milih', 'total_user',));
    } 

    public function reset()
    {
        DB::table('kandidat_user')->truncate();
        $users = User::all();
        foreach ($users as $user) {
            $user->setStatusTidakAktif();
        }

        return response()->json([
            'success' => 'perolehan suara berhasil direset!'
        ]);
    }
}
