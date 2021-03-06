<?php require 'script/api.php' ?>
<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menjačnica Funta | Beograd | Voždovac</title>
    
    <meta name="description" content="Menjačnica Funta, Voždovac, mesto gde možete po najpovoljnijim kursevima promeniti valutu, platiti račune i uplatiti igre na sreću.">
    <meta name="keywords" content="dnevna kursna lista, menjacnica, menjačnica, menjacnice,  menjačnice, valuta, valute, kursna lista, kursne liste, rsd, eur, dinar, euro,konverzija, konverzije, zvaničan kurs, narodna banka, beograd, povoljno, povoljan, voždovac, vozdovac, kurs">
    <meta name="Robots" content="Index, Follow">
    <meta property="og:image" content="https://menjacnica-funta.com/img/header5.jpg">
    <link rel="canonical" href="http://www.menjacnica-funtae.com/">
    
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous"> -->
    <script src="https://kit.fontawesome.com/08f9c1c78e.js" crossorigin="anonymous" async></script>
    <link rel="stylesheet" href="css/style.css">

    <script type="application/ld+json">
        {
        "@context": "http://schema.org/",
        "@type": "Organization",
        "name": "Menjačnica Funta",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Vojvode Stepe 270",
            "addressLocality": "Beograd",
            "addressRegion": "Srbija",
            "postalCode": "11000"
        },
        "telephone": "063/20 22 00"
        }
    </script>
</head>

<body>
    <div class="preload">
        <img src="img/logo23.png" alt="jedna funta">
        <h3>Loading...</h3>
    </div>
    <nav class="sticky2">
        <div class="logo sticky">
            <a href="#" title="Početna">Menjačnica</a>
            <a class="logo-img" href="#" title="Početna"><img src="img/logo23.png" alt="jedna funta">
                <img src="img/pound.svg" alt="znak funte" class="pound"></a>
            <a class="logo-funta" href="#" title="Početna">
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
                <li><a href="#" title>Naslovna</a></li>
                <li><a href="#lista">Kursna lista</a></li>
                <li><a href="#usluge">Usluge</a></li>
                <li><a href="#lokacije">Lokacije</a></li>
            </ul>
        </div>
    </nav>
    <header>
        <div class="carousel-container">
            <div class="carousel-item" style="background-image: url(img/header5.webp);">
                <div class="services">
                    <h2>Menjački poslovi</h2>
                    <p class="text">Vršimo zamenu svih valuta sa kursne liste po najpovoljnijim kursevima.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url(img/racuni.webp);" loading="lazy">
                <div class="services">
                    <h2>Platni promet</h2>
                    <p class="text">Plaćajte kućne i ostale račune lakše i brže u našim menjačnicama uz minimalnu proviziju.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url(img/wu2.webp);" loading="lazy">
                <div class="services">
                    <h2>Western Union</h2>
                    <p class="text"> Novac koji Vam je poslat preko Western Uniona možete preuzeti u menjačnicama Funta.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url(img/srecke2.jpg);" loading="lazy">
                <div class="services">
                    <h2>Igre na sreću</h2>
                    <p class="text">U našim menjačnicama možete izvršiti uplatu LOTO-a i BINGA, kao i kupovinu Greb Greb srećki.</p>
                </div>
            </div>
        </div>
    </header>

    <!--kursna lista-->
    <section id="lista" class="list">
        <div class="appear"><h2>Kursna lista</h2></div>
            <div class="table">
                <div class="table-row">
                    <div class="table-cell header flag">Država</div>
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
                        echo '<div class="table-cell lighten flag flag-appear">'. '<div><img src="'. $cur->slika .'" alt="zastava zemlje" loading="lazy"></div>' .'</div>';
                        echo '<div class="table-cell valuta">'. $cur->valuta .'</div>';
                        echo '<div class="table-cell cur">'. $cur->oznaka .'</div>';
                        echo '<div class="table-cell valuta">'. $cur->apoen .'</div>';
                        echo '<div class="table-cell lighten num">'. $cur->kup .'</div>';
                        echo '<div class="table-cell num ">'. $cur->sre .'</div>';
                        echo '<div class="table-cell lighten num">'. $cur->pro .'</div>';
                        echo '</div>';
                    } 
                ?>
            </div>
            <div class="notice">
                <p><i class="fas fa-star-of-life"></i> Kursevi iz ove kursne liste su informativnog karaktera i skloni su promeni. Za sve preciznije informacije u vezi sa kursevima i kursnom listom budite slobodni da nas kontaktirate.<span><a href="#lokacije" title="Lokacije"><i class="fas fa-level-down-alt"></i></a></span></p>
            </div>
    </section>

    <!--usluge-->
    <section id="usluge" class="services-section">
        <div class="appear"><h2>Usluge</h2></div>
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
                <p>Ako volite igre na sreću kod nas možete uplatiti LOTO, BINGO ili kupiti neku od mnogobrojnih Greb Greb srećki.</p>
            </article>
        </div>
    </section>

    <!--lokacije-->
    <section id="lokacije" class="location">
    <div class="appear"><h2>Lokacije</h2></div>
        <div class="location-container">
            <article>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d708.1523239100355!2d20.478809529263966!3d44.76838229869366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a70f8dd1bd4fb%3A0x65ca90dc768e757a!2sVojvode%20Stepe%20270%2C%20Beograd!5e0!3m2!1sen!2srs!4v1609254216985!5m2!1sen!2srs"
                    allowfullscreen="" aria-hidden="false" tabindex="0" loading="lazy"></iframe>
                <div class="address">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Beograd, Voždovac, Vojvode Stepe 270</p>
                    <i class="fas fa-mobile-alt"></i>
                    <p>063/20 22 00 &nbsp; &nbsp; 011/39 87 495
                    </p>
                    <i class="far fa-clock"></i>
                    <p>Pon - Pet: 08-20 <br> Subota: 08-14 <br> Nedelja: Ne radi</p>
                </div>
            </article>
            <article>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d708.1321158805055!2d20.47853775623623!3d44.77003055565987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a70f87db26451%3A0x5aae2548b279b25c!2sVojvode%20Stepe%20244%2C%20Beograd!5e0!3m2!1sen!2srs!4v1609254817869!5m2!1sen!2srs"
                    allowfullscreen="" aria-hidden="false" tabindex="0" loading="lazy"></iframe>
                <div class="address">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Beograd, Voždovac, Vojvode Stepe 244</p>
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
            <a href="#" title="Početna">Menjačnica</a>
            <a class="logo-img" href="#" title="Početna"><img src="img/logo23.png" alt="Jedna Funta">
                <img src="img/pound.svg" alt="Znak Funte" class="pound"></a>
            <a class="logo-funta" href="#" title="Početna">
                <h3>FUNTA</h3> 
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
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->
    <script rel="preload" as="script" src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>
    <script src="script/main.js"></script>

</body>

</html>
