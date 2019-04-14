<?php
//session_start();
require("DAO_Eventos.php");
require("TransferEventos.php");
require_once("SA_Interface.php");

class SA_Eventos implements SA_Interface {

    const CIFRADO = '67a74306b06d0c01624fe0d0249a570f4d093747';

    private static $instance = null;
    //Evitamos asi la contruccion de la clase
    private function __construct() {  }
    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new SA_Eventos();
        }
        return self::$instance;
      }

     /**Para acceder a esta funcion se debe estar iniciado sesion
     @return lista: contiene una lista de todos los elementos de la lista de usuarios sin filtros o null*/
	function getAllElements($orden){
	  $empDAO = DAO_Eventos::getInstance();
		return $empDAO->getAllElements($orden);
	}

	/**@param id: posible id de una empresa
       @return error: si el id de la empresa es incorrecto
       @return id: si el usuario existe en la base de datos
    */
	function getElement($id){
	  $eveDAO = DAO_Eventos::getInstance();
		return $eveDAO->getElementById($id);
  }


    function createElement($transfer) {
	     return false;
	  }

	  /**Esta funcion se encarga de eliminar una empresa de la base de datos
      @param transfer: contiene un transfer de emoresa
      @return errores: devuelve los errores cometidos en la ejecucion de las comprobaciones de la funcion
      @return .php: si el codigo es correcto se genera el perfil de usuario o si
      la verificación no ha sido incorrecta se carga la pagina principal*/
	  function deleteElement($id) {
      return false;
    }

	 /**Esta funcion se encarga de logear una empresa a traves del id
    @param transfer: contiene un transfer con posibles datos de una empresa
    @return errores: devuelve los errores cometidos en la ejecucion de las
    comprobaciones de la funcion
    @return .php: si el codigo es correcto se genera el perfil de usuario
    o si la verificación no ha sido incorrecta se carga la pagina principal*/
    function login($transfer) {
      return false;
    }
        /*TODO: relaciones de las empresas con los usuarios y eventos**/
    function elementRelation($transfer) {}

    function updateElement($transfer) {}
}
?>
