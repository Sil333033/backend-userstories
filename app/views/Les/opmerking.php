<body>
    <h3><?php echo $data['title'] ?></h3>

    

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Datum en tijd</th>
                <th>Naam leerling</th>
                <th>Opmerking</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $data['row'] ?>
        </tbody>
    </table>
</body>