<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MyFirstNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $detailData;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($detailData)
    {
        $this->detailData = $detailData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->detailData['body'])
                    ->line('Người nhận: '.$this->detailData['user'])
                    ->line('Số điện thoại: '.$this->detailData['phone'])
                    ->line('Địa chỉ: '.$this->detailData['address'])
                    ->line('Tổng: $'.$this->detailData['total'])
                    ->action($this->detailData['text'], $this->detailData['url'])
                    ->line($this->detailData['footer']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
