<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Task; // Import the Task model if not already imported

class TaskAssignedNotification extends Notification
{
    use Queueable;
    public $taskDetails;

    /**
     * Create a new notification instance.
     */
    public function __construct(Task $task)
    {
        $this->taskDetails = $task;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
//            ->subject('New Task Assigned')
//            ->line('Hello,')
//            ->line('A new task has been assigned to you.')
//            ->line('Task Details:')
//            ->line($this->taskDetails);
            ->line('You have been assigned a new task.')
//            ->action('View Task', url('/tasks/' . $this->$task->id))
            ->action('View Task', url('/tasks/1'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
