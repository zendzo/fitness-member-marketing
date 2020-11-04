<?php

namespace App\Console\Commands;

use App\Mail\RemainderEmailDigest;
use App\Models\Remainder;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class RemaindersEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remainders:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Remainders Email';

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
        $remainders = Remainder::query()
            ->with('lead')
            ->where('remainders.remainder_date', now()->format('Y-m-d'))
            ->where('remainders.status', 'pending')
            ->get();
        
        $data = [];
        foreach ($remainders as $remainder) {
            $data[$remainder->user_id][] = $remainder->toArray();
        }

        foreach ($data as $userId => $remainders) {
            $this->sendEmailToUser($userId, $remainders);
        }
    }
    
    private function sendEmailToUser($userId, $remainders)
    {
        $user = User::findOrfail($userId);

        Mail::to($user)->send(new RemainderEmailDigest($remainders));
    }
}
