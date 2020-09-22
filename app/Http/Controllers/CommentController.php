<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdRequest;
use App\Repositories\Comments\CommentsInterface;

class CommentController extends Controller
{
    protected $comment;

    public function __construct(CommentsInterface $comment)
    {
        $this->comment=$comment;
    }

    public function store(Request $request)
    {
        $this->comment->add($request);

        return back();
    }

    public function reply(Request $request)
    {
        $this->comment->addReply($request);

        return back();
    }
}


