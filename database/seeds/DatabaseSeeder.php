<?php

use App\Models\MasterData\Department;
use App\Models\Transaction\ScheduleReguler;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(PremiSeeder::class);
        $this->call(SalarySeeder::class);
        $this->call(PickPointSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(GroupAccountSeeder::class);
        $this->call(BalanceAktivaSeeder::class);
        $this->call(BalancePasivaSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(ArmadaSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(DayOffSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(ScheduleRegulerSeeder::class);
        $this->call(AgentSeeder::class);
        // $this->call(JournalSeeder::class);
        $this->call(BusSeeder::class);
        $this->call(TransactionRegulerSeeder::class);
//        $this->call(TransactionPariwisataSeeder::class);
        $this->call(DestinationWisataSeeder::class);
        $this->call(RouteWisataSeeder::class);
        $this->call(ArmadaScheduleSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(SatuanSeeder::class);
        $this->call(KategoriSeeder::class);

        $this->call(BagianSeeder::class);
    }
}
