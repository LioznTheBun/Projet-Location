<?php

class Reservations{
	private $id;
	private $user_id;
	private $offre_id;
	private $check_in;
	private $check_out;
	private $prix_total;
	private $date_reservartion;

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

	public function getOffre_id()
	{
		return $this->offre_id;
	}

	public function setOffre_id($offre_id)
	{
		$this->offre_id = $offre_id;

		return $this;
	}

	public function getCheck_in()
	{
		return $this->check_in;
	}

	public function setCheck_in($check_in)
	{
		$this->check_in = $check_in;

		return $this;
	}

	public function getCheck_out()
	{
		return $this->check_out;
	}

	public function setCheck_out($check_out)
	{
		$this->check_out = $check_out;

		return $this;
	}

	public function getPrix_total()
	{
		return $this->prix_total;
	}

	public function setPrix_total($prix_total)
	{
		$this->prix_total = $prix_total;

		return $this;
	}

	public function getDate_reservartion()
	{
		return $this->date_reservartion;
	}

	public function setDate_reservartion($date_reservartion)
	{
		$this->date_reservartion = $date_reservartion;

		return $this;
	}
}