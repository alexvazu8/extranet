<?php


use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FotosTourController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelFacilidadesYServicioController;
use App\Http\Controllers\FacilidadesYServiciosGeneralController;
use App\Http\Controllers\FotosHotelController;
use App\Http\Controllers\TipoHabitacionGeneralController;
use App\Http\Controllers\TipoHabitacionHotelController;
use App\Http\Controllers\PreciosCupoReleaseController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ToursContratoCupoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EmpresaTrasladoController;
use App\Http\Controllers\TipoMovilidadeController;
use App\Http\Controllers\EmpresaTrasladoTipoMovilidadeController;
use App\Http\Controllers\EstrellaController;
//use App\Http\Controllers\EmpresaTrasladoTipoMovilidadesContratoCupoController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\ServicioTrasladoController;
use App\Http\Controllers\TrasladosContratoCupoController;
use App\Http\Controllers\UserHasRoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleHasPermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PoliticaCancelacionController;
use App\Http\Controllers\PenalidadController;
use App\Http\Controllers\RegimenController;
use App\Http\Controllers\RegimenTipoHabitacionHotelController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Model;
use App\Models\FacilidadesYServiciosGeneral;
use App\Models\PoliticaCancelacion;
use App\Models\TrasladosContratoCupo;
use GuzzleHttp\Middleware;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Client\Request;
use \Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;


/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('view1');
});


/*
Route::get('/', function () {
   $Hotel=App\Models\hotel::where('Id_Hotel', '3')
               ->get();
  
    return $Hotel;
});
*/

$autentificacion= new Auth;
$autentificacion->routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('/zonas', ZonaController::class)->middleware(['auth', 'permission:FuncAdmin']);;
Route::get('/hotels/ciudades/{Id_Pais}', [HotelController::class, 'ciudades'])->name('hotels.ciudades')->middleware('auth');
Route::get('/hotels/zonas/{Id_Ciudad}', [HotelController::class, 'zonas'])->name('hotels.zonas')->middleware('auth');
Route::get('/hotels/ficha/{Id_Hotel}', [HotelFacilidadesYServicioController::class, 'ficha'])->name('hotels.ficha')->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/hotels/calendario/{Id_Hotel}', [HotelFacilidadesYServicioController::class, 'calendario'])->name('hotels.calendario')->middleware(['auth', 'permission:FuncHoteles']);
Route::resource('/hotels', HotelController::class)->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/estrellas_desc/', [HotelController::class, 'estrellasDesc'])->name('hotels.estrellas_desc')->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/estrellas_asc/', [HotelController::class, 'estrellasAsc'])->name('hotels.estrellas_asc')->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/hotels/editcoordenadas/{Id_Hotel}', [HotelController::class, 'editcoordenadas'])->name('hotels.editcoordenadas')->middleware(['auth', 'permission:FuncHoteles']);
Route::put('/hotels/updatecoordenadas/{Id_Hotel}', [HotelController::class, 'updatecoordenadas'])->name('hotels.updatecoordenadas')->middleware(['auth', 'permission:FuncHoteles']);


//Route::resource('/hotels', Hotel_facilidades_y_serviciosController::class)->middleware('auth');
Route::resource('/facilidades-y-servicios-generals',FacilidadesYServiciosGeneralController::class)->middleware(['auth', 'permission:FuncAdmin']);
Route::resource('/hotel-facilidades-y-servicios',HotelFacilidadesYServicioController::class)->middleware(['auth', 'permission:FuncHoteles']);

Route::get('/hotel-facilidades-y-servicios/buscar_por_hotel/{idhotel}',[HotelFacilidadesYServicioController::class,'buscar_por_hotel'])->name('hotel-facilidades-y-servicios.buscar_por_hotel')->middleware(['auth', 'permission:FuncHoteles']);

Route::get('/hotel-facilidades-y-servicios/mostrar_Facilidades_y_Servicios_generales/{idhotel}',[HotelFacilidadesYServicioController::class,'mostrar_Facilidades_y_Servicios_generales'])->name('hotel-facilidades-y-servicios.mostrar_Facilidades_y_Servicios_generales')->middleware(['auth', 'permission:FuncHoteles']);
Route::post('/hotel-facilidades-y-servicios/registrar_lista',[HotelFacilidadesYServicioController::class,'registrar_lista'])->name('hotel-facilidades-y-servicios.registrar_lista')->middleware(['auth', 'permission:FuncHoteles']);
//Route::get('/hotel-facilidades-y-servicios/create/{idhotel}',[HotelFacilidadesYServicioController::class,'create'])->name('hotel-facilidades-y-servicios.create2')->middleware('auth');


Route::resource('/fotos-hotels',FotosHotelController::class)->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/fotos-hotels/indexhotel/{idhotel}',[FotosHotelController::class,'indexhotel'])->name('fotos-hotels.indexhotel')->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/fotos-hotels/createporhotel/{idhotel}',[FotosHotelController::class,'createporhotel'])->name('fotos-hotels.createporhotel')->middleware(['auth', 'permission:FuncHoteles']);

