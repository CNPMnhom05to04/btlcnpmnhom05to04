<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::insert(
            ['from' => 23, 'to' => 38, 'message' => '123456HD789', 'is_read' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['from' => 38, 'to' => 23, 'message' => '1234DFD56789', 'is_read' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['from' => 39, 'to' => 23, 'message' => '12345bvb67AD89', 'is_read' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['from' => 40, 'to' => 38, 'message' => '123456vb789', 'is_read' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['from' => 38, 'to' => 40, 'message' => 'hahshshshsh', 'is_read' => 1, 'created_at' => now(), 'updated_at' => now()]
        );
    }
}
