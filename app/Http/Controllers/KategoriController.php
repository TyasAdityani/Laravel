<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function daftar(Request $req)
    {
    	$data = Kategori::where('nama_kategori','like',"%{$req->keyword}%")
    			->paginate(10);
    	return view('admin.pages.kategori.daftar',['data'=>$data]);
    }
    public function add()
    {
    	return view('admin.pages.kategori.add');
    }

    public function save(Request $req)
    {
        \Validator::make($req->all(),[
            'kategori'=>'required|between:3,100|unique:kategori,nama_kategori',
        ])->validate();

    	$result = new Kategori;
        $result->nama_kategori = $req->kategori;

        if( $result->save() ){
            return redirect()->route('admin.kategori')
                    ->with('result','success');
        }else {
            return back()->with('result','fail')->withInput();
        }
    }
    public function edit($id)
    {
        $data = Kategori::where('id',$id)->first();
        return view('admin.pages.kategori.edit',['rc'=>$data]);
    }

    public function update(Request $req)
    {
        \Validator::make($req->all(),[
            'kategori'=>'required|between:3,100|unique:kategori,nama_kategori,'.$req->id,
        ])->validate();

        return 'Fungsi Update';
    }
}
