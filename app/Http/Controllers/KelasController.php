<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Transaction;
use App\Video;
use Auth;

class KelasController extends Controller
{
    public function __construct()
    {
        //aturan untuk menyeluruh di kelas tersebut.
        $this->middleware('auth');
    }
    public function index($paket)
    {
        $cek = Transaction::where('user_id', Auth::user()->id)
            ->where('package_id', $paket)
            ->where('status', 2)
            ->count();
        if ($cek == 0) {
            return redirect('paket');
        }
        if (Auth::user()->role == 1) {
            return redirect('dashboard');
        }
        $kelas = Subject::where('package_id', $paket)->get();

        if ($kelas == null) {
            return redirect('kosong');
        }

        return view('kelas', compact('kelas', 'paket'));
    }
    public function detail($paket, $subjek, $video)
    {
        $cek = Transaction::where('user_id', Auth::user()->id)
            ->where('package_id', $paket)
            ->where('status', 2)
            ->count();
        if ($cek == 0) {
            return redirect('paket');
        }
        if (Auth::user()->role == 1) {
            return redirect('dashboard');
        }

        if ($video == 1) {
            $detail = Video::where('subject_id', $subjek)->first();
        } else {
            $detail = Video::where('id', $video)->first();
        }
        if ($detail == null) {
            return redirect('kosong');
        }
        $lainnya = Video::where('subject_id', $subjek)->get();
        $namasub = Subject::where('id', $subjek)
            ->select('name')
            ->first()->name;

        return view(
            'video',
            compact('detail', 'lainnya', 'paket', 'subjek', 'namasub')
        );
    }
    public function kelaskosong()
    {
        return view('kosong');
    }
}
