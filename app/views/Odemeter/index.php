<u><h1><?= $data['title'] ?></h1></u>  

<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Kenteken</th>
            <th>KmStand toevoegen</th>
        </tr>
    </thead>
    <tbody>
        <?php echo $data['rows']; ?>
    </tbody>
</table>