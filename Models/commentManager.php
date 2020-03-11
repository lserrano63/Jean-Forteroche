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

    public function addComment($postId, $author, $comment)
    {
        $db = $this->dbConnection();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $addaComment = $comments->execute(array($postId, $author, $comment));
        return $addaComment;
    }

    public function getReportedComments()
    {
        $db = $this->dbConnection();
        $reportedComments = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr, reported FROM comments WHERE reported = 1 ORDER BY comment_date DESC');
        return $reportedComments;
    }
}