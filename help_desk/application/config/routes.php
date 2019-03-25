<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//rutas del controlador Home
$route['inicio'] = 'Home/index';
$route['verificar'] = 'home/validaDatos';
$route['index'] = 'Home/inicio';
$route['close'] = 'Home/cerrarSesion';
//rutas de herramientas
$route['respaldo'] = 'Home/respaldo';
//Usuario
$route['nuevoUsuario'] = 'Usuario/generaUsuario';
$route['insertaU'] = 'Usuario/altaUsuarioVal';
$route['consultaUsuario'] = 'Usuario/busquedaUsuario';
$route['muestraUsuario'] = 'Usuario/consultaUsuario';
$route['datosUsuario/(:num)'] = 'Usuario/actualizarUsuario/$1';
$route['actualizaUsuario'] = 'Usuario/modificaUsuarioVal';
$route['misDatos/(:num)'] = 'Usuario/perfilUsuario/$1';
$route['actializaMisDatos']= 'Usuario/cambiarpass';
//paginación
$route['muestraUsuario/'] = 'Usuario/ejemplo/$1';
$route['usuario/pagina/(:num)'] = 'Usuario/ejemplo/$1';

//rutas oficio de entrada
$route['nuevaEntrada'] = 'OficioEntrada/generaEntrada';
$route['insertaEntrada'] = 'OficioEntrada/createOEntrada';
$route['consultaEntrada'] = 'OficioEntrada/busquedaEntrada';
$route['resultEntrada'] = 'OficioEntrada/consultaEntrada';
$route['descargar/(:any)'] = 'OficioEntrada/descarga/$1';
//lvl 3 - secretariado
$route['muestraEntrada'] = 'OficioEntrada/reportEntradaId';
$route['entrada/pagina/(:num)'] = 'Entrada/pagEntrada/$1';

//rutas de seguimiento oficio
$route['nuevoSeguimiento/(:num)'] = 'Oficio/index/$1';
$route['insertaOficio'] = 'Oficio/createOficioVal';
$route['consultaOficio'] = 'Oficio/busquedaOficio';
$route['resultOficio'] = 'Oficio/consultaOficio';
$route['muestraOficio/(:num)'] = 'Oficio/actualizarOficio/$1';
$route['descargarOficio/(:any)'] = 'Oficio/descarga/$1';
$route['actualizaOficio'] = 'Oficio/modificaOficio';
$route['imprimirOficio/(:num)'] = 'Oficio/imprimirOficioA/$1';
//rutas de atendido
$route['nuevoAtendido/(:num)'] = 'Atendido/index/$1';
$route['insertarAtendido'] = 'Atendido/createAtendidoVal';
$route['consultaAtendido'] = 'Atendido/busquedaAtendido';
$route['resultAtendido'] = 'Atendido/consultaAtendido';
$route['muestraAtendido/(:num)'] = 'Atendido/mostrarAtendido/$1';
$route['descargarAtendido/(:any)'] = 'Atendido/descarga/$1';
$route['imprimirAtendido/(:num)'] = 'Atendido/imprimirOficioAtendido/$1';
$route['reporte_excel/(:any)'] = 'Atendido/download/$1';
//rutas de captura
$route['nuevaCaptura'] = 'Captura/index';
$route['insertCaptura'] = 'Captura/altaCaptura';
$route['consultaCaptura'] = 'Captura/busquedaOficioSeguimiento';
$route['imprimirCapSeguimiento/(:num)'] = 'Captura/imprimirOficioCap/$1'; 
$route['resultCaptura'] = 'Captura/consultaOficioSeguimiento';
$route['consultaAtendidoCap'] = 'Captura/busquedaAtendido';
$route['imprimirCapAtendido/(:any)'] = 'Captura/imprimirAtendidoCap/$1';
$route['resultAtendido'] = 'Captura/consultaCapturaAten';
$route['muestraSeguimiento'] = 'Captura/consultaCapID'; //busqueda de oficio seguimiento por id del usuario
$route['muestraAtendidos'] = 'Captura/consultaAtenId'; //busqueda de oficio atendido por ek id del usuario
//rutas de bitacora
$route['consultaBitacora'] = 'Bitacora/index';

$route['welcome'] = 'Welcome/pdf';