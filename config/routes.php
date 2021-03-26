<?php
/**
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {

    $builder->connect('/', ['controller' => 'Pages', 'action' => 'index']);
    
    $builder->connect('/Libros', ['controller' => 'TblLibros', 'action' => 'index']);
    $builder->connect('/Libros/Add', ['controller' => 'TblLibros', 'action' => 'add']);
    $builder->connect('/Libros/edit/*', ['controller' => 'TblLibros', 'action' => 'edit','id'=>'int']);
    $builder->connect('/Libros/editoriales/*', ['controller' => 'TblLibros', 'action' => 'editorials','id'=>'int']);
    $builder->connect('/Libros/autores/*', ['controller' => 'TblLibros', 'action' => 'autores','id'=>'int']);
    $builder->connect('/Libros/add-autor/*', ['controller' => 'TblLibros', 'action' => 'allautores','id'=>'int']);
    $builder->connect('/Libros/add-editorial/*', ['controller' => 'TblLibros', 'action' => 'alleditorial','id'=>'int']);

    $builder->connect('/Autores', ['controller' => 'TblAutor', 'action' => 'index']);
    $builder->connect('/Autores/edit/*', ['controller' => 'TblAutor', 'action' => 'edit','id'=>'int']);
    $builder->connect('/Autores/books/*', ['controller' => 'TblAutor', 'action' => 'books','id'=>'int']);
    $builder->connect('/author/find/{id}', ['controller' => 'TblAutor', 'action' => 'find']);
    
    $builder->connect('/Editoriales', ['controller' => 'TblEditorial', 'action' => 'index']);
    $builder->connect('/Editoriales/add', ['controller' => 'TblEditorial', 'action' => 'add']);
    $builder->connect('/Editoriales/edit/*', ['controller' => 'TblEditorial', 'action' => 'edit','id'=>'int']);
    $builder->connect('/Editoriales/books/*', ['controller' => 'TblEditorial', 'action' => 'books','id'=>'int']);

    $builder->connect('/Precios/aumentar', ['controller' => 'TblLibros', 'action' => 'incrementPrice']);

    $builder->fallbacks();
});
