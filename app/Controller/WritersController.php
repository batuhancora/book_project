<?php

App::uses('AppController','Controller');

class WritersController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('writers', $this->Writer->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid writer'));
        }

        $writer = $this->Writer->findById($id);
        if (!$writer) {
            throw new NotFoundException(__('Invalid writer'));
        }
        $this->set('writer', $writer);
    }

    public function add() {
        if (!empty($this->request->data)) {
            if ($this->Writer->save($this->request->data)) {
                $this->Session->setFlash(__('Your writer has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your writer.'));
        }
    }
    public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid writer'));
    }

    $writer = $this->Writer->findById($id);
    if (!$writer) {
        throw new NotFoundException(__('Invalid writer'));
    }

    if ($this->request->is(array('writer', 'put'))) {
        $this->Writer->id = $id;
        if ($this->Writer->save($this->request->data)) {
            $this->Session->setFlash(__('Your writer has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your writer.'));
    }

    if (!$this->request->data) {
        $this->request->data = $writer;
    }
   }
   public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Writer->delete($id)) {
        $this->Session->setFlash(
            __('The writer  with id: %s has been deleted.', h($id))
        );
        return $this->redirect(array('action' => 'index'));
    }
   }
}