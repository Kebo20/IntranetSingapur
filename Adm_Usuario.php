<div class="page-header"  style="background-color:#EFF3F8; margin:0">
	<h1><i class="menu-icon"><img src="imagenes/Menu/user.svg" style="border:0;"  height="25" width="25" ></i>
					<span id="Titulo" style="font-size:13px; font-weight:bold">CONFIGURACION DE USUARIO</span>

    </h1> 						          
										
 </div>


           
<input type="hidden" id="IdFilaUsu"  />
<input type="hidden" id="idvalor"  />

    <table class="table table-responsive table-bordered" style="margin:0"  >
       <thead>
          <tr >
             <Th class='center' width='10%'><b>Nro</b></Th>
             <Th class="center" width="40%"><b>Usuario</b></Th>
             <Th class="center" width="10%"><b>Login</b></Th>
             <Th class="center" width="15%"><b>Pass</b></Th>
             <Th class="center" width="10%"><b>Estado</b></Th>
            
          </tr>
       </thead>
       
    </table>
   <div class="bodycontainer scrollable">
        <table class="table table-bordered table-scrollable">
           <tbody id="IdCuerpoUsu" style="font-size:12px;"></tbody>  
        </table>
   </div>
  
  
  <div class="page-header"  style="background-color:#EFF3F8;padding-left:10px; padding-top:15px">
     <table width="100%">
       <tr>
          <td width="40%"><span class="input-icon" style="width:90%">
           <!--<input type="text" class="form-control" id="IdBuscar" style="width:30%" placeholder="Buscar Usuario .." onkeyup="javascript:LisUsu()"  /> -->
    
						<input type="text" id="IdBuscar" placeholder=" Buscar Usuario" class="form-control" 
                         onkeyup="javascript:LisUsu()" autocomplete="off"  />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span></td>
          <td width="50%"> <button type="button"  class="btn btn-primary" onclick="javascript:AbrirModalUsu()">Nuevo </button>
          &nbsp;&nbsp;<button type="button" id="IdDecJu" class="btn btn-primary" onclick="javascript:AbrirModalUdate()">Editar </button>
          </td>
       </tr>
     </table>	               								
 </div>
  
  
    <!--<div align="left" style="margin-top:7px; margin-left:10px;">
     <table width="100%">
       <tr>
       
       <td width="15%" >
       <button id="lightness" onclick="javascript:AbrirModalUsu()" >
       <img src="LIBRERIAS/IMAGENES/nuevo.jpg" style="border:0" height="15" width="15"  />&nbsp;Nuevo</button>&nbsp;&nbsp;
       <button id="lightness" onclick="javascript:AbrirModalUdate()">
       <img src="LIBRERIAS/IMAGENES/editar.png" style="border:0" height="15" width="15"  />&nbsp;Editar</button>&nbsp;&nbsp;
     
       </td> 
       </tr>
       </table>
    </div>-->

        
            
            
            
<div id="IdModalUsu" class="modal fade" role="dialog" >
 
   <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="color:#030">  <img src="imagenes/Menu/user.svg" height="30" width="30"  /> 
        &nbsp; INGRESE USUARIO </h4>
        
      </div>
    <div class="modal-body">
    <table  width="90%" style="font-size:13px; font-weight:bold;">
        <tr style='display:none'>
            <td>Id</td>
            <td><input name ="id_usu" type="text" id="id_usu" size="5" readonly="readonly" class="form-control"/></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><b>Usuario</b></td>
            <td><input name ="usuario" type="text" id="usuario" style="text-transform:uppercase" class="form-control" value=""></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><b>Login</b></td>
            <td><input name ="login" type="text" id="login" style="text-transform:uppercase" class="form-control" value=""></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><b>Contrase&ntilde;a</b></td>
            <td><input name ="pass" type="password" id="pass" style="text-transform:uppercase" class="form-control" value=""></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><b>Estado</b></td>
            <td> 
            <select id="id_cmb_est" class="form-control" style="height:35px">
                <option value="0" selected="selected"> Activado </option>
                <option value="1"> Desactivado </option>
            </select>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><b>Grupo Usuario</b></td>
            <td> 
            <select id="Tipo" class="form-control" style="height:35px" > </select>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
    </table>
 </div>
  <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Grabar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <button class="btn btn-white btn-info btn-bold" id='IdGrabarUsu' onclick="RegistrarUsuario()" ><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Grabar</button>
		<button class="btn btn-white btn-default btn-round"  data-dismiss="modal"><i class="ace-icon fa fa-times red2"></i>Cancelar</button>										
								
      </div>
        </div>
     </div>
 </div>


<script>
	$(document).ready(function(){
    $("#IdModalUsu").on('shown.bs.modal', function(){
        $(this).find('#usuario').focus();
    });
   });		   
