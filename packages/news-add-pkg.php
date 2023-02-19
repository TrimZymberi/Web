<?php 

class News extends Database
{
    protected function addNews($header, $summary, $image, $link)
    {
        session_start();
        $user_id = $_SESSION["userid"];

        $arg = $this->connect()->prepare('INSERT INTO news (news_header, news_summary, news_image, news_divide, user_id) VALUES (?,?,?,?,?);');
        if($arg->execute(array($header, $summary, $image, $link, $user_id))) {
            header("location: /web/pages/news.php?error=none");
            exit();
        } else {
            header("location: /web/user/sections/news-section.php?error=argfailed");
            exit();
        }

    }

}

        