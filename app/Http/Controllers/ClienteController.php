<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function buscar($id)
    {
        try {
            $cliente = Cliente::buscar($id);

            if ($cliente->count() > 0) {
                return response()->json(["status" => "ok", "data" => $cliente]);
            }

            return response()->json(["status" => "error", "mensaje" => "Error! No se encontró el Cliente!"]);
        } catch (Throwable $e) {
            report($e);
            
            return response()->json(["status" => "error", "mensaje" => "Error! No se encontró el Cliente!"]);
        }
    }
    
    public function registrar(Request $request)
    {
        try {
            $id_cliente = Cliente::registrar($request);

            if ($id_cliente) {
                $cliente = Cliente::buscar($id_cliente);

                return response()->json(["status" => "ok", "mensaje" => "El Cliente se agregó correctamente!", "data" => $cliente]);
            }
        } catch (Throwable $e) {
            report($e);
            
            return response()->json(["status" => "error", "mensaje" => "Error! No se pudo registrar el Cliente!"]);
        }        
    }

    public function editar(Request $request, $id)
    {
        try {
            $cliente = Cliente::editar($request, $id);

            if ($cliente > 0) {
                $cliente = Cliente::buscar($id);

                return response()->json(["status" => "ok", "mensaje" => "El Cliente se actualizó correctamente!", "data" => $cliente]);
            }

            return response()->json(["status" => "error", "mensaje" => "Error! No se encontró al Cliente!"]);
        } catch (Throwable $e) {
            report($e);
            
            return response()->json(["status" => "error", "mensaje" => "Error! No se pudo actualizar el Cliente!"]);
        }        
    }

    public function eliminar($id)
    {
        try {
            $cliente = Cliente::eliminar($id);

            if ($cliente > 0) {
                return response()->json(["status" => "ok", "mensaje" => "El Cliente se eliminó correctamente!"]);
            }

            return response()->json(["status" => "error", "mensaje" => "Error! No se encontró al Cliente!"]);
        } catch (Throwable $e) {
            report($e);
            
            return response()->json(["status" => "error", "mensaje" => "Error! No se pudo eliminar el Cliente!"]);
        }        
    }
}
