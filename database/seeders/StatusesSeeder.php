<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                "type" => "To do",
            ],
            [
                "type" => "Work in progress",
            ],
            [
                "type" => "Done",
            ],
        ];
        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
