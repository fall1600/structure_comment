<?php

namespace App\Console\Commands;

use App\Models\GroupComment;
use Illuminate\Console\Command;

class QueryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comment:query';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $feedId = 'fb.group.feed.id.1234';

//        \DB::enableQueryLog();
        $comments = GroupComment::scoped(['feed_id' => $feedId])
//            ->orderBy('_lft')
            ->get();
//        dd(\DB::getQueryLog());

        dump($comments->toArray());

        return 0;
    }
}
