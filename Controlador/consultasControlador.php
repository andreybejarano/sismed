<?php

session_start();

class consultasControlador {

    private $modelo;
    private $modeloCitas;
    private $modeloBenficiario; 
    private $modeloAgenda;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('Consultas');
        $this->modeloCitas = Modelo::cargar('CitasMedicas');
        $this->modeloBenficiario = Modelo::cargar('Beneficiarios');
        $this->modeloAgenda = Modelo::cargar('AgendasMedicas');
        
    }

    public function consulta() {
        if(!$_POST){
            $datos['titulo']="citas medicas";
            Vista::mostrar('citasMedicas', $datos);
        }
        else{
            $datos['titulo'] = "Consultas Medicas";
            $datos['idCitaMedica'] = $_POST['idCitaMedica'];
            $datos['idBeneficiario'] = $_POST['idBeneficiario'];
            Vista::mostrar('consultas', $datos);
        }
    }

    public function insertarConsulta() {
    if (!$_POST){
        header('location: consulta');
    }
    else {
        $datos['titulo'] = "Citas Medicas";
        //Episodio--------------------------------------------------------------
        //Envia los datos al modelo mediante sets
        $this->modelo->setFechaHoraAtencion($_POST['txfFechaHora']);
        $this->modelo->setPesoEpisodio($_POST['txfPeso']);
        $this->modelo->setTemperaturaEpisodio($_POST['txfTemperatura']);
        $this->modelo->setPresionArterialEpisodio($_POST['txfPresion']);
        $this->modelo->setAnamnesisEpisodio($_POST['txfAnamnesis']);
        $this->modelo->setExploracionEpisodio($_POST['txfExploracion']);
        $this->modelo->setIdCitaMedica($_POST['idCitaMedica']);
        $this->modelo->setIdBeneficiario($_POST['idBeneficiario']);
        
        //lista los datos de historia medica vinculados al beneficiario
        $idHistoriaClinica = $this->modelo->listarHistoriaClinica();
        $this->modelo->setIdHistoriaClinica($idHistoriaClinica[0]['idHistoriaClinica']);
        
        //Inserta el episodio con los datos enviados
        $registro = $this->modelo->insertarEpisodio();
        
        
        //Diagnostico-----------------------------------------------------------
        //lista los datos del episodio anteriormente creado
        $idEpisodio = $this->modelo->listarEpisodio();
        
        //si los datos enviados son diferente a vacio
        if (!empty($_POST['cmbEnfermedad']) || !empty($_POST['txfDescripcionDiagnostico'])) {
            
            $this->modelo->setDescripcionDiagnostico($_POST['txfDescripcionDiagnostico']);
            $this->modelo->setIdEnfermedad($_POST['cmbEnfermedad']);
            $this->modelo->setIdEpisodio($idEpisodio[0]['idEpisodio']);
            //inserta el diagnostico con los datos y el id del episodio anterior
            $registro = $this->modelo->insertarDiagnostico();
        }
        //Orden-----------------------------------------------------------------
        //si los datos enviados son diferente a vacio
        if (isset($_POST['fechaOrden']) || isset($_POST['cantOrden']) || isset($_POST['observacionOrden']) || isset($_POST['tipoOrden'])) {
            //captura los datos enviados desde ordenes en variables
            $fechaOrden = $_POST['fechaOrden'];
            $cantOrden = $_POST['cantOrden'];
            $observacionOrden = $_POST['observacionOrden'];
            $tipoOrden = $_POST['tipoOrden'];
            
            // 
            for ($i = 0; $i < count($fechaOrden); $i++) {
                $this->modelo->setFechaHoraOrden($fechaOrden[$i]);
                $this->modelo->setCantidadOrden($cantOrden[$i]);
                $this->modelo->setObservacionesOrden($observacionOrden[$i]);
                $this->modelo->setIdTipoOrden($tipoOrden[$i]);
                $registro = $this->modelo->insertarOrden();
            }
        }
        //Formula--------------------------------------------------------------
        if (isset($_POST['idMedicamento']) || isset($_POST['cantMedicamento']) && !empty($_POST['txfObservacionesFormula'])) {
            $this->modelo->setObservacionesFormulaMedica($_POST['txfObservacionesFormula']);
            $this->modelo->insertarFormulaMedica();
            $idFormula = $this->modelo->listarFormulaMedica();
            $this->modelo->setIdFormulaMedica($idFormula[0]['idFormulaMedica']);
            $idMedicamento = $_POST['idMedicamento'];
            $cantMedicamento = $_POST['cantMedicamento'];
            $dosis = $_POST['dosis'];
            for ($f = 0; $f < count($idMedicamento); $f++) {
                $this->modelo->setIdMedicamentoFormula($idMedicamento[$f]);
                $this->modelo->setCantidadMedicamento($cantMedicamento[$f]);
                $this->modelo->setDosificacionMedicamento($dosis[$f]);
                $registro = $this->modelo->insertarMedicamentoFormula();
            }
        }
        $this->modelo->citaMedicaAtendida();
        if ($registro) {
            $datos['mensaje'] = "Se inserto el episodio correctamente";
            
        } else {
            $datos['mensaje'] = "No se inserto el episodio";
        }
        Vista::mostrar('citasMedicas', $datos);
    }

    }

