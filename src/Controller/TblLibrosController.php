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
                    $idAutor = $this->paginate($this->TblAutor->find()->where(['nombre' => $nombreAutor, 'apellido' => $apellidoAutor]));

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
        $this->viewBuilder()->setLayout('index');
        $tblLibro = $this->TblLibros->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->TblLibros->find()->where(['isbn' => $this->request->getData('isbn')])->count() == 0 || $this->TblLibros->find()->where(['id' => $id])->all()->first()->isbn == $this->request->getData('isbn')) {
                $tblLibro = $this->TblLibros->patchEntity($tblLibro, $this->request->getData());
                if ($this->TblLibros->save($tblLibro)) {
                    $this->Flash->success(__('Libro actualizado'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Algo ha ido mal'));
                return $this->redirect('/Libros/edit/' . $id);
            } else {
                $this->Flash->warning(__('ISBN existente'));
                return $this->redirect('/Libros/edit/' . $id);
            }
        }
        $this->set(compact('tblLibro'));
        $this->render('/libros/edit');
    }

    public function editorials($id = null)
    {
        $this->loadModel('TblLibroEditorial');
        $this->viewBuilder()->setLayout('index');
        $tblEditorial = $this->paginate($this->TblLibroEditorial->find('all',['contain' => ['TblEditorial'],])->where(['id_libro'=>$id]));
        $this->set(compact('tblEditorial'));
        $this->render('/libros/editoriales');
    }
    public function autores($id = null)
    {
        $this->loadModel('TblLibroAutor');
        $this->viewBuilder()->setLayout('index');
        $tblAutor = $this->paginate($this->TblLibroAutor->find('all',['contain' => ['TblAutor'],])->where(['id_libro'=>$id]));
        $this->set(compact('tblAutor'));
        $this->render('/libros/autores');
    }
    public function allautores($id = null)
    {
        $this->loadModel('TblAutor');
        $tblAutor = $this->paginate($this->TblAutor);
        $this->viewBuilder()->setLayout('index');
        $this->set(compact('tblAutor'));
        $this->set(compact('id'));
        $this->render('/libros/addAutor');
    }
    public function alleditorial($id = null)
    {
        $this->loadModel('TblEditorial');
        $tblEditorial = $this->paginate($this->TblEditorial);
        $this->viewBuilder()->setLayout('index');
        $this->set(compact('tblEditorial'));
        $this->set(compact('id'));
        $this->render('/libros/addEditorial');
    }
    public function adda()
    {
        $this->autoRender = false;
        $this->loadModel('TblLibroAutor');
        $ids = $this->request->getQueryParams();
        if ($this->TblLibroAutor->find()->where(['id_libro'=>$ids['id_libro'],'id_autor'=>$ids['id_autor']])->count() == 0) {
            $tblLibroautor = $this->TblLibroAutor->newEmptyEntity();
            $tblLibroautor = $this->TblLibroAutor->patchEntity($tblLibroautor,$this->request->getQueryParams());
            $res = $this->TblLibroAutor->save($tblLibroautor);
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($res));
        } else {
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode(null));
        }
        
     
    }
    public function adde()
    {
        $this->autoRender = false;
        $this->loadModel('TblLibroEditorial');
        $ids = $this->request->getQueryParams();
        if ($this->TblLibroEditorial->find()->where(['id_libro'=>$ids['id_libro'],'id_editorial'=>$ids['id_editorial']])->count() == 0) {
            $tblLibroautor = $this->TblLibroEditorial->newEmptyEntity();
            $tblLibroautor = $this->TblLibroEditorial->patchEntity($tblLibroautor,$this->request->getQueryParams());
            $res = $this->TblLibroEditorial->save($tblLibroautor);
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($res));
        } else {
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode(null));
        }
        
     
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
        $this->request->allowMethod(['post', 'delete','get']);
        $this->loadModel('TblLibroEditorial');
        $this->loadModel('TblLibroAutor');
        $this->TblLibroAutor->deleteAll(['id_libro'=>$id]);
        $this->TblLibroEditorial->deleteAll(['id_libro'=>$id]);
        $tblLibro = $this->TblLibros->get($id);
        if ($this->TblLibros->delete($tblLibro)) {
            $this->Flash->success(__('Libro borrado'));
        } else {
            $this->Flash->error(__('Algo ha salido mal'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
