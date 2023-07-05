<?php
require_once('header.php');
include_once('db.php');
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
    header("Location: admin.php");
}
$data = $conn->query("SELECT * FROM users")->fetchAll();

foreach ($data as $row) {



    if (isset($_POST['gebruikersnaam']) && isset($_POST['password'])) {
        if ($_POST['gebruikersnaam'] == $row['username'] && $_POST['password'] == $row['password']) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['gebruikersnaam'] = $row['username'];
            //$_SESSION['password'] == $_POST['password'];

            header("Location: admin.php")
?>
<?php }
    }
} ?>


<body>
<div class="megablok">


    <main class="contact-form-height">
        <form action="login.php" method="post" class="main-wrapper">
            <h2>Login</h2>
            <input type="input" class="kleine-box" name="gebruikersnaam" placeholder="Gebruikersnaam" id="username">
            <input type="password" class="kleine-box" name="password" placeholder="Wachtwoord" id="password">

            <input type="submit" class="submit-knop" value="login" onclick="return confirm('Are you sure you want to log in');">
        </form>
    </main>

    </div>
</body>

</html>