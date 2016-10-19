<?php
	global $glo_objViewAnali, $glo_objModelAnali, $temp;
 $temp =0;
 session_start();
//$_SESSION["pk_proceso"]=1;
//$_SESSION["pk_usuario"]=9;

mainGeneral();
jsGeneral();


global $glo_objViewAnali, $glo_objModelAnali, $arrFactor, $temp;

$temp=0;
        
if(isset($_SESSION["PLM_IdFactor"]))
{
    unset($_SESSION["PLM_IdFactor"]);                
}

$arrInfo = $glo_objModelAnali->buscarProceso($_SESSION["pk_proceso"],$_SESSION["pk_usuario"]);
if(isset($arrInfo[0][0]))
{

    $_SESSION["plm_facultad"]=$arrInfo[0];
    $_SESSION["plm_programa"]=$arrInfo[1];
    $_SESSION["plm_sede"]=$arrInfo[2];
    $_SESSION["plm_director"]=$arrInfo[4];
    $_SESSION["plm_periodo"]=$arrInfo[3];
    

    $glo_objViewAnali->mostrarInfo($_SESSION["plm_facultad"], $_SESSION["plm_programa"],$_SESSION["plm_sede"],$_SESSION["plm_director"],$_SESSION["plm_periodo"]);

    //busca todos los factores
    $arrFactor[][]=array();
    $arrFactor = $glo_objModelAnali->buscaFactor();
    $floCal = 0;
    $temp=0;
    $arrCalFactor[][]=array();
    $arrCarac[] =array();
    $arrAspectos[] =array();
    $datos[] =array();
    $resultados_tabla[] =array();

    require_once('../Modelo/PLM_PrincipalAnalisis_Modelo.php');
    $instancia  = new Analisis;

    foreach ($arrFactor as &$value) {
        $datos =  $instancia->obtenerDatosPonderacionFactor($value[0], $_SESSION["pk_proceso"]);

        $tamaño = count($datos);
        $promedio1 = 0;
        $promedio2 = 0;
        $promedio_modulo5 = 0;
        $promedio_modulo6 = 0;
        $promedio = 0;

        if($tamaño == 0){
            // $promedio  = 0.00;
            // $promedio_modulo5 = 0.00;
            // $promedio_modulo6 = 0.00;
            $glo_objViewAnali->mensaje("EL PROCESO ACTUAL NO SE HA CONSOLIDADO!");

        }else if($tamaño == 1){

            $promedio = $datos[0]['calificacion'];
            if($datos[0]['fk_modulo'] == 5){
                $promedio_modulo5 = $promedio;
            }else{
                $promedio_modulo6 = $promedio;
            }

        }else if($tamaño == 2){

            $promedio1 = $datos[0]['calificacion'] != NULL ? $datos[0]['calificacion']  : 0 ;
            $promedio2 = $datos[1]['calificacion'] != NULL ? $datos[1]['calificacion']  : 0 ;

            if($datos[0]['fk_modulo'] == 5){
                $promedio_modulo5 = $promedio1;
            }else{
                $promedio_modulo6 = $promedio1;
            }


            if($datos[1]['fk_modulo'] == 5){
                $promedio_modulo5 = $promedio2;
            }else{
                $promedio_modulo6 = $promedio2;
            }

            $resultados_promedio = $promedio1 + $promedio2;
            $promedio = $resultados_promedio / 2;

        }

        //$promedio = number_format ($promedio ,2);

        $resultados_carc = array(
            'factor' => $value[5],
            'valor_modulo_5' => $promedio_modulo5,
            'valor_modulo_6' => $promedio_modulo6,
            'promedio' => $promedio,
        );


        array_push($resultados_tabla, $resultados_carc);

    }
    require_once("../Vista/PLM_AnalisisResultadosFactor_Vista.php");
}
else
{
    $glo_objViewAnali->mensaje("NO HAY PROCESOS PARA CONSOLIDAR!");
}


//aqui se hace la referencia a las clases modelo y vista
//para poder tener acceso a la base de datos y a la interface
function mainGeneral(){
    global $glo_objViewAnali, $glo_objModelAnali;
    
    include('../Modelo/PLM_PrincipalAnalisis_Modelo.php');
    include('../Vista/PLM_PrincipalAnalisis_Vista.php'); 
    
    $glo_objViewAnali = new AnalisisFactor();
    $glo_objModelAnali = new  Analisis(); 
    $glo_objModelAnali->conectar(); 
}

//se establece la relación con los conponentes de
//la interface y las funciones de jquery
function jsGeneral(){
    ?>
    <script src="../Js/PLM_Analisis.js" type="text/javascript"></script>  
    <script src="../Js/PLM_paginador.js" type="text/javascript"></script> 
    <script src="../Js/chart.min.js" type="text/javascript"></script>
    <script src="../Js/Chart.js" type="text/javascript"></script>   
    <link rel="stylesheet" href="../Css/PLM_Estilos.css"/> 
    <?php
}
?>