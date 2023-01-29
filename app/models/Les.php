<?php 

class Les 
{
    private $db;

    public function __construct() 
    {
        $this->db = new Database();
    }

    public function getLessons()
    {
        $this->db->query('
            SELECT 
                les.Id,
                les.Datum,
                leerling.Naam

            FROM 
                les
            INNER JOIN
                leerling
            ON 
                les.LeerlingId = leerling.Id'
        );
        return $this->db->resultSet();
    }

    public function getOpmerking($id)
    {
        $this->db->query('
            SELECT
                les.Id,
                les.Datum,
                leerling.Naam,
                opmerking.Opmerking
            FROM 
                les
            INNER JOIN
                opmerking
            ON 
                les.Id = opmerking.LesId
            INNER JOIN
                leerling
            ON 
                les.LeerlingId = leerling.Id
            WHERE
                les.Id = :id'
        );
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function getOnderwerp($id)
    {
        $this->db->query('
            SELECT
                onderwerp.Id,
                les.Datum,
                leerling.Naam,
                onderwerp.Onderwerp
            FROM 
                les
            INNER JOIN
                onderwerp
            ON 
                les.Id = onderwerp.LesId
            INNER JOIN
                leerling
            ON 
                les.LeerlingId = leerling.Id
            WHERE
                les.Id = :id'
        );
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function addTopic($data)
    {
        $this->db->query('
            INSERT INTO 
                onderwerp (Onderwerp, LesId)
            VALUES
                (:onderwerp, :lesid)'
        );
        $this->db->bind(':onderwerp', $data['comment']);
        $this->db->bind(':lesid', $data['lesid']);
        return $this->db->execute();
    }
}