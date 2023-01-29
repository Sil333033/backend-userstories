<?php

class Instructeurs extends Controller
{
    private $instructeursModel;

    public function __construct()
    {
        $this->instructeursModel = $this->model('Instructeur');
    }

    public function index()
    {
        $instructeurs = $this->instructeursModel->getInstructeurs();

        $rows = '';

        foreach ($instructeurs as $instructeur) {
            $rows .= '<tr>';
            $rows .= '<td>' . $instructeur->Voornaam . '</td>';
            $rows .= '<td>' . $instructeur->Tussenvoegsel . '</td>';
            $rows .= '<td>' . $instructeur->Achternaam . '</td>';
            $rows .= '<td>' . $instructeur->Mobiel . '</td>';
            $rows .= '<td>' . $instructeur->DatumInDienst . '</td>';
            $rows .= '<td>' . $instructeur->AantalSterren . '</td>';
            $rows .= '<td>' . "<a href='" . URLROOT . "/instructeurs/auto/$instructeur->Id'> auto's </a>" . '</td>';
            $rows .= '</tr>';
        }

        $data = [
            'title' => 'Instructeurs',
            'rows' => $rows
        ];

        $this->view('instructeur/index', $data);
    }

    public function auto($id)
    {
        $cars = $this->instructeursModel->getCarsByInstructeurId($id);
        $instructeur = $this->instructeursModel->getInstructeurById($id);

        $rows = '';

        foreach ($cars as $car) {
            $rows .= '<tr>';
            $rows .= '<td>' . $car->TypeVoertuig. '</td>';
            $rows .= '<td>' . $car->Type . '</td>';
            $rows .= '<td>' . $car->Kenteken . '</td>';
            $rows .= '<td>' . $car->Bouwjaar . '</td>';
            $rows .= '<td>' . $car->Brandstof . '</td>';
            $rows .= '<td>' . $car->Rijbewijscategorie . '</td>';
            $rows .= '</tr>';
        }

        $data = [
            'title' => 'Door instructeur gebruikte voertuigen',
            'rows' => $rows,
            'voornaam' => $instructeur->Voornaam,
            'tussenvoegsel' => $instructeur->Tussenvoegsel,
            'achternaam' => $instructeur->Achternaam,
            'datumInDienst' => $instructeur->DatumInDienst,
            'aantalSterren' => $instructeur->AantalSterren
        ];

        $this->view('instructeur/auto', $data);
    }
}
