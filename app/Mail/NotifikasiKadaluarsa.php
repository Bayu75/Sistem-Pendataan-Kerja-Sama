<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Kerjasama;

class NotifikasiKadaluarsa extends Mailable
{
    use Queueable, SerializesModels;

    public $kerjasama;
    public $type;

    public function __construct(Kerjasama $kerjasama, $type)
    {
        $this->kerjasama = $kerjasama;
        $this->type = $type;
    }

    public function build()
    {
        return $this->subject(
            $this->type === 'kadaluarsa'
                ? 'Kerja Sama Telah Kadaluarsa'
                : 'Kerja Sama Mendekati Kadaluarsa'
        )
        ->view('emails.notifikasi'); // <-- gunakan view Blade
    }
}
