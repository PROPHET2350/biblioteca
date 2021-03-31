<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * TblEditorial Controller
 *
 * @property \App\Model\Table\TblEditorialTable $TblEditorial
 * @method \App\Model\Entity\TblEditorial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblEditorialController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('index');
        $tblEditorial = $this->paginate($this->TblEditorial);

        $this->set(compact('tblEditorial'));
        $this->render('/editoriales/index');
    }

    /**
     * View method
     *
     * @param string|null $id Tbl Editorial id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function books($id = null)
    {
        $this->viewBuilder()->setLayout('index');
        $this->loadModel('TblLibroEditorial');
        $tblLibros = $this->paginate($this->TblLibroEditorial->find('all',['contain' => ['TblLibros'],])->where(['id_editorial'=>$id]));
        $this->set(compact('tblLibros'));
        $this->render('/editoriales/libros');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('index');
        $tblEditorial = $this->TblEditorial->newEmptyEntity();
        if ($this->request->is('post')) {
            if (count($this->TblEditorial->find()->where(['nombre' => $this->request->getData('nombre')])->all()) == 0) {
                $tblEditorial = $this->TblEditorial->patchEntity($tblEditorial, $this->request->getData());
                if ($this->TblEditorial->save($tblEditorial)) {
                    $this->Flash->success(__('Editorial ha sido agregada'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Algo ha ido mal'));
                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->warning('Editorial existente');
                return $this->redirect(['action' => 'add']);
            }
        }
        $this->set(compact('tblEditorial'));
        $this->render('/editoriales/add');
    }

    /**
     * Edit method
     *
     * @param string|null $id Tbl Editorial id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('index');
        $tblEditorial = $this->TblEditorial->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (count($this->TblEditorial->find()->where(['nombre' => $this->request->getData('nombre')])->all()) == 0) {
                $tblEditorial = $this->TblEditorial->patchEntity($tblEditorial, $this->request->getData());
                if ($this->TblEditorial->save($tblEditorial)) {
                    $this->Flash->success(__('Editorial actualizada'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Algo ha ido mal'));
                return $this->redirect('/Editoriales/edit/' . $id);
            } else {
                $this->Flash->warning('Editorial existente');
                return $this->redirect('/Editoriales/edit/' . $id);
            }
        }
        $this->set(compact('tblEditorial'));
        $this->render('/editoriales/edit');
    }

    /**
     * Delete method
     *
     * @param string|null $id Tbl Editorial id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('TblLibroEditorial');

        if (count($this->TblLibroEditorial->find()->where(['id_editorial' => $id])->all()) == 0) {
            $this->request->allowMethod(['post', 'delete','get']);
            $tblEditorial = $this->TblEditorial->get($id);
            if ($this->TblEditorial->delete($tblEditorial)) {
                $this->Flash->success(__('Editorial eliminada'));
            } else {
                $this->Flash->error(__('Algo ha ido mal'));
            }
        } else {
            $this->Flash->warning(__('Esta Editorial tiene libros'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
