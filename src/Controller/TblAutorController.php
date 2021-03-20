<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TblAutor Controller
 *
 * @property \App\Model\Table\TblAutorTable $TblAutor
 * @method \App\Model\Entity\TblAutor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblAutorController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tblAutor = $this->paginate($this->TblAutor);

        $this->set(compact('tblAutor'));
    }

    public function find($id = null)
    {
        $authors = $this->paginate($this->TblAutor->find()->where(['OR' => [['nombre LIKE' => '%'.$id.'%'], ['apellido LIKE' => '%'.$id.'%']]]));
        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($authors));
    }
    /**
     * View method
     *
     * @param string|null $id Tbl Autor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblAutor = $this->TblAutor->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tblAutor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblAutor = $this->TblAutor->newEmptyEntity();
        if ($this->request->is('post')) {
            $tblAutor = $this->TblAutor->patchEntity($tblAutor, $this->request->getData());
            if ($this->TblAutor->save($tblAutor)) {
                $this->Flash->success(__('The tbl autor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tbl autor could not be saved. Please, try again.'));
        }
        $this->set(compact('tblAutor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tbl Autor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblAutor = $this->TblAutor->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblAutor = $this->TblAutor->patchEntity($tblAutor, $this->request->getData());
            if ($this->TblAutor->save($tblAutor)) {
                $this->Flash->success(__('The tbl autor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tbl autor could not be saved. Please, try again.'));
        }
        $this->set(compact('tblAutor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tbl Autor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblAutor = $this->TblAutor->get($id);
        if ($this->TblAutor->delete($tblAutor)) {
            $this->Flash->success(__('The tbl autor has been deleted.'));
        } else {
            $this->Flash->error(__('The tbl autor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
