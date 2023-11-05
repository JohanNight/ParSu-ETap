<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteExpiredTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:delete-expired-tokens';
    protected $signature = 'tokens:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired password reset tokens';


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredTokens = User::whereNotNull('remember_token')
            ->where('remember_token', '<', now())
            ->get();
        foreach ($expiredTokens as $user) {
            $user->update(['remember_token' => null]);
        }

        $this->info('Expired tokens have been deleted.');
    }
}
