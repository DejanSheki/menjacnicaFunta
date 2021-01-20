<?php require 'script/api.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menjačnica Funta</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="sticky2">
        <div class="logo sticky">
            <a href="#">Menjačnica</a>
            <a class="logo-img" href=""><img src="img/logo2.png" alt="">
                <img src="img/pound.svg" alt="" class="pound"></a>
            <a class="logo-funta" href="#">
                <h1>FUNTA</h1>
            </a>
        </div>
        <div class="bars">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">Naslovna</a></li>
                <li><a href="#lista">Kursna lista</a></li>
                <li><a href="#usluge">Usluge</a></li>
                <li><a href="#lokacije">Lokacije</a></li>
            </ul>
        </div>
    </nav>
    <header>
        <div class="carousel-container">
            <div class="carousel-item" style="background-image: url(img/header5.jpg);">
                <div class="services">
                    <h2>Menjački poslovi</h2>
                    <p class="text">Vršimo zamenu svih valuta sa kursne liste po najpovoljnijim kursevima.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url(img/racuni.jpg);">
                <div class="services">
                    <h2>Platni promet</h2>
                    <p class="text">Plaćajte kućne i ostale račune lakše i brže u našim menjačnicama uz minimalnu proviziju.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url(img/wu2.jpg);">
                <div class="services">
                    <h2>Western Union</h2>
                    <p class="text"> Novac koji Vam je poslat preko Western Uniona možete preuzeti u menjačnicama Funta.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url(img/srecke2.jpg);">
                <div class="services">
                    <h2>Igre na sreću</h2>
                    <p class="text">U našim menjačnicama možete izvršiti uplatu LOTO-a i BINGA, kao i kupovinu Greb Greb srećki.</p>
                </div>
            </div>
        </div>
    </header>

    <!--kursna lista-->
    <section id="lista" class="list">
        <h2>Kursna lista</h2>
            <div class="table">
                <div class="table-row">
                    <div class="table-cell header">Država</div>
                    <div class="table-cell header valuta">Valuta</div>
                    <div class="table-cell header">Oznaka</div>
                    <div class="table-cell header valuta">Apoen</div>
                    <div class="table-cell header">Kupovni</div>
                    <div class="table-cell header">Sredni</div>
                    <div class="table-cell header">Prodajni</div>
                </div>
                <?php foreach($allocatedCurrencies as $k => $cur)
                    {
                        echo '<div class="table-row">';
                        echo '<div class="table-cell lighten">'. '<img src="'. $cur->slika.'">' .'</div>';
                        echo '<div class="table-cell valuta">'. $cur->valuta .'</div>';
                        echo '<div class="table-cell cur">'. $cur->oznaka .'</div>';
                        echo '<div class="table-cell valuta">'. $cur->apoen .'</div>';
                        echo '<div class="table-cell lighten">'. $cur->kup .'</div>';
                        echo '<div class="table-cell">'. $cur->sre .'</div>';
                        echo '<div class="table-cell lighten">'. $cur->pro .'</div>';
                        echo '</div>';
                    } 
                ?>
            </div>
            <div class="notice">
                <p><i class="fas fa-star-of-life"></i> Kursevi iz ove kursne liste su informativnog karaktera i skloni su promeni. Za sve preciznije informacije u vezi sa kursevima i kursnom listom budite slobodni da nas kontaktirate.<span><a href="#lokacije"><i class="fas fa-level-down-alt"></i></a></span></p>
            </div>
    </section>

    <!--usluge-->
    <section id="usluge" class="services-section">
        <h2>Usluge</h2>
        <div class="services-container">
            <article>
                <h3>Menjački poslovi</h3>
                <p>U našim menjačnicama možete po najpovoljnijim kursevima da zamenite sve valute sa kursne liste. Za veće iznose moguća je korekcija kursa.</p>
            </article>
            <article>
                <h3>Platni promet</h3>
                <p>U našim menjačnicama omogućeno je plaćanje struje, infostana, računa fiksnih i mobilnih telefona, kablovskih operatera, taksi, poreza, školarina i slično.</p>
            </article>
            <article>
                <h3>Western Union</h3>
                <p>U svim našim menjačnicama možete primiti ili poslati novac preko Western Uniona. Isplata je u evrima ili u dinarima.</p>
            </article>
            <article>
                <h3>Igre na sreću</h3>
                <p>Ako volite igre na sreću kod nas možete uplatiti LOTO, BINGO ili kupiti neku od mnogobrojnih Greb Greb sresrećke.</p>
            </article>
        </div>
    </section>

    <!--lokacije-->
    <section id="lokacije" class="location">
        <h2>Lokacije</h2>
        <div class="location-container">
            <article>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d708.1523239100355!2d20.478809529263966!3d44.76838229869366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a70f8dd1bd4fb%3A0x65ca90dc768e757a!2sVojvode%20Stepe%20270%2C%20Beograd!5e0!3m2!1sen!2srs!4v1609254216985!5m2!1sen!2srs"
                    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <div class="address">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Beograd, Vojvode Stepe 270</p>
                    <i class="fas fa-mobile-alt"></i>
                    <p>063/20 22 00 &nbsp; &nbsp; 011/39 87 495
                    </p>
                    <i class="far fa-clock"></i>
                    <p>Pon - Pet: 08-20 <br> Subota: 08-14 <br> Nedelja: Ne radi</p>
                </div>
            </article>
            <article>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d708.1321158805055!2d20.47853775623623!3d44.77003055565987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a70f87db26451%3A0x5aae2548b279b25c!2sVojvode%20Stepe%20244%2C%20Beograd!5e0!3m2!1sen!2srs!4v1609254817869!5m2!1sen!2srs"
                    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <div class="address">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Beograd, Vojvode Stepe 244</p>
                    <i class="fas fa-mobile-alt"></i>
                    <p>063/20 22 00 &nbsp; &nbsp; 011/39 87 495
                    </p>
                    <i class="far fa-clock"></i>
                    <p>Pon - Pet: 08-20 <br> Subota: 08-14 <br> Nedelja: Ne radi</p>
                </div>
            </article>
        </div>
    </section>

    <!--footer-->
    <footer>
        <div class="logo sticky">
            <a href="#">Menjačnica</a>
            <a class="logo-img" href=""><img src="img/logo2.png" alt="">
                <img src="img/pound.svg" alt="" class="pound"></a>
            <a class="logo-funta" href="#">
                <h1>FUNTA</h1>
            </a>
        </div>
        <div class="contact">
            <i class="fas fa-map-marker-alt"></i>
            <p>Beograd, Vojvode Stepe 270</p>
            <i class="fas fa-mobile-alt"></i>
            <p>063/20 22 00 &nbsp; &nbsp; 011/39 87 495
            </p>
        </div>
        <div class="footermodul">
            <span>Copyright &copy; &nbsp; Menjačnica FUNTA &nbsp;</span>
            <script type="text/javascript">
                document.write(new Date().getFullYear());
            </script>
            <span>&nbsp;| Site created by: &nbsp;</span>
            <span><a href="mailto:dejan.sheki.lukic@gmail.com">Dejan Lukić</a></span>
            <span>&nbsp; All rights reserved</span>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="script/main.js"></script>

</body>

</html>