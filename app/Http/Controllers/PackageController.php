<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Auth;
use App\Transaction;
use Midtrans\Config;
use Midtrans\Snap;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->role == 1) {
            return redirect('adminhome');
        }
        if (Auth::user()->is_email_verified == 0) {
            return redirect('verifikasi');
        }
        $paket = Package::get(); //Get tabel paket
        return view('paket', compact('paket'));
    }
    public function store(Request $request)
    {
        if (Auth::user()->role == 1) {
            return redirect('adminhome');
        }
        if (Auth::user()->is_email_verified == 0) {
            return redirect('verifikasi');
        }
        $cektransaki = Transaction::where('user_id', Auth::user()->id)
            ->where('package_id', $request->id)
            ->count(); //buat nge cek udah beli atau ga
        if ($cektransaki > 0) {
            return redirect()->route('paket.list'); //hasil sudah beli
        } else {
            $grossamount = Package::where('id', $request->id)->first()->price;
            $transaction = Transaction::create([
                'user_id' => Auth::user()->id,
                'package_id' => $request->id,
                'status' => '0',
                'gross_amount' => $grossamount,
            ]);
            $transaction_id = $transaction->id;
            return redirect()->route('paket.bayar', $transaction_id);
        }
    }
    public function bayar($id)
    {
        if (Auth::user()->role == 1) {
            return redirect('adminhome');
        }
        if (Auth::user()->is_email_verified == 0) {
            return redirect('verifikasi');
        }
        $transaction = Transaction::where('id', $id)->first();
        $data = Transaction::where('id', $id)->first();
        config::$serverKey = config('midtrans.serverKey');
        config::$isProduction = config('midtrans.isProduction');
        config::$isSanitized = config('midtrans.isSanitized');
        config::$is3ds = config('midtrans.is3ds');

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'MIDTRANS-' . $data->id,
                'gross_amount' => (int) $data->gross_amount,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'enabled payments' => ['gopay'],
            'vtweb' => [],
        ];
        $snap_token = Snap::getSnapToken($midtrans_params);
        $data->update(['status' => '1']);

        return view('payment', compact('transaction', 'snap_token'));
    }
    public function confirm(request $request)
    {
        if (Auth::user()->role == 1) {
            return redirect('adminhome');
        }
        if (Auth::user()->is_email_verified == 0) {
            return redirect('verifikasi');
        }
        $transaction = Transaction::findOrFail($request->id);
        // dd($transaction);
        $this->validate($request, [
            'photo' => ['required', 'mimes:jpg,png'],
        ]);
        $photoName =
            time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->storeAs('public/photo', $photoName);
        $photoPath = 'photo/' . $photoName;
        $transaction->update(['photo' => $photoPath, 'status' => '1']);
        return redirect()->route('paket.list');
    }
    public function midtrans($id)
    {
        $data = Transaction::where('id', $id)->first();
        config::$serverKey = config('midtrans.serverKey');
        config::$isProduction = config('midtrans.isProduction');
        config::$isSanitized = config('midtrans.isSanitized');
        config::$is3ds = config('midtrans.is3ds');

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'MIDTRANS-' . $data->id,
                'gross_amount' => (int) $data->gross_amount,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'enabled payments' => ['gopay'],
            'vtweb' => [],
        ];

        // try {
        //     $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)
        //         ->redirect_url;
        //     header('Location :' . $paymentUrl);
        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }
        $snapToken = Snap::getSnapToken($midtrans_params);
        $data->update(['status' => '1']);
        return view('midtrans', ['snap_token' => $snapToken]);
    }
    // public function payment_post(Request $request)
    // {
    //     $json = json_decode($request->get('json'));
    //     $order = new Order();
    //     $order->status = $json->transaction_status;
    //     $order->uname = $request->get('uname');
    //     $order->email = $request->get('email');
    //     $order->number = $request->get('number');
    //     $order->transaction_id = $json->transaction_id;
    //     $order->order_id = $json->order_id;
    //     $order->gross_amount = $json->gross_amount;
    //     $order->payment_type = $json->payment_type;
    //     $order->payment_code = isset($json->payment_code)
    //         ? $json->payment_code
    //         : null;
    //     $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
    //     return $order->save()
    //         ? redirect(url('/'))->with('alert-success', 'Order berhasil dibuat')
    //         : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');
    // }
}
