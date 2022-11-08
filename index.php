<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLORERIA</title>
    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- CDN FONT AWESOME -->
    <script src="https://kit.fontawesome.com/cb2bd7ba30.js" crossorigin="anonymous"></script>

    <!-- SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="public/css/estilos.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand font-italic logo" href="index.php"><i class="fas fa-seedling"></i> Floreria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item abel-Item active">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item abel-Item">
                    <a class="nav-link" href="#nosotros">Sobre Nosotros</a>
                </li>
                <li class="nav-item abel-Item">
                    <a class="nav-link" href="#promocion">Promociones</a>
                </li>
                <li class="nav-item abel-Item">
                    <a class="nav-link" href="#contacto">Contáctenos</a>
                </li>
            </ul>
        </div>
        <div class="d-flex justify-content-end">
            <a href="view/Login/index.php" class="nav-link abel-Item m-2">Iniciar Sesión</a>
            <a href="view/Login/registro.php" class="nav-link abel-Item m-2">Registrarse</a>
        </div>

    </nav>


    <!-- SLIDER -->

    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide pointer-event" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block w-100" alt="Primer Slide" width="500" height="500" src="public/img/1.jpg"
                        data-holder-rendered="true">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Arreglos florares</h3>
                        <p>Arreglos florales hechos a mano.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt="Segundo Slide" width="500" height="500" src="public/img/2.jpg"
                        data-holder-rendered="true">
                    <div class="carousel-caption d-none d-md-block">

                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt="Segundo Slide" width="500" height="500" src="public/img/3.jpg"
                        data-holder-rendered="true">
                    <div class="carousel-caption d-none d-md-block">

                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- FIN SLIDER -->
        <div class="my-5" id="nosotros">
            <h2 class="text-center">Sobre Nosotros</h2>
            <div class="row ">

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="public/img/money_transfer_.svg" alt="Card image cap">
                        <div class="card-body text-center">
                            <h3 class="card-title">Mejor Precio</h3>
                            <div class="card-text">
                                Contamos con los mejores precios del mercado en decoracion de Eventos, Arreglos
                                personalizados
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="public/img/password.svg" alt="Card image cap">
                        <div class="card-body text-center">
                            <h3 class="card-title">Seguridad</h3>
                            <div class="card-text">
                                Nuestro cliente es nuestro compromiso por tal motivo aseguramos la entrega de nuestro
                                producto 100% confiable.
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">

                        <img class="card-img-top" src="public/img/sent_messages_.svg" alt="Card image cap">
                        <div class="card-body text-center">
                            <h3 class="card-title">A Tiempo</h3>
                            <div class="card-text">
                                Nuestra caracteristica principal la puntualidad, nos comprometos con la entrega en la
                                fecha y hora exactas.</div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>


    <div class="bg-success p-5 my-3" id="promocion">
        <div class="container text-white">
            <h2 class="text-center">
                Promociones
            </h2>
            <p>Registrate para recibir promociones y descuentos en tus próximas compras.</p>
            <a class="btn btn-info" href="#">Registrate</a>
        </div>
    </div>

    <section id="contacto" class="py-4">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Contactenos</h3>
                    <div class="section-title-divider"></div>
                    <p class="section-description">Su opinión es muy importante para nosotros</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="info">
                        <div>
                            <i class="text-success fa fa-map-marker"></i>
                            <p>Av. Colón y 10 de Agosto<br>Quito, Ecuador</p>
                        </div>

                        <div>
                            <i class="text-success fa fa-envelope"></i>
                            <p>floreriaasjv@gmail.com</p>
                        </div>

                        <div>
                            <i class="text-success fa fa-phone"></i>
                            <p>1800 FLORAJ (362532)</p>
                        </div>

                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form">

                        <form action="" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Su nombre"
                                    data-rule="minlen:4" data-msg="Por favor ingrese al menos 4 caracteres" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Su correo"
                                    data-rule="email" data-msg="Ingresa un Correo Valido" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Tema"
                                    data-rule="minlen:4" data-msg="Por favor ingrese al menos 8 caracteres del tema" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                    data-msg="Por favor escribe algo para nosotros" placeholder="Mensaje"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button class="btn btn-success" type="submit">Enviar
                                    mensaje</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <footer class="bg-dark p-4">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <p class="text-white "> Copyright &copy;ASAA </p>
                    <p class="text-white-50">Creado por Abel Acosta</p>
                </div>
                <div class="col-md-6 col-sm-12"></div>
                <div class="col-md-3 text-white">
                    <a class="btn btn-primary" href=""><i class="fa fa-facebook"></i></a>
                    <a class="btn btn-danger" href=""><i class="fa fa-instagram"></i></a>
                    <a class="btn btn-info" href=""><i class="fa fa-twitter"></i></a>
                    <a class="btn btn-success" href=""><i class="fa fa-whatsapp"></i></a>

                </div>
            </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>



</body>

</html>