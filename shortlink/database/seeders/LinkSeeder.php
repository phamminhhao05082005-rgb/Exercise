<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Link;
class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Link::create([
            'original_url' => 'https://www.youtube.com/watch?v=6QYcd7RggNU&list=RDGMEMYH9CUrFO7CfLJpaD7UR85wVMB7xai5u_tnk&index=9',
            'alias' => 'test1']);

        Link::create([
            'original_url' => 'https://www.youtube.com/watch?v=wJnBTPUQS5A&list=RDGMEMYH9CUrFO7CfLJpaD7UR85wVMB7xai5u_tnk&index=3',
            'alias' => 'test2']);


        Link::create([
            'original_url' => 'https://www.youtube.com/watch?v=cMg8KaMdDYo&list=RDGMEMYH9CUrFO7CfLJpaD7UR85wVMB7xai5u_tnk&index=2',
            'alias' => 'test3']);
    }
}
