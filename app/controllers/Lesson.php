<?php

class Lesson extends Controller
{

    private $lesModel;

    public function __construct()
    {
        $this->lesModel = $this->model('Les');
    }

    public function index()
    {

        $name = 'henk';

        $records = $this->lesModel->getLessons();

        $rows = '';

        foreach ($records as $value) {
            $rows .= "<tr>
                        <td>$value->Id</td>
                        <td>$value->Datum</td>
                        <td>$value->Naam</td>
                        <td><a href='" . URLROOT . "/Lesson/opmerking/$value->Id'>?</a></td>
                        <td><a href='" . URLROOT . "/Lesson/onderwerp/$value->Id'>!</a></td>
                    </tr>";
        }

        $data = [
            'name' => $name,
            'title' => 'Lessen',
            'rows' => $rows
        ];

        $this->view('les/index', $data);
    }

    public function opmerking($id = null)
    {
        if (!$id) {
            header('Location: ' . URLROOT . '/Lesson');
        }


        $records = $this->lesModel->getOpmerking($id);

        if (!$records) {
            header('Location: ' . URLROOT . '/Lesson');
        }

        $rows = '';

        foreach ($records as $value) {
            $rows .= "<tr>
                        <td>$value->Id</td>
                        <td>$value->Datum</td>
                        <td>$value->Naam</td>
                        <td>$value->Opmerking</td>
                    </tr>";
        }

        $data = [
            'title' => 'Opmerkingen in de les',
            'row' => $rows
        ];

        $this->view("les/opmerking", $data);
    }

    public function onderwerp($id = null)
    {
        if (!$id) {
            header('Location: ' . URLROOT . '/Lesson');
        }

        $records = $this->lesModel->getOnderwerp($id);

        if (!$records) {
            header('Location: ' . URLROOT . '/Lesson');
        }

        $rows = '';

        foreach ($records as $value) {
            $rows .= "<tr>
                        <td>$value->Id</td>
                        <td>$value->Datum</td>
                        <td>$value->Naam</td>
                        <td>$value->Onderwerp</td>
                    </tr>";
        }

        $data = [
            'title' => 'Onderwerp in de les',
            'id' => $id,
            'rows' => $rows
        ];

        $this->view("les/onderwerp", $data);
    }

    public function addTopic($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (strlen($_POST['comment']) > 255) {

                echo '<script>
                    alert("Het nieuwe onderwerp bevat meer dan 255 letters");
                    window.location.href="' . URLROOT . '/Lesson/onderwerp/' . $_POST['lesid'] . '";
                 
                </script>';
            } else if (empty($_POST['comment'])) {
                echo '<script>
                    alert("Het nieuwe onderwerp mag niet leeg zijn");
                    window.location.href="' . URLROOT . '/Lesson/onderwerp/' . $_POST['lesid'] . '";
                 
                </script>';
            } else {
                $this->lesModel->addTopic($_POST);
                header('Location: ' . URLROOT . '/Lesson/onderwerp/' . $_POST['lesid']);
            }
        } else {
            $data = [
                'title' => 'Voeg een onderwerp toe',
                'Id' => $id,
                'Datum' => '',
                'Naam' => '',
                'Onderwerp' => ''
            ];
            $this->view("les/add", $data);
        }
    }
}
