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
        $this->viewBuilder()->setLayout('index');
        $tblAutor = $this->paginate($this->TblAutor);
        $this->set(compact('tblAutor'));
        $this->render('/autores/index');
    }

    public function find($id = null)
    {
        $authors = $this->paginate($this->TblAutor->find()->where(['OR' => [['nombre LIKE' => '%' . $id . '%'], ['apellido LIKE' => '%' . $id . '%']]]));
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
        $this->viewBuilder()->setLayout('index');
        $tblAutor = $this->TblAutor->newEmptyEntity();
        if ($this->request->is('post')) {
            if (count($this->TblAutor->find()->where(['nombre' => $this->request->getData('nombre'), 'apellido' => $this->request->getData('apellido')])->all()) == 0) {
                $tblAutor = $this->TblAutor->patchEntity($tblAutor, $this->request->getData());
                if ($this->TblAutor->save($tblAutor)) {
                    $this->Flash->success(__('Autor ingresado'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Algo fue mal'));
                    return $this->redirect(['action' => 'add']);
                }
            } else {
                $this->Flash->warning(__('Autor existente'));
                return $this->redirect(['action' => 'add']);
            }
        }
        $this->set(compact('tblAutor'));
        $this->render('/autores/add');
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
        $this->viewBuilder()->setLayout('index');
        $tblAutor = $this->TblAutor->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('tblAutor'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (count($this->TblAutor->find()->where(['nombre' => $this->request->getData('nombre'), 'apellido' => $this->request->getData('apellido')])->all()) == 0) {
                $tblAutor = $this->TblAutor->patchEntity($tblAutor, $this->request->getData());
                if ($this->TblAutor->save($tblAutor)) {
                    $this->Flash->success(__('Autor actualizado'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Algo fue mal'));
            } else {
                $this->Flash->warning(__('Autor existente'));
                return $this->redirect('/Autores/edit/'.$id);
            }
        }
        $this->render('/autores/edit');
    }
    public function books($id = null)
    {
        $this->viewBuilder()->setLayout('index');
        $this->loadModel('TblLibroAutor');
        $tblLibros = $this->paginate($this->TblLibroAutor->find('all',['contain' => ['TblLibros'],])->where(['id_autor'=>$id]));
        $this->set(compact('tblLibros'));
        $this->render('/autores/libros');
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
        $this->loadModel('TblLibroAutor');
        if (count($this->TblLibroAutor->find()->where(['id_autor'=>$id])->all()) == 0) {
            $this->request->allowMethod(['post', 'delete','get']);
            $tblAutor = $this->TblAutor->get($id);
            if ($this->TblAutor->delete($tblAutor)) {
                $this->Flash->success(__('Autor eliminado'));
            } else {
                $this->Flash->error(__('No se ha podido eliminar'));
            }
        } else {
            $this->Flash->warning(__('Este autor tiene libros'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
