<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sitioPrincipal','Home::saludar');
$routes->get('/saludo/(:any)','Home::saludarPersona/$1');
$routes->get('/dashboard','Home::verDashboard');

//creando ruta para acceder al formulario de registro de productos
$routes->get('/formRegistroProducto','ProductoController::formularioRegistro');

// Creando ruta para que la vista envíe datos al controlador
//post modificar,agregar o eliminar
$routes->post('/registrarProducto','ProductoController::registrarProducto');

// Creando ruta para mostrar los datos registrados en BD
$routes->get('/listarProductos','ProductoController::listarProductos');

// Creando ruta para mostrar datos de producto a modificar
// get es para mostrar 
//cualquier tipo de valor (any)
//a mosttrar producto le enviamos el id del producto que vamos a mostrar sus datos
$routes->get('/mostrarDatosProducto/(:any)','ProductoController::mostrarProducto/$1');

$routes->post('/modificarProducto/(:any)','ProductoController::modificarProducto/$1');

$routes->post('/eliminarProducto/(:any)','ProductoController::eliminarProducto/$1');

//creando ruta para acceder al formulario de registro de personal
$routes->get('/formRegistroPersonal','PersonalController::formularioRegistro');

$routes->post('/registrarPersonal','PersonalController::registrarPersonal');

// Creando ruta para mostrar los datos registrados en BD
$routes->get('/listarPersonal','PersonalController::listarPersonal');

//a mostrar personal le enviamos el id del personal que vamos a mostrar sus datos
$routes->get('/mostrarDatosPersonal/(:any)','PersonalController::mostrarPersonal/$1');

$routes->post('/modificarPersonal/(:any)','PersonalController::modificarPersonal/$1');

$routes->post('/eliminarPersonal/(:any)','PersonalController::eliminarPersonal/$1');

// ruta para realizar venta
$routes->post('/realizarVenta','VentasController::realizarVenta');

// ruta para mostrar formulario de venta por método GET
$routes->get('/formularioVenta','VentasController::formularioVenta');

// rutas para login
$routes->get('/login','PersonalController::vistaLogin');

$routes->post('/login','PersonalController::login');

$routes->get('/generarReporte','VentasController::generarReporte');