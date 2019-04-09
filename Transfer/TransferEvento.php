<?php
class usuarioTransfer {

	private $nombre;
	private $precio;
	private $cantidad;
	private $fecha;
	private $imagenEvento;

	function __construct($nombre, $precio, $cantidad, $fecha,$imagenEvento){
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->cantidad = $cantidad;
		$this->fecha = $fecha;
		$this->$imagenEvento = $imagenEvento;
	}

	/**GETTER: devuelve los parametros privados*/

	/**@return nombre: string value*/
	public function getNombre(){
		return $this->nombre;
	}

	/**@return precio: integer value*/
	public function getPrecio(){
		return $this->precio;
	}

/**@return cantidad: integer value*/
	public function getCantidad(){
		return $this->precio;
	}

/**@return fecha: date value*/
	public function getFecha(){
		return $this->cantidad;
	}
/**@return imagenEvento: url value*/
	public function getImagenEvento(){
		return $this->fecha;
	}

/**SETTER: cambian los valores */

/** set @param nombre : string value */
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

/** set @param precio : integer value */
	public function setPrecio($precio){
		$this->precio = $precio;
	}

/** set @param cantidad : integer value */
	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

/** set @param fecha : date value */
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

/** set @param imagenEvebto : string value */
	public function setImagenEvento($imagenEvento){
		$this->imagenEvento = $imagenEvento;
	}

}
?>
