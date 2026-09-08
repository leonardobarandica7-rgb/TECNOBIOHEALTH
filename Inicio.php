<?php include 'header.php'; ?>

<section class="hero-section" style="background-image: url('images/banner.jpg'); background-size: cover; background-position: center; height: 100vh; display: flex; align-items: center; text-align: center; color: white; text-shadow: 2px 2px 10px rgba(0,0,0,0.7);">
    <div class="container">
        <h1 style="font-size: 3rem; font-weight: bold;">Innovación y Tecnología a tu Alcance</h1>
        <p style="font-size: 1.5rem;">Descubre los mejores productos tecnológicos al mejor precio.</p>
        <a href="productos.php" class="btn btn-primary btn-lg">Explorar Productos</a>
    </div>
</section>

<!-- Productos Destacados -->
<div class="clients text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="titlepage">
                    <h2>Productos Destacados</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clients_red d-flex justify-content-center">
    <div class="container text-center">
        <div id="productos_slider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
            <div class="carousel-inner">
                <?php
                require 'php/conexion.php';
                $sql = "SELECT * FROM productos LIMIT 3";
                $resultado = mysqli_query($conexion, $sql);
                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    $active = true;
                    while ($producto = mysqli_fetch_assoc($resultado)) { ?>
                        <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                            <div class="d-flex justify-content-center">
                                <div class="card text-center" style="max-width: 400px; border-radius: 10px; padding: 20px; background: white; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                                    <h3><?php echo $producto['nombre']; ?></h3>
                                    <p><img src="<?php echo $producto['imagen']; ?>" class="img-fluid" style="max-height: 200px; border-radius: 8px;" alt="<?php echo $producto['nombre']; ?>"></p>
                                    <p><strong>$<?php echo number_format($producto['precio'], 2); ?></strong></p>
                                    <a href="productos.php" class="btn btn-success">Ver más</a>
                                </div>
                            </div>
                        </div>
                    <?php $active = false; }
                } else {
                    echo "<p>No se encontraron productos destacados.</p>";
                } ?>
            </div>
        </div>
    </div>
</div>

<!-- Opiniones de Clientes -->
<div class="clients text-center" style="padding: 30px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="titlepage">
                    <h2 style="font-size: 1.8rem;">Opiniones de Nuestros Clientes</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clients_red d-flex justify-content-center" style="padding: 20px 0;">
    <div class="container text-center">
        <div id="testimonial_slider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="testomonial_section d-flex justify-content-center">
                        <div class="full testimonial_cont text_align_center cross_layout" 
                            style="max-width: 450px; max-height: 150px; padding: 10px; overflow: hidden;">
                            <div class="cross_inner">
                                <h3 style="font-size: 1.2rem; margin-bottom: 5px;">Carlos<br>
                                    <strong class="ornage_color">Diseñador gráfico</strong>
                                </h3>
                                <p style="font-size: 0.85rem; line-height: 1.2;">"Compré una laptop con una tarjeta gráfica potente y una pantalla de alta resolución, y ha sido una maravilla para mi trabajo. Los colores se ven vibrantes, y el rendimiento es impecable. ¡Totalmente recomendada!"</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testomonial_section d-flex justify-content-center">
                        <div class="full testimonial_cont text_align_center cross_layout" 
                            style="max-width: 450px; max-height: 150px; padding: 10px; overflow: hidden;">
                            <div class="cross_inner">
                                <h3 style="font-size: 1.2rem; margin-bottom: 5px;">Andrea<br>
                                    <strong class="ornage_color">Estudiante universitaria</strong>
                                </h3>
                                <p style="font-size: 0.85rem; line-height: 1.2;">"Encontré una laptop perfecta para mis estudios a un precio increíble. Es rápida, ligera y la batería dura todo el día. Además, el equipo de la tienda fue súper amable ayudándome a elegir la mejor opción para mi presupuesto."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testomonial_section d-flex justify-content-center">
                        <div class="full testimonial_cont text_align_center cross_layout" 
                            style="max-width: 450px; max-height: 150px; padding: 10px; overflow: hidden;">
                            <div class="cross_inner">
                                <h3 style="font-size: 1.2rem; margin-bottom: 5px;">Javier<br>
                                    <strong class="ornage_color">Programador</strong>
                                </h3>
                                <p style="font-size: 0.85rem; line-height: 1.2;">"Compré un PC de escritorio con un procesador de última generación y bastante RAM, y la velocidad con la que compilo mis proyectos es impresionante. La tienda tiene una gran variedad y excelentes precios. ¡Definitivamente volveré a comprar aquí!"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mapa de Ubicación -->
<div class="clients">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="titlepage">
                    <h2 class="text-center">Nuestra Ubicación</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fondo rojo para la sección del mapa -->
<div class="clients_red">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.602855705882!2d-74.06102387617302!3d4.664684095310175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a5f3f535297%3A0xf509f2cb0f590c3!2sUnilago.!5e0!3m2!1ses-419!2sco!4v1742792852747!5m2!1ses-419!2sco"
                    width="100%" height="400" style="border:0; display: block; margin: auto;" allowfullscreen="" loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var productosSlider = new bootstrap.Carousel(document.getElementById('productos_slider'), {
            interval: 3000,
            ride: 'carousel'
        });
        var testimonialSlider = new bootstrap.Carousel(document.getElementById('testimonial_slider'), {
            interval: 3000,
            ride: 'carousel'
        });
    });
</script>
