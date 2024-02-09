<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {   
        $data = Setting::get();
        return view('admin.setting.index', compact('data'));
    }

    public function update(Request $request, Setting $setting)
    {   
        $request->validate([
            'logo_login_page' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'nbm' => 'unique:kandidats,nbm'
        ]);

        $setting = Setting::findOrFail(1);
        $setting->site_title = $request->site_title;
        $setting->min_pilih = $request->min_pilih;
        $setting->max_pilih = $request->max_pilih;
        $setting->header_title = $request->header_title;
        $setting->sub_title = $request->sub_title;
        $setting->login_page_title = $request->login_page_title;

        $fotoInput = $request->file('logo_login_page');
        if ($request->hasFile('logo_login_page')) {
            $path = public_path($setting->logo_login_page);
            if (File::exists($path)) {
                File::delete($path);
            } 
            $fotoInput = $request->file('logo_login_page');
            $imageName = date('YmdHis').'-'.strtolower(str_replace(" ", "-", $fotoInput->getClientOriginalName()));
            $fotoInput->move(public_path('logo'), $imageName);
            $setting->logo_login_page = 'logo/'.strtolower(str_replace(" ", "-", $imageName));
        }

        // $setting->logo_login_page =  $logo;

        $setting->update();

        return redirect()->route('setting.index')->with(['success' => 'Setting Updated.']);
    }
}
