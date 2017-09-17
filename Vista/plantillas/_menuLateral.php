<?php

session_start();

if ($_SESSION['rol'] == 1) {
    Vista::mostrar('plantillas/_menuLateralAdmin');
} else if($_SESSION['rol'] == 2) {
    Vista::mostrar('plantillas/_menuLateralAdmisionista');
} else if ($_SESSION['rol'] == 3) {
    Vista::mostrar('plantillas/_menuLateralMedico');
} else {
    Vista::mostrar('plantillas/_menuLateralOtros');
}