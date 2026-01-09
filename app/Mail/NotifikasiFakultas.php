<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Kerjasama;
use App\Models\IdentitasMitra;

class NotifikasiFakultas extends Mailable
{
    use Queueable, SerializesModels;

    public $kerjasama;
    public $mitra;
    public $type;

    /**
     * Create a new message instance.
     */
    public function __construct(Kerjasama $kerjasama, IdentitasMitra $mitra, $type)
    {
        $this->kerjasama = $kerjasama;
        $this->mitra = $mitra;
        $this->type = $type;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject(
                $this->type === 'kadaluarsa'
                    ? 'Notifikasi Kerja Sama Kadaluarsa'
                    : 'Ajakan Kerja Sama Baru'
            )
            ->view('emails.notifikasi_email_fakultas'); // VIEW KHUSUS FAKULTAS
    }
}
