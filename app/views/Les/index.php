<body>
    <h3><?php echo $data['title']; echo " "; echo $data['name'] ?></h3>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Datum en tijd</th>
                <th>Naam leerling</th>
                <th>Les info</th>
                <th>Onderwerpen</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $data['rows'] ?>
        </tbody>
    </table>
</body>