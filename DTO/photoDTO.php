<?php

class Photo{
	private $id;
	private $lien;
	private $offre_id;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	public function getLien()
	{
		return $this->lien;
	}

	public function setLien($lien)
	{
		$this->lien = $lien;

		return $this;
	}

	public function getOffre_id()
	{
		return $this->offre_id;
	}

	public function setOffre_id($offre_id)
	{
		$this->offre_id = $offre_id;

		return $this;
	}
}