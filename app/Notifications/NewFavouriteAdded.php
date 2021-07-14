<?php

namespace App\Notifications;

use App\Post;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewFavouriteAdded extends Notification implements ShouldQueue
{
    use Queueable;

    public $likeable;
    public $user;
    public $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($likeable, $user ,Post $post)
    {

        $this->likeable = $likeable;
        $this->user = $user;
        $this->post = $post;
        // dd($this->likeable);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

        /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $post_slug = get_class($this->likeable) == 'App\Post' ? $this->likeable->slug : $this->post->slug ;

        return [
            'favouriteable_type' => get_class($this->likeable),
            'favouriteable_id' => $this->likeable->id,
            'post_slug' =>$post_slug,
            'favouriteable_title' => $this->likeable->title,
            'favouriteable_body' => $this->likeable->body,
            'favouriteable_slug' => $this->likeable->slug,
            'user' => $this->user,
            'favouriteTime' => Carbon::now()
        ];
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
