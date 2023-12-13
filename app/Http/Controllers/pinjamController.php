<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PeminjamanModel;
use Illuminate\Support\Facades\DB;

class pinjamController extends Controller
{
    function pinjam_store( Request $request )
    {
        $request["rent_date"] = Carbon::now()->toDateString();
        $request["return_date"] = Carbon::now()->addDays(5)->toDateString();
        try {
            DB::beginTransaction();
            PeminjamanModel::create($request->except('category'));
            DB::commit();

            $alatpinjam = PeminjamanModel::where('actual_return_date', $request->actual_return_date);
            $alat = $alatpinjam->first();
            $alat->save();
            return redirect('/');
        } catch (\Throwable $throw) {
            DB::rollback();
            dd($throw);
        }
    }
}
