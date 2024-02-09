<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $kandidat = Kandidat::count();
        $user = User::where('submited', 1)
                ->where('role', 'User')->count();
        $user_b_pilih = User::where('submited', 0)
                ->where('role', 'User')->count();
        $data_kandidat = Kandidat::get();

        $items = Kandidat::withCount('users')->orderByDesc('users_count')->get();
        $total_user = User::where('role', 'User')->count();
        

        return view('home', compact('kandidat', 'user', 'user_b_pilih', 'data_kandidat', 'items', 'total_user'));
    }
}
