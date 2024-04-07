<?php 

class Message{
    private $idMessage;
	private $content;
	private $idCoversation;
    private $idUser;
    private $heure;
    /**
     * Get the value of idMessage
     */
    public function getIdMessage()
    {
        return $this->idMessage;
    }

    /**
     * Set the value of idMessage
     */
    public function setIdMessage($idMessage): self
    {
        $this->idMessage = $idMessage;

        return $this;
    }

	/**
	 * Get the value of content
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Set the value of content
	 */
	public function setContent($content): self
	{
		$this->content = $content;

		return $this;
	}

	/**
	 * Get the value of idCoversation
	 */
	public function getIdCoversation()
	{
		return $this->idCoversation;
	}

	/**
	 * Set the value of idCoversation
	 */
	public function setIdCoversation($idCoversation): self
	{
		$this->idCoversation = $idCoversation;

		return $this;
	}

    /**
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */
    public function setIdUser($idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


    /**
     * Get the value of heure
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set the value of heure
     */
    public function setHeure($heure): self
    {
        $this->heure = $heure;

        return $this;
    }
}