<?php

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            ['id' => 1, 'name' => 'Acre', 'initials' => 'AC', 'created_at' => null, 'updated_at' => null],
            ['id' => 2, 'name' => 'Alagoas', 'initials' => 'AL', 'created_at' => null, 'updated_at' => null],
            ['id' => 3, 'name' => 'Amazonas', 'initials' => 'AM', 'created_at' => null, 'updated_at' => null],
            ['id' => 4, 'name' => 'Amapá', 'initials' => 'AP', 'created_at' => null, 'updated_at' => null],
            ['id' => 5, 'name' => 'Bahia', 'initials' => 'BA', 'created_at' => null, 'updated_at' => null],
            ['id' => 6, 'name' => 'Ceará', 'initials' => 'CE', 'created_at' => null, 'updated_at' => null],
            ['id' => 7, 'name' => 'Distrito Federal', 'initials' => 'DF', 'created_at' => null, 'updated_at' => null],
            ['id' => 8, 'name' => 'Espírito Santo', 'initials' => 'ES', 'created_at' => null, 'updated_at' => null],
            ['id' => 9, 'name' => 'Goiás', 'initials' => 'GO', 'created_at' => null, 'updated_at' => null],
            ['id' => 10, 'name' => 'Maranhão', 'initials' => 'MA', 'created_at' => null, 'updated_at' => null],
            ['id' => 11, 'name' => 'Minas Gerais', 'initials' => 'MG', 'created_at' => null, 'updated_at' => null],
            ['id' => 12, 'name' => 'Mato Grosso do Sul', 'initials' => 'MS', 'created_at' => null, 'updated_at' => null],
            ['id' => 13, 'name' => 'Mato Grosso', 'initials' => 'MT', 'created_at' => null, 'updated_at' => null],
            ['id' => 14, 'name' => 'Pará', 'initials' => 'PA', 'created_at' => null, 'updated_at' => null],
            ['id' => 15, 'name' => 'Paraíba', 'initials' => 'PB', 'created_at' => null, 'updated_at' => null],
            ['id' => 16, 'name' => 'Pernambuco', 'initials' => 'PE', 'created_at' => null, 'updated_at' => null],
            ['id' => 17, 'name' => 'Piauí', 'initials' => 'PI', 'created_at' => null, 'updated_at' => null],
            ['id' => 18, 'name' => 'Paraná', 'initials' => 'PR', 'created_at' => null, 'updated_at' => null],
            ['id' => 19, 'name' => 'Rio de Janeiro', 'initials' => 'RJ', 'created_at' => null, 'updated_at' => null],
            ['id' => 20, 'name' => 'Rio Grande do Norte', 'initials' => 'RN', 'created_at' => null, 'updated_at' => null],
            ['id' => 21, 'name' => 'Rondônia', 'initials' => 'RO', 'created_at' => null, 'updated_at' => null],
            ['id' => 22, 'name' => 'Roraima', 'initials' => 'RR', 'created_at' => null, 'updated_at' => null],
            ['id' => 23, 'name' => 'Rio Grande do Sul', 'initials' => 'RS', 'created_at' => null, 'updated_at' => null],
            ['id' => 24, 'name' => 'Santa Catarina', 'initials' => 'SC', 'created_at' => null, 'updated_at' => null],
            ['id' => 25, 'name' => 'Sergipe', 'initials' => 'SE', 'created_at' => null, 'updated_at' => null],
            ['id' => 26, 'name' => 'São Paulo', 'initials' => 'SP', 'created_at' => null, 'updated_at' => null],
            ['id' => 27, 'name' => 'Tocantins', 'initials' => 'TO', 'created_at' => null, 'updated_at' => null]
        ]);
    }
}
