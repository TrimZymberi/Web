<?php

class editControl extends Edit
{
    private $header;
    private $summary;
    private $image;
    private $link;
    private $newsid;

    public function __construct($header, $summary, $image, $link, $newsid)
    {
        $this->header = $header;
        $this->summary = $summary;
        $this->image = $image;
        $this->link = $link;
        $this->newsid = $newsid;
    }

    public function updateItem()
    {
        if($this->emptyInputCheck() == false)
        {
            header("location: /web/Kartell.php?error=emptyinput");
            exit();
        }

        $this->modifyItem($this->header, $this->summary, $this->image, $this->link, empty($this->newsid));
    }


    private function emptyInputCheck()
    {
        if(empty($this->header) || empty($this->summary) || empty($this->image) || empty($this->link) || empty($this->newsid))
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