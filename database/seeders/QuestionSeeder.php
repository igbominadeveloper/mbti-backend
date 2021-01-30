<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'You find it takes effort to introduce yourself to other people.' => 'ei-1',
            'You consider yourself more practical than creative.' => 'sn-1',
            'Winning a debate matters less to you than making sure no one gets upset.' => 'tf-1',
            'You get energized going to social events that involve many interactions.' => 'ei-2',
            'You often spend time exploring unrealistic and impractical yet intriguing ideas.' => 'sn-2',
            'Deadlines seem to you to be of relative rather than absolute importance.' => 'jp-1',
            'Logic is usually more important than heart when it comes to making important decisions.' => 'tf-2',
            'Your home and work environments are quite tidy.' => 'jp-2',
            'You do not mind being at the center of attention.' => 'ei-3',
            'Keeping your options open is more important than having a to-do list.' => 'jp-3'           
        ])->each(function ($shortcode, $question) {
            Question::create(["question" => $question, "shortcode" => $shortcode]);
        });
    }
}