Route::resource('/tipo-habitacion-generals',TipoHabitacionGeneralController::class)->middleware(['auth', 'permission:FuncPermisosyRoles']);
Route::resource('/tipo-habitacion-hotels',TipoHabitacionHotelController::class)->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/tipo-habitacion-hotels/index2/{Hotel_Id_Hotel}',[TipoHabitacionHotelController::class,'index2'])->name('tipo-habitacion-hotels.index2')->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/tipo-habitacion-hotels/create2/{Hotel_Id_Hotel}',[TipoHabitacionHotelController::class,'create2'])->name('tipo-habitacion-hotels.create2')->middleware(['auth', 'permission:FuncHoteles']);

Route::resource('/precios-cupo-releases',PreciosCupoReleaseController::class)->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/precios-cupo-releases/calendario/{tipoHabitacionHotelId}',[PreciosCupoReleaseController::class, 'calendario'])->name('precios-cupo-releases.calendario')->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/precios-cupo-releases/create2/{tipoHabitacionHotelId}',[PreciosCupoReleaseController::class, 'create2'])->name('precios-cupo-releases.create2')->middleware(['auth', 'permission:FuncHoteles']);
Route::post('/precios-cupo-releases/store_rango',[PreciosCupoReleaseController::class, 'store_rango'])->name('precios-cupo-releases.store_rango')->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/precios-cupo-releases/cierre/{tipoHabitacionHotelId}', [PreciosCupoReleaseController::class, 'cierre'])->name('precios-cupo-releases.cierre')->middleware(['auth', 'permission:FuncHoteles']);
Route::put('/precios-cupo-releases/updatecierre/{tipoHabitacionHotelId}', [PreciosCupoReleaseController::class, 'updatecierre'])->name('precios-cupo-releases.updatecierre')->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/precios-cupo-releases/calendario/{tipoHabitacionHotelId}',[PreciosCupoReleaseController::class, 'calendario'])->name('precios-cupo-releases.calendario')->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/mostrar_precios_cupo_releases/{precios_cupo_release}',[PreciosCupoReleaseController::class, 'show2'])->name('precios-cupo-releases.show2')->middleware(['auth', 'permission:FuncHoteles']);

Route::get('/calendar/hotelito/',[CalendarController::class, 'index'])->middleware(['auth', 'permission:FuncHoteles']);
Route::get('/calendar/hotelito/{mes}',[CalendarController::class, 'index_month'])->middleware(['auth', 'permission:FuncHoteles']);

Route::get('get-Hotel/{buscar_hotel}', [HotelController::class, 'buscar_hotel'])->middleware(['auth', 'permission:FuncHoteles']);

Route::resource('/tours',TourController::class)->middleware(['auth', 'permission:FuncTours']);

Route::resource('/tours-contrato-cupos',ToursContratoCupoController::class)->middleware(['auth', 'permission:FuncTours']);
Route::get('/tours-contrato-cupos/create2/{idtour}',[ToursContratoCupoController::class,'create2'])->name('tours-contrato-cupos.create2')->middleware(['auth', 'permission:FuncTours']);
Route::get('/tours-contrato-cupos/index/{idtour}',[ToursContratoCupoController::class,'index'])->name('tours-contrato-cupos.index')->middleware(['auth', 'permission:FuncTours']);
Route::get('/tours-contrato-cupos/index/{idtour}/{mes}',[ToursContratoCupoController::class,'index_month'])->middleware(['auth', 'permission:FuncTours']);
Route::get('/tours-contrato-cupos/cupo/{idtour}/{fecha_calendario}',[ToursContratoCupoController::class,'mostrar_tour'])->middleware(['auth', 'permission:FuncTours']);
Route::get('/tours-contrato-cupos/create_rango/{idtour}',[ToursContratoCupoController::class,'create_rango'])->name('tours-contrato-cupos.create_rango')->middleware(['auth', 'permission:FuncTours']);
Route::post('/tours-contrato-cupos/create_rango/',[ToursContratoCupoController::class,'store_rango'])->name('tours-contrato-cupos.store_rango')->middleware(['auth', 'permission:FuncTours']);
Route::get('/tours-contrato-cupos/lista_contrato_por_fecha/{idtour}/{fecha_calendario}',[ToursContratoCupoController::class,'lista_por_tour_fecha'])->name('tours-contrato-cupos.lista_contrato_por_fecha')->middleware(['auth', 'permission:FuncTours']);
Route::resource('/reservas',ReservaController::class)->middleware('auth');
Route::resource('/empresa-traslados',EmpresaTrasladoController::class)->middleware(['auth', 'permission:FuncTraslados']);
Route::resource('/tipo-movilidades',TipoMovilidadeController::class)->middleware(['auth', 'permission:FuncTraslados']);
Route::resource('/empresa-traslado-tipo-movilidades',EmpresaTrasladoTipoMovilidadeController::class)->middleware(['auth', 'permission:FuncTraslados']);


