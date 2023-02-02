
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Laravel Challenge</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>


  </head>
  <body>
    <center><nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Productos</a>
      </li>
    </ul>
  </div>
</nav>
</center>
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Codigo del Producto</span>
                </div>
                <input type="text" class="form-control" id="product_key" name="producto_key">
              </div>
            </div>
            <div class="col">
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Descripcion</span>
                </div>
                <input type="text" class="form-control" id="notes" name="notes">
              </div>
            </div>
          </div>
        </div>
      </div>
        <table class="table" id="productos">
           <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Codigo del Producto</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Costo</th>
                <th scope="col">Precio</th>
              </tr>
            </thead>
           
              <tbody id="table_productos">

              </tbody>
              <tbody id="tablenotes">

              </tbody>
              <tbody id="tableproduct_key">

              </tbody>
            
          </table>
          
    </div>
  </section>

 
</main>
<script>
    $(document).ready(function () {
      $.ajax({
          type: 'get',
          url:  '{{URL::to('product_table')}}',
          data:  {},
          success: function (response) {
            console.log('Esta es la respuesta', response);
            if (response) {
              $('#table_productos').empty();
              $.each(response, function (key, value) {
							$('#table_productos').append("<tr>\
										<td>"+value.id+"</td>\
										<td>"+value.product_key+"</td>\
										<td>"+value.notes+"</td>\
                    <td>"+value.qty+"</td>\
                    <td>"+value.cost+"</td>\
                    <td>"+value.price+"</td>\
										</tr>");
						})
            }
          }
        });
    });
    $('#notes').keyup(function (e) { 
        

        let notes = $( this ).val();
        $.ajax({
          type: 'get',
          url:  '{{URL::to('notes')}}',
          data:  {notes: notes},
          success: function (response) {
            console.log('Esta es la respuesta', response);
            if (response) {
              $('#table_productos').empty();
              $.each(response, function (key, value) {
							$('#table_productos').append("<tr>\
										<td>"+value.id+"</td>\
										<td>"+value.product_key+"</td>\
										<td>"+value.notes+"</td>\
                    <td>"+value.qty+"</td>\
                    <td>"+value.cost+"</td>\
                    <td>"+value.price+"</td>\
										</tr>");
						})
            }
          }
        });
    });

    $('#product_key').keyup(function (e) { 
      
      let product_key = $( this ).val();
      $.ajax({
          type: 'get',
          url:  '{{URL::to('product_key')}}',
          data:  {product_key: product_key},
          success: function (response) {
            console.log('Esta es la respuesta', response);
            if (response) {
              $('#table_productos').empty();
              $.each(response, function (key, value) {
							$('#table_productos').append("<tr>\
										<td>"+value.id+"</td>\
										<td>"+value.product_key+"</td>\
										<td>"+value.notes+"</td>\
                    <td>"+value.qty+"</td>\
                    <td>"+value.cost+"</td>\
                    <td>"+value.price+"</td>\
										</tr>");
						})
            }
          }
        });
    });
</script>
  </body>
</html>
