<?php
include_once('db.php');
if (isset($_POST["gerecht-aanpassen"])) {
    $naam = (isset($_POST['naam']) ? $_POST['naam'] : '');
    $prijs = (isset($_POST['prijs']) ? $_POST['prijs'] : '');
    $beschrijving = (isset($_POST['beschrijving']) ? $_POST['beschrijving'] : '');
    $id = (isset($_POST['gerechtID']) ? intval($_POST['gerechtID']) : 0);

    $sql = "UPDATE menu SET naam=?, prijs=?, beschrijving=? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$naam, $prijs, $beschrijving, $id]);
}



$data = $conn->query("SELECT * from menu")->fetchAll();
?>

<?php include_once('header.php') ?>

<body>
    <main class="contact-form-height menu-aanpassen">


        <?php foreach ($data as $row) { ?>
            <form action="menu-aanpassen.php" method="post" class="main-wrapper footer-margin">
                <h2>Gerecht aanpassen</h2>
                <input value="<?php echo $row['id']; ?>" type="hidden" class="kleine-box" name="gerechtID" placeholder="GerechtID Verandert niet">
                <input value="<?php echo $row['naam']; ?>" type="input" name="naam" id="" class="kleine-box" placeholder="naam">
                <input value="<?php echo $row['prijs']; ?>" type="input" name="prijs" id="" class="kleine-box" placeholder="prijs">
                <input value="<?php echo $row['beschrijving']; ?>" type="input" name="beschrijving" id="" class="kleine-box" placeholder="beschrijving">
              <input type="submit" class="submit-knop" name="gerecht-aanpassen" value="gerechten-aanpassen" onclick="return confirm('Are you sure you want to updaten this item?');">

            </form>
        <?php } ?>


    </main>
    <footer></footer>
</body>

</html>