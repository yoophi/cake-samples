<?php
class BoardsController extends AppController {

	var $name = 'Boards';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->Board->recursive = 0;
		$this->set('boards', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Board.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('board', $this->Board->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Board->create();
			if ($this->Board->save($this->data)) {
				$this->Session->setFlash(__('The Board has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Board could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Board', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Board->save($this->data)) {
				$this->Session->setFlash(__('The Board has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Board could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Board->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Board', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Board->del($id)) {
			$this->Session->setFlash(__('Board deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>