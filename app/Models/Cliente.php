<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    static function buscar(int $id) {
        $cliente = DB::table('clientes')
            ->where('id', $id)
            ->get();

        return $cliente;
    }
    
    static function registrar(Request $request) {
        $cliente = DB::table('clientes')
            ->insertGetId([
                'nombre' => $request->nombre,
                'email' => $request->email,
                "activo" => 1,
                'created_at' => Carbon::now()
            ]);

        return $cliente;
    }

    static function editar(Request $request, int $id) {
        $cliente = DB::table('clientes')
            ->where('id', $id)
            ->update([
                'nombre' => $request->nombre,
                'email' => $request->email,
                "activo" => $request->activo,
                'updated_at' => Carbon::now()
            ]);

        return $cliente;
    }

    static function eliminar(int $id) {
        DB::table('vouchers')
            ->where('cliente_id', $id)
            ->delete();
        
        $cliente = DB::table('clientes')
            ->where('id', $id)
            ->delete();

        return $cliente;
    }
}
