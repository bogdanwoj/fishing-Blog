<?php

class Article extends Base
{
    public $title;

    public $name;

    public $categoryId;

    public $date;

    public $userId;

    public $text;

    public function getCategory()
    {
        return new Category($this->categoryId);
    }


    public function getUsername()
    {
        return User::find($this->userId);
    }


    public function getImages()
    {
        return Image::findBy('articleId', $this->getId());
    }

    public function getFirstImage()
    {
        $images =$this->getImages();

        if (isset($images[0])){
            return $images[0];
        } else {
            $image = new Image();
            $image->file = 'no_image.png';
            return $image;
        }
    }

    public function card()
    {
        $articleHtml = '<div class="col-10 mb-4">
                                <div class="card" style="width: 650px;">
                                <a href="article.php?id='.$this->getId().'"><img class="card-img-top" src="images/'.$this->getFirstImage()->file.'" alt="'.$this->name.'"></a>
                                    <div class="card-body">
                                        <h2 class="card-title">'.$this->title.'</h2>
                                        <p>Written by <strong>'.$this->getUsername().'</strong>,
                                            Posted in <strong>'.$this->getCategory()->getName().'</strong>
                                        </p>
                                        <p class="card-text">'.$this->text.'</p>
                                    </div>
                                </div>
                            </div>';

        echo $articleHtml;
    }

    public function cardSample()
    {
        $articleHtml = '<div class="col-4 text-nowrap" ">
                                <div class="card" style="width: 250px;">
                                    <a href="article.php?id='.$this->getId().'"><img class="card-img-top" src="images/'.$this->getFirstImage()->file.'" alt="'.$this->name.'"></a>
                                    <div class="card-body">
                                        <h3 class="card-title">'.$this->title.'</h3>
                                        <p>Written by <strong>'.$this->getUserName().'</strong>,
                                            Posted in <strong>'.$this->getCategory()->getName().'</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>';

        echo $articleHtml;
    }


    public static function getTableName()
    {
        return 'articles';
    }

    public function cardCarousel ()
    {
        $carouselHtml = ' <div>
                           <a href="category.php?id='.$this->getId().'"> <img class="d-block w-100" src="images/'.$this->getFirstImage()->file.'" alt="slide"> </a>
                       </div>';
        echo $carouselHtml;
    }


}

