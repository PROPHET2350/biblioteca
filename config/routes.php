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
    $builder->connect('/author/find/{id}', ['controller' => 'TblAutor', 'action' => 'find']);

    $builder->fallbacks();
});
