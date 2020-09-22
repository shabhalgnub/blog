<?php

namespace App\Repositories\Comments;

use App\Models\Comments;

class CommentsRepository implements CommentsInterface
{
    protected $comment;

    public function __construct(Comments $comment)
    {
        $this->comment=$comment;
    }

    public function add($request)
    {
        $request->user()->comments()->create($request->all());
    }

    public function addReply($request)
    {
        $request->user()->comments()->create($request->all());
    }

}
?>