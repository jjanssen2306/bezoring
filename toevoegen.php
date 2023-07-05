<?php include_once('db.php') ;

if (isset($_POST["submit"])) {
    $naam = (isset($_POST['naam']) ? $_POST['naam'] : '');
    $prijs = (isset($_POST['prijs']) ? $_POST['prijs'] : '');
    $beschrijving = (isset($_POST['beschrijving']) ? $_POST['beschrijving'] : '');


    if($_POST['naam'] == "" || $_POST['prijs'] == ""|| $_POST['beschrijving'] == ""){
    }
    else{
        $sql = "INSERT INTO users (naam, prijs,beschrijving) VALUES (?,?,?)";
        $conn->prepare($sql)->execute([
            $naam,
            $prijs,
            $beschrijving,
        ]); 
    }
}
?>

<?php include_once('header.php') ?>
<body>
    
    <form action="gerecht-toevoegen.php" method="post" class="main-wrapper footer-margin">
        <input type="hidden" name="gerechtID" placeholder="GerechtID">
        <input type="input" name="naam" id=""  placeholder="naam">
        <input type="input" name="prijs" id=""  placeholder="prijs">
        <input type="input" name="beschrijving" id=""  placeholder="beschrijving">
        <input type="submit" class="submit-knop" name="submit" value="gerechten toevoegen" id="submit" >



    </form>




</body>

</html>