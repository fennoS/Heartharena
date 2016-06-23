<?php

class VideoModel
{
	public static function getAllVideos()
	{
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM videos";
        $query = $database->prepare($sql);
        $query->execute();
        
        return $query->fetchAll();
	}

    public static function getVideo($video_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM videos WHERE video_id = :video_id";
        $query = $database->prepare($sql);
        $query->execute(array(':video_id' => $video_id));
        
        return $query->fetch();
    }

	public static function createVideo($video_url, $video_title)
	{
		if (!$video_url || strlen($video_url) == 0) {
			Session::add('feedback_negative', Text::get('FEEDBACK_VIDEO_CREATION_FAILED'));
            return false;
        }

        if (!$video_title || strlen($video_title) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_TITLE_CREATION_FAILED'));
            return false;
        }
			
		sscanf($video_url,"https://youtu.be/%s",$video_code);


		if (strlen($video_code) != 11) {
			Session::add('feedback_negative', Text::get('FEEDBACK_VIDEO_URL_CREATION_FAILED'));
            return false;		
		}

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO videos (video_url, video_title) VALUES (:video_code, :video_title)";
        $query = $database->prepare($sql);
        $query->execute(array(':video_code' => $video_code, ':video_title' => $video_title));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_VIDEO_CREATION_FAILED'));
        return false;
	}

    public static function deleteVideo($video_id)
    {
        if (!$video_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM videos WHERE video_id = :video_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':video_id' => $video_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }

    public static function editVideo($video_id, $video_title, $video_url)
    {
        if (!$video_title) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE videos SET video_title = :video_title, video_url = :video_url WHERE video_id = :video_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':video_id' => $video_id, ':video_title' => $video_title, ':video_url' => $video_url));

        if ($query->rowCount() == 1) {
            return true;
        }
        
        Session::add('feedback_negative', Text::get('FEEDBACK_VIDEO_EDITING_FAILED'));
        return false;
    }

}