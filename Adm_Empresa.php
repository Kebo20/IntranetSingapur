
<?php include("cado/ClaseUbigeo.php"); ?>

<!--Empresa -->

<script src="js/Empresa.js"></script>
<div class="page-header"  style="background-color:#EFF3F8; margin:0">
    <h1><i class="menu-icon"><img src="imagenes/convenio.png" style="border:0;"  height="25" width="25" ></i>
        <span id="Titulo" style="font-size:13px; font-weight:bold">CONFIGURACION DE EMPRESAS</span>

    </h1> 						          

</div>



<input type="hidden" id="IdFilaUsu"  />
<input type="hidden" id="idvalor"  />
<br>
<div class="card-text">
    <a class="btn btn-success text-white" data-toggle="modal" data-target="#ModalRegistrar" >Añadir</a>
</div>
<div class="bodycontainer scrollable ">
    <table id="table-empresa" class="table table-responsive table-bordered text-center" style="margin:0" >
        <thead> 
            <tr >
                <Th class='center' width=''>N°</Th>
                <Th class="center" width="">Empresa</Th>
                <Th class="center" width="">Ruc</Th>
                <Th class="center" width="">Direcci&oacute;n</Th>
                <Th class="center" width="">Teléfono</Th>
                <Th class="center" width="">Password</Th>
              
                <Th class="center" width="">Representante</Th>
                <Th class="center" width="">D.N.I</Th>
                <Th class="center" width="">Celular</Th>
                 <Th class="center" width="">Estado</Th>
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
                        <h4  class="modal-title">Eliminar empresa</h4>
                    </div>
                    <div class="modal-body">
                        <p >¿Está seguro de eliminar esta empresa?</p>
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
                        &nbsp; INGRESE EMPRESA </h4>

                </div>
                <div class="modal-body">

                    <table  width="90%" style="font-size:13px; font-weight:bold;">

                        
                        <tr>
                            <td><b>RUC</b></td>
                            <td><input maxlength="11"  id="rruc" required size="5" class="form-control"/></td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td><b>Raz&oacute;n Social</b></td>
                            <td><input name ="nombre" readonly type="text" id="rnombre" required maxlength="11" style="text-transform:uppercase" class="form-control" value=""></td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td><b>Direcci&oacute;n</b></td>
                            <td><Textarea name ="Dire" readonly type="text" id="rdireccion" required style="text-transform:uppercase" class="form-control" value=""></Textarea></td>
                
        </tr>
   
        <tr ><td>&nbsp;</td></tr>
        
         <tr>
            <td><b>Estado</b></td>
            <td> 
            <input id="restado" class="form-control" required readonly style="height:35px">
                
            
            </td>
        </tr>
        <tr> <td>&nbsp;</td></tr>
       
       
       <tr>
           <td><b>Teléfono</b></td>
           <td> 
           <input id="rtelefono" class="form-control" maxlength="9" required style="height:35px">
               
           
           </td>
       </tr>
               <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>Representante</b></td>
            <td> 
            <input id="rrepresentante" class="form-control" style="height:35px">
                
            
            </td>
        </tr>
               <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>D.N.I</b></td>
            <td> 
            <input id="rdni" class="form-control" maxlength="8" style="height:35px">
                
            
            </td>
        </tr>
               <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>Celular(representante)</b></td>
            <td> 
            <input id="rcell" class="form-control" maxlength="9" style="height:35px">
                
            
            </td>
        </tr>
        <tr> <td>&nbsp;</td></tr>
        <tr>
            <td><b>Contrase&ntilde;a Web</b></td>
            <td><input type="text" id="rpass" style="text-transform:uppercase" required class="form-control" value="" maxlength="11"></td>
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
                        &nbsp; EDITAR EMPRESA </h4>

                </div>
                <div class="modal-body">

                    <table  width="90%" style="font-size:13px; font-weight:bold;">

                        <tr style='display:none'>
                            <td>Id</td>
                            <td><input name ="id_gru" type="text" id="eid" size="5" readonly="readonly" class="form-control"/></td>
                        </tr>
                        <tr>
                            <td><b>RUC</b></td>
                            <td><input  id="eruc" maxlength="11" required size="5" class="form-control"/></td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td><b>Raz&oacute;n Social</b></td>
                            <td><input name ="nombre" readonly type="text" id="enombre" style="text-transform:uppercase" class="form-control" value=""></td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td><b>Direcci&oacute;n</b></td>
                                <td><Textarea name ="Dire" readonly type="text" id="edireccion" style="text-transform:uppercase" class="form-control" ></Textarea></td>
                
        </tr>
   
        <tr ><td>&nbsp;</td></tr>
     
        <tr>
            <td><b>Estado</b></td>
            <td> 
            <input id="eestado" class="form-control"  readonly style="height:35px">
                
            
            </td>
        </tr>
        <tr> <td>&nbsp;</td></tr>
       
       
       <tr>
           <td><b>Teléfono</b></td>
           <td> 
           <input id="etelefono" class="form-control" maxlength="9" style="height:35px">
               
           
           </td>
       </tr>
               <tr> <td>&nbsp;</td></tr>
        <tr>
            <td><b>Representante</b></td>
            <td> 
            <input id="erepresentante" class="form-control" style="height:35px">
                
            </td>
        </tr>
               <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>D.N.I</b></td>
            <td> 
            <input id="edni" class="form-control" maxlength="9" style="height:35px">
                
            </td>
        </tr>
               <tr> <td>&nbsp;</td></tr>
        <tr>
            <td><b>Celular(representante)</b></td>
            <td> 
            <input id="ecell" class="form-control"  maxlength="9" style="height:35px">
                
        </tr>
<tr> <td>&nbsp;</td></tr>
        <tr>
            <td><b>Contrase&ntilde;a Web</b></td>
            <td><input type="text" id="epass" style="text-transform:uppercase" class="form-control" value="" maxlength="11"></td>
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




<script>



                </script>
            

            
            
<style>
    .bodycontainer { max-height: 340px; width: 100%; margin: 0; overflow-y: auto; height:340px; }
    .table-scrollable { margin: 0; padding: 0; }
</style>
