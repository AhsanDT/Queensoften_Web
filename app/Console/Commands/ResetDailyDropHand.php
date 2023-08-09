<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ResetDailyDropHand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:daily_drop_hand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset daily drop_hand count for all users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::query()->update(['drop_hand' => 0]);

        $this->info('Daily drop_hand count reset completed.');
    }
}
