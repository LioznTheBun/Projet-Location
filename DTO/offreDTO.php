<?php
class Offre{
	private $id;
	private $titre;
	private $nbr_personne;
	private $nbr_pieces;
	private $prix;
	private $date_heure_parution;
	private $date_début;
	private $date_fin;
	private $descriptif;
	private $user_id;
	private $localisation_id;
	 
	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	public function getTitre()
	{
		return $this->titre;
	}

	public function setTitre($titre)
	{
		$this->titre = $titre;

		return $this;
	}

	public function getNbr_personne()
	{
		return $this->nbr_personne;
	}

	public function setNbr_personne($nbr_personne)
	{
		$this->nbr_personne = $nbr_personne;

		return $this;
	}

	public function getNbr_pieces()
	{
		return $this->nbr_pieces;
	}

	public function setNbr_pieces($nbr_pieces)
	{
		$this->nbr_pieces = $nbr_pieces;

		return $this;
	}

	public function getPrix()
	{
		return $this->prix;
	}

	public function setPrix($prix)
	{
		$this->prix = $prix;

		return $this;
	}

	public function getDate_heure_parution()
	{
		return $this->date_heure_parution;
	}

	public function setDate_heure_parution($date_heure_parution)
	{
		$this->date_heure_parution = $date_heure_parution;

		return $this;
	}

	public function getDate_début()
	{
		return $this->date_début;
	}

	public function setDate_début($date_début)
	{
		$this->date_début = $date_début;

		return $this;
	}

	public function getDate_fin()
	{
		return $this->date_fin;
	}

	public function setDate_fin($date_fin)
	{
		$this->date_fin = $date_fin;

		return $this;
	}

	public function getDescriptif()
	{
		return $this->descriptif;
	}

	public function setDescriptif($descriptif)
	{
		$this->descriptif = $descriptif;

		return $this;
	}

	public function getUser_id()
	{
		return $this->user_id;
	}

	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;

		return $this;
	}

	public function getLocalisation_id()
	{
		return $this->localisation_id;
	}

	public function setLocalisation_id($localisation_id)
	{
		$this->localisation_id = $localisation_id;

		return $this;
	}
}