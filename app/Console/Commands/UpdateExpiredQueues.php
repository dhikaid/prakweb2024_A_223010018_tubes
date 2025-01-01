<?php

namespace App\Console\Commands;

use App\Models\Queue;
use Illuminate\Console\Command;

class UpdateExpiredQueues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queues:update-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update expired queues to completed status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredQueues = Queue::where('status', '!=', 'completed')
            ->whereRaw('NOW() >= ADDTIME(joined_at, INTERVAL FLOOR(CEIL(? / 2)) SECOND)', [env('WAR_TICKET_DURATION', 60)])
            ->get();

        foreach ($expiredQueues as $queue) {
            $queue->update(['status' => 'completed']);
        }

        $this->info('Expired queues updated successfully.');
    }
}
