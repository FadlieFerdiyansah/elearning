<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\{Admin};
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\AdminRequest;

class AdminController extends Controller
{
    public function index()
    {

        if (request()->wantsJson()) {
            $admin = Admin::latest()->get();
            return DataTables::of($admin)
                ->addColumn('action', function ($admin) {
                    $button = '
                        <div class="dropdown d-inline">
                            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item has-icon" href="' . route("admins.edit", $admin) . '"><i class="
                                fas fa-edit"></i> Edit</a>
                                <form action="' . route("admins.destroy", $admin) . '" method="post" style="font-size:13px">
                                    ' . csrf_field() . '
                                    ' . method_field('delete') . '
                                    <button type="submit" class="dropdown-item has-icon font-sm"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                ';
                    return $button;
                })
                ->make(true);
        } else {
            $admins = Admin::count();
        }

        return view('backend.manajemen_user.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('backend.manajemen_user.admin.create', [
           
        ]);
    }

    public function store(AdminRequest $request)
    {
        // return request()->all();
        if (request('foto')) {
            $photo = $request->file('foto')->store('images/profile');
        } else {
            $photo = 'default.png';
        }

        $admin = Admin::create([
            // 'id' => $request->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $photo,
        ]);

        $admin->assignRole('admin');
        return redirect(route('admins.index'))->with('success', 'Berhasil membuat data admin');
    }

    public function edit(Admin $admin)
    {

        return view('backend.manajemen_user.admin.edit', [
            'admin' => $admin,
          
        ]);
    }

    public function update(AdminRequest $request, Admin $admin)
    {

        if ($request->foto) {
            Storage::delete($admin->foto);
            $photo = $request->file('foto')->store('images/profile');
        } else {
            $photo = $admin->foto;
        }

        $admin->update([
            // 'id' => $request->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'foto' => $photo,
        ]);

        return redirect(route('admins.index'))->with('success', 'Berhasil update data admin');
    }

    //Delete 1 per 1 data
    public function destroy(Admin $admin)
    {
        $admin->delete();
        Storage::delete($admin->foto);
        return back();
    }

    //Delete bisa sekaligus banyak data
    public function delete_checkbox()
    {
        $nips = request('id');
        // dd($nims);
        foreach ($nips as $i => $nip) {
            $admins[] = Admin::where('id', $nip)->get();
            foreach ($admins[$i] as $admin) {
                $admin->delete();
                if ($admin->foto != 'default.png') {
                    Storage::delete($admin->foto);
                }
            }
        }
    }
}
