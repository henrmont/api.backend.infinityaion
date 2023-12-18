<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $comment = Comment::create([
                    'user_id'   => 1,
                    'topic_id'  => $i,
                    'content'   => fake()->paragraph(),
                    'created_at'=> now(),
                    'updated_at'=> now()
                ]);
            }
        }
    }
}
