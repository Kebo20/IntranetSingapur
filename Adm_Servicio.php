
<!--Empresa -->

<script src="js/Servicio.js"></script>
<div class="page-header"  style="background-color:#EFF3F8; margin:0">
    <h1><i class="menu-icon"><img src="imagenes/convenio.png" style="border:0;"  height="25" width="25" ></i>
        <span id="Titulo" style="font-size:13px; font-weight:bold">CONFIGURACION DE SERVICIOS</span>

    </h1> 						          

</div>


<input type="hidden" id="IdFilaUsu"  />
<input type="hidden" id="idvalor"  />
<br>
<div class="card-text">
    <a class="btn btn-success text-white" data-toggle="modal" data-target="#ModalRegistrar" >Añadir</a>
</div>
<div class="bodycontainer scrollable ">
    <table id="table-servicio" class="table table-responsive table-bordered text-center" style="margin:0" >
        <thead> 
            <tr >
                <Th class='center' width=''>N°</Th>
                <Th class="center" width="">Nombre</Th>
                <Th class="center" width="">Estado</Th>
                <Th class="center" width="">Detalles</Th>
                <Th class="center" width="">Acciones</Th>
            </tr>
        </thead>
        <tbody></tbody>

    </table>



</div>


<!--MODAL ELIMINAR -->                              
<div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4  class="modal-title">Eliminar servicio</h4>
            </div>
            <div class="modal-body">
                <p >¿Está seguro de eliminar esta servicio?</p>
            </div>

            <div class="modal-footer">
                <form id="formEliminar">
                    <input type="hidden" name="id" id="eliminar">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                    <button type="submit"  class="btn  btn-danger waves-effect">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!--Modal Registrar -->          
<div id="ModalRegistrar" class="modal fade" role="dialog" >
    <form id="formRegistrar" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="font-size:13px; font-weight:bold; color:#2679B5">  
                        <img src="imagenes/convenio.png" height="30" width="30"  /> 
                        &nbsp; INGRESE SERVICIO </h4>

                </div>
                <div class="modal-body">

                    <table  width="90%" style="font-size:13px; font-weight:bold;">

                        <tr>
                            <td><b>Nombre</b></td>
                            <td><input name ="nombre"  type="text" id="rnombre" required  style="text-transform:uppercase" class="form-control" value=""></td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>


                        <tr>
                            <td><b>Estado</b></td>
                            <td> 
                                <select id="restado" class="form-control" required  style="height:35px">
                                    <option value="0">ACTIVO</option>
                                    <option value="1">DESACTIVO</option>
                                </select>


                            </td>
                        </tr>

                    </table>

                </div>
                <div class="modal-footer" >

                    <button class="btn btn-white btn-info btn-bold" id='IdGrabarUsu' type="submit" >
                        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Grabar</button>
                    <button class="btn btn-white btn-default btn-round" type="reset"  data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>Cancelar</button>										
                </div>
            </div>
    </form>
</div>
</div>


<!--Modal Editar -->          
<div id="ModalEditar" class="modal fade" role="dialog" >
    <form id="formEditar" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="font-size:13px; font-weight:bold; color:#2679B5">  
                        <img src="imagenes/convenio.png" height="30" width="30"  /> 
                        &nbsp; EDITAR SERVICIO </h4>

                </div>
                <div class="modal-body">

                    <table  width="90%" style="font-size:13px; font-weight:bold;">

                        <tr style='display:none'>
                            <td>Id</td>
                            <td><input name ="id_gru" type="text" id="eid" size="5"  class="form-control"/></td>
                        </tr>


                        <tr ><td>&nbsp;</td></tr>

                        <tr>
                            <td><b>Nombre</b></td>
                            <td> 
                                <input id="enombre" class="form-control"   style="height:35px">


                            </td>
                        </tr>
                        <tr ><td>&nbsp;</td></tr>

                        <tr>
                            <td><b>Estado</b></td>
                            <td> 
                                 <select id="eestado" class="form-control" required  style="height:35px">
                                    <option value="0">ACTIVO</option>
                                    <option value="1">DESACTIVO</option>
                                </select>
                            </td>
                        </tr>


                    </table>

                </div>
                <div class="modal-footer" >

                    <button class="btn btn-white btn-info btn-bold" id='IdGrabarUsu' type="submit" >
                        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Grabar</button>
                    <button class="btn btn-white btn-default btn-round" type="reset"  data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>Cancelar</button>										
                </div>
            </div>
    </form>
</div>
</div>






<style>
    .bodycontainer { max-height: 340px; width: 100%; margin: 0; overflow-y: auto; height:340px; }
    .table-scrollable { margin: 0; padding: 0; }
</style>
