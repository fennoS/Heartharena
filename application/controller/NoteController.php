<?php

class NoteController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();

        Auth::checkAuthentication();
    }

    
    public function index()
    {
        $this->View->render('note/index', array(
            'notes' => NoteModel::getAllNotes()
        ));
    }

    public function create()
    {
        NoteModel::createNote(Request::post('note_text'));
        Redirect::to('note');
    }

    public function edit($note_id)
    {
        $this->View->render('note/edit', array(
            'note' => NoteModel::getNote($note_id)
        ));
    }

    public function editSave()
    {
        NoteModel::updateNote(Request::post('note_id'), Request::post('note_text'));
        Redirect::to('note');
    }

    public function delete($note_id)
    {
        NoteModel::deleteNote($note_id);
        Redirect::to('note');
    }
}