Route::resource('/servicio-traslados',ServicioTrasladoController::class)->middleware(['auth', 'permission:FuncTraslados']);
Route::get('/servicio-traslados/index/{empresa_tipo_movilidades_Id}',[ServicioTrasladoController::class,'index'])->name('servicio-traslados.index')->middleware(['auth', 'permission:FuncTraslados']);
Route::get('/servicio-traslados/create2/{empresa_tipo_movilidades_Id}',[ServicioTrasladoController::class,'create2'])->name('servicio-traslados.create2')->middleware(['auth', 'permission:FuncTraslados']);

Route::resource('/traslados-contrato-cupos',TrasladosContratoCupoController::class)->middleware(['auth', 'permission:FuncTraslados']);
Route::get('/traslados-contrato-cupos/{etmcc}/{etmcc2}',[TrasladosContratoCupoController::class,'index'])->name('traslados-contrato-cupos.index')->middleware(['auth', 'permission:FuncTraslados']);
Route::get('/traslados-contrato-cupos/create/{empresa_traslado_tm_Id}/{idserviciotraslado}',[TrasladosContratoCupoController::class,'create'])->name('traslados-contrato-cupos.create')->middleware(['auth', 'permission:FuncTraslados']);
Route::get('/traslados-contrato-cupos/create_contrato/{empresa_traslado_tm_Id}/{idserviciotraslado}',[TrasladosContratoCupoController::class,'create_contrato'])->name('traslados-contrato-cupos.create_contrato')->middleware(['auth', 'permission:FuncTraslados']);
Route::post('/traslados-contrato-cupos/store_contrato/',[TrasladosContratoCupoController::class,'store_contrato'])->name('traslados-contrato-cupos.store_contrato')->middleware(['auth', 'permission:FuncTraslados']);
Route::get('/traslados-contrato-cupos/index_month/{mes}/{empresa_traslado_tm_Id}/{idserviciotraslado}',[TrasladosContratoCupoController::class,'index_month'])->name('traslados-contrato-cupos.index_month')->middleware(['auth', 'permission:FuncTraslados']);
Route::get('/traslados-contrato-cupos/{empresa_traslado_tm_Id}/{idserviciotraslado}/{traslados_contrato_cupo}/edit',[TrasladosContratoCupoController::class,'edit'])->name('traslados-contrato-cupos.edit')->middleware(['auth', 'permission:FuncTraslados']);

Route::resource('/permissions',PermissionController::class)->middleware(['auth', 'permission:FuncPermisosyRoles']);
Route::resource('/role-has-permissions',RoleHasPermissionController::class)->middleware(['auth', 'permission:FuncPermisosyRoles']);
Route::resource('/user-has-roles',UserHasRoleController::class)->middleware(['auth', 'permission:FuncPermisosyRoles']);
Route::resource('/roles',RoleController::class)->middleware(['auth', 'permission:FuncPermisosyRoles']);
Route::resource('/users',UserController::class)->middleware(['auth', 'permission:FuncPermisosyRoles']);
Route::resource('/politica-cancelacions',PoliticaCancelacionController::class)->middleware(['auth', 'permission:FuncPermisosyRoles']);
Route::resource('/penalidads',PenalidadController::class)->middleware(['auth', 'permission:FuncPermisosyRoles']);
Route::resource('/regimens',RegimenController::class)->middleware(['auth', 'permission:FuncPermisosyRoles']);
Route::resource('/estrellas',EstrellaController::class)->middleware(['auth', 'permission:FuncPermisosyRoles']);

Route::resource('/fotos-tours',FotosTourController::class)->middleware(['auth', 'permission:FuncTours']);

// Ruta para mostrar el formulario por lotes traslados
Route::get('/traslados-contrato-cupos-importar', [TrasladosContratoCupoController::class, 'showImportForm'])->name('traslados-contrato-cupos.import.form')->middleware(['auth', 'permission:FuncTraslados']);
Route::post('/importar-traslados', [TrasladosContratoCupoController::class, 'importarTraslados'])->name('traslados.import')->middleware(['auth', 'permission:FuncTraslados']);
Route::get('/traslados-descargar-plantilla', [TrasladosContratoCupoController::class, 'downloadTemplate'])->name('traslados.download-template')->middleware(['auth', 'permission:FuncTraslados']);

// Ruta para mostrar formulario por lotes tours
Route::get('/tours-contrato-cupos-importar', [ToursContratoCupoController::class, 'showImportForm'])->name('tours-contrato-cupos.import.form')->middleware(['auth', 'permission:FuncTours']);
Route::get('/tours-descargar-plantilla', [ToursContratoCupoController::class, 'downloadTemplate'])->name('tours.download-template')->middleware(['auth', 'permission:FuncTours']);
