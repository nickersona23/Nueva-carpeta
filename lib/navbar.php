<header>
        <nav>
            <ul>
                <li class="logo"><a href="index.php"><img class="logo_header" src="./assect/logo2.png"></a></li>
                <li class="items"><a href="index.php">Inicio</a></li>
                <li class="items"><a href="category.php">Catalogo</a></li>
                <?php 
                    if (!isset($_SESSION['usuario_id'])) {
                        echo "<li class='items'><a href='login.php'> Iniciar Sesión</a></li>";
                    } else {
                        echo "<li class='items'><a href='./lib/cerrar_sesion.php'>Cerrar Sesión</a></li>";
                    }
                ?>
                
            </ul>
        </nav>
    </header>