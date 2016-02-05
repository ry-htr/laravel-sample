<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
        \App\Console\Commands\ListUser::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * set crontab
     * ```
     *   * * * * * php /path/to/artisan schedule:run
     * ```
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();

        /*
        $schedule
            ->command('auth:clear-reminders') // artisan command を実行
            ->daily();  // 毎日

        $schedule
            ->call('YourClass@someMethod') // クラスメソッドを実行
            ->hourly();  // 毎時

        $schedule
            ->call(function() {  // クロージャーを実行
                // Do some task...
            })
            ->dailyAt('15:00');  // 毎日時間指定

        $schedule
            ->exec('cp oldThing newThing')   // ターミナルコマンドを実行
            ->weekly()->mondays()->at('13:00');
        */
    }
}
