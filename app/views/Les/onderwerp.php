<body>
    <h3><?php echo $data['title'] ?></h3>

    <a href="<?php echo URLROOT ?>/Lesson/addTopic/<?php echo $data['id'] ?>">Voeg een onderwerp toe</a>

    <br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Datum en tijd</th>
                <th>Naam leerling</th>
                <th>Onderwerp</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $data['rows'] ?>
        </tbody>
    </table>
</body>
