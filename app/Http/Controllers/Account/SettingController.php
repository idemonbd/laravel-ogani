<?php

namespace App\Http\Controllers\Account;


use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate([]);
        return view('back.settings', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->fill($request->except('logo'));

        if ($request->has('logo')) {
            $setting->logo = $request->file('logo')->store('settings/logo');
        }
        
        $setting->save();
        Toastr::success('Setting Updated Successfully', 'Success');
        return back();
    }
}
