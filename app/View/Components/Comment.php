<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Comment extends Component
{
    /**
     * Create a new component instance.
     */
    public $comment;
    public $image;
    public $author;
    public $body;
    public function __construct($comment)
    // $comment
    {
        $this->comment = $comment;
        $this->image = $comment['image'];
        $this->author = $comment['author'];
        $this->body = $comment['body'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment');
    }
}
