<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use Illuminate\Console\Command;
use App\Models\User;
use Mail;
use DateTime;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-mail-command {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->argument('user_id');
        $user = User::find($userId);

        if ($user) {
            $this->line("Hello $user->name!");

            Mail::send(
                'mail.mail', ['name' => $user->name],
                function ($message) use($user) {
                    $message
                    ->to($user->email)
                    ->subject('Hello test')
                    ->from('top@academy.ru');
                }
            );
        }
        else {
            $this->line("No such user");
        }

        TestJob::dispatch((new DateTime())->format('c'), $user);
    }
}
