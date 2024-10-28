+<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Librería Forum</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo"><img class="logoforum" src="https://http2.mlstatic.com/storage/mshops-appearance-api/images/33/32853833/logo-2020050814464487300.png" alt=""></div>
            <nav>
            <a href="#"><i class="fas fa-home"></i> Inicio</a>
            <a href="#"><i class="fas fa-book"></i> Catálogo</a>
            <a href="#"><i class="fas fa-info-circle"></i> Sobre Nosotros</a>
            <a href="#"><i class="fas fa-envelope"></i> Contacto</a>
            <a href="./login/index.php"><i class="fas fa-user"></i> Mi Cuenta (Administrador).</a>
            </nav>

        </div>
        <div class="cont"></div>
    </header>
    <br><br>
    <div class="container">
        <div class="banner">
            <div class="banner-images" id="bannerImages">
                <div class="banner-image"><img src="https://www.elsotano.com/assets/images/banner/20241021153004_hh%20sigmund%20freud%20env.jpg" alt="Banner 1"></div>
                <div class="banner-image"><img src="https://www.elsotano.com/assets/images/banner/20241014165337_hh%20envios.jpg" alt="Banner 2"></div>
                <div class="banner-image"><img src="https://www.elsotano.com/assets/images/banner/20241007110133_headerstephenkingplayeras.jpg" alt="Banner 3"></div>
                <div class="banner-image"><img src="https://www.elsotano.com/assets/images/banner/20241007110900_isef-30-elsoatno-com.jpg" alt="Banner 4"></div>
                <div class="banner-image"><img src="https://www.elsotano.com/assets/images/banner/20241023131028_header_mesa%20de%20trabajo%201.jpg" alt="Banner 5"></div>
            </div>
            <div class="banner-controls">
                <button class="arrow" id="prevBtn">&#10094;</button>
                <button class="arrow" id="nextBtn">&#10095;</button>
            </div>
        </div>
        
        <div class="hero">
            <h2>Descubre tu próxima aventura</h2>
        </div>
        
        <div class="content">
            <h3>Bienvenidos a Librería Forum</h3>
            <p>Explora una amplia selección de libros, desde clásicos hasta los más recientes.</p>
            <div class="products">
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Libro 1">
                    <h4>Libro 1</h4>
                    <p>Descripción breve del libro 1.</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Libro 2">
                    <h4>Libro 2</h4>
                    <p>Descripción breve del libro 2.</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Libro 3">
                    <h4>Libro 3</h4>
                    <p>Descripción breve del libro 3.</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Libro 4">
                    <h4>Libro 4</h4>
                    <p>Descripción breve del libro 4.</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Libro 5">
                    <h4>Libro 5</h4>
                    <p>Descripción breve del libro 5.</p>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>&copy; 2024 Librería Forum. Todos los derechos reservados.</p>
    </footer>

    <script>
        let currentIndex = 0;
        const images = document.getElementById('bannerImages');
        const totalImages = document.querySelectorAll('.banner-image').length;

        function showImage(index) {
            const offset = -index * 100; // Cambia la posición del banner
            images.style.transform = `translateX(${offset}%)`;
        }

        document.getElementById('nextBtn').addEventListener('click', () => {
            currentIndex++;
            if (currentIndex >= totalImages) {
                currentIndex = 0; // Reinicia al primer índice si supera el total
            }
            showImage(currentIndex);
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            currentIndex--;
            if (currentIndex < 0) {
                currentIndex = totalImages - 1; // Regresa al último índice si es menor que cero
            }
            showImage(currentIndex);
        });
    </script>
</body>
</html>
