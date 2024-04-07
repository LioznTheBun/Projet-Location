<?php

class Ban{
	private $id;
	private $user_id;
	private $raison;
	private $date_debut;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;

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

	public function getRaison()
	{
		return $this->raison;
	}

	public function setRaison($raison)
	{
		$this->raison = $raison;

		return $this;
	}

	public function getDate_debut()
	{
		return $this->date_debut;
	}

	public function setDate_debut($date_debut)
	{
		$this->date_debut = $date_debut;

		return $this;
	}
}