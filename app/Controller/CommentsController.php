<?php

class CommentsController extends AppController{
    public $helpers = array('html', 'Form');

    public function add(){
        if($this->request->is('post')) {
            if($this->Comment->save($this->request->data)){
                $this->Session->setFlash('Success!');
                $this->redirect(array('controller'=>'posts', 'action'=>'view', $this->data['Comment']['post_id']));
            }else{
                $this->Session->setFlash('Failed!');
            }
        }
    }

    public function delete( $id ) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->request->is('ajax')){
            if( $this->Comment->delete($id)) {
                $this->autoReder = false;
                $this->autoLayout = false;
                $response = array('id' => $id);
                $this->header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
        }
        $this->redirect(array('controller'=>'posts', 'action'=>'index'));
    }
}