<?php 

class Review{
	private $id;
	private $user_id;
	private $offre_id;
	private $notation;
	private $commentaire;
	private $date_notation;

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

	public function getNotation()
	{
		return $this->notation;
	}

	public function setNotation($notation)
	{
		$this->notation = $notation;

		return $this;
	}

	public function getCommentaire()
	{
		return $this->commentaire;
	}

	public function setCommentaire($commentaire)
	{
		$this->commentaire = $commentaire;

		return $this;
	}

	public function getDate_notation()
	{
		return $this->date_notation;
	}

	public function setDate_notation($date_notation)
	{
		$this->date_notation = $date_notation;

		return $this;
	}
}