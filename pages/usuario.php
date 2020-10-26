<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <title>testt</title>
  </head>
  <body>
  <br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table id="consulta" class="table table-bordered table-hover">
        <thead>
          <tr>
            <td>id</td>
            <td>nombres</td>
            <td>direccion</td>
            <td>ACCIONES</td>
          </tr>
        </thead>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal-agregar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="" class="id" value="" >
        <label for="">nombres</label>
        <input type="text" name="" class="nombre form-control" value="">
        <label for="">direccion</label>
        <input type="text" name="" class="direccion form-control" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<script>
function loadData(){
  $(document).ready(function(){
    $("#consulta").DataTable({
  "destroy": true,
  "bAutoWidth": false,
  "deferRender":true,
  "sAjaxSource":"../source/usuario.php?op=1",
  "aoColumns":[
{mData : "id"},
{mData : "nombre"},
{mData : "direccion"},
{mData : null, render : function(data){
  acciones = '<button data-id="'+data.id+'" class="btn-edit btn btn-primary btn-sm"><i class="fa fa-edit"></></button>';
  return acciones;
}}

  ]

    });
  });
}
loadData();


$(document).on('click','.btn-edit',function(){
id =$(this).data("id");
$(".id").val(id);
url = '../source/usuario.php?op=3';
$.getJSON(url,{"id":id},function(data){
  $(".nombre").val(data.nombre);
    $(".direccion").val(data.direccion);
});

$("#modal-agregar").modal('show');
});



</script>




  </body>
</html>
