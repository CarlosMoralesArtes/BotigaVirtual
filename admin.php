<!DOCTYPE html>
<html lang="es">
<link rel="shortcut icon" href="./images/logo.png">
<head>
    <!-- Conexio amb la base de dades -->
    <?php
        include 'connexio.php';
    ?>
    <!-- Titul de la pagina -->
     <title>Admin - Configuració Noticies</title>
     <!-- Estils de la pagina -->
        <style>
            table, tr, th, td{
                border: 1px solid #000000;
                padding: 10px;
            }
            .espai{
                padding-right: 960px;
            }
        </style>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/aos.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-gymso-style.css">
</head>
<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <!-- Titul de la pagina -->
            <a class="navbar-brand" href="admin.php">Admin - Configuració Noticies</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu de la pagina -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">Insertar</a>
                    </li>

                    <li class="nav-item">
                        <a href="#eliminar" class="nav-link smoothScroll">Eliminar</a>
                    </li>

                    <li class="nav-item">
                        <a href="#modificar" class="nav-link smoothScroll">Modificar</a>
                    </li>

                    <li class="nav-item">
                        <a href="client.php" class="nav-link smoothScroll">Visió Usuari</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


     <!-- HERO -->
     <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

            <div class="bg-overlay"></div>

               <div class="container">
                    <div class="row">

                         <div class="col-lg-8 col-md-10 mx-auto col-12">
                              <div class="hero-text mt-5 text-center">
                                    <!-- Titul principal de la pagina -->
                                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">ADMINISTRADOR</h1>
                                    <h6 data-aos="fade-up" data-aos-delay="300"><?php echo "REGISTRE DE NOTICIES" ?></h6><br>
                                    <p data-aos="fade-up" data-aos-delay="300">
                                        <!-- Comprobacio de la pagina -->
                                        <?php 
                                            if (!$con) {
                                                echo ("Conexio fallida " . mysqli_connect_error());
                                            } else{
                                                echo "Conectat Correctament. ";
                                            }
                                        ?>
                                        
                                    </p>
                                    <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">Insertar Noticies</a>
                                    <a href="#eliminar" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">Eliminar Noticies</a>
                                    <a href="#modificar" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">Modificar Noticies</a>
                              </div>
                         </div>

                    </div>
               </div>
     </section>

     <!-- ABOUT -->
     <section class="about section" id="about">
     <div class="container">
            <div class="ml-auto col-lg-12 col-md-12 col-12">
                <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="150">Formulari de Inserció de Noticies</h2>
                <!-- Insertar la noticia -->
                <?php
                    if(isset($_POST['submit'])){
                    date_default_timezone_set("Europe/Madrid"); 
                    $data = date("d/m/y H:i:s");
                    $imgContenido = $_FILES["foto"]["tmp_name"];
                    $foto = addslashes(file_get_contents($imgContenido));
                    $posicio = strpos($_FILES["foto"]["type"], '/');
                    $extension = substr($_FILES["foto"]["type"], $posicio);
                    $correcte = false;
                    if($extension == '/png'){
                        $correcte = true;
                    } else if ($extension == '/jpg'){
                        $correcte = true;
                    } else if ($extension == '/gif'){
                        $correcte = true;
                    } else if ($extension == '/jpeg'){
                        $correcte = true;
                    } else {
                        $correcte = false;
                    }
                    if($correcte == true){
                        $titol = $_POST["cf-titol"];
                        $cos = $_POST["cf-cos"];
                        $autor = $_POST["cf-autor"];
                        $seccio = $_POST["seccio"];

                        $sql = "insert into noticia(titol,cos,autor,codiSeccio,data,imatge,tipus) values('" .$titol. "','" .$cos. "','" .$autor. "','" .$seccio. "','" .$data. "','" .$foto. "','" .$extension. "')";
                        $r = mysqli_query($con,$sql);

                        if(mysqli_error($con)){
                            echo "ERROR: ".mysqli_error($con);
                        } else {
                            echo "Dades introduides correctament. ";
                            echo "<br>";
                        }
                    } else {
                        echo "El arxiu te que ser png, jpg, jpeg o gif. ";
                    }
                }
                ?>
                <!-- Formulari per insertar la noticia -->
                <form method="post" class="contact-form webform" role="form" enctype="multipart/form-data">
                    <input type="text" class="form-control" name="cf-titol" placeholder="Titul de la Noticia">
                    <textarea rows="3" cols="30" name="cf-cos" placeholder=" Cos de la Noticia"></textarea>
                    <input type="text" class="form-control" name="cf-autor" placeholder="Autor">
                    Seccio de Noticia: <br><br>
                    <?php
                    $sql = "select * from seccio";
                    $r = mysqli_query($con,$sql);
                        echo "<select name='seccio'>";
                        while($fila = mysqli_fetch_assoc($r)){
                            foreach ($fila as $key => $value) {
                                $valor = $fila["codiSeccio"];
                                $contingut = $fila["seccio"];
                            }
                            echo "<option value='$valor'>$contingut</option>";
                        }
                        echo "</select>";
                    ?>
                    <br><br>
                    <input type="file" name="foto">
                    <button type="submit" class="form-control" id="submit-button" name="submit">Publicar</button>
                </form>
            </div>
        </div>
            </div>
     </section>
     <div class="container">
     <section id="eliminar">
         <br>
    <!-- Eliminar una noticia -->
     <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="150">Eliminar una Noticia</h2>
     <h3>Escolleig la noticia que vols eliminar.</h3><br>
     <?php            
        $sql = "select titol from noticia";
        $r = mysqli_query($con,$sql);

        echo "<form action='#' method='post'>";
        while($fila = mysqli_fetch_assoc($r)){
            foreach ($fila as $value) {
                echo "<input type='radio' name='cf-eliminarnoticia' value='$value'> $value ";
            }
        }
        echo "<button type='submit' class='form-control' id='submit-button' name='submit2'>Eliminar</button>";
        echo "</form>";
        if(isset($_POST['submit2'])){
            $eliminarnoticia = $_POST['cf-eliminarnoticia'];
            $sql = "delete from noticia where titol like '$eliminarnoticia'";
            $r = mysqli_query($con,$sql);

            if(mysqli_error($con)){
                echo "ERROR: ".mysqli_error($con);
            } else {
                echo "<br>";
                echo "Eliminat correctament. ";
                echo "<br>";
                echo "Files afectades: ".mysqli_affected_rows($con);
            }
        }
     ?>
     </div>
    </section>
    <br>
    <!-- Modificar una noticia -->
    <section class="about section" id="modificar">
        <br>
        <div class="container">
        <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="150">Modificar una noticia</h2>
        <h3>Escolleig la noticia que vols modificar.</h3><br>
            <?php            
                $sql2 = "select titol from noticia";
                $r = mysqli_query($con,$sql2);
            
                echo "<form method='post' role='form' enctype='multipart/form-data'>";
                echo "<select name='seccio3'>";
                while($fila = mysqli_fetch_assoc($r)){
                    foreach ($fila as $value) {
                        echo "<option value='$value'>$value</option>";
                    }
                }
                echo "</select>";

                ?>
                <!-- Boto que carrega les dades de la base de dades -->
                <button name="carregar">Carregar dades</button>
                <!-- Formulari amb les dades per modificar -->
                    <input type="text" class="form-control" name="cf-titol2" value="<?php if(isset($_POST['carregar'])){
                                                                                                                $titul = $_POST['seccio3'];
                                                                                                                $sql2 = "SELECT titol 
                                                                                                                        FROM noticia 
                                                                                                                        WHERE titol LIKE '$titul'";
                                                                                                                $r = mysqli_query($con,$sql2);
                                                                                                            
                                                                                                                while($fila = mysqli_fetch_assoc($r)){
                                                                                                                    foreach ($fila as $value) {
                                                                                                                        echo $value;
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                            ?>" placeholder="Titul de la Noticia">
                    <textarea rows="3" cols="30" name="cf-cos2" placeholder="Cos de la Noticia"><?php if(isset($_POST['carregar'])){
                                                                                                    $cos = $_POST['seccio3'];
                                                                                                    $sql2 = "SELECT cos 
                                                                                                                FROM noticia 
                                                                                                                WHERE titol LIKE '$cos'";
                                                                                                    $r = mysqli_query($con,$sql2);
                                                                                                
                                                                                                    while($fila = mysqli_fetch_assoc($r)){
                                                                                                        foreach ($fila as $value) {
                                                                                                            echo $value;
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                                ?></textarea>
                    <input type="text" class="form-control" name="cf-autor2" value="<?php if(isset($_POST['carregar'])){
                                                                                                    $autor = $_POST['seccio3'];
                                                                                                    $sql2 = "SELECT autor
                                                                                                               FROM noticia 
                                                                                                              WHERE titol LIKE '$autor'";
                                                                                                    $r = mysqli_query($con,$sql2);
                                                                                                
                                                                                                    while($fila = mysqli_fetch_assoc($r)){
                                                                                                        foreach ($fila as $value) {
                                                                                                            echo $value;
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                          ?>" placeholder="Autor de la Noticia">
                    Seccio de Noticia: <br><br>
                    <?php
                    $sql = "select * from seccio";
                    $r = mysqli_query($con,$sql);
                        echo "<select name='seccio2'>";
                        while($fila = mysqli_fetch_assoc($r)){
                            foreach ($fila as $key => $value) {
                                $valor = $fila["codiSeccio"];
                                $contingut = $fila["seccio"];
                            }
                            echo "<option value='$valor'>$contingut</option>";
                        }
                        echo "</select>";
                    ?>
                    <br><br>
                    <input type="file" name="foto2">
                    <button type="submit" class="form-control" id="submit-button" name="submit3">Modificar</button>
                </form>
                <?php
                // Modificar les dades de la base de dades
                if(isset($_POST['submit3'])){
                    $seccio3 = $_POST["seccio3"];
                    date_default_timezone_set("Europe/Madrid"); 
                    $imgContenido2 = $_FILES["foto2"]["tmp_name"];
                    $foto2 = addslashes(file_get_contents($imgContenido2));
                    $posicio2 = strpos($_FILES["foto2"]["type"], '/');
                    $extension2 = substr($_FILES["foto2"]["type"], $posicio2);
                    $correcte2 = false;
                    if($extension2 == '/png'){
                        $correcte2 = true;
                    } else if ($extension2 == '/jpg'){
                        $correcte2 = true;
                    } else if ($extension2 == '/gif'){
                        $correcte2 = true;
                    } else if ($extension2 == '/jpeg'){
                        $correcte2 = true;
                    } else {
                        $correcte2 = false;
                    }
                    if($correcte2 == true){
                        $data = date("d/m/y H:i:s");
                        $titol = $_POST["cf-titol2"];
                        $cos = $_POST["cf-cos2"];
                        $autor = $_POST["cf-autor2"];
                        $seccio = $_POST["seccio2"];

                        $sql = "update noticia set titol='$titol', cos='$cos', autor='$autor', codiSeccio='$seccio', imatge='$foto2', tipus='$extension2' where titol like '$seccio3'";
                        $r = mysqli_query($con,$sql);

                        if(mysqli_error($con)){
                            echo "ERROR: ".mysqli_error($con);
                        } else {
                            echo "<br>";
                            echo "Cambiat correctament. ";
                            echo "<br>";
                            echo "Files afectades: ".mysqli_affected_rows($con);
                        }
                    } else {
                        echo "El arxiu te que ser png, jpg, jpeg o gif. ";
                    }
                }
                ?>
        </div>
    </section>

     <!-- SCRIPTS -->
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/aos.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>