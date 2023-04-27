<?php

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current

?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>Name of company</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="front-page">
<nav class="navbar navbar-expand-lg fixed-top py-3">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img style="width: 200px;" src="images/company_logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link" aria-current="page">Acasa</a>
                </li>



            </ul>
            <a href="register.php" class="btn-main-color">Inregistrare</a>
            <a href="login.php" class="btn-main-color">Intra in platforma</a>
        </div>
    </div>
</nav>
<header>
    <div class="container">
        <div class="header">
            <div class="header-text">
                <p class="above">Advanced Platform</p>
                <h1>Take your team to the next level
                </h1>
                <p>Ți se pare important ca desfășurarea business-ului să nu mai depindă exclusiv de prezența oamenilor la birou?</p>
                <a href="pages/about.html" class="btn-main">Inregistreaza-te</a>
            </div>
            <div class="header-img">
                <img src="images/report.png" alt="">
            </div>
        </div>
    </div>
</header>
<section>
    <div class="partners-logo">
        <img src="images/HTML5_logo.svg" alt="">
        <img src="images/CSS3_logo.svg" alt="">
        <img src="images/bootstrap-logo.svg" alt="">
    </div>
</section>
<section>
    <div class="container first-section">
        <div class="section-text">
            <div class="line"></div>
            <h2>Cea mai buna solutie pentru tine</h2>
            <p class="text-gray">
                Indiferent de aria de business căreia i se adresează, un software HR prezintă anumite caracteristici.
                În continuare, le prezentăm mai detaliat pe cele care au o relevanță crescută pentru departamentul de resurse umane,
                ca și campion al introducerii unui software HR online la nivelul întregii organizații.
            </p>
            <a href="login.php" class="read-more">Intra in platforma<img src="images/arrow-alt-right.svg" alt=""></a>
        </div>
        <div class="icons-container">
            <div class="icon-item">
                <img src="images/Component 2 – 1.svg" alt="">
                <p class="icon-name">Scale Your Activity</p>
                <div class="line"></div>
                <p class="text-gray">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore</p>
            </div>
            <div class="icon-item">
                <img src="images/Component 3 – 1.svg" alt="">
                <p class="icon-name">Scale Your Activity</p>
                <div class="line"></div>
                <p class="text-gray">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore</p>
            </div>
            <div class="icon-item">
                <img src="images/Component 4 – 1.svg" alt="">
                <p class="icon-name">Scale Your Activity</p>
                <div class="line"></div>
                <p class="text-gray">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore</p>
            </div>
            <div class="icon-item">
                <img src="images/Component 5 – 1.svg" alt="">
                <p class="icon-name">Scale Your Activity</p>
                <div class="line"></div>
                <p class="text-gray">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore</p>
            </div>
        </div>
    </div>
</section>

</main>
<footer>
    <div class="container">
        <div class="footer-main">
            <div class="footer-about">
                <div class="logo">
                    <img style="width: 200px;" src="images/company_logo.png" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, amet. Quaerat, minima. Ducimus, iste.
            </div>
            <div class="footer-links">
                <p class="title">Nos services</p>
                <div class="links">
                    <a href="">Avis clients</a>
                    <a href="">Mentions légales</a>
                    <a href="">Plan du site</a>
                    <a href="">Blog d’Idéematic</a>
                    <a href="">Le dictionnaire du digital</a>
                    <a href="">Notre boutique</a>
                </div>
            </div>
            <div class="footer-sign-up">
                <p class="title">Sign up for Special Offers!</p>
                <div class="sign-up">
                    <input type="email" name="email" id="email" placeholder="Enter Email">
                    <button type="submit" class="signupbtn">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright pt-4 text-muted text-center">
        <p>&copy; 2022 YOUR-DOMAIN | Created by <a href="https://firmbee.com/solutions/crm-tools/" title="Firmbee - Free Cloud CRM" target="_blank">Firmbee.com</a> </p>
        <!--
        This template is licenced under Attribution 3.0 (CC BY 3.0 PL),
        You are free to: Share and Adapt. You must give appropriate credit, you may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.
        -->
    </div>
</footer>
<div class="fb2022-copy">Fbee 2022 copyright</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="js/addshadow.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        startEvent: 'DOMContentLoaded',
        offset: 200,
        once:true
    });
</script>
<script src="js/slides.js"></script>
</body>
</html>

