<?php

class productEditControl extends productEdit
{
    private $header;
    private $price;
    private $image;
    private $link;
    private $productid;

    public function __construct($header, $price, $image, $link, $productid)
    {
        $this->header = $header;
        $this->price = $price;
        $this->image = $image;
        $this->link = $link;
        $this->productid = $productid;
    }

    public function updateItem()
    {
        if($this->emptyInputCheck() == false)
        {
            header("location: /web/Kartell.php?error=emptyinput");
            exit();
        }

        $this->modifyItem($this->header, $this->price, $this->image, $this->link, empty($this->productid));
    }


    private function emptyInputCheck()
    {
        if(empty($this->header) || empty($this->price) || empty($this->image) || empty($this->link) || empty($this->productid))
        {
            $arg = false;
        }
        else
        {
            $arg = true;
        }
        return $arg;
    }
}