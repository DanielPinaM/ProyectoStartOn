<?php
//session_start();
require("DAO_Like.php");
require("tranferLike.php");
require_once("SA_Interface.php");

class SA_Like implements SA_Interface {

    const CIFRADO = '67a74306b06d0c01624fe0d0249a570f4d093747';

    private static $instance = null;
    //Evitamos asi la contruccion de la clase
    private function __construct() {  }
    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new SA_Like();
        }
        return self::$instance;
      }

     /**Para acceder a esta funcion se debe estar iniciado sesion
     @return lista: contiene una lista de todos los elementos de la lista de usuarios sin filtros o null*/
	function getAllElements(){
	  $likeDAO = DAO_Like::getInstance();
		return $likeDAO->getAllElements();
	}

function getElementsByIdEmpresa($id_Empresa){
  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->getElementsByIdEmpresa($id_Empresa);
}

function getElementsByIdUsuario($id_Usuario){
  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->getElementsByIdUsuario($id_Usuario);
}

function getElementsByIds($id_Empresa, $id_Usuario){
  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->getElementsByIds($id_Empresa, $id_Usuario);
}

function deleteElement($id_Empresa, $id_Usuario){
  if (empty($id_Empresa) || empty($id_Usuario)) {
    return "Error";
  }

  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->deleteElement($id_Empresa, $id_Usuario);
}

function deleteElementByIdEmpresa($id_Empresa){
  if (empty($id_Empresa)) {
    return "Error";
  }
  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->deleteElementByIdEmpresa($id_Empresa);
}

function deleteElementByIdUsuario($id_Usuario){
  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->deleteElementByIdUsuario($id_Usuario);
}

    function createElement($transfer) {
		//comprobamos si algun campo esta vacio y notificamos el error si lo estae, estos campos son obligatorios para crear un nuevo elemento
    //comprobamos si algun campo esta vacio y notificamos el error si lo estae, estos campos son obligatorios para crear un nuevo elemento
			if (empty($transfer->get()) || empty($transfer->getEmail()) || empty($transfer->getPassword()) || $transfer->getPassword() == self::CIFRADO) {
			     return "Error";
			}

			//Si el tamaño del array es 0 significa que no tenemos errores en la lista

			$empDAO = DAO_Empresa::getInstance();
			    //Recibimos la lista de los elementos que tenemos en la base de datos
		  if($empDAO->getElementByEmail($transfer->getEmail()) != NULL) {
        $elements = $empDAO->getAllElements();
        $size = sizeof($elements);

            //Generamos el id del nuevo usuario a partir del tamaño de la lista
        $transfer->setId_Empresa($this->generateId($elements[$size-1]->getId_Empresa()));
		     //Hasheamos la contraseña para evitar fallos de seguridad
		    $transfer->setPassword($transfer->getPassword());
		    //Añadimos el elemento a la base de datos a traves del DAO
				$prueba = $empDAO->createElement($transfer);
        $_SESSION['id_empresa'] =$transfer->getId_Empresa();
        $_SESSION['login'] = true;
        $_SESSION['nombre'] = $transfer->getNombre();
    		return "perfEmp.php";
        }
        return "Error";
      }

        /**Esta funcion se encarga de logear un usuario a traves del numero del tamaño
          @param size: contiene un entero positivo
          @return size + 1: devuelve un numero posterior al pasado por parametro*/
        function generateId($size) {
            return $size + 1;
        }

	  /**Esta funcion se encarga de eliminar una empresa de la base de datos
      @param transfer: contiene un transfer de emoresa
      @return errores: devuelve los errores cometidos en la ejecucion de las comprobaciones de la funcion
      @return .php: si el codigo es correcto se genera el perfil de usuario o si
      la verificación no ha sido incorrecta se carga la pagina principal*/
	  function deleteElement($id) {
		//comprobamos si algun campo esta vacio y notificamos el error
			if (empty($id)) {
				return "Error";
			}
			//si no hay ningun error...

			$empDAO = DAO_Empresa::getInstance();
                //Comprobamos si el id del posible empresa esta en la base de datos
				if ($empDAO->getElementById($id) != NULL) {
				    //Eliminamos el usuario y si no ha producico error redirigimos al inicio
					if ($empDAO->deleteElement($id)) {
						return "logout.php";
					}
					//Si no se ha podido eliminar se comunica al empresa
          else {
						 return "Error";
					}
				}
				//Si ha pasado un id incorrecto se comunica a la empresa
				else {
					 return "Error";
				}

	}

	 /**Esta funcion se encarga de logear una empresa a traves del id
    @param transfer: contiene un transfer con posibles datos de una empresa
    @return errores: devuelve los errores cometidos en la ejecucion de las
    comprobaciones de la funcion
    @return .php: si el codigo es correcto se genera el perfil de usuario
    o si la verificación no ha sido incorrecta se carga la pagina principal*/
    function login($transfer) {
    		//comprobamos si algun campo esta vacio y notificamos el error
    		if(empty($transfer->getPassword()) || empty($transfer->getEmail())) {
    		   return "Error";
    		}

    		//y si no hay ningun error...

    			$empDAO = DAO_Empresa::getInstance();
    			//Devuelve un transfer que debe contenir el valor de un gmail, puede devolver un objeto nulo
    			$empObject = $empDAO->getElementByEmail($transfer->getEmail());

          //Se comprueba que la contraseña que recibimos en el transfer coincicide con el valor hasheado del transfer recibido por el DAO
          $password = $transfer->getPassword();
    			if($empObject == null || $password !== $empObject->getPassword()){
            $_SESSION['success'] = "error";
            $_SESSION['login'] = false;
    				return "../index.php";
    			}
    			else{
    				$_SESSION['id_empresa'] =$empObject->getId_Empresa();
    				$_SESSION['login'] = true;
            $_SESSION['nombre'] = $empObject->getNombre();
    				return "perfEmp.php";
    			}

    	}
        /*TODO: relaciones de las empresas con los usuarios y eventos**/
    	public function elementRelation($transfer) {}
}
?>
