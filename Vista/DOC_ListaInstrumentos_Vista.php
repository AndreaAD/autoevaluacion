<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../Complementos/DataTables-1.10.12/media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="../Complementos/DataTables-1.10.12/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="../Css/DOC_Estilos.css">
<link rel="stylesheet" href="../Complementos/font-awesome/css/font-awesome.min.css">
<script type="text/javascript" src="../Js/DOC_Selectores.js"></script>
<script>
    $(function(e){
        $('#tabla_instrumentos').DataTable();
    })


</script>
<div class="bloque una-columna">
    <div class="titulo-bloque texto-izquierda">
        <h2 class="icon-quill">Lista de instrumentos</h2>
    </div>
    <div class="div_formularios">
        <div class="row">
            <div class="col">
                <label class="label_caja">Seleccione el grupo de interes</label>
            </div>
            <div class="col_2">
                <select name="lista" id="lista_grupos">
                    <option value="0">Seleccionar</option>
                    <?php
                        foreach ($grupos as $value) {
                            echo '<option value="'.$value['pk_grupo_interes'].'">'. $value['nombre'].'</option>';  
                        }
                    ?>
                </select><br><br><br>
            </div>
        </div>        
        <div class="row">
            <br><br>
        </div> 
        <div class="row" style="width:96%;">
            <div class="col-md-12">
                <table id="tabla_instrumentos" class="display select" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th style="width:30px;">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>