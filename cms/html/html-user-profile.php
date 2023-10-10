<!-- User profile -->
<div class="user-profile"> 
    <div class="profile-img"> <img src="images/users/<?php echo $_img_; ?>" alt="user" />       
        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
    </div> 
    <div class="profile-text">
        <h5><?php echo $datauser['nombre']; ?></h5>
        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>        
        <a href="./cerrar-sesion.php" class="" data-toggle="tooltip" title="Cerrar sesión"><i class="mdi mdi-power"></i></a>
        <div class="dropdown-menu animated flipInY">     
            <a href="./profile.php" class="dropdown-item"><i class="ti-user"></i> Mi perfil</a>            
            <div class="dropdown-divider"></div>
            <a href="./cerrar-sesion.php" class="dropdown-item"><i class="fa fa-power-off"></i> Cerrar sesi&oacute;n</a>
        </div>
    </div>
</div>
<!-- End User profile text-->
