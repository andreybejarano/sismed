<div id="menuLateralAdmin" class="collapse navbar-collapse navbar-ex1-collapse fondoblack">
    <ul class="nav navbar-nav side-nav fondoblack letraTitulos menu" id="navLateral">
        <li>
            <a href="<?php echo URL_BASE ?>"><i class="glyphicon glyphicon-home"></i> Inicio</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#centrosMedicos"><i class="fa fa-building fa-2x"></i> Centros Médicos <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="centrosMedicos" class="collapse">
                <li>
                    <a href="<?php echo URL_BASE; ?>medicamentos/medicamentos">Medicamentos</a>
                </li>
                <li>
                    <a href="<?php echo URL_BASE; ?>consultorios/consultorios">Consultorios</a>
                </li>
                <li>
                    <a href="<?php echo URL_BASE; ?>tipoOrdenes/tipoOrdenes">Tipos de ordenes</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#funcionariosSena"><i class="fa fa-users fa-2x"></i> Funcionarios SENA <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="funcionariosSena" class="collapse">
                <li>
                    <a href="<?php echo URL_BASE; ?>funcionarios/funcionarios"> Funcionarios </a>
                </li>
                <li>
                    <a href="<?php echo URL_BASE; ?>beneficiarios/beneficiarios"> Beneficiarios</a>
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