public function editarConsulta() {
        
            if ($_POST['btnGrabarConsulta']){
               
               $datos['titulo'] = "Citas Medicas";
                //Episodio------------------------------------------------------
                //Envia los datos al modelo mediante sets
                $this->modelo->setIdEpisodio($_POST['idEpisodio']); //Agregar a la vista
                $this->modelo->setFechaHoraAtencion($_POST['txfFechaHora']);
                $this->modelo->setPesoEpisodio($_POST['txfPeso']);
                $this->modelo->setTemperaturaEpisodio($_POST['txfTemperatura']);
                $this->modelo->setPresionArterialEpisodio($_POST['txfPresion']);
                $this->modelo->setAnamnesisEpisodio($_POST['txfAnamnesis']);
                $this->modelo->setExploracionEpisodio($_POST['txfExploracion']);
                $this->modelo->setIdCitaMedica($_POST['idCitaMedica']); //Comprobar si la vista lo envia
                $this->modelo->setIdHistoriaClinica($_POST['idHistoriaClinica']); //Agregar en la vista
                //Edita el episodio con los datos enviados
                $registro = $this->modelo->editarEpisodio();
                
               //Diagnostico----------------------------------------------------
                //si los datos enviados son diferente a vacio
                if (!empty($_POST['cmbEnfermedad']) || !empty($_POST['txfDescripcionDiagnostico'])) {
                    $this->modelo->setDescripcionDiagnostico($_POST['txfDescripcionDiagnostico']);
                    $this->modelo->setIdEnfermedad($_POST['cmbEnfermedad']);
                    //$this->modelo->setIdEpisodio();
                    
                    //Edita el diagnostico 
                    $registro = $this->modelo->editarDiagnostico();
                }
                //Orden---------------------------------------------------------
                //Realizar un crud tradicional
                
                
                //Formula-------------------------------------------------------
                //si los datos enviados son diferente a vacio
                if (isset($_POST['txfObservacionesFormula'])){
                    $this->modelo->setObservacionesFormulaMedica($_POST['txfObservacionesFormula']);
                    $this->modelo->setIdFormulaMedica($_POST['idFormulaMedica']); //Agregar a la vista
                    $registro = $this->modelo->editarFormulaMedica();
                }
                //Medicamentos---------------------------------------------------
                //Realizar un crud tradicional 
               
                if ($registro) {
                    $datos['mensaje'] = "Se edito la consulta correctamente";
                } else {
                    $datos['mensaje'] = "No se edito la consulta";
                }        
                Vista::mostrar('editarConsulta',$datos);
                
            }else{
                $this->modelo->setIdCitaMedica($_POST['idCitaMedica']);
                $datos['episodio'] = $this->modelo->listarEpisodio();
                $this->modelo->setIdEpisodio($datos['episodio'][0]['idEpisodio']);
                $datos['diagnostico'] = $this->modelo->listarDiagnostico();
                $datos['formula'] = $this->modelo->listarFormulaMedica();
                $datos['titulo']= "Editar Consulta";
                $datos['citaMedica'] = $_POST['idCitaMedica'];
                Vista::mostrar('editarConsulta',$datos);
            }
        
    }
    public function listarConsulta() {
        if ($_POST){
        $this->modelo->setIdCitaMedica($_POST['idCitaMedica']);
        $this->modeloCitas->setIdCitaMedica($_POST['idCitaMedica']);
        $datos['citaMedica']= $this->modeloCitas->listarIdCitaMedica();
        //consulta el episodio asociado al id cita medica
        
        $this->modeloBenficiario->setIdBeneficiario($_POST['idBeneficiario']);
        $datos['beneficiario']= $this->modeloBenficiario->listarIdBeneficiario();
        
        $this->modeloAgenda->setIdAgendaMedica($_POST['idAgendaMedica']);
        $datos['empleado'] = $this->modeloAgenda->listarAgendaDatosEmpleado();
        
        $datos['episodio'] = $this->modelo->listarEpisodio();
        $this->modelo->setIdEpisodio($datos['episodio'][0]['idEpisodio']);
        
        $datos['diagnostico'] = $this->modelo->listarDiagnostico();
        $datos['formula'] = $this->modelo->listarFormulaMedica();
        
        
        $datos['titulo']= "Consulta";
        Vista::mostrar('mostrarConsulta',$datos);
        }
        else{
            header('location: consulta');
        }
    }
    
    public function listarOrdenes (){
        $this->modelo->setIdEpisodio($_POST['idEpisodio']);
        echo json_encode($this->modelo->listarOrdenes());
    }
    
    public function insertarOrden (){
    
        if ($_POST){
            $this->modelo->setFechaHoraOrden($_POST['txfFechaHoraOrden']);
            $this->modelo->setCantidadOrden($_POST['txfCantidadOrden']);
            $this->modelo->setObservacionesOrden($_POST['txfObservacionOrden']);
            $this->modelo->setIdTipoOrden($_POST['cmbTipoOrden']);
            $this->modelo->setIdEpisodio($_POST['idEpisodio']); 
            $registro = $this->modelo->insertarOrden();
            
            if($registro){
                $datos['mensaje']="Se inserto la orden";
            }else {
                $datos['mensaje']="no se inserto la orden";
            }
            
            $this->modelo->setIdCitaMedica($_POST['idCitaMedica']);
            $datos['episodio'] = $this->modelo->listarEpisodio();
            $this->modelo->setIdEpisodio($datos['episodio'][0]['idEpisodio']);
            $datos['diagnostico'] = $this->modelo->listarDiagnostico();
            $datos['formula'] = $this->modelo->listarFormulaMedica();
            $datos['titulo']= "Editar Consulta";
            $datos['citaMedica'] = $_POST['idCitaMedica'];
            
            Vista::mostrar('editarConsulta',$datos);
            
            
        }else {
            header('location: consulta');
        }
            
            //echo "fecha: ". $_POST['txfFechaHoraOrden']. "<br>";
            //echo "cantidad: ". $_POST['txfCantidadOrden']. "<br>";
            //echo "observaciones: ". $_POST['txfObservacionOrden']. "<br>";
            //echo "tipo orden: ". $_POST['cmbTipoOrden']. "<br>";
            //echo "Id episodio: ". $_POST['idEpisodio']. "<br>";
            
        
    }
    
    
    public function eliminarOrden (){
        if ($_POST){
            $this->modelo->setIdOrden($_POST['idOrden']); //Agregar a la vista
            $registro = $this->modelo->eliminarOrden();
            
            if($registro){
                $datos['mensaje']="Se edito la orden";
            }else {
                $datos['mensaje']="no se edito la orden";
            }
            
            $this->modelo->setIdCitaMedica($_POST['idCitaMedica']); //Agrega a la vista // Enviar desde el controlador
            $datos['episodio'] = $this->modelo->listarEpisodio();
            $this->modelo->setIdEpisodio($datos['episodio'][0]['idEpisodio']);
            $datos['diagnostico'] = $this->modelo->listarDiagnostico();
            $datos['formula'] = $this->modelo->listarFormulaMedica();
            $datos['titulo']= "Editar Consulta";
            $datos['citaMedica'] = $_POST['idCitaMedica'];
            
            Vista::mostrar('editarConsulta',$datos);
            
        }
    }
    
    
    public function listarMedicamentos (){
        $this->modelo->setIdFormulaMedica($_POST['idFormula']);
        echo json_encode($this->modelo->listarMedicamentosFormula());
    }
    public function insertarMedicamento (){
        if($_POST){
            
            $this->modelo->setIdFormulaMedica($_POST['idFormula']); //Comprobar en la vista
            $this->modelo->setIdMedicamentoFormula($_POST['cmbMedicamento']);
            $this->modelo->setCantidadMedicamento($_POST['txfCantidadedicamento']);
            $this->modelo->setDosificacionMedicamento($_POST['txfDosis']);
            $registro = $this->modelo->insertarMedicamentoFormula();
            
            
            if($registro){
                $datos['mensaje']="Se inserto el medicamento";
            }else {
                $datos['mensaje']="no se inserto el medicamento";
            }
            
            $this->modelo->setIdCitaMedica($_POST['idCitaMedica']);
            $datos['episodio'] = $this->modelo->listarEpisodio();
            $this->modelo->setIdEpisodio($datos['episodio'][0]['idEpisodio']);
            $datos['diagnostico'] = $this->modelo->listarDiagnostico();
            $datos['formula'] = $this->modelo->listarFormulaMedica();
            $datos['titulo']= "Editar Consulta";
            $datos['citaMedica'] = $_POST['idCitaMedica'];
            
            Vista::mostrar('editarConsulta',$datos);
            
            
        }else {
            header('location: consulta');
        }
    }
    
    
    public function eliminarMedicamento (){}
}