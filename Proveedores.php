<?php
  include('Coneccion.php');
  session_start();
    if(!isset($_SESSION['emails'])){
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="Proveedores.css">
        <link rel="icon" href="img/Logo.jpeg">
        <title>Storehouse</title>
    </head>
    <body>
      <header>
        <i class='bx bx-menu none' onclick="menu_()" id="menu-x"></i>
        <i class='bx bx-x none' onclick="menu_()" id="x-menu"></i>
        <img src="img/Logo.jpeg" class="Logo"></img>
        <span class="logo_name">Storehouse</span>
      </header>
      <hr>
      <!-- sildebar -->
      <nav>
        <div class="sidebar close" id="sidebar_">
        <ul class="nav-links">
            <li>
                <a href="Inicio.php">
                    <i class='bx bx-home'></i>
                    <span class="link_name">Inicio</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="Inicio.php">Inicio</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a>
                        <i class='bx bx-cart'></i>
                        <span class="link_name">Transacciones</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Transacciones</a></li>
                    <li><a href="Transacciones/Compras.php">Compras</a></li>
                    <li><a href="Transacciones/Compras.php">Ventas</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a>
                        <i class='bx bx-spreadsheet'></i>
                        <span class="link_name">Catalogo</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Catalogo</a></li>
                    <li><a href="Catalogo/Productos.php">Productos</a></li>
                    <li><a href="Catalogo/Marcas.php">Marcas</a></li>
                    <li><a href="Catalogo/Categorias.php">Categorias</a></li>
                    <li><a href="Catalogo/SubCategorias.php">SubCategorias</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a>
                        <i class='bx bx-group'></i>
                        <span class="link_name">Clientes</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Clientes</a></li>
                    <li><a href="Clientes/Clientes.php">Clientes</a></li>
                    <li><a href="Clientes/Empresas.php">Empresas</a></li>
                </ul>
            </li>
            <li>
                <a href="Empleados.php">
                    <i class='bx bx-group'></i>
                    <span class="link_name">Empleados</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="Empleados.php">Empleados</a></li>
                </ul>
            </li>
            <li>
                <a href="Usuarios.php">
                    <i class='bx bx-group'></i>
                    <span class="link_name">Usuarios</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="Usuarios.php">Usuarios</a></li>
                </ul>
            </li>
            <li>
                <a>
                    <i class='bx bx-package'></i>
                    <span class="link_name">Proveedores</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name">Proveedores</a></li>
                </ul>
            </li>
            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Salir</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Salir</a></li>
                </ul>
            </li>
        </ul>
      </div>
    </nav>
      
      <!-- Proveedores -->
      <article>
        <div class="topbar">
          <h2>Proveedores</h2>
          <button class="nuevo" id="btn-Abrir-Window"><i class='bx bx-plus-circle'></i>Nuevo Proveedor</button>
        </div>
        <div class="tproveedores">
          <table>
            <tr>
              <th>EMPRESA</th>
              <th>E-MAIL</th>
              <th>TELEFONO</th>
              <th>SITIO WEB</th>
              <th>DIRECCION</th>
            </tr>
            <?php
            $sql= "SELECT * FROM proveedores";
            $resultado= mysqli_query($conection, $sql);

            while($mostrar=mysqli_fetch_array($resultado)){
            ?>
            <tr>
              <td><?php echo ucwords($mostrar['empresa']) ?></td>
              <td><?php echo $mostrar['email'] ?></td>
              <td><?php echo $mostrar['telefono'] ?></td>
              <td><?php echo $mostrar['sitioweb'] ?></td>
              <td><?php echo ucwords($mostrar['direccion']) ?></td>
            </tr>
            <?php
            }
            ?>
          </table>
        </div>
        <div class="proveedores">
        </div>
      </article>

      <!-- Ventana Nuevo Proveedor -->
      <div class="overlay" id="overlay">
        <div class="popup" id="popup">
          <i class='bx bx-x bnt-cerrar-popup' id="bnt-cerrar-popup" onclick="AbrirWindow()"></i><br>
          <form class="form" action="Registrar-Proveedores.php" method="POST">
            <h2>Nuevo Proveedor</h2>
            <div class="form_container">
              <div class="form_group">
                <input type="text" id="name" class="form_input" placeholder=" " name="empresa" required>
                <label for="name" class="form_label">Empresa:</label>
                <span class="form_line"></span>
              </div>
              <div class="form_group">
                <input type="email" id="roles" class="form_input" placeholder=" " name="email" required>
                <label for="roles" class="form_label">E-mail:</label>
                <span class="form_line"></span>
              </div>
              <div class="form_group">
                <input type="number" min="0" id="telefono" class="form_input" placeholder=" " name="telefono" required>
                <label for="telefono" class="form_label">Telefono:</label>
                <span class="form_line"></span>
              </div>
              <div class="form_group">
                <input type="url" id="sitioweb" class="form_input" placeholder=" " name="sitioweb" required>
                <label for="sitioweb" class="form_label">Sitio Web:</label>
                <span class="form_line"></span>
              </div>
              <div class="form_group">
                <input type="text" id="direccion" class="form_input" placeholder=" " name="direccion" required>
                <label for="direccion" class="form_label">Direccion:</label>
                <span class="form_line"></span>
            </div>
            <div class="buttons">
              <button type="reset" class="btn-reset"><i class='bx bx-reset'></i>Vaciar</button>
              <button type="submit" class="btn-submit"><i class='bx bx-save'></i>Guardar</button>
            </div>
          </form>
        </div>
      </div>
      <script src="Window.js"></script>
      <script src="Sidebar.js"></script>
    </body>
</html>