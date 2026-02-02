<?php

namespace App\Observers;

use App\Models\Comment;
use App\Notifications\CommentNotification;
use Filament\Notifications\Notification;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        $author = $comment->commentable->user;

        Notification::make()
            ->title('New Comment Created')
            // ->body('A new comment has been added by ' . $author->name . '.')
            ->body('test notification')
            ->success()
            ->sendToDatabase($author);

        $author->notify(new CommentNotification($comment->commentable));
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "restored" event.
     */
    public function restored(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     */
    public function forceDeleted(Comment $comment): void
    {
        //
    }
}
