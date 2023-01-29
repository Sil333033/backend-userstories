<?php 

class Odemeter {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getOdemeters() {
        $this->db->query('
            SELECT 
                auto.id, auto.Type, auto.Kenteken
            FROM 
                cars as auto
        ');
        return $this->db->resultSet();
    }

    public function addKM($data) {
        $this->db->query('
            INSERT INTO 
                odometer (AutoId, KmStand, Datum)
            VALUES 
                (:AutoId, :KmStand, :Datum)
        ');

        $this->db->bind(':AutoId', $data['Id']);
        $this->db->bind(':KmStand', $data['kmstand']);
        $this->db->bind(':Datum', date('Y-m-d'));

        $this->db->execute();
    }

    public function getKM($id) {
        $this->db->query('
            SELECT 
                auto.id, auto.Type, auto.Kenteken, kms.KmStand
            FROM 
                cars as auto
            INNER JOIN
                odometer as kms
            ON
                kms.AutoId = auto.Id
            WHERE 
                auto.id = :id
            Group BY 
                kms.KmStand DESC
        ');

        $this->db->bind(':id', $id);

        return $this->db->single();
    }
}