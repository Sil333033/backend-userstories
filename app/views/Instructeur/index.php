<u>
    <h1><?= $data['title'] ?></h1>
</u>


<table>
    <thead>
        <tr>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Mobiel</th>
            <th>Datum in dienst</th>
            <th>Aantal sterren</th>
            <th>Voertuigen</th>
        </tr>
    </thead>
    <tbody>
        <?php echo $data['rows']; ?>
    </tbody>
</table>