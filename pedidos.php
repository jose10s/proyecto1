<?php
	session_start();
  if (!isset($_SESSION['codusuario'])) {
    header('location: ../tienda.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Clinica de Fisioterapia Fidisa</title>
    <link rel="shortcut icon" href="images/icono.ico">
    <script src="https://kit.fontawesome.com/d4bf9df0e8.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tienda.css">
  </head>
  <body>
    <header class="header">
      <div class="container logo-nav">
				<a href="index.html" class="logo">
          <img src="images/icono3.png" alt="">
        </a>
				<nav class="navigation">
          <ul class=>
            <li> <a href="index.html">Principal</a> </li>
            <li> <a href="conocenos.html">Conócenos</a> </li>
            <li> <a href="tarifas.html">Tarifas</a> </li>
            <li> <a href="hacemos.html">¿Qué hacemos?</a> </li>
            <li> <a href="contacto.html">Contacto</a> </li>
            <li> <a href="https://connect.shore.com/widget/fidisa?locale=es">Reserva</a> </li>
            <li> <a href="tienda.php">Tienda</a> </li>
          </ul>
        </nav>
      </div>
  </header>
  <div class="body">
    <div class="">
      <h1>Bienvenido a la tienda</h1>
      <div class="header-tienda">
       <div class="opciones">
				<?php
					if (isset($_SESSION['codusuario'])) {
						echo "<h4>".$_SESSION['nomusuario']."</h4>";
						echo '<div class="opciones-i"><a href="carrito.php"><i class="fa-solid fa-cart-shopping" title="Carrito"></i></a></div>';
						echo '<div class="opciones-i"><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" title="Salir"></i></a></div>';
					}else {
					?>
				<div class="opciones-i">
					<a href="registro.php">
	          <i class="fa-solid fa-user" title="Registrate"></i>
					</a>
	      </div>
	      <div class="opciones-i">
					<a href="login.php">
	         <i class="fa-solid fa-arrow-right-to-bracket" title="Login"></i>
					</a>
	      </div>
				<?php
					}
				 ?>
       </div>
      </div>
    </div>
    <div class="main-content">
      <div class="page-content">
        <h3>Mis pedidos</h3>
        <div class="pedidos" id="listado">
        </div>
        <input class="inputpedido" placeholder="Dirección" type="text" name="dirusuarioped" id="dirusuarioped" value="">
        <br>
        <input class="inputpedido" placeholder="Teléfono" type="text" name="telusuarioped" id="telusuarioped" value="">
        <br>
        <button type="button" name="button" onclick="finalizar_pedido()" >Finalizar pedido</button>
				<br>
				<button type="button" name="button"><a href="tienda.php"id="seguir">Seguir comprando</a>
				</button>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="container-footer">
			<div class="colum1">
        <h1>Donde estamos</h1>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.877740938687!2d-3.762690485107025!3d40.367235166573046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4189cba5181a69%3A0x14b80ea5ed5d4364!2sC.%20Pique%C3%B1as%2C%2021%2C%2028054%20Madrid!5e0!3m2!1ses!2ses!4v1653226717634!5m2!1ses!2ses" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      	<p>C/Piqueñas 21 <br>Madrid, 28054</p>
      </div>
      <div class="colum2">
        <h1>Contacto</h1>
        <p>Tel: +34 681173172</p>
        <p>Email: fidisaf@gmail.com</p>
      </div>
      <div class="colum3">
        <h1>Horario</h1>
        <p>Lunes a viernes</p>
        <p>9:30-13:30</p>
        <p>17:00-21:00</p>
        <p>Sábados y festivos</p>
        <p>10:00-14:00</p>
    </div>
    </div>
	</footer>
  <script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      url:'consultas/getpedidos.php',
      type:'POST',
      data:{},
      success:function(data){
        console.log(data);
				console.log("funciona");
        let html='';
        for (var i = 0; i < data.datos.length; i++) {
          html+=
          '<div class="item">'+
              '<div class="imagenpedido">'+
                  '<img src="images/'+data.datos[i].rutinapro+'" alt="">'+
              '</div>'+
              '<div class="detallepedido">'+
                  '<h3>'+data.datos[i].nompro+'</h3>'+
                  '<h4>'+data.datos[i].prepro+'</h4>'+
                  '<h4>'+data.datos[i].fecped+'</h4>'+
                  '<h4>'+data.datos[i].estado+'</h4>'+
                  '<h4>'+data.datos[i].dirusuarioped+'</h4>'+
									'<button class="boton-eliminar" onclick="eliminar_producto('+data.datos[i].codped+')">Eliminar producto</button>'+
              '</div>'+
            '</div>';
        }
        document.getElementById('listado').innerHTML=html;
      },
      error:function(err){
        console.error(err);
      }
    });
  });

	function eliminar_producto(codped){
		$.ajax({
			url:'consultas/eliminar.php',
			type:'POST',
			data:{
				codped:codped,
			},
			success:function(data){
				console.log(data);
				if (data.state) {
					window.location.reload();
				}else {
					alert(data.detail);
				}
			},
			error:function(err){
				console.error(err);
			}
		});
	}

  function finalizar_pedido(){
    let dirusuarioped=document.getElementById("dirusuarioped").value;
    let telusuarioped=$("#telusuarioped").val();
    if (dirusuarioped=="" || telusuarioped=="") {
      alert("introduzca datos de envío");
    }else {
      $.ajax({
        url:'consultas/confirmacion.php',
        type:'POST',
        data:{
          dirusuarioped:dirusuarioped,
          telusuarioped:telusuarioped
        },
        success:function(data){
          console.log(data);
          if (data.state) {
            window.location.href="carrito.php";
          }else {
            alert(data.detail);
          }
        },
        error:function(err){
          console.error(err);
        }
      });
    }
  }
  </script>
	<script>
	window.shoreBookingSettings = {
		themeColor: '#fc921f',
		textColor: '#ffffff',
		text: 'Reserva ahora',
		company: 'fidisa',
		locale: 'es',
		position: 'right',
		selectLocation: false,
	};
	</script>
	<script src="https://connect.shore.com/widget/booking.js"></script>
  </body>
</html>
