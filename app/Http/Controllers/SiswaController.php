<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
//use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    public function index(){
        $siswas = Siswa::simplePaginate(5);
        //$siswas->currentPage();

        return view('siswa.index', compact('siswas'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nis' => 'required|numeric',
            'nama' => 'required|min:3',
            'kelas' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        //create data siswa
        $siswa = Siswa::create($request->all());

        //upload photo
        $ranname = Str::random(15);
        $filename = $ranname . '.' . $request->foto->extension();

        $request->foto->storeAs('images', $filename, 'public');

        $siswa->foto = $filename;
        $siswa->save();

        return redirect('/siswa')->with('message', __('messages.store'));
    }

    public function edit($id){
        //get siswa data from database
        $siswa = DB::table('siswas')->where('id', $id)->get();

        //return to edit page//
        return view('/siswa/edit', compact('siswa'));
    }

    public function update(Request $request, $id){
        $siswa = Siswa::find($id);
        $siswa->update($request->all());

        return redirect('/siswa')->with('message', __('messages.update'));
    }

    public function delete($id){
        //using query build
        //DB::table('siswas')->where('id',$id)->delete();

        //using eloquent
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect('/siswa')->with('message', __('messages.destroy'));
    }
}
