<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Creo un array di categorie
        $names = ['Azione', 'Avventura', 'Scienza', 'Fantasy', 'Mistri'];
    {
        // lo ciclo e inserisco nel database
        foreach ($names as $name) {
            $type = new Type();
            $type->type = $name;
            $type->save();
        }
    }
}
}