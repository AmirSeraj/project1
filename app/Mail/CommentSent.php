<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentSent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $comment;
    public $article;
    public function __construct($request,$article)
    {
        //
        $this->comment = $request;
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.comment')->with([
            'articleTitle'=>$this->article->title,
            'username'=>$this->comment->name,
            'commentBody'=>$this->comment->body,
        ]);
    }
}
