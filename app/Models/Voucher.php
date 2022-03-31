<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory;

    static function crear(Request $request) {
        $voucher = DB::table('vouchers')
            ->insertGetId([
                'token' => Str::random(6),
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'imagen' => $request->imagen,
                'fecha_vencimiento' => Carbon::now()->addDays(15),
                'cliente_id' => $request->cliente_id,
                'created_at' => Carbon::now()
            ]);

        return $voucher;
    }

    static function buscar(string $id) {
        $voucher = DB::table('vouchers')
            ->where('token', $id)
            ->get();

        return $voucher;
    }

    static function buscarPorId(int $id) {
        $voucher = DB::table('vouchers')
            ->where('id', $id)
            ->get();

        return $voucher;
    }

    static function obtenerVouchers(int $id) {
        $vouchers = DB::table('vouchers')
            ->where('cliente_id', $id)
            ->where('activo', 1)
            ->get();

        return $vouchers;
    }
}
