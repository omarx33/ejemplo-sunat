<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>pagina</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

</head>

<body>
  <button class="btn-consulta btn btn-primary">consulta</button>



  <div class="modal fade" id="consulta-sunat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <label for="">Ruc/dni</label>
              <input type="text" name="" id="numero" class=" form-control" value="">
            </div>
            <div class="col-md-6">
              <div class="" style="padding:12px">

              </div>
              <button type="button" class="btn btn-sunat btn-primary btn-block">Consulta</button>
            </div>
          </div>
          <label for="">ruc</label>
          <input type="text" name="" class="ruc form-control">

          <label for="">razon social</label>
          <input type="text" name="" class="razon_social form-control">

          <label for="">direccion</label>
          <input type="text" name="" class="direccion form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->



</body>

</html>

<script>
  $(document).on('click', '.btn-consulta', function() {


    $("#consulta-sunat").modal('show')
  });




  $(document).on('click', '.btn-sunat', function(e) {
    numero = $("#numero").val();


    if (numero == '') {
      swal({
        title: "lista Vacio",
        text: "ingrese ruc o dni",
        type: "info",
        timer: 3000,
        showConfirmButton: false
      });
    }

    $.ajax({
      url: "../source/cliente.php",
      type: "POST",
      data: {
        "numero": numero
      },
      dataType: "JSON",
      success: function(data) {
        if (data.success == true) {
          swal({
            title: "se encontro la consulta",
            text: "felicidades",
            type: "success",
            timer: 3000,
            showConfirmButton: false
          });
          $(".ruc").val(data.result.ruc);
          $(".razon_social").val(data.result.razon_social);
          $(".direccion").val(data.result.direccion);
        } else {
          swal({
            title: "error",
            text: data.message,
            type: "error",
            timer: 3000,
            showConfirmButton: false
          });
          $(".ruc").val("");
          $(".razon_social").val("");
          $(".direccion").val("");
        }
      }
    });

    e.preventDefault();
  });
</script>
