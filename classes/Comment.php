<?php


class Comment extends Base
{
    public $articleId;

    public $userId;

    public $comment;

    public static function getTableName()
    {
       return 'comments';
    }

    public function getUsername()
    {
        return User::find($this->userId);
    }

    public function cardComment(){

        $commentHtml = '<div class="card col-12 mb-5" style="width: 800px;">
                        <div class="card-body">
                            <h4 class="card-title">'.$this->getUsername()->username.'</h4>
                            <p class="card-text">'.$this->comment.'</p>
                        </div>
                    </div>';

        echo $commentHtml;
    }
}