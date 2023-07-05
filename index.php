<?php
include_once('db.php');
require_once('header.php');
?>



<body>
    <div class="megablok2">
    <form action="menu.php" class="zoekbalk-container" method="post">
        <input type="text" class="zoekbalk" name="keyword">
        <input type="submit" value="zoeken" class="zoekknop" id="submit" name="submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $keyword = $_POST['keyword'];
        $query = $conn->prepare("SELECT * FROM menu WHERE naam Like '%$keyword%' ");
        $query->execute();
        while ($row = $query->fetch()) { ?>
            <main class="main-wrapper">

                <div class=" menu-block">
                    <form action="winkelmandje.php" method="post" class="winkelmand-tekst">

                        <img src=<?php echo $row['image']; ?> alt="foto van eten" class="menu-foto">
                        <div class="menu-tekst">
                            <h2 class="gerechtnaam">
                                <?php echo $row['naam']; ?>
                            </h2>
                            <div class="prijs-reviews-menu-tekst">
                                <p>
                                    <?php echo $row['prijs']; ?>
                                </p>
                    
                            </div>
                            <p class="beschrijving-gerecht-tekst">
                                <?php echo $row['beschrijving']; ?>
                            </p>
                    </form>
                </div>
            </main>
        <?php           }
    } else {
        $query = $conn->prepare("SELECT * FROM menu");
        $query->execute();
        while ($row = $query->fetch()) { ?>
            <main class="main-wrapper">

                <div class=" menu-block">
                    <form action="winkelmandje.php" method="post" class="winkelmand-tekst">

                        
                        <div class="menu-tekst">
                            <h2 class="gerechtnaam">
                                <?php echo $row['naam']; ?>
                            </h2>
                            <div class="prijs-reviews-menu-tekst">
                                <p>
                                    <?php echo $row['prijs']; ?>
                                </p>
                               
                            </div>
                            <p class="beschrijving-gerecht-tekst">
                                <?php echo $row['beschrijving']; ?>
                            </p>
                    </form>
                </div>
            </main>


    <?php    }
    }
    ?>
    </div>
</html>