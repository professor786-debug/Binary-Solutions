<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\StudentSubscription;
use App\Models\Student;
class CheckExpiredSubscriptions extends Command
{
    protected $signature = 'subscriptions:check-expired';
    protected $description = 'Set expired student packages to inactive and nullify student subscription_id';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'app:check-expired-subscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';

    /**
     * Execute the console command.
     */
        public function handle()
        {
            $today = Carbon::today();

            $expiredPackages = StudentSubscription::where('is_active', 1)
                    ->where('end_date', '<', $today)
                    ->get();

            foreach ($expiredPackages as $package) {
                $package->is_active = 0;
                $package->save();

                $student = Student::find($package->student_id);
                if ($student && $student->subscription_id == $package->id) {
                    $student->subscription_id = null;
                    $student->save();
                }
            }

            $this->info("Expired subscriptions have been updated.");
        }
}
