<?php 
class Conversation{
    private $idConversation;
    private $idUser1;
    private $idUser2;

    /**
     * Get the value of idConversation
     */
    public function getIdConversation()
    {
        return $this->idConversation;
    }

    /**
     * Set the value of idConversation
     */
    public function setIdConversation($idConversation): self
    {
        $this->idConversation = $idConversation;

        return $this;
    }

    /**
     * Get the value of idUser1
     */
    public function getIdUser1()
    {
        return $this->idUser1;
    }

    /**
     * Set the value of idUser1
     */
    public function setIdUser1($idUser1): self
    {
        $this->idUser1 = $idUser1;

        return $this;
    }

    /**
     * Get the value of idUser2
     */
    public function getIdUser2()
    {
        return $this->idUser2;
    }

    /**
     * Set the value of idUser2
     */
    public function setIdUser2($idUser2): self
    {
        $this->idUser2 = $idUser2;

        return $this;
    }
}