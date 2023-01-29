<u>
    <h1><?= $data['title'] ?></h1>
</u>

<h3>Naam: <?= $data['voornaam'] . ' ' . $data['tussenvoegsel'] . ' ' . $data['achternaam'] ?></h3>
<h3>Datum in dienst: <?= $data['datumInDienst'] ?></h3>
<h3>Aantal sterren: <?= $data['aantalSterren'] ?></h3>

<table>
    <thead>
        <tr>
            <th>Type voertuig</th>
            <th>Type</th>
            <th>Kenteken</th>
            <th>Bouwjaar</th>
            <th>Brandstof</th>
            <th>Rijbewijscategorie</th>
        </tr>
    </thead>
    <tbody>
        <?php echo $data['rows']; ?>
    </tbody>
</table>