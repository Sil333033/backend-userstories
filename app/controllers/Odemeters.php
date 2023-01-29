<?php 


class Odemeters extends Controller {

    private $odemeterModel;

    public function __construct() {
        $this->odemeterModel = $this->model('Odemeter');
    }

    public function index() {

        $records = $this->odemeterModel->getOdemeters();

        $rows = '';

        foreach ($records as $value) {
            $rows .= "<tr>
                        <td>$value->Type</td>
                        <td>$value->Kenteken</td>
                        <td><a href='" . URLROOT . "/Odemeters/add/$value->id'>+</a></td>
                    </tr>";
        }


        $data = [
            'title' => 'Overzicht wagenpark',
            'rows' => $rows
        ];
        $this->view('odemeter/index', $data);
    }

    public function add($id = null) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (empty($_POST['kmstand'])) {
                echo '<script>
                    alert("De nieuwe kilometerstand is niet toegevoegd, probeer het opnieuw");
                    window.location.href="' . URLROOT . '/Odemeters/add/' . $_POST['Id'] . '";
                </script>';
            } else if($_POST['kmstand'] < $_POST['latestKM']) {
                echo '<script>
                        alert("De nieuwe kilometerstand is kleiner dan de vorige, probeer het opnieuw");
                        window.location.href="' . URLROOT . '/Odemeters/add/' . $_POST['Id'] . '";
                    </script>';
            } else if($_POST['kmstand'] == $_POST['latestKM']) {
                echo '<script>
                        alert("De nieuwe kilometerstand is gelijk aan de vorige, probeer het opnieuw");
                        window.location.href="' . URLROOT . '/Odemeters/add/' . $_POST['Id'] . '";
                    </script>'; 
            } else {
                $this->odemeterModel->addKM($_POST);
                echo '<script>
                    alert("De nieuwe kilometerstand is toegevoegd");
                    window.location.href="' . URLROOT . '/Odemeters/add/' . $_POST['Id'] . '";
                </script>';
                header('Location: ' . URLROOT . '/Odemeters');
            }
        } else {

            $data = $this->odemeterModel->getKM($id);

            $data = [
                'title' => 'Invoeren kilometerstand',
                'Id' => $id,
                'type' => $data->Type,
                'kenteken' => $data->Kenteken,
                'latestKM' => $data->KmStand,
            ];
            $this->view("odemeter/add", $data);
        }
    }
}