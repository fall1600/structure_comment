<?php

namespace Database\Seeders;

use App\Models\GroupComment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        GroupComment::truncate();

        $feedId1 = 'fb.group.feed.id.1234';
        $feedId2 = 'fb.group.feed.id.abcd';

        $this->makeTree($feedId1, 3, 5);
        $this->makeTree($feedId2, 2, 6);
    }

    protected function makeTree(string $feedId, $layer1Count, $layer2Max)
    {
        $skus = collect(['璀璨寶石', '多米諾王國', '卡卡頌', '矮人礦坑', '駱駝大賽', '郎中闖江湖']);

        $messages = collect([
            '寶石+1',
            '多+1',
            '卡+1',
            '矮礦+1',
            '駱+1',
            '郎+1',
            '哈囉~~~',
            '666',
            '闆娘好久沒開播欸',
            '抽',
        ]);

        foreach (range(0, $layer1Count) as $count1) {
            $gcLayer1 = GroupComment::factory()->create([
                'feed_id' => $feedId,
                'text' => $sku = $skus->random(1)[0],
            ]);

            dump($feedId.' '.$sku);

            foreach (range(0, random_int(0, $layer2Max)) as $count2) {
                $gcLayer2 = GroupComment::factory()->create([
                    'feed_id' => $feedId,
                    'text' => $message = $messages->random(1)[0],
                ]);

                dump("    ". $message);
                $gcLayer1->appendNode($gcLayer2);
            }
        }
    }
}
