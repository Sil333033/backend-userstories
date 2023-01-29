<?php //var_dump($data); exit; ?>

<body>
    <h3><?php echo $data['title'] ?></h3>

    <form method="POST">

        <label for="comment">Opmerking</label>
        <input type="text" name="comment" id="comment" required>

        <input type="hidden" name="lesid" value="<?php echo $data["Id"] ?>">


        <input type="submit" value="Toevoegen">
    </form>
</body>
