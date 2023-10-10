<!-- Sidebar navigation-->
<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="nav-devider"></li>
        <li class="nav-small-cap">MENÚ PRINCIPAL</li>
        <li> <a class="waves-effect waves-dark" href="./" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">ESCRITORIO</span></a></li>
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">M&Oacute;DULOS</span></a>
            <ul aria-expanded="false" class="collapse">
                <?php if(modulos($PanelPermisos,'m1') > 0){ ?><li><a href="./lista-productos.php">Productos</a></li><?php } ?>
                <?php if(modulos($PanelPermisos,'m2') > 0){ ?><li><a href="./lista-categoria-productos.php">Categorías</a></li><?php } ?>
                <!--<?php if(modulos($PanelPermisos,'m3') > 0){ ?><li><a href="./lista-subcategoria-productos.php">Subcategorías</a></li><?php } ?>-->
                <?php if(modulos($PanelPermisos,'m4') > 0){ ?><li><a href="./lista-clientes.php">Clientes</a></li><?php } ?>
                <?php if(modulos($PanelPermisos,'m5') > 0){ ?><li><a href="./lista-satisfechos.php">Clientes satisfechos</a></li><?php } ?>               
                <?php if(modulos($PanelPermisos,'m6') > 0){ ?><li><a href="./lista-marcas.php">Marcas</a></li><?php } ?>
                <?php if(modulos($PanelPermisos,'m7') > 0){ ?><li><a href="./lista-usuarios.php">Usuarios internos</a></li><?php } ?>
                <?php if(modulos($PanelPermisos,'m8') > 0){ ?><li><a href="./lista-permisos.php">Usuarios perfiles</a></li><?php } ?>
                <?php if(modulos($PanelPermisos,'m9') > 0){ ?><li><a href="./lista-trabajadores.php">Ejecutivos de ventas</a></li><?php } ?>               
            </ul>
        </li>
        <li> <a class="waves-effect waves-dark" href="./cerrar-sesion.php" aria-expanded="false"><i class="mdi mdi-close-circle"></i><span class="hide-menu">CERRAR SESI&Oacute;N</span></a></li>
    </ul>
</nav>
<!-- End Sidebar navigation -->


