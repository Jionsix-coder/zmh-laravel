<?php

namespace Database\Seeders;

use App\Models\BasicUser;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BasicUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        BasicUser::insert([
            ['Name' => 'NaingMin', 'PositionDepartment' => 'Tarmwe', 'CityTineState' => 'Yangon', 'PersonalNumber' => 12345, 'NationalNumber' => '12/pabata(n)035797', 'CurrentOffice' => 'maugone', 'MoneyLeft' => 10000,'created_at' => $now, 'updated_at' => $now],
            ['Name' => 'HeinSoe', 'PositionDepartment' => 'Pazundung', 'CityTineState' => 'Yangon', 'PersonalNumber' => 67890, 'NationalNumber' => '12/pabata(p)135790', 'CurrentOffice' => 'kyattan', 'MoneyLeft' => 16000,'created_at' => $now, 'updated_at' => $now],
            ['Name' => 'WanWan', 'PositionDepartment' => 'MyinChan', 'CityTineState' => 'Mandalay', 'PersonalNumber' => 13579, 'NationalNumber' => '12/mcml(m)24580', 'CurrentOffice' => 'mathi', 'MoneyLeft' => 24000,'created_at' => $now, 'updated_at' => $now],
            ['Name' => 'MinKhant', 'PositionDepartment' => 'SouthOakkala', 'CityTineState' => 'Yangon', 'PersonalNumber' => 148257, 'NationalNumber' => '12/sokl(s)13469', 'CurrentOffice' => 'umya', 'MoneyLeft' => 48000,'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
