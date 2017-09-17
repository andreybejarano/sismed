<div id="menuLateralAdmin" class="collapse navbar-collapse navbar-ex1-collapse fondoblack">
    <ul class="nav navbar-nav side-nav fondoblack letraTitulos menu" id="navLateral">
        <li>
            <a href="<?php echo URL_BASE ?>"><i class="glyphicon glyphicon-home"></i> Inicio</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#lstUsuarios"><i class="fa fa-child fa-2x"></i> Usuarios <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="lstUsuarios" class="collapse">
                <li>
                    <a href="<?php echo URL_BASE; ?>usuarios/usuarios">Usuarios</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#citasMedicas"><i class="fa fa-calendar-o fa-2x"> </i>  Citas Medicas <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="citasMedicas" class="collapse">
                <li>
                    <a href="<?php echo URL_BASE; ?>citasMedicas/citas">Citas medicas</a>
                </li>
                <li>
                    <a href="<?php echo URL_BASE; ?>agendasMedicas/agenda">Agendas medicas</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo URL_BASE; ?>historialMedico/historial"><i class="fa fa-h-square fa-2x"></i> Historial Medico </a>
        </li>
        
    </ul>
</div>
</nav>