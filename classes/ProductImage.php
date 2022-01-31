<?php

class ProductImage extends Base
{

    public $file;

    public $productId;


    public static function getTableName()
    {
        return 'product_images';
    }
}