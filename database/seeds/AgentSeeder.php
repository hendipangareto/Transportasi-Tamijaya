<?php

use Illuminate\Database\Seeder;
use App\Models\HumanResource\Agent;

class AgentSeeder extends Seeder
{
    public function run()
    {
        Agent::create([
            'agent_code' => 'AGN-001',
            'agent_name' => 'EKO',
            'id_city'      => '1101',
            'id_province'      => '11',
            'agent_description'      => 'Coba Dulu',
            'agent_hp'      => '08323432',
            'agent_tlp'      => '09424',
            'agent_email'      => 'agent1@gmail.com',
            'agent_alamat'      => 'Jl.Solo',
        ]);
        Agent::create([
            'agent_code' => 'AGN-002',
            'agent_name' => 'BU PRI',
            'id_city'      => '1103',
            'id_province'      => '13',
            'agent_description'      => 'Coba Lagi',
            'agent_hp'      => '0832523532',
            'agent_tlp'      => '0966788',
            'agent_email'      => 'agent2@gmail.com',
            'agent_alamat'      => 'Jl.Kalasan',
        ]);
//        Agent::create([
//            'agent_code' => 'AGN-003',
//            'agent_domicile' => 'JOGJAKARTA',
//            'agent_name' => 'HALOTIKET'
//        ]);
//        Agent::create([
//            'agent_code' => 'AGN-004',
//            'agent_domicile' => 'JOGJAKARTA',
//            'agent_name' => 'TRI JOMBOR'
//        ]);
//        Agent::create([
//            'agent_code' => 'AGN-005',
//            'agent_domicile' => 'KLATEN',
//            'agent_name' => 'KARANGWUNI'
//        ]);
//        Agent::create([
//            'agent_code' => 'AGN-006',
//            'agent_domicile' => 'SOLO',
//            'agent_name' => 'AGEN ERLITA'
//        ]);
//        Agent::create([
//            'agent_code' => 'AGN-007',
//            'agent_domicile' => 'SOLO',
//            'agent_name' => 'AGEN BOGO'
//        ]);
//        Agent::create([
//            'agent_code' => 'AGN-008',
//            'agent_domicile' => 'JAKARTA',
//            'agent_name' => 'TRAVELA'
//        ]);
//        Agent::create([
//            'agent_code' => 'AGN-009',
//            'agent_domicile' => 'DENPASAR',
//            'agent_name' => 'ADVEN'
//        ]);
//        Agent::create([
//            'agent_code' => 'AGN-010',
//            'agent_domicile' => 'DENPASAR',
//            'agent_name' => 'AYU'
//        ]);
//        Agent::create([
//            'agent_code' => 'AGN-011',
//            'agent_domicile' => 'DENPASAR',
//            'agent_name' => 'PUTU'
//        ]);
//        Agent::create([
//            'agent_code' => 'AGN-012',
//            'agent_domicile' => 'DENPASAR',
//            'agent_name' => 'WAYAN'
//        ]);
//        Agent::create([
//            'agent_code' => 'AGN-013',
//            'agent_domicile' => 'DENPASAR',
//            'agent_name' => 'KOMANG'
//        ]);
    }
}
