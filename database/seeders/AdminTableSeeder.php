<?php
namespace Database\Seeders;
use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@web.com',
            'password' => bcrypt(12345678),
        ]);
    }
}
