<?php

namespace Database\Seeders;

use App\Models\Impuesto;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $userAdmin= new User();
        $userAdmin->name="Administrador";
        $userAdmin->email="admin@admin.com";
        $userAdmin->password=bcrypt('12345678');
        $userAdmin->isAdmin=1;
        $userAdmin->save();

        $impuesto1= new Impuesto();
        $impuesto1->valor= "5";
        $impuesto1->save();

        $impuesto2= new Impuesto();
        $impuesto2->valor= "15";
        $impuesto2->save();

        $impuesto3= new Impuesto();
        $impuesto3->valor= "12";
        $impuesto3->save();

        $impuesto4= new Impuesto();
        $impuesto4->valor= "8";
        $impuesto4->save();

        $impuesto5= new Impuesto();
        $impuesto5->valor= "10";
        $impuesto5->save();


        $producto1= new Producto();
        $producto1->nombre= "Producto 1";
        $producto1->precio= "123.45";
        $producto1->impuesto_id= 1;
        $producto1->save();

        $producto2= new Producto();
        $producto2->nombre= "Producto 2";
        $producto2->precio= "45.65";
        $producto2->impuesto_id= 2;
        $producto2->save();

        $producto3= new Producto();
        $producto3->nombre= "Producto 3";
        $producto3->precio= "45.65";
        $producto3->impuesto_id= 3;
        $producto3->save();

    }
}
