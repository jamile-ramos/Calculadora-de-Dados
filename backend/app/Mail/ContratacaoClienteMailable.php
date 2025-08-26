<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContratacaoClienteMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $venda;
    public $detalhesDispositivos;
    public $pesos;
    /**
     * Create a new message instance.
     */
    public function __construct($venda, $detalhesDispositivos, $pesos)
    {
        $this->venda = $venda;
        $this->detalhesDispositivos = $detalhesDispositivos;
        $this->pesos = $pesos;
    }

    public function build()
    {
        return $this->view('emails.resumo-vendedor')
            ->with([
                'venda' => $this->venda,
                'pesos' => $this->pesos
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contratacao Cliente Mailable',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.resumo-cliente',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
