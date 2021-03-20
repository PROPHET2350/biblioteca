<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * TblLibros Controller
 *
 * @property \App\Model\Table\TblLibrosTable $TblLibros
 * @method \App\Model\Entity\TblLibro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblLibrosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('TblAutor');
        $tblLibros = $this->paginate($this->TblLibros);
        $this->viewBuilder()->setLayout('index');
        $this->set(compact('tblLibros'));
        $this->render('/libros/index');
    }

    /**
     * View method
     *
     * @param string|null $id Tbl Libro id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblLibro = $this->TblLibros->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tblLibro'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('TblLibroAutor');
        $tblLibro = $this->TblLibros->newEmptyEntity();
        $tblLibroautor = $this->TblLibroAutor->newEmptyEntity();
        $this->viewBuilder()->setLayout('index');
        $nombreAutor = null;
        $apellidoAutor = null;
        $idLibro = null;
        $idAutor = null;
        if ($this->request->is('post')) {
            if ($this->TblLibros->find()->where(['isbn' => $this->request->getData('isbn')])->count() == 0) {


                $tblLibro->fecha_creacion = $this->request->getData('fecha');
                $tblLibro->titulo = $this->request->getData('title');
                $tblLibro->isbn = $this->request->getData('isbn');
                $tblLibro->precio = $this->request->getData('precio');

                $this->TblLibros->save($tblLibro);

                if ($this->request->getData('check')) {
                    $this->loadModel('TblAutor');
                    $tblAutor = $this->TblAutor->newEmptyEntity();
                    $tblAutor->nombre = $this->request->getData('nombre');
                    $tblAutor->apellido = $this->request->getData('apellido');
                    $nombreAutor = $this->request->getData('nombre');
                    $apellidoAutor = $this->request->getData('apellido');
                    $this->TblAutor->save($tblAutor);
                    
                    $idLibro = $this->paginate($this->TblLibros->find()->where(['isbn' => $this->request->getData('isbn')]));
                    $idAutor = $this->paginate($this->TblAutor->find()->where(['nombre' => $nombreAutor , 'apellido' => $apellidoAutor]));
    
                    $tblLibroautor->id_libro = $idLibro->first()->id;
                    $tblLibroautor->id_autor = $idAutor->first()->id;

                
                } else {

                    $idLibro = $this->paginate($this->TblLibros->find()->where(['isbn' => $this->request->getData('isbn')]));
                    $idAutor = $this->request->getData('nombre');

                    $tblLibroautor->id_libro = $idLibro->first()->id;
                    $tblLibroautor->id_autor = $idAutor;

                }
                
                $this->TblLibroAutor->save($tblLibroautor);
                $this->Flash->success(__('El Libro ha sido agregado.'));
                return $this->redirect(['controller' => 'TblLibros', 'action' => 'index']);
            } else {
                //a
            }

        }
        $this->render('/libros/add');
        $this->set(compact('tblLibro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tbl Libro id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblLibro = $this->TblLibros->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblLibro = $this->TblLibros->patchEntity($tblLibro, $this->request->getData());
            if ($this->TblLibros->save($tblLibro)) {
                $this->Flash->success(__('The tbl libro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tbl libro could not be saved. Please, try again.'));
        }
        $this->set(compact('tblLibro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tbl Libro id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblLibro = $this->TblLibros->get($id);
        if ($this->TblLibros->delete($tblLibro)) {
            $this->Flash->success(__('The tbl libro has been deleted.'));
        } else {
            $this->Flash->error(__('The tbl libro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
