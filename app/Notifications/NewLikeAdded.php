<?php

namespace App\Notifications;

use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewLikeAdded extends Notification implements ShouldQueue
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
    public function __construct($likeable, $user, Post $post = null)
    {

        $this->likeable = $likeable;
        $this->user = $user;
        $this->post = $post;
        // dd($this->post);
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
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {

        $post_slug = get_class($this->likeable) == 'App\Post' ? $this->likeable->slug : $this->post->slug;
        return [
            'likeable_type' => get_class($this->likeable),
            'likeable_id' => $this->likeable->id,
            'post_id'    => $this->post->id,
            'post_slug' => $post_slug,
            'likeable_title' => $this->likeable->title,
            'likeable_body' => $this->likeable->body,
            'likeable_slug' => $this->likeable->slug,
            'user' => $this->user,
            'likeTime' => Carbon::now()
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
