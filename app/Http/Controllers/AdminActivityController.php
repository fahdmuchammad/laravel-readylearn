<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Transaction;
use App\Subject;
use App\Video;
use App\Package;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mail;

class AdminActivityController extends Controller
{
    public function konfirmasi()
    {
        $transaksi = Transaction::latest()->paginate(5); //Get tabel paket
        return view('admin.konfirmasi', compact('transaksi'));
    }
    public function transaksiselesai(Request $request)
    {
        $transaction = Transaction::findOrFail($request->id);
        $transaction->update(['status' => '2']);

        $user_id = Transaction::where('id', $request->id)->first()->user_id;
        $data = [
            'paket' => $transaction->package->name,
            // 'password' => $user->password,
        ];
        $email = User::findorfail($user_id);
        Mail::send('emails.emailPembelian', ['data1' => $data], function (
            $message
        ) use ($email) {
            $message->to($email->email);
            $message->subject('Notifikasi Pembelian');
        });

        return redirect()->route('admin.konfirmasi');
    }
    public function transaksihapus(Request $request)
    {
        $transaction = Transaction::findOrFail($request->id);
        Storage::delete('public/' . $transaction->photo);
        $transaction->delete();
        return redirect()->route('admin.konfirmasi');
    }
    public function listsubject()
    {
        $package = Package::get(); //Get tabel subject terbaru
        return view('admin.subject', compact('package'));
    }
    public function listvideo($id)
    {
        $title = Subject::where('id', $id)->first();
        $video = Video::where('subject_id', $id)->get(); //Get tabel paket
        return view('admin.video', compact('video', 'title'));
    }
    public function loadvideo()
    {
        $subject = Subject::get();
        return view('admin.upload', compact('subject'));
    }
    public function uploadvideo(Request $request)
    {
        // dd($request);
        $video = Video::create([
            'name' => $request->name,
            'subject_id' => $request->subject,
            'description' => $request->description,
            'video' => $request->video,
        ]);
        return redirect()->route('video.list', $video->subject->id);
    }
    public function editvideo($id)
    {
        $subject = Subject::get();
        $video = Video::where('id', $id)->first();
        // dd($video);
        return view('admin.edit', compact('video', 'subject'));
    }
    public function changevideo(Request $request)
    {
        $video = Video::findOrFail($request->id);
        // dd($video);
        $video->update([
            'name' => $request->name,
            'subject_id' => $request->subject,
            'description' => $request->description,
            'video' => $request->video,
        ]);

        return redirect()->route('video.list', $request->subject_id);
    }
    public function deletevideo(Request $request)
    {
        $video = Video::findOrFail($request->id);
        // dd($video);
        $video->delete();
        return redirect()->route('video.list', $request->subject_id);
    }
    public function notify($id)
    {
        $email = User::findorfail($id);
        Mail::send('emails.emailPembelian', function ($message) {
            $message->to($email->email);
            $message->subject('Notifikasi Pembelian');
        });

        return redirect('dashboard')->withSuccess(
            'Great! You have Successfully Register'
        );
    }
}
