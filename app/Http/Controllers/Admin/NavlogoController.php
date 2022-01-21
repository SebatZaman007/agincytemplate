<?php

namespace App\Http\Controllers\Admin;

use App\Models\NavLogo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\Facades\DataTables;

class NavlogoController extends Controller
{
    public function navlogoindex(Request $request){
        if ($request->ajax()) {
            $data = NavLogo::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a href="' . route('navlogo.edit', $data->id) . '"><i class="fas fa-pencil-alt"></i></a>';
                    $btn = $btn.'<a href="' . route('navlogo.delete', $data->id) . '"><i class="fas fa-trash-alt"></i></a>';
                    return $btn;
                })

                ->editColumn('logo_image',function ($data){
                    if($data->logo_image){
                        $url=asset(BlogImage().$data->logo_image);
                        return '<img src='.$url.' border="0" width="70" class="img-rounded" align="center" >';
                    }
                    else{
                        return "no image";
                    }
                })
                ->rawColumns(['action','logo_image'])
                ->make(true);
        }

        return view('admin.pages.navlogo.index');


    }

    public function navlogocreate(){
        return view('admin.pages.navlogo.create');
    }

    public function navlogostore(Request $request){
        if (!empty($request->logo_image)) {
            $logo_image = fileUpload($request['logo_image'], BlogImage());
        } else {
            return redirect()->back()->with('toast_error', __('Image is  required'));
        }

        NavLogo::create([
            'logo_link'=>$request->logo_link,
            'logo_image'=>$logo_image,
            'logo_name'=>$request->logo_name,
        ]);

        return redirect()->route('navlogo.index');
    }

    public function navlogoedit($id){
        $edit=NavLogo::where('id',$id)->first();
        return view('admin.pages.navlogo.edit',compact('edit'));
    }

    public function navlogoupdate(Request $request){
        $id=$request->id;
        if (!empty($request->logo_image)) {
            $logo_image = fileUpload($request['logo_image'], BlogImage());
        } else {
            $var=NavLogo::where('id',$id)->first();
            $logo_image= $var->logo_image;
        }

        NavLogo::where('id',$id)->update([
            'logo_link'=>$request->logo_link,
            'logo_image'=>$logo_image,
            'logo_name'=>$request->logo_name,
        ]);

        return redirect()->route('navlogo.index');
    }

    public function navlogodelete($id){
        NavLogo::where('id',$id)->delete();
        return redirect()->route('navlogo.index');
    }


}
