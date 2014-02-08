<?php

class PostsController extends AppController{
// public $scaffold;
    public $helpers = array('html', 'Form');

    public function index() {
        $this->set('posts', $this->Post->find('all'));
        $this->set('title_for_layout', '記事一覧');
    }

    public function view($id = null){
        $this->Post->id = $id;
        $this->set('post', $this->Post->read());
    }

    public function add(){
        if($this->request->is('post')) {
            if($this->Post->save($this->request->data)){
                $this->Session->setFlash('Success!');
                $this->redirect(array('action'=>'index'));
            }else{
                $this->Session->setFlash('Failed!');
            }
        }
    }

    public function edit($id = null ) {
        $this->Post->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Post->read();
        }else{
            if($this->Post->save($this->request->data)){
                $this->Session->setFlash('Success!');
                $this->redirect(array('action'=>'index'));
            }else{
                $this->Session->setFlash('Failed!');
            }
        }

    }

    public function delete( $id ) {
        $this->log('call ajax0', MYLOG);
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->request->is('ajax')){
            $this->log('call ajax1', MYLOG);
            if( $this->Post->delete($id)) {
                $this->log('call ajax2', MYLOG);
                $this->autoReder = false;
                $this->autoLayout = false;
                $response = array('id' => $id);
                $this->header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
        }
        $this->redirect(array('action'=>'index'));

        // ↓not ajax
        // if ($this->Post->delete($id)) {
        //     $this->Session->setFlash('Deleted');
        //     $this->redirect(array('action'=>'index'));
        // }
    }

}