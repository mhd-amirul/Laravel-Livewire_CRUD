<?php

namespace Database\Seeders;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = public_path('dataset.json');

        if (File::exists($data)) {

            try {
                DB::beginTransaction();

                $data = json_decode(File::get($data), true);

                foreach ($data as $key => $value) {
                    $date = Carbon::today()->subDays(rand(0, 179))->addSeconds(rand(0, 86400));
                    $comm = \Faker\Factory::create();

                    $data[$key]["created_at"] = $date;
                    $data[$key]["updated_at"] = $date;
                    $data[$key]["comment"]    = $comm->sentence();
                }

                Contact::insert($data);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
    }
}
