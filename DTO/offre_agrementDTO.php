<?php

class Offre_Agrement{
	private $offre_id;
	private $agrement_id;

	public function getOffre_id()
	{
		return $this->offre_id;
	}

	public function setOffre_id($offre_id)
	{
		$this->offre_id = $offre_id;

		return $this;
	}

	public function getAgrement_id()
	{
		return $this->agrement_id;
	}

	public function setAgrement_id($agrement_id)
	{
		$this->agrement_id = $agrement_id;

		return $this;
	}
}