<?php

class CommentModel
{

    public static function getAllComments()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM comments";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getComment($comment_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, comment_id, comment_text FROM comments WHERE user_id = :user_id AND comment_id = :comment_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':comment_id' => $comment_id));

        return $query->fetch();
    }

    public static function createComment($comment_text)
    {
        if (!$comment_text || strlen($comment_text) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_comment_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO comments (comment_text, user_id) VALUES (:comment_text, :user_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':comment_text' => $comment_text, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_comment_CREATION_FAILED'));
        return false;
    }

    public static function updateComment($comment_id, $comment_text)
    {
        if (!$comment_id || !$comment_text) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE comments SET comment_text = :comment_text WHERE comment_id = :comment_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':comment_id' => $comment_id, ':comment_text' => $comment_text, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_comment_EDITING_FAILED'));
        return false;
    }

    /**
     * Delete a specific comment
     * @param int $comment_id id of the comment
     * @return bool feedback (was the comment deleted properly ?)
     */
    public static function deletecomment($comment_id)
    {
        if (!$comment_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM comments WHERE comment_id = :comment_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':comment_id' => $comment_id, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_comment_DELETION_FAILED'));
        return false;
    }
}
