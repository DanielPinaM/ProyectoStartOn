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
			$eventos = mysqli_fetch_assoc($results);
			//cambio
			if($eventos["Img_Evento"] == NULL)	{
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
	public function getAllElements(){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM evento ORDER BY nombre";
		$query = mysqli_query($db, $consul);

		if ($query){
			while($fila = mysqli_fetch_assoc($query)){
                $transfer = new eventoTransfer($fila["Nombre"],$fila["Localizacion"],
                $fila["Precio"],$fila["Cantidad"],$fila["Fecha"],$fila["Img_Evento"]);
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
