<?php


class Instructeur
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getInstructeurs()
    {
        $this->db->query('SELECT * FROM instructeur1 ORDER BY AantalSterren DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getCarsByInstructeurId($id)
    {
        $this->db->query(" SELECT * 
                                        FROM VoertuigInstructeur1
                                        INNER JOIN Voertuig1 ON VoertuigInstructeur1.VoertuigId = Voertuig1.Id 
                                        INNER JOIN TypeVoertuig1 ON Voertuig1.TypeVoertuigId = TypeVoertuig1.Id
                                        INNER JOIN Instructeur1 ON VoertuigInstructeur1.InstructeurId = Instructeur1.Id
                                        WHERE VoertuigInstructeur1.InstructeurId = :id");

        $this->db->bind(':id', $id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getInstructeurById($id)
    {
        $this->db->query('SELECT * FROM instructeur1 WHERE Id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}
