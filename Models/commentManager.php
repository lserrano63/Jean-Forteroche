<?php
require_once('Manager.php');
class CommentManager extends Manager {

    public function getComments($postId)
    {
        $db = $this->dbConnection();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
}