<?php

class newsControl extends News
{
    private $header;
    private $summary;
    private $image;
    private $link;

    public function __construct($header, $summary, $image, $link)
    {
        $this->header = $header;
        $this->summary = $summary;
        $this->image = $image;
        $this->link = $link;
    }

    public function makeNews() {
        if ($this->emptyInput() == false) {
            header("location: /web/Kartell.php?error=emptyinput");
            exit();
        }
        $this->addNews($this->header, $this->summary, $this->image, $this->link);
    }

    private function emptyInput()
    {
        if(empty($this->header) || empty($this->summary) || empty($this->image) || empty($this->link))
        {
            $arg = false;
        }else {
            $arg = true;
        }
        return $arg;
    }

}