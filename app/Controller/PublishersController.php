<?php

App::uses('AppController','Controller');

class PublishersController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('publishers', $this->Publisher->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid publisher'));
        }

        $publisher = $this->Publisher->findById($id);
        if (!$publisher) {
            throw new NotFoundException(__('Invalid publisher'));
        }
        $this->set('publisher', $publisher);
    }

    public function add() {
        if (!empty($this->request->data)) {
            if ($this->Publisher->save($this->request->data)) {
                $this->Session->setFlash(__('Your publisher has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your publisher.'));
        }
    }

    public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid publisher'));
    }

    $publisher = $this->Publisher->findById($id);
    if (!$publisher) {
        throw new NotFoundException(__('Invalid publisher'));
    }

    if ($this->request->is(array('publisher', 'put'))) {
        $this->Publisher->id = $id;
        if ($this->Publisher->save($this->request->data)) {
            $this->Session->setFlash(__('Your publisher has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your publisher.'));
    }

    if (!$this->request->data) {
        $this->request->data = $publisher;
    }
  }
   public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Publisher->delete($id)) {
        $this->Session->setFlash(
            __('The publisher  with id: %s has been deleted.', h($id))
        );
        return $this->redirect(array('action' => 'index'));
    }
   }
}