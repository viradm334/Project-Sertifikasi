<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PeminjamanModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class pinjamController extends Controller
{

    public function index()
    {
        return view('dashboard.orders.index', [
            'orders' => PeminjamanModel::all()
        ]);
    }

    public function show(){
        return view('user_orders', [
            'orders' => PeminjamanModel::where('user_id', auth()->user()->id)->get(),
            'title' => 'My Orders'
        ]);
    }

    public function pinjamBarang(Request $request){
        $user_id = Auth::user()->id;

        $orders_count = PeminjamanModel::where('user_id', auth()->user()->id)
                        ->where('status', false)
                        ->count();

        if($orders_count > 2){
            return redirect('/products')->with('error', 'Anda tidak bisa memiliki order aktif lebih dari 2!');
        }

        $pinjam = new PeminjamanModel();
        $pinjam->user_id = $user_id;
        $pinjam->product_id = (int)$request->product_id;
        $pinjam->rent_date = Carbon::now();
        $pinjam->return_date = Carbon::now()->addDays(5);

        $pinjam->save();

        Product::where('id', $request->product_id)->decrement('stock');

        return redirect('/products')->with('success', 'Peminjaman berhasil!');


    }

    public function returnBarang(Request $request, $id){
        $returnProduct = PeminjamanModel::findOrFail($id);
        $returnProduct->status = true;
        $returnProduct->actual_return_date = Carbon::now();
        // Untuk demo denda
        // $returnProduct->actual_return_date = Carbon::now()->addDays(6);

        $returnProduct->denda = $returnProduct->actual_return_date > $returnProduct->return_date ? $returnProduct->actual_return_date->addDay()->diffInDays($returnProduct->return_date) * 20000 : 0;

        $returnProduct->save();

        Product::where('id', $returnProduct->product_id)->increment('stock');

        return redirect('/dashboard/orders')->with('success', 'Pengembalian berhasil!');
    }

    public function sendReturnRequest(Request $request, $id){
        $returnOrder = PeminjamanModel::findOrFail($id);
        $returnOrder->request_return = true;

        $returnOrder->save();

        return redirect('/my-orders')->with('success', 'Request pengembalian berhasil dikirim!');
    }


}
