<!DOCTYPE html>
<html>

<head>

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/product.css">
    <script src="../js/product.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title> Product Page </title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo"> <a href="Home.php">Game Vault</a> </div>
            <ul class="links">
                <li><a href="Home.php">Home</a></li>
                <li><a href="catalogo.php">Catalog</a></li>
                <li><a href="mail.html">Contact</a></li>
            </ul>
            <a href="personal.php" class="action-btn" style="margin-left: 550px;"><i class="fa-solid fa-user"></i></a>
            <a href="cart.php" class="action-btn"> <i class="fa-solid fa-cart-shopping"></i> </a>
            <div class="toggle-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="dropdown-menu open">
            <li><a href="Home.php">Home</a></li>
            <li><a href="catalogo.php">Servicies</a></li>
            <li><a href="mail.html">Contact</a></li>
            <li><a href="Login.html" class="action-btn">Get Started</a></li>
        </div>
    </header>
    <?php
        session_start();
        if (isset($_SESSION['userId'])) {
            echo "<p style='color: #fff;'>".$_SESSION['userId']."</p>" ;
        }
        else
        echo "<p style='color: #fff;'>No user is logged in.</p>";
        $servername = "localhost:3306";  // Nome del server MySQL
        $username = "root";     // Nome utente MySQL
        $password = "";     // Password MySQL
        $database = "gamevault";     // Nome del database

        // Creazione della connessione
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) 
    {
        die("Connessione al database fallita: " . $conn->connect_error);
    }
    
        $nomeGioco=$_POST["nomeG"];
        if(!empty($nomeGioco))
        {
            $sql="SELECT * FROM game WHERE nome='$nomeGioco'";
            $result=$conn->query($sql);
            if($result->num_rows==1)
            {
                $row=$result->fetch_assoc();
                $image=$row["foto"];
                $prezzo=$row["prezzo"];
                $piattaforma=$row["piattaforma"];
                $sconto=$row["sconto"];
                $sconto_calc=($prezzo*$sconto)/100;
                $prezzoscontato=$prezzo-$sconto_calc;
                $prezzoscontato=number_format($prezzoscontato, 2, '.', '');
                $descrizione=$row["descrizione"];
                echo "
                <form action=../php/aggiungiCart.php method='POST'>
                <section id='prodCard'>
                    <div class='available'>
                        <p class='title' name='nomeG'> ".$nomeGioco."</p>
                        <select id='dropdown'>
                            <option value='1'> ".$piattaforma." </option>
                        </select>
                        <div class='status'>
                            <h2> Available </h2>
                        </div>
                        <img src='data:image/jpeg;base64,".base64_encode($image)."'>
                        <p class='price' style='text-decoration: line-through;'>".$prezzo." €</p>
                        <p class='price'>".$prezzoscontato." €</p>
                        <button type='submit' class='Add'>BUY NOW</button>
                    </div>
            </section>
            </form>

        <section id='description'>
            <div class='About'>
                <h1 class='sectionAbout'>About the Game</h1>

                <p class='description'>
                    ".$descrizione."
                </p>
                <table class='table'>
                    <tr>
                        <td>Installation:</td>
                        <td><a href='#'>Tutorial</a></td>
                    </tr>
                    <tr>
                        <td>Developer:</td>
                        <td><a href='#'>Nintendo</a></td>
                    </tr>
                    <tr>
                        <td>Publisher:</td>
                        <td><a href='#'>Nintendo</a></td>
                    </tr>
                    <tr>
                        <td>Release Date:</td>
                        <td>MM/DD/AAAA</td>
                    </tr>
                    <tr>
                        <td>Type:</td>
                        <td>Game design</td>
                    </tr>
                </table>
            </div>
        </section>";
            }
        }
        $conn->close();
        ?>
        <section class="img">
            <div class="sectionImg">
                <h1 class="sectionAbout">Trailer Section</h1>
                <img src="../foto/starfield1.jpg" onclick="img('../foto/starfield1.jpg')" class="img3">
                <img src="../foto/starfield2.jpg" onclick="img('../foto/starfield2.jpg')" class="img2">
                <img src="../foto/starfield3.jpg" onclick="img('../foto/starfield3.jpg')" class="img2">
                <img src="../foto/starfield4jpg.jpg" onclick="img('../foto/starfield4jpg.jpg')" class="img2">
                <img src="../foto/starfield1.jpg" onclick="img('../foto/starfield1.jpg')" class="img2">
                <img src="../foto/starfield1.jpg" onclick="img('../foto/starfield1.jpg')" class="img2">
                <img src="../foto/starfield1.jpg" onclick="img('../foto/starfield1.jpg')" class="img2">
            </div>
        </section>

        <section id="components">
            <h2 style="font-size: 2em;" class="sectionAbout">Description</h2>

            <p class="text">
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.
                Duis
                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                sint
                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </p>

            <h2 style="font-size: 2em;" class="sectionAbout">Mininum Requirements</h2>
            <table class="table2">
                <tr>
                    <td>OS:</td>
                    <td>Windows 10 (Version 1909 or Newer)</td>
                </tr>
                <tr>
                    <td>Processor:</td>
                    <td>AMD Ryzen 5 1500X, Intel Core i7-4770K</td>
                </tr>
                <tr>
                    <td>Memory:</td>
                    <td>16 GB RAM</td>
                </tr>
                <tr>
                    <td>Graphics:</td>
                    <td>AMD Radeon RX 470 (4 GB), AMD Radeon RX 6500 XT (4 GB), NVIDIA GeForce GTX 970 (4 GB), NVIDIA
                        GeForce GTX
                        1050 Ti (4 GB)</td>
                </tr>
                <tr>
                    <td>Storage:</td>
                    <td>100 GB available space</td>
                </tr>
            </table>
        </section>

    <div class="FooterContainer">
        <a class="sublinks" rel="nofollow" href="#">Terms of Use</a>
        <a class="sublinks" rel="nofollow" href="#">Privacy policy</a>
        <a class="sublinks" rel="nofollow" href="#">Affiliation Program</a>
        <a class="sublinks ig-contact-btn" rel="nofollow" href="#">Contactus</a>
        <a class="sublinks" rel="nofollow" href="#">
            <div class="icon-gift icon-xs"></div>
            <span>Redeem a Gift Card</span>
        </a>
        <a class="sublinks" target="_blank" href="#">
            <div class="icon-news icon-xs"></div>
            <span>Find the latest video game news</span>
        </a>
    </div>

</body>

</html>
