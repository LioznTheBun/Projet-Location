<?php 

class Localisation{
	private $id;
	private $adresse;
	private $zip;
	private $ville;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	public function getzip()
	{
		return $this->zip;
	}

	public function setzip($zip)
	{
		$this->zip = $zip;

		return $this;
	}
 
	public function getVille()
	{
		return $this->ville;
	}

	public function setVille($ville)
	{
		$this->ville = $ville;

		return $this;
	}

	public function getAdresse()
	{
		return $this->adresse;
	}

	public function setAdresse($adresse)
	{
		$this->adresse = $adresse;

		return $this;
	}
}