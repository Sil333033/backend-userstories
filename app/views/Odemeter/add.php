<u> <h2> <?= $data['title'] ?>  </h2> </u>
<h4> <?= $data['type'] . '  ' .$data['kenteken'] ?> </h4>

<h4> <?= 'Laatste kilometerstand ingevoerd: ' . $data['latestKM'] ?>KM </h4>

<form action="" method="post">
    <input type="hidden" name="Id" value="<?= $data['Id'] ?>">
    <input type="hidden" name="latestKM" value="<?= $data['latestKM'] ?>">
    <label for="kmstand">Kilometerstand</label>
    <input type="text" name="kmstand" id="kmstand">
    <br>
    <input type="submit" value="Toevoegen">
</form>