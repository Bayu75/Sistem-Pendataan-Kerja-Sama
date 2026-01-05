<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Kerjasama;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifikasiKadaluarsa;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Jalankan setiap hari
        $schedule->call(function () {
            $today = Carbon::today();
            $kerjasamas = Kerjasama::all();

            foreach ($kerjasamas as $k) {
                $tglSelesai = Carbon::parse($k->tgl_selesai);
                $h7 = $tglSelesai->copy()->subDays(7);

                if ($today->gte($h7) && $today->lt($tglSelesai) && $k->status_notif_sent === 'none') {
                    $k->status_notif_sent = 'sent';
                    Mail::to($k->email_user)->send(new NotifikasiKadaluarsa($k, 'mendekati'));
                    $k->save();
                }

                if ($today->gte($tglSelesai) && $k->status_notif_sent !== 'expired') {
                    $k->status_notif_sent = 'expired';
                    Mail::to($k->email_user)->send(new NotifikasiKadaluarsa($k, 'kadaluarsa'));
                    $k->save();
                }
            }
        })->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}

// php artisan schedule:work (Ini akan menjalankan scheduler real time setiap hari)
// * * * * * cd /path/to/project && php artisan schedule:run >> /dev/null 2>&1 (Artinya scheduler dicek tiap menit, dan akan menjalankan job daily() sesuai konfigurasi)
