<!DOCTYPE html>
<?php 
//CARGAR SALAS DEL USUARIO

/* Informacion de la base de datos */
include("mysql.php");
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/salas.css">
    <link href='https://fonts.googleapis.com/css?family=Fugaz+One|Lobster' rel='stylesheet' type='text/css'>
    <title>Dashboard - SoudMov</title>
    <!--Los scripts se cargan siempre después de los css, nunca antes!-->
    <script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../bower_components/jquery.complexify.js/jquery.complexify.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="imagenlogo" href="salas.html"><img src="../images/logo4.png"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="perfil.html">Mi Perfil</a></li>
                    <li><a href="#">Dashboard</a></li>
                    
                    <li><a href="#">Help</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" id="search" class="form-control" placeholder="Search...">
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar-nav well">
                <ul class="nav nav-sidebar">
                    <li><a href="sala.html">Crear nueva sala <span class="sr-only">(current)</span></a></li> 
                    <li class="active"><a href="#">Lista de salas</a></li>
                </ul>
                
                <!--<ul class="nav nav-sidebar">
                    <li><a href="">Nav item again</a></li>
                    <li><a href="">One more nav</a></li>
                    <li><a href="">Another nav item</a></li>
                </ul>-->
            </div>
            <div class="col-sm-9 col-md-10 main">
                <h1 class="page-header">Mis Salas</h1>
                <!--<div class="thumbnail4">
                    <button class="center-block btn btn-lg btn-info" type="submit" name="ver"></button>
                    <?php 
                    /*if isset($_POST('ver')){
                        echo "hola";
                    }*/
                        ?>
                </div>-->
                <div class="thumbnail4 row placeholders">
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <a href="#"><img src="images/wave1.png" style="background:grey;" class="img-responsive mimagen" alt="Generic placeholder thumbnail"></a>
                        <h4>NombreSala</h4>
                        <span class="text-muted">Descripcion</span>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <a href="#"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive mimagen" style="background:grey;" alt="Generic placeholder thumbnail"></a>
                        <h4>Label</h4>
                        <span class="text-muted">Something else</span>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <a href="#"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive mimagen" style="background:grey;" alt="Generic placeholder thumbnail"></a>
                        <h4>Label</h4>
                        <span class="text-muted">Something else</span>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <a href="#"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive mimagen" style="background:grey;" alt="Generic placeholder thumbnail"></a>
                        <h4>Label</h4>
                        <span class="text-muted">Something else</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FOOTER-->
    <div class="footer">
        <section></section>
        <section role="contentinfo" itemscope="itemscope">
            <div>
                <div>
                    <div>
                        <section id="text-4">
                            <div class="textwidget">
                                <div style="line-height: 5px;">
                                    <small>
                                        <span style="color:rgba(256,256,256,0.7);">
                                    Un diseño de <strong>Mr Probl3ms</strong>
                                        </span>
                                    </small>
                                </div>
                            </div>
                        </section>
                        <section id="text-1" class="widget widget_text">
                            <br>
                            <div class="textwidget"><img src="../images/coolman.png"></div>
                        </section>
                    </div>
                    <div class="mk-col-1-3">
                        <section id="text-3">
                            <div>Otros sitios</div>
                            <br>
                            <div class="textwidget">
                                <div>
                                    <a href="#"><img name="sprite" src="../icons/facebook.png"></a>
                                    <a style href="#"><img name="sprite" src="../icons/linkedin.png"></a>
                                    <a href="#"><img name="sprite" src="../icons/twitter.png"></a>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="mk-col-1-3">
                        <section id="text-5">
                            <div class="textwidget"><a class="phonefooter" href="#">900 230 198<br><span>¡Teléfono gratuito!</a></div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="scripts/salas.js"></script>
    <script src='../bower_components/jquery.transit/jquery.transit.js'></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
