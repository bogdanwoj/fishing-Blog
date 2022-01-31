<?php

class Category extends Base
{
    public $name;


    public function getArticles()
    {
        return Article::findBy('categoryId', $this->getId());
    }

    public static function getTableName()
    {
        return 'categories';
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


}