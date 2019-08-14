class PaisesController extends Controller {
  public function listar() {
    $paises = ???
  
    $paises = json_decode($paises);
  
    return view("listaDePaises", compact("paises"));
  }
}