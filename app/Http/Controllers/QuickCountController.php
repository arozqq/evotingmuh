<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\User;
use Illuminate\Http\Request;

class QuickCountController extends Controller
{
    public function index(Request $request)
    {
         $items = Kandidat::withCount('users')->where('status', 1)->orderByDesc('users_count')->get();
        //  dd($items);
         $total_user_milih = User::where('role', 'User')->where('submited', 1)->count();
         $total_user = User::where('role', 'User')->count();

        //  $nilaiAwal = 0;
        //  $total_suara_masuk = $nilaiAwal == 0 ? 0 : ( $total_user_milih / $total_user * 100 );
         $total_suara_masuk =  $total_user_milih / $total_user * 100 ;
         

        return view('quick-count.index', compact('items', 'total_user_milih', 'total_user','total_suara_masuk'));
    }
}
