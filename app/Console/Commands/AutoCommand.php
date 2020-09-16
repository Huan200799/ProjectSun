<?php

namespace App\Console\Commands;
use App\Notifications\OrderApproval;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Notifications\Notifiable;
use App\User;
class AutoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:auto';

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
        $now = Carbon::now()->hour;
        var_dump($now);
        $user = User::where('level', '=', 'Admin')->get();
        \Notification::send($user, New OrderApproval());
    }
}
