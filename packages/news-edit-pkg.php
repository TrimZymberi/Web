<?php
class Edit extends Database
{
    protected function modifyItem($header, $summary, $image, $link, $newsid)
    {
        session_start();
        if (isset($_GET['id'])) {
            $user_id = $_SESSION["userid"];
            $newsid = $_GET["id"];
            $arg = $this->connect()->prepare('UPDATE news SET news_header = :header, news_summary = :summary, news_image = :image, news_divide = :link, user_id = :user_id WHERE news_id = :news_id;');
            $arg->bindParam(':header', $header);
            $arg->bindParam(':summary', $summary);
            $arg->bindParam(':image', $image);
            $arg->bindParam(':link', $link);
            $arg->bindParam(':user_id', $user_id);
            $arg->bindParam(':news_id', $newsid);
            if ($arg->execute()) {
                header("location: /web/pages/news.php?error=none");
                exit();
            } else {
                header("location: /web/user/sections/news-section.php?error=argfailed");
                exit();
            }
        } else {
            header("location: /web/Kartell.php?error=noID");
        }
    }
}
