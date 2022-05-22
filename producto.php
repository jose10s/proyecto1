<?php
	session_start();
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
        <section>
          <div class="principal">
            <img id="imgproducto" src="images/bosu.jpg" alt="">
          </div>
          <div class="descripcion">
            <h2 id="nombreproducto">NOMBRE</h2>
            <h1 id="precioproducto">PRECIO</h1>
            <h4 id="descripcionproducto">DESCRIPCION</h4>
            <button id="botoncomprar" type="button" name="button" onclick="compra()">COMPRAR</button>
          </div>
        </section>
        <div class="tablapro" id="listado">
        </div>
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
    var p='<?php echo $_GET["p"]; ?>'
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $.ajax({
        url:'consultas/productos.php',
        type:'POST',
        data:{},
        success:function(data){
          console.log(data);
          let html='';
          for (var i = 0; i < data.datos.length; i++) {
            if (data.datos[i].codpro==p) {
              document.getElementById('imgproducto').src="images/"+data.datos[i].rutinapro;
              document.getElementById('nombreproducto').innerHTML=data.datos[i].nompro;
              document.getElementById('precioproducto').innerHTML=data.datos[i].prepro;
              document.getElementById('descripcionproducto').innerHTML=data.datos[i].despro;
            }
            html+=
            '<div class="box-pro">'+
                        '<a href="producto.php?p='+data.datos[i].codpro+'">'+
                          '<div class="producto">'+
                            '<img src="images/'+data.datos[i].rutinapro+'" alt="">'+
                            '<div class="nompro">'+data.datos[i].nompro+'</div>'+
                            '<div class="despro">'+data.datos[i].despro+'</div>'+
                            '<div class="prepro">'+data.datos[i].prepro+'</div>'+
                          '</div>'+
                        '</a>'+
                      '</div>';
          }
          document.getElementById('listado').innerHTML=html;
        },
        error:function(err){
          console.error(err);
        }
      });
    });
    function compra(){
      $.ajax({
        url:'consultas/inicio.php',
        type:'POST',
        data:{
          codpro:p
        },
        success:function(data){
          console.log(data);
          if (data.state) {
            alert(data.detail);
						window.location.href="pedidos.php";
          }else {
            alert(data.detail);
            if (data.open_login) {
              open_login();
            }
          }


        },
        error:function(err){
          console.error(err);
        }
      });
    }
    function open_login(){
      window.location.href="login.php";

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
