<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Products</title>
    <link rel="stylesheet" href="../public/css/index.css">
    <script src="https://kit.fontawesome.com/a98ac1f71c.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include '../views/header.php'; ?>

    <section aria-label="Newest Photos" class="slideshow">
        <div class="carousel" data-carousel>
            <button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
            <button class="carousel-button next" data-carousel-button="next">&#8658;</button>
            <ul data-slides>
                <li class="slide" data-active>
                    <div class="slide-text">
                        <p></p>
                    </div>
                    <img src="../public/img/homeimage6.jpg" alt="Nature Image #2">

                </li>
                <li class="slide">
                    <div class="slide-text">
                        <p>Nature's Beauty</p>
                    </div>
                    <img src="../public/img/cotoneve2.png" alt="Nature Image #1">
                </li>
                <li class="slide">
                    <div class="slide-text">
                        <p>Beautiful Designs</p>
                    </div>
                    <img src="../public/img/maxresdefault.jpg " alt="Nature Image #3">
                </li>
            </ul>
        </div>
    </section>


    <div>
        <h1 class="feauteredproducts">feautered products</h1>
    </div>

    <div class="product-container">
        <div class="product-card">
            <img src="../public/img/firstbrush.jpg" alt="Product 1" class="images">
            <h3>Silvercare brush</h3>
            <p>Silver Care System Hard Toothbrush. The head is coated with 999 silver, which provides activation of silver ions and a natural antibacterial process during brushing of teeth upon contact with water</p>

        </div>
        <div class="product-card">
            <img src="../public/img/secbrush.jpg" alt="Product 2" class="images">
            <h3>Banat brush</h3>
            <p>Special cut whitening bristles for nicotine, coffee and tea stains,Special teeth polisher helps to brighten teeth surface,Round tip bristles prevents teeth and gums from injuring,Timer cap helps to keep track</p>
        </div>
        <div class="product-card">
            <img src="../public/img/thirdimg.jpg" alt="Product 3" class="images">
            <h3>Cotoneve</h3>
            <p>Make-up remover cotton pads with Aloe Vera and Vitamin B5, ingredients especially appreciated for their soothing properties,Soft, super absorbent and resistant,make-up removal cotton pads</p>
        </div>
        <div class="product-card">
            <img src="../public/img/forthimg.jpeg" alt="Product 4" class="images">
            <h3>Cotoneve buds</h3>
            <p>Cotton buds ideal for everyday personal hygiene of the entire family, in full safety.
                Protector special safety shape, softer and more delicate, is perfect for children hygiene</p>
        </div>
        <div class="product-card">
            <img src="../public/img/fifthimg.jpg" alt="Product 4" class="images">
            <h3>Sunbright wet wipes</h3>
            <p>100% cotton wipes with the best quality and best fragrance </p>
        </div>
    </div>




    <section class="about">
        <h2>About Us</h2>
        <p>Learn more about our commitment to providing high-quality beauty products that enhance your natural beauty.</p>
        <a href="about.php" class="btn">Read More</a>
    </section>

    <?php include '../views/footer.php'; ?>
    <script src="../public/js/scroll.js"></script>
</body>

</html>