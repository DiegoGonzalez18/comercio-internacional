<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
    <head>
        <title>UFPS - Cúcuta</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="Shortcut icon">

        <!-- Web Fonts -->
        <script type="text/javascript" src="js/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


<script type="text/javascript" src="js/bootstrap.min.js"></script>

        <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">

        <link type="text/css" rel="stylesheet" href="css/ie8.min.css">

        <link type="text/css" rel="stylesheet" href="css/blocks.min.css">

        <link type="text/css" rel="stylesheet" href="css/plugins.min.css">
        <link type="text/css" rel="stylesheet" href="css/style.min.css">

        <link type="text/css" rel="stylesheet" href="css/app.min.css">
        <link type="text/css" rel="stylesheet" href="css/shop.plugins.min.css">

        <link type="text/css" rel="stylesheet" href="css/shop.blocks.min.css">

        <link type="text/css" rel="stylesheet" href="css/style-switcher.min.css">

        <link type="text/css" rel="stylesheet" href="css/shop.style.min.css">

        <link type="text/css" rel="stylesheet" href="css/header-v6.min.css">

        <link type="text/css" rel="stylesheet" href="css/header-v8.min.css">

        <link type="text/css" rel="stylesheet" href="css/header.min.css">

        <link type="text/css" rel="stylesheet" href="css/footer-v1.min.css">

        <link type="text/css" rel="stylesheet" href="css/animate.min.css">

        <link type="text/css" rel="stylesheet" href="css/line-icons.min.css">

        <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css">

        <link type="text/css" rel="stylesheet" href="css/horizontal-parallax.min.css">

        <link type="text/css" rel="stylesheet" href="css/layerslider.min.css">

        <link type="text/css" rel="stylesheet" href="css/ured.min.css">

        <link type="text/css" rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">

        <link type="text/css" rel="stylesheet" href="css/sky-forms.min.css">

        <link type="text/css" rel="stylesheet" href="css/custom-sky-forms.min.css">

        <link type="text/css" rel="stylesheet" href="css/profile.min.css">

        <link type="text/css" rel="stylesheet" href="css/brand-buttons.min.css">
        <link type="text/css" rel="stylesheet" href="css/brand-buttons-inversed.min.css">

        <link type="text/css" rel="stylesheet" href="css/hover.min.css">
        <link type="text/css" rel="stylesheet" href="css/custom-hover-effects.min.css">
        <link type="text/css" rel="stylesheet" href="css/custom.min.css">
        <link type="text/css" rel="stylesheet" href="css/pgwslider.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 </head>

   <body class="header-fixed " style="position: relative; min-height: 100%; top: 0px;">
        <div class="wrapper">
            <!--=== Header v6 ===-->


    <!-- Navbar -->
    <!-- Collect the nav links, forms, and oth
    <!-- End Navbar -->
    @include('pagina.contenido.menu')
</div>
<div class="container content profile">
    <div id="respuesta"></div>
    <form class="form-horizontal" method="post">
        <fieldset>
            <legend class="text-center header">Formulario de Contacto</legend>

            <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                <div class="col-md-8">
                    <input id="nombre" name="name" type="text" placeholder="Nombre" class="form-control">
                </div>
            </div>


            <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                <div class="col-md-8">
                    <input id="correo" name="email" type="text" placeholder="Correo" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                <div class="col-md-8">
                    <input id="telefono" name="phone" type="text" placeholder="Teléfono" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <div class="col-md-8">
                    <textarea class="form-control" id="mensaje" name="message"
                     placeholder="Ingresa tu mensaje." rows="7"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button type="submit" id="formulario" class="btn btn-primary btn-lg">Enviar</button>
                </div>
            </div>
        </fieldset>
    </form>

</div>


@include('pagina.contenido.footer')
<script type="text/javascript">



    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    $("#formulario").click(function(e){

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        e.preventDefault();



        var nombre= $("#nombre").val();

        var correo = $("#correo").val();

        var telefono = $("#telefono").val();
        var mensaje = $("#mensaje").val();



        $.ajax({

           type:'POST',

           url:'/mensaje',

           data:{'nombre':nombre, 'correo':correo, 'telefono':telefono,'mensaje':mensaje},

           success:function(data){
               if(data==1){

Swal.fire('Mensaje enviado. Te enviamos respuesta al correo')

               }else{
Swal.fire('Error')

               }

           }

        });



	});

</script>





        <!--=== End Footer Version 1 ===-->
        <script src="vue-ckeditor5/dist/vue-ckeditor5.js"></script>

		<script type="text/javascript" src="js/pgwslider.min.js"></script>

		<script type="text/javascript" src="js/back-to-top.min.js"></script>

		<script type="text/javascript" src="js/smoothScroll.min.js"></script>

		<script type="text/javascript" src="js/owl.carousel.min.js"></script>

		<script type="text/javascript" src="js/sequence.jquery-min.js"></script>

		<script type="text/javascript" src="js/greensock.js"></script>

        <script type="text/javascript" src="js/layerslider.transitions.js"></script>

        <script type="text/javascript" src="js/layerslider.kreaturamedia.jquery.js"></script>

		<script type="text/javascript" src="js/custom.min.js"></script>

		<script type="text/javascript" src="js/app.min.js"></script>

		<script type="text/javascript" src="js/owl-carousel.min.js"></script>

		<script type="text/javascript" src="js/datepicker.min.js"></script>

		<script type="text/javascript" src="js/validation.min.js"></script>

		<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>

		<script type="text/javascript" src="js/owl-recent-works.min.js"></script>

		<script type="text/javascript" src="js/wow.min.js"></script>

    </body>
</html>
