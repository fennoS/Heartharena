<?php
//dit is de master branch
class CommentController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();

        Auth::checkAuthentication();
    }

    public function index()
    {
        $this->View->render('comment/index', array(
            'comment' => CommentModel::getAllComments()
        ));
    }

    public function create()
    {
        CommentModel::createComment(Request::post('comment_text'));
        Redirect::to('comment');
    }

    public function delete($comment_id)
    {
        CommentModel::deleteComment($comment_id);
        Redirect::to('comment');
    }
    public function edit($comment_id)
    {
        $this->View->render('comment/edit', array(
            'comment' => CommentModel::getComment($comment_id)
        ));
    }
    public function editSave()
    {
        CommentModel::updateComment(Request::post('comment_id'), Request::post('comment_text'));
        Redirect::to('comment');
    }
}
