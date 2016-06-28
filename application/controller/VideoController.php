<?php

class VideoController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $videos = VideoModel::getAllVideos();

        $this->View->render('video/index', 
            array("videos" => VideoModel::getAllVideos()));
    }

    public function create()
    {
        $this->View->render('video/create');

        Auth::checkAuthentication();
    }

    public function create_action()
    {
        VideoModel::createVideo(Request::post('video_url'), Request::post('video_title'));
        Redirect::to('video');
    }

    public function delete($video_id)
    {
        VideoModel::deleteVideo($video_id);
        Redirect::to('video');
    }

    public function edit($video_id)
    {
        $this->View->render('video/edit', array(
            'video' => VideoModel::getVideo($video_id)
        ));
        Auth::checkAuthentication();
    }

    public function editSave()
    {
        VideoModel::editVideo(Request::post('video_id'), Request::post('video_title'), Request::post('video_url'));
        Redirect::to('video');
        
    }

}
