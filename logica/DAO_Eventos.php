<?php

require_once("DAO_Interface.php");

class DAO_Eventos implements DAO_Interface {

    private static $instance = null;

    //Evitamos asi la contruccion de la clase
    private function __construct() {  }

    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new DAO_Eventos();
        }
        return self::$instance;
      }

	//METODOS
  public function createElement($transfer) {//crea usuario
      return false;
	}
//--------------------------
	public function getElementById($id){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta = "SELECT * FROM evento WHERE nombre ='$id'";//consulta sql
		$results = mysqli_query($db, $consulta);

		if (mysqli_num_rows($results) == 1) {  //si se encuentra la fila, el usuario y contraseña son correctas
			$empresa = mysqli_fetch_assoc($results);
			//cambio
			if($empresa["Img_Evento"] == NULL)	{
					return new  eventoTransfer($eventos["Nombre"],$eventos["Localizacion"],
          $eventos["Precio"],$eventos["Cantidad"],$eventos["Fecha"],$eventos["Img_Evento"]);
			}
			else{
			    return new eventoTransfer($eventos["Nombre"],$eventos["Localizacion"],
          $eventos["Precio"],$eventos["Cantidad"],$eventos["Fecha"],$eventos["Img_Evento"]);
			}
		}
		else {
			return ;//NULL
		}
	}
//--------------------------
	public function deleteElement($id) {
    return false;
	}
//--------------------------
	public function updateElement($id, $campo, $nuevoValor) {
		return false;
	}

    //--------------------------
	public function getAllElements($orden){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM empresa ORDER BY '$orden'";
		$query = mysqli_query($db, $consul);

		if ($query){
			while($eventos = mysqli_fetch_assoc($query)){
                $transfer = new eventoTransfer($eventos["Nombre"],$eventos["Localizacion"],
                $eventos["Precio"],$eventos["Cantidad"],$eventos["Fecha"],$eventos["Img_Evento"]);
				array_push($lista, $transfer);
			}
		}
    return empty($lista) ? null : $lista;
	}

	public function getElementByEmail($gmail) {
	 return false;
	}
}
?>
