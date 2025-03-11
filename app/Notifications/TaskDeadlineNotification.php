<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskDeadlineNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['mail']; 
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Deadline tugas Anda sudah hari ini!')
                    ->line('Judul Tugas: ' . $this->task->title)
                    ->line('Deskripsi: ' . $this->task->description)
                    ->action('Lihat Tugas', url('/tasks/' . $this->task->id))
                    ->line('Terima kasih telah menggunakan aplikasi kami!');
    }
}
