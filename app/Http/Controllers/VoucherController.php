<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function crear(Request $request)
    {
        try {
            $id_voucher = Voucher::crear($request);

            if ($id_voucher) {
                $voucher = Voucher::buscarPorId($id_voucher);

                return response()->json(["status" => "ok", "message" => "El Voucher se creó correctamente!", "data" => $voucher]);
            }
        } catch (Throwable $e) {
            report($e);
            
            return response()->json(["status" => "error", "message" => "Error! No se pudo crear el Voucher!"]);
        }
    }
    
    public function buscar($id)
    {
        try {
            $voucher = Voucher::buscar($id);

            if ($voucher->count() > 0) {
                $voucher = $voucher->first();

                if ($voucher->activo == 0) {
                    return response()->json(["status" => "error", "message" => "El Voucher ya no se encuentra activo!"]);
                }

                $fecha_vencimiento = new Carbon($voucher->fecha_vencimiento);
                $fecha_actual = Carbon::now();
                $diferencia_fechas = $fecha_vencimiento->diff($fecha_actual)->days;

                if ($diferencia_fechas > 15) {
                    return response()->json(["status" => "error", "message" => "El Voucher ya se encuentra vencido!"]);
                }
        
                return response()->json(["status" => "ok", "data" => $voucher]);
            }

            return response()->json(["status" => "error", "message" => "No se encontró el Voucher!"]);
        } catch (Throwable $e) {
            report($e);
            
            return response()->json(["status" => "error", "message" => "No se encontró el Voucher!"]);
        }        
    }

    public function obtenerVouchers($id) {
        $vouchers = Voucher::obtenerVouchers($id);

        if ($vouchers->count() > 0) {
            return response()->json(["status" => "ok", "data" => $vouchers]);
        }

        return response()->json(["status" => "error", "message" => "No se encontraron Vouchers disponibles para el Cliente!"]);
    }
}