function LisUsu(){
	var $buscar=$("#IdBuscar").val()
	$("#IdCuerpoUsu").html("<tr><td colspan='5'> Cargando ..</td></tr>");
    $.post('controlador/Cusuario.php',{accion:"LISTAR",buscar:$buscar},function(data){
	  $("#IdCuerpoUsu").html(data);$("#IdFilaUsu").val('')
     })  
 }

				 
function AbrirModalUsu(){
	LlenadoGrupoUsuario(0);
	$("#idvalor").val(1)
	$("#IdModalUsu").modal()
	limpiar_campos();
	//$("#id_cmb_est option[value="+2+"]").attr("selected",true); 
  }
function CerrarModal(){
	$("#IdModalUsu").modal("hide");
	
}  

				  
function PintarFila($id){
	 var $idfilaanterior=$("#IdFilaUsu").val()  
	 var $par=$idfilaanterior.split('_')
	 var $par_int=parseInt($par[1])
	// alert($par_int)
   if($par_int%2==0){
	   // alert("hola")
	  $("#"+$idfilaanterior).css({ 
		   "background-color":"#f5f5f5",
		   "color": "#000000"
		})
	}else{
	   $("#"+$idfilaanterior).css({
		   "background-color":"#FFFFFF",
		   "color": "#000000"
		})					   
	}
	$("#"+$id).css({
	   "background-color": "#438EB9",
	   "color": "#FFFFFF"
	 })
	$("#IdFilaUsu").val($id)	
	
	//$("#id_area_u").val($id)
	/*$("#txt_descrip_u").val('silva')*/
  }  
			 
			 
 function AbrirModalUdate(){
	 $("#idvalor").val(2)
	 var $ident = $("#IdFilaUsu").val()
     var $id=$("#"+$ident).attr("idusu")
	 var $nombre=$("#"+$ident).attr("nombre")
	 var $login=$("#"+$ident).attr("login")
	 var $pass=$("#"+$ident).attr("pass")
	 var $estado=$("#"+$ident).attr("estado")
	 var $idgrupo=$("#"+$ident).attr("idgrupo")
	 var $tipo=$("#"+$ident).attr("tip")
	 LlenadoGrupoUsuario($idgrupo)
	if($ident == ''){
		swal("Debe seleccionar un Registro", "Obligatorio", "warning");
		return false;
	}
	else{			
		$("#IdModalUsu").modal()	
		$("#id_usu").val($id)
		$("#usuario").val($nombre)
		$("#login").val($login)
		$("#pass").val($pass)
		$("#id_cmb_est").val($estado)
		$("#Tipo").val($tipo)
	}	
 }	 
function RegistrarUsuario(){
	//validar_data();
	var $valor=$("#idvalor").val();
	var $id = $("#id_usu").val();
	var $usuario = $("#usuario").val().toUpperCase();
	var $login = $("#login").val();
	var $pass = $("#pass").val();
    var $estado=$("#id_cmb_est").val();
	var $tipo=$("#Tipo").val();
	
	if ($usuario == ''){swal("Ingrese Usuario ..", "Campo Obligatorio", "warning");$("#usuario").focus();return false;}
	if ($login == ''){swal("Ingrese Login ..", "Campo Obligatorio", "warning");$("#login").focus();return false;}
	if ($pass == ''){swal("Ingrese Password ..", "Campo Obligatorio", "warning");$("#pass").focus();return false;}
	if($tipo==0){swal("Seleccione Grupo de Usuario ..", "Campo Obligatorio", "warning");return false;}
	$.post("controlador/Cusuario.php",{accion:'NUEVO',id:$id,usuario:$usuario,login:$login,pass:$pass,estado:$estado,valor:$valor,tipo:$tipo},function(data){
		if(data==2){swal("Usuario ya existe ..", "Error", "error"); return false;}
		if(data==1){$("#IdFilaUsu").val("");swal("Datos registrados Correctamente ..", "Felicitaciones", "success");LisUsu();CerrarModal(); return false;}
		if(data==0){swal("Datos no registrados Correctamente ..", "Error", "error"); return false;}
	})
	  
} 
			 	 
				 

function limpiar_campos(){
	$("#id_usu,#usuario,#login,#pass,#IdBuscar").val("");
	$("#id_cmb_est").val(2);$("#Tipo").val();
	
	}	
function LlenadoGrupoUsuario($id){
	$.post("controlador/Cusuario.php",{accion:'LLENAR_GRUPO',id:$id},function(data){
		$("#Tipo").html(data);
	})
 }		 
LisUsu("");



		  
</script>

<style>
  .bodycontainer { max-height: 340px; width: 100%; margin: 0; overflow-y: auto; height:340px; }
.table-scrollable { margin: 0; padding: 0; }
</style>
