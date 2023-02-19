<?php

class productControl extends Products
{
    private $header;
    private $price;
    private $image;
    private $link;

    public function __construct($header, $image, $price, $link)
    {
        $this->header = $header;
        $this->image = $image;
        $this->price = $price;
        $this->link = $link;
    }

    public function addProduct() {
        if ($this->emptyInput() == false) {
            header("location: /web/Kartell.php?error=emptyinput");
            exit();
        }
        $this->adddbProduct($this->header, $this->image, $this->price, $this->link);
    }

    private function emptyInput()
    {
        if(empty($this->header) || empty($this->image) || empty($this->price) || empty($this->link))
        {
            $arg = false;
        }else {
            $arg = true;
        }
        return $arg;
    }

}