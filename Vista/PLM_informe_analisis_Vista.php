<meta charset="UTF-8">
<!-- <link rel="stylesheet" type="text/css" href="../Complementos/DataTables-1.10.12/media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="../Js/jquery-1.9.1.js"></script>
<script type="text/javascript" language="javascript" src="../Complementos/DataTables-1.10.12/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="../Complementos/DataTables-1.10.12/extensions/Buttons/js/dataTables.buttons.js"></script>
<link rel="stylesheet" type="text/css" href="../Complementos/DataTables-1.10.12/extensions/Buttons/css/buttons.dataTables.css">
<script type="text/javascript" language="javascript" src="../Complementos/DataTables-1.10.12/extensions/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="../Complementos/DataTables-1.10.12/extensions/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="../Complementos/DataTables-1.10.12/extensions/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="../Complementos/DataTables-1.10.12/extensions/Buttons/js/buttons.html5.js"></script> -->

<!-- <link rel="stylesheet" type="text/css" href="../Css/DOC_Estilos.css">
<link rel="stylesheet" href="../Complementos/font-awesome/css/font-awesome.min.css">
<script type="text/javascript" src="../Js/DOC_Selectores.js"></script>
<script type="text/javascript" src="../Js/DOC_Instrueval.js"></script> -->

<div id="div_formulario_principal">
    <div class="bloque una-columna">
        <div class="titulo-bloque texto-izquierda">
            <h2 class="icon-quill">Informe análisis causal</h2>
        </div>
        <div class="div_formularios">    
            <div class="row">
                <br><br>
            </div> 
            <div class="row tabla_ins" style="width:96%;display:none;">
                <div class="col-md-12">
                    <table id="tabla_instrumentos">
                        <thead>
                            <th>Descripción</th>
                            <th>Modificar</th>
                            <th>Cambiar Estado</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="formulario_secundario"></div>
<div class="errores"></div>
    <div id="div_emergente" class="fondo_emergente">
        <div class="emergente">
            <div data-role="contenido" style="text-align:center;"></div>
            <div data-role="botones"></div>
            <span title="cerrar" data-rol="cerrar"> x </span>
        </div>
    </div>
</div>