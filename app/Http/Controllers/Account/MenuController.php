<?php

namespace App\Http\Controllers\Account;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Brian2694\Toastr\Facades\Toastr;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('back.menu.index', compact('menus'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
        ]);

        Menu::create($request->all());
        Toastr::success('Menu added successfully', 'Success');
        return redirect(route('account.menus.index'));
    }

    public function show(Menu $menu)
    {
        //
    }
    public function edit(Menu $menu)
    {
        $pages = Page::all();
        return view('back.menu.edit',compact('menu','pages'));
    }

    public function update(Request $request, Menu $menu)
    {
        if ($request->active) {
           $this->active($menu);
           Toastr::success('Menu Actived successfully', 'Success');
        }

        if ($request->has('page_id')) {
           $menu->pages()->attach($request->page_id,[
               'order' => $request->order
           ]);
        }

        return back();
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        Toastr::success('Menu deleted successfully', 'Success');
        return back();
    }

    // CUSTOM FUNCTIONS
    protected function active($menu)
    {
        // get all active menus by position
        $activeMenus = Menu::where('active', true)->wherePosition($menu->position)->get();

        // disable all active menus
        foreach($activeMenus as $activeMenu){
            $activeMenu->update([
                'active' => false
            ]);
        }
        // active menu 
        $menu->update([
            'active' => true
        ]);
        return true;
    }
}
