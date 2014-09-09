<?php

App::uses('AppController','Controller');

class BooksController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('books', $this->Book->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid book'));
        }

        $book = $this->Book->findById($id);
        if (!$book) {
            throw new NotFoundException(__('Invalid book'));
        }
        $this->set('book', $book);
    }

    public function add() {
        if (!empty($this->request->data)) {
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('Your book has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your book.'));
        }
        $this->set('writers',$this->Book->Writer->find('list'));
        $this->set('publishers',$this->Book->Publisher->find('list'));
    }

    public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid book'));
    }

    $book = $this->Book->findById($id);
    if (!$book) {
        throw new NotFoundException(__('Invalid book'));
    }

    if (!empty($this->request->data)) {
        if ($this->Book->save($this->request->data)) {
            $this->Session->setFlash(__('Your book has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your book.'));
    }

    if (!$this->request->data) {
        $this->request->data = $book;
    }
    $this->set('writers',$this->Book->Writer->find('list'));
    $this->set('publishers',$this->Book->Publisher->find('list'));
  }
   public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Book->delete($id)) {
        $this->Session->setFlash(
            __('The book  with id: %s has been deleted.', h($id))
        );
        return $this->redirect(array('action' => 'index'));
    }
   }
}