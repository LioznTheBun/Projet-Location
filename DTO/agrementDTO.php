<?php

class Agrement{
	private $id;
	private $nom;
	private $icon;

	public function getNom()
	{
		return $this->nom;
	}
 
	public function setNom($nom)
	{
		$this->nom = $nom;

		return $this;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	public function getIcon()
	{
		return $this->icon;
	}

	public function setIcon($icon)
	{
		$this->icon = $icon;

		return $this;
	}
}