<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vouchers')->insert([
            'token' => Str::random(6),
            'titulo' => 'Pintas y Tapas',
            'descripcion' => 'Disfrutá un momento único con cerveza tirada y ricos tapeos.',
            'imagen' => 'pintas-y-tapas.jpg',
            'fecha_vencimiento' => Carbon::now()->addDays(15),
            'cliente_id' => 1,
            'created_at' => Carbon::now()
        ]);
        DB::table('vouchers')->insert([
            'token' => Str::random(6),
            'titulo' => 'Desayunos',
            'descripcion' => 'Compartí un desayuno o merienda en cafeterías y pastelerías únicas.',
            'imagen' => 'desayunos.jpg',
            'fecha_vencimiento' => Carbon::now()->addDays(15),
            'activo' => 0,
            'cliente_id' => 1,
            'created_at' => Carbon::now()
        ]);
        DB::table('vouchers')->insert([
            'token' => Str::random(6),
            'titulo' => 'Cena para 2 Personas',
            'descripcion' => 'Disfrutá la más exquisita gastronomía y propuestas gourmet.',
            'imagen' => 'parrillas.jpg',
            'fecha_vencimiento' => Carbon::now()->addDays(15),
            'cliente_id' => 1,
            'created_at' => Carbon::now()
        ]);
    }
}
