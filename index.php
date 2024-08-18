<?php
    include "./admin/db_file.php";
    $settingsData = $data->prepare("SELECT * FROM settings where id=?");
    $settingsData->execute(array(1));
    $fetchSettingsData = $settingsData->fetch();
    $siteUrl = $fetchSettingsData['site'];
    
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $country_code = '';
    
    // IP adresini doğrula
    if (!filter_var($ip_address, FILTER_VALIDATE_IP)) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    
    // Konum bilgisini al
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip_address}/json"));
    $country_code = $details->country;

     if(@$_GET['page']){
        if($_GET['page'] == "en"){
            $lang = 1;
            $langLink = "tr";
            $langLinkText = "Türkçe";
            $flag = "turkey.svg";
            $getLang = "en";
            $cvPDF = "Yasin-Akbulut-EN.pdf";
            include "en.php";
        }else{
            $lang = 0;  
            $langLink = "en";
            $langLinkText = "English";
            $flag = "england.svg";
            $getLang = "tr";
            $cvPDF = "Yasin-Akbulut-TR.pdf";
            include "tr.php";
        }
     }else{
         // Konuma göre yönlendirme yap
        if ($country_code == 'TR') {
            $locationurl = $siteUrl . "tr";
            include "tr.php";
        } else {
            $locationurl = $siteUrl . "en";
            include "en.php";
        }
        header('Location: '.$locationurl);
     }
    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canoncial" href="https://yasinakbulut.dev/<?= $getLang ?>">
    <meta property="og:title" content="Yasin Akbulut | Jr. Frontend Developer" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://yasinakbulut.dev/<?= $getLang ?>" />
    <meta property="og:image" content="https://yasinakbulut.dev/assets/img/main.png" />
    <meta property="og:description" content = "Frontend alanında kendimi geliştirmekteyim ve ilerleyen süreçte kariyerime bu alanda yön vermeyi hedefliyorum. Birçok web projesi geliştirdim ve geliştirdiğim tüm projelerin tasarımlarını kendim kodladım. Projelerimde Backend olarak PHP PDO kullandım." />
    <meta property="og:site_name" content = "Yasin Akbulut | Jr. Frontend Developer" />
    <meta name="keywords" content="Yasin Akbulut, Akbulut, Diyet Takibim, CV Oluşturma, Frontend Developer Yasin, Developer Yasin"/>
    <title>Yasin Akbulut | Jr. Frontend Developer</title>
    <link rel="stylesheet" href="./assets/styles/styless.css">
    <link rel="stylesheet" href="./assets/styles/headerr.css">
    <link rel="stylesheet" href="./assets/styles/experiences.css">
    <link rel="stylesheet" href="./assets/styles/projects.css">
    <link rel="stylesheet" href="./assets/styles/skill.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/395342c0da.js" crossorigin="anonymous"></script>
    <!-- favicon -->
    <link rel="icon" href="./assets/img/ovallogo.svg" sizes="any" type="image/svg+xml">
     <!-- Chrome, Firefox ve Opera içim -->
     <meta name="theme-color" content="var(--main-color)">
    <!-- iOS Safari için -->
    <meta name="apple-mobile-web-app-status-bar-style" content="var(--main-color)">
    <!-- Windows Phone için -->
    <meta name="msapplication-navbutton-color" content="var(--main-color)">
</head>
<body class="">

    <header class="header">
        <div class="container-lg">
            <div class="navbar">
                <div class="logo">
                    <a href="<?= $siteUrl . $getLang; ?>">
                    <svg id="katman_1" data-name="katman 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 250"><defs></defs><path class="cls-1" d="M97.82,124,35.93,225.48A3,3,0,0,0,38.46,230H65.51A3,3,0,0,0,68,228.58L198.14,15.22l8.42-13.8A3,3,0,0,1,209.09,0h36.78a3,3,0,0,1,3,3V247a3,3,0,0,1-3,3H112.4a3,3,0,0,1-2.54-4.52L178.5,132.92l12.94-21.23a3,3,0,0,1,5.51,1.54v84.71a3,3,0,0,1-3,3H181.47a3,3,0,0,1-3-3V179.78a3,3,0,0,0-5.51-1.55l-28.82,47.25a3,3,0,0,0,2.54,4.52h80.7a3,3,0,0,0,3-3V18.19a3,3,0,0,0-3-3h-5.48a3,3,0,0,0-2.54,1.42l-130.5,214L78,248.58A3,3,0,0,1,75.42,250H4.14a3,3,0,0,1-2.54-4.52L11,230l7.1-11.64,56.8-93.15a3,3,0,0,0,0-3.1L18.14,29,9.76,15.22,3.23,4.52A3,3,0,0,1,5.77,0H76.18a3,3,0,0,1,2.54,1.42l6.5,10.65,26.82,44a3,3,0,0,0,5.08,0L150.43,1.42A3,3,0,0,1,153,0h15.16a3,3,0,0,1,2.53,4.52l-45,73.83-.08.12-8.52,14a3,3,0,0,1-5.1,0l-4.41-7.47L65.89,16.64a3,3,0,0,0-2.54-1.42H37.17a3,3,0,0,0-2.54,4.52L87,105.52,98,123.66Z"/></svg>
                    </a>
                </div>
                <div class="mobile-menu-btn">
                    <span onclick="mobileMenu()"><?= $menuTitle; ?></span>
                </div>
                <div class="mobile-menu-close-area"></div>
                <div class="links">
                    <div class="link-list">
                        <ul>
                            <h4 class="side-title"><?= $menuTitle; ?></h4>
                            <li><a class="nav-link" href="#about">
                                <div class="side-icon"><i class="bi bi-person"></i></div> <?= $aboutLink; ?>
                            </a></li>
                            <li><a class="nav-link" href="#projects">
                                <div class="side-icon"><i class="bi bi-diagram-3"></i></div> <?= $projectsLink; ?>
                            </a></li>
                            <li><a class="nav-link" href="#experiences">
                                <div class="side-icon"><i class="bi bi-list-ol"></i></div> <?= $experiencesLink; ?>
                            </a></li>
                            <li><a class="nav-link" href="#skills">
                                <div class="side-icon"><i class="bi bi-bookmark-star"></i></div> <?= $skillsLink; ?>
                            </a></li>
                            <li><a class="nav-link" href="#works">
                                <div class="side-icon"><i class="bi bi-code-slash"></i></div> <?= $worksLink; ?>
                            </a></li>
                            <li><a class="nav-link" href="#contact">
                                <div class="side-icon"><i class="bi bi-bell"></i></div> <?= $contactLink; ?>
                            </a></li>
                        </ul>
                    </div>
                    <div class="color-select">
                        <h4 class="side-title"><?= $languageTitle; ?></h4>
                        <a href="<?= $langLink;  ?>" class="color-select-label">
                            <div class="flag"><img src="./assets/img/<?= $flag;  ?>"></div> 
                            <?= $langLinkText;  ?>
                        </a>
                    </div>
                    <div class="color-select">
                        <h4 class="side-title"><?= $colorsTitle; ?></h4>
                        <label onclick="showMenu(this)" for="" class="color-select-label"><div class="selected-color"></div> <?= $selectColorLink ?></label>
                        <div class="color-picker">

                        </div>
                    </div>
                    <div class="color-select">
                        <h4 class="side-title"><?= $themeTitle; ?></h4>
                        <div class="mode-btn" onclick="changeTheme()">
                            <div class="light-icon"><i class="fa-regular fa-sun"></i> <span><?= $themeLight; ?></span></div>
                            <div class="dark-icon"><i class="fa-regular fa-moon"></i> <span><?= $themeDark; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container-lg">

        <main id="about">
            <div class="main-content">
                <?php
                $allData = $data->prepare("SELECT * FROM about where lang=?");
                $allData->execute(array($lang));
                $fetchData = $allData->fetch();
                if($allData->rowCount()){
                    $typedAbout = $fetchData['typed'];
                    ?>
                    <h1 class="main-title"><p id="hello"><?= $fetchData['hello']; ?></p> <span><?= $fetchData['ıam']; ?> <span class="typed"></span></span></h1>
                    <p><?= $fetchData['about']; ?></p>
                    <a href="https://me.yasinakbulut.dev/" target='_blank' class="cv-link">
                        <span class="cv-text"><?= $fetchData['download']; ?></span> 
                        <div class="cv-hover-text">
                            <span><?= $fetchData['downloadHover']; ?></span>
                            <i class="bi bi-person"></i>
                        </div>
                    </a>
                    <p class="cv-exp">
                        <?php
                        echo $lang === 0 ? "Özgeçmişimi kendi geliştirdiğim sistem ile hazırladım :)" : "I prepared my resume with the system I developed myself :)"
                        ?>
                    </p>
                    <?php
                }
                ?>
            </div>
            <div class="main-bg">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="450" zoomAndPan="magnify" viewBox="0 0 337.5 337.500003" height="450" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="4903ca3bb1"><path d="M 120 134 L 156 134 L 156 176 L 120 176 Z M 120 134 " clip-rule="nonzero"/></clipPath><clipPath id="b42751d20e"><path d="M 138.421875 114.324219 L 218.578125 162.945312 L 184.347656 219.375 L 104.191406 170.753906 Z M 138.421875 114.324219 " clip-rule="nonzero"/></clipPath><clipPath id="32c43dade9"><path d="M 138.421875 114.324219 L 218.578125 162.945312 L 184.347656 219.375 L 104.191406 170.753906 Z M 138.421875 114.324219 " clip-rule="nonzero"/></clipPath><clipPath id="8f1316b201"><path d="M 166 158 L 202 158 L 202 200 L 166 200 Z M 166 158 " clip-rule="nonzero"/></clipPath><clipPath id="ada42f2ed1"><path d="M 138.421875 114.324219 L 218.578125 162.945312 L 184.347656 219.375 L 104.191406 170.753906 Z M 138.421875 114.324219 " clip-rule="nonzero"/></clipPath><clipPath id="5dfe1bf120"><path d="M 138.421875 114.324219 L 218.578125 162.945312 L 184.347656 219.375 L 104.191406 170.753906 Z M 138.421875 114.324219 " clip-rule="nonzero"/></clipPath><clipPath id="dee1ecfce6"><path d="M 134 143 L 189 143 L 189 191 L 134 191 Z M 134 143 " clip-rule="nonzero"/></clipPath><clipPath id="e1bea69fb2"><path d="M 138.421875 114.324219 L 218.578125 162.945312 L 184.347656 219.375 L 104.191406 170.753906 Z M 138.421875 114.324219 " clip-rule="nonzero"/></clipPath><clipPath id="1920bc6300"><path d="M 138.421875 114.324219 L 218.578125 162.945312 L 184.347656 219.375 L 104.191406 170.753906 Z M 138.421875 114.324219 " clip-rule="nonzero"/></clipPath><clipPath id="dc38241f4b"><path d="M 4.578125 132.121094 L 68.328125 132.121094 L 68.328125 204.871094 L 4.578125 204.871094 Z M 4.578125 132.121094 " clip-rule="nonzero"/></clipPath><clipPath id="36ae86badf"><path d="M 55.550781 249 L 127.550781 249 L 127.550781 314 L 55.550781 314 Z M 55.550781 249 " clip-rule="nonzero"/></clipPath><clipPath id="7268217a78"><path d="M 49.980469 24.015625 L 114.480469 24.015625 L 114.480469 88.515625 L 49.980469 88.515625 Z M 49.980469 24.015625 " clip-rule="nonzero"/></clipPath><clipPath id="29c6f350d7"><path d="M 195.121094 19.378906 L 261.121094 19.378906 L 261.121094 93.628906 L 195.121094 93.628906 Z M 195.121094 19.378906 " clip-rule="nonzero"/></clipPath><clipPath id="b012cf7724"><path d="M 261.441406 131.101562 L 332.691406 131.101562 L 332.691406 202.351562 L 261.441406 202.351562 Z M 261.441406 131.101562 " clip-rule="nonzero"/></clipPath><clipPath id="a3d6e35a04"><path d="M 272.828125 131.007812 L 320.996094 131.007812 C 321.753906 131.007812 322.5 131.082031 323.238281 131.230469 C 323.980469 131.375 324.699219 131.59375 325.394531 131.882812 C 326.09375 132.171875 326.757812 132.523438 327.382812 132.945312 C 328.011719 133.363281 328.589844 133.839844 329.125 134.371094 C 329.660156 134.902344 330.136719 135.484375 330.554688 136.109375 C 330.972656 136.738281 331.328125 137.398438 331.617188 138.09375 C 331.90625 138.789062 332.125 139.507812 332.269531 140.246094 C 332.417969 140.984375 332.492188 141.730469 332.492188 142.484375 L 332.492188 190.871094 C 332.492188 191.625 332.417969 192.371094 332.269531 193.109375 C 332.125 193.851562 331.90625 194.566406 331.617188 195.261719 C 331.328125 195.960938 330.972656 196.621094 330.554688 197.246094 C 330.136719 197.875 329.660156 198.453125 329.125 198.988281 C 328.589844 199.519531 328.011719 199.996094 327.382812 200.414062 C 326.757812 200.832031 326.09375 201.1875 325.394531 201.472656 C 324.699219 201.761719 323.980469 201.980469 323.238281 202.128906 C 322.5 202.273438 321.753906 202.347656 320.996094 202.347656 L 272.828125 202.347656 C 272.074219 202.347656 271.324219 202.273438 270.585938 202.128906 C 269.84375 201.980469 269.125 201.761719 268.429688 201.472656 C 267.730469 201.1875 267.070312 200.832031 266.441406 200.414062 C 265.816406 199.996094 265.234375 199.519531 264.699219 198.988281 C 264.167969 198.453125 263.691406 197.875 263.269531 197.246094 C 262.851562 196.621094 262.496094 195.960938 262.207031 195.261719 C 261.917969 194.566406 261.703125 193.851562 261.554688 193.109375 C 261.40625 192.371094 261.332031 191.625 261.332031 190.871094 L 261.332031 142.484375 C 261.332031 141.730469 261.40625 140.984375 261.554688 140.246094 C 261.703125 139.507812 261.917969 138.789062 262.207031 138.09375 C 262.496094 137.398438 262.851562 136.738281 263.269531 136.109375 C 263.691406 135.484375 264.167969 134.902344 264.699219 134.371094 C 265.234375 133.839844 265.816406 133.363281 266.441406 132.945312 C 267.070312 132.523438 267.730469 132.171875 268.429688 131.882812 C 269.125 131.59375 269.84375 131.375 270.585938 131.230469 C 271.324219 131.082031 272.074219 131.007812 272.828125 131.007812 Z M 272.828125 131.007812 " clip-rule="nonzero"/></clipPath><linearGradient x1="255.753651" gradientTransform="matrix(0.555839, 0, 0, 0.554948, 119.461318, -105.026793)" y1="554.196329" x2="382.744489" gradientUnits="userSpaceOnUse" y2="424.986857" id="47953bc4cb"><stop stop-opacity="1" stop-color="rgb(2.69928%, 0.39978%, 20.799255%)" offset="0"/><stop stop-opacity="1" stop-color="rgb(2.867126%, 0.480652%, 20.849609%)" offset="0.0625"/><stop stop-opacity="1" stop-color="rgb(3.189087%, 0.637817%, 20.94574%)" offset="0.0703125"/><stop stop-opacity="1" stop-color="rgb(3.500366%, 0.788879%, 21.038818%)" offset="0.078125"/><stop stop-opacity="1" stop-color="rgb(3.81012%, 0.939941%, 21.131897%)" offset="0.0859375"/><stop stop-opacity="1" stop-color="rgb(4.121399%, 1.091003%, 21.224976%)" offset="0.09375"/><stop stop-opacity="1" stop-color="rgb(4.431152%, 1.243591%, 21.31958%)" offset="0.101563"/><stop stop-opacity="1" stop-color="rgb(4.742432%, 1.394653%, 21.412659%)" offset="0.109375"/><stop stop-opacity="1" stop-color="rgb(5.052185%, 1.545715%, 21.505737%)" offset="0.117188"/><stop stop-opacity="1" stop-color="rgb(5.363464%, 1.696777%, 21.598816%)" offset="0.125"/><stop stop-opacity="1" stop-color="rgb(5.674744%, 1.847839%, 21.691895%)" offset="0.132812"/><stop stop-opacity="1" stop-color="rgb(5.984497%, 1.998901%, 21.784973%)" offset="0.140625"/><stop stop-opacity="1" stop-color="rgb(6.295776%, 2.151489%, 21.878052%)" offset="0.148438"/><stop stop-opacity="1" stop-color="rgb(6.60553%, 2.302551%, 21.97113%)" offset="0.15625"/><stop stop-opacity="1" stop-color="rgb(6.916809%, 2.453613%, 22.065735%)" offset="0.164063"/><stop stop-opacity="1" stop-color="rgb(7.226562%, 2.604675%, 22.158813%)" offset="0.171875"/><stop stop-opacity="1" stop-color="rgb(7.537842%, 2.755737%, 22.251892%)" offset="0.179688"/><stop stop-opacity="1" stop-color="rgb(7.847595%, 2.908325%, 22.344971%)" offset="0.1875"/><stop stop-opacity="1" stop-color="rgb(8.158875%, 3.059387%, 22.438049%)" offset="0.195313"/><stop stop-opacity="1" stop-color="rgb(8.468628%, 3.210449%, 22.531128%)" offset="0.203125"/><stop stop-opacity="1" stop-color="rgb(8.779907%, 3.361511%, 22.624207%)" offset="0.210938"/><stop stop-opacity="1" stop-color="rgb(9.091187%, 3.512573%, 22.717285%)" offset="0.21875"/><stop stop-opacity="1" stop-color="rgb(9.40094%, 3.663635%, 22.810364%)" offset="0.226563"/><stop stop-opacity="1" stop-color="rgb(9.712219%, 3.816223%, 22.904968%)" offset="0.234375"/><stop stop-opacity="1" stop-color="rgb(10.021973%, 3.967285%, 22.998047%)" offset="0.242188"/><stop stop-opacity="1" stop-color="rgb(10.333252%, 4.118347%, 23.091125%)" offset="0.25"/><stop stop-opacity="1" stop-color="rgb(10.643005%, 4.269409%, 23.184204%)" offset="0.257812"/><stop stop-opacity="1" stop-color="rgb(10.954285%, 4.420471%, 23.277283%)" offset="0.265625"/><stop stop-opacity="1" stop-color="rgb(11.264038%, 4.571533%, 23.370361%)" offset="0.273438"/><stop stop-opacity="1" stop-color="rgb(11.575317%, 4.724121%, 23.46344%)" offset="0.28125"/><stop stop-opacity="1" stop-color="rgb(11.885071%, 4.875183%, 23.556519%)" offset="0.289063"/><stop stop-opacity="1" stop-color="rgb(12.19635%, 5.026245%, 23.651123%)" offset="0.296875"/><stop stop-opacity="1" stop-color="rgb(12.507629%, 5.177307%, 23.744202%)" offset="0.304688"/><stop stop-opacity="1" stop-color="rgb(12.817383%, 5.328369%, 23.83728%)" offset="0.3125"/><stop stop-opacity="1" stop-color="rgb(13.128662%, 5.480957%, 23.930359%)" offset="0.320313"/><stop stop-opacity="1" stop-color="rgb(13.438416%, 5.632019%, 24.023438%)" offset="0.328125"/><stop stop-opacity="1" stop-color="rgb(13.749695%, 5.783081%, 24.116516%)" offset="0.335938"/><stop stop-opacity="1" stop-color="rgb(14.059448%, 5.934143%, 24.209595%)" offset="0.34375"/><stop stop-opacity="1" stop-color="rgb(14.370728%, 6.085205%, 24.302673%)" offset="0.351563"/><stop stop-opacity="1" stop-color="rgb(14.680481%, 6.236267%, 24.397278%)" offset="0.359375"/><stop stop-opacity="1" stop-color="rgb(14.99176%, 6.388855%, 24.490356%)" offset="0.367188"/><stop stop-opacity="1" stop-color="rgb(15.301514%, 6.539917%, 24.583435%)" offset="0.375"/><stop stop-opacity="1" stop-color="rgb(15.612793%, 6.690979%, 24.676514%)" offset="0.382813"/><stop stop-opacity="1" stop-color="rgb(15.924072%, 6.842041%, 24.769592%)" offset="0.390625"/><stop stop-opacity="1" stop-color="rgb(16.233826%, 6.993103%, 24.862671%)" offset="0.398438"/><stop stop-opacity="1" stop-color="rgb(16.545105%, 7.145691%, 24.95575%)" offset="0.40625"/><stop stop-opacity="1" stop-color="rgb(16.854858%, 7.296753%, 25.048828%)" offset="0.414062"/><stop stop-opacity="1" stop-color="rgb(17.166138%, 7.447815%, 25.143433%)" offset="0.421875"/><stop stop-opacity="1" stop-color="rgb(17.475891%, 7.598877%, 25.236511%)" offset="0.429688"/><stop stop-opacity="1" stop-color="rgb(17.78717%, 7.749939%, 25.32959%)" offset="0.4375"/><stop stop-opacity="1" stop-color="rgb(18.096924%, 7.901001%, 25.422668%)" offset="0.445313"/><stop stop-opacity="1" stop-color="rgb(18.408203%, 8.053589%, 25.515747%)" offset="0.453125"/><stop stop-opacity="1" stop-color="rgb(18.717957%, 8.204651%, 25.608826%)" offset="0.460938"/><stop stop-opacity="1" stop-color="rgb(19.029236%, 8.355713%, 25.701904%)" offset="0.46875"/><stop stop-opacity="1" stop-color="rgb(19.340515%, 8.506775%, 25.794983%)" offset="0.476563"/><stop stop-opacity="1" stop-color="rgb(19.650269%, 8.657837%, 25.888062%)" offset="0.484375"/><stop stop-opacity="1" stop-color="rgb(19.961548%, 8.808899%, 25.982666%)" offset="0.492188"/><stop stop-opacity="1" stop-color="rgb(20.271301%, 8.961487%, 26.075745%)" offset="0.494581"/><stop stop-opacity="1" stop-color="rgb(20.426941%, 9.037781%, 26.123047%)" offset="0.5"/><stop stop-opacity="1" stop-color="rgb(20.582581%, 9.112549%, 26.168823%)" offset="0.505419"/><stop stop-opacity="1" stop-color="rgb(20.73822%, 9.188843%, 26.216125%)" offset="0.507813"/><stop stop-opacity="1" stop-color="rgb(20.892334%, 9.263611%, 26.261902%)" offset="0.515625"/><stop stop-opacity="1" stop-color="rgb(21.203613%, 9.414673%, 26.35498%)" offset="0.523438"/><stop stop-opacity="1" stop-color="rgb(21.513367%, 9.565735%, 26.448059%)" offset="0.53125"/><stop stop-opacity="1" stop-color="rgb(21.824646%, 9.718323%, 26.541138%)" offset="0.539063"/><stop stop-opacity="1" stop-color="rgb(22.134399%, 9.869385%, 26.634216%)" offset="0.546875"/><stop stop-opacity="1" stop-color="rgb(22.445679%, 10.020447%, 26.728821%)" offset="0.554688"/><stop stop-opacity="1" stop-color="rgb(22.756958%, 10.171509%, 26.821899%)" offset="0.5625"/><stop stop-opacity="1" stop-color="rgb(23.066711%, 10.322571%, 26.914978%)" offset="0.570313"/><stop stop-opacity="1" stop-color="rgb(23.377991%, 10.473633%, 27.008057%)" offset="0.578125"/><stop stop-opacity="1" stop-color="rgb(23.687744%, 10.626221%, 27.101135%)" offset="0.585938"/><stop stop-opacity="1" stop-color="rgb(23.999023%, 10.777283%, 27.194214%)" offset="0.59375"/><stop stop-opacity="1" stop-color="rgb(24.308777%, 10.928345%, 27.287292%)" offset="0.601563"/><stop stop-opacity="1" stop-color="rgb(24.620056%, 11.079407%, 27.380371%)" offset="0.609375"/><stop stop-opacity="1" stop-color="rgb(24.92981%, 11.230469%, 27.474976%)" offset="0.617188"/><stop stop-opacity="1" stop-color="rgb(25.241089%, 11.381531%, 27.568054%)" offset="0.625"/><stop stop-opacity="1" stop-color="rgb(25.550842%, 11.534119%, 27.661133%)" offset="0.632813"/><stop stop-opacity="1" stop-color="rgb(25.862122%, 11.685181%, 27.754211%)" offset="0.640625"/><stop stop-opacity="1" stop-color="rgb(26.173401%, 11.836243%, 27.84729%)" offset="0.648438"/><stop stop-opacity="1" stop-color="rgb(26.483154%, 11.987305%, 27.940369%)" offset="0.65625"/><stop stop-opacity="1" stop-color="rgb(26.794434%, 12.138367%, 28.033447%)" offset="0.664063"/><stop stop-opacity="1" stop-color="rgb(27.104187%, 12.290955%, 28.126526%)" offset="0.671875"/><stop stop-opacity="1" stop-color="rgb(27.415466%, 12.442017%, 28.22113%)" offset="0.679688"/><stop stop-opacity="1" stop-color="rgb(27.72522%, 12.593079%, 28.314209%)" offset="0.6875"/><stop stop-opacity="1" stop-color="rgb(28.036499%, 12.744141%, 28.407288%)" offset="0.695313"/><stop stop-opacity="1" stop-color="rgb(28.346252%, 12.895203%, 28.500366%)" offset="0.703125"/><stop stop-opacity="1" stop-color="rgb(28.657532%, 13.046265%, 28.593445%)" offset="0.710938"/><stop stop-opacity="1" stop-color="rgb(28.967285%, 13.198853%, 28.686523%)" offset="0.71875"/><stop stop-opacity="1" stop-color="rgb(29.278564%, 13.349915%, 28.779602%)" offset="0.726563"/><stop stop-opacity="1" stop-color="rgb(29.589844%, 13.500977%, 28.872681%)" offset="0.734375"/><stop stop-opacity="1" stop-color="rgb(29.899597%, 13.652039%, 28.967285%)" offset="0.742188"/><stop stop-opacity="1" stop-color="rgb(30.210876%, 13.803101%, 29.060364%)" offset="0.75"/><stop stop-opacity="1" stop-color="rgb(30.52063%, 13.955688%, 29.153442%)" offset="0.757813"/><stop stop-opacity="1" stop-color="rgb(30.831909%, 14.10675%, 29.246521%)" offset="0.765625"/><stop stop-opacity="1" stop-color="rgb(31.141663%, 14.257812%, 29.3396%)" offset="0.773438"/><stop stop-opacity="1" stop-color="rgb(31.452942%, 14.408875%, 29.432678%)" offset="0.78125"/><stop stop-opacity="1" stop-color="rgb(31.762695%, 14.559937%, 29.525757%)" offset="0.789063"/><stop stop-opacity="1" stop-color="rgb(32.073975%, 14.710999%, 29.618835%)" offset="0.796875"/><stop stop-opacity="1" stop-color="rgb(32.383728%, 14.863586%, 29.711914%)" offset="0.804688"/><stop stop-opacity="1" stop-color="rgb(32.695007%, 15.014648%, 29.806519%)" offset="0.8125"/><stop stop-opacity="1" stop-color="rgb(33.006287%, 15.16571%, 29.899597%)" offset="0.820312"/><stop stop-opacity="1" stop-color="rgb(33.31604%, 15.316772%, 29.992676%)" offset="0.828125"/><stop stop-opacity="1" stop-color="rgb(33.627319%, 15.467834%, 30.085754%)" offset="0.835938"/><stop stop-opacity="1" stop-color="rgb(33.937073%, 15.618896%, 30.178833%)" offset="0.84375"/><stop stop-opacity="1" stop-color="rgb(34.248352%, 15.771484%, 30.271912%)" offset="0.851562"/><stop stop-opacity="1" stop-color="rgb(34.558105%, 15.922546%, 30.36499%)" offset="0.859375"/><stop stop-opacity="1" stop-color="rgb(34.869385%, 16.073608%, 30.458069%)" offset="0.867188"/><stop stop-opacity="1" stop-color="rgb(35.179138%, 16.22467%, 30.552673%)" offset="0.875"/><stop stop-opacity="1" stop-color="rgb(35.490417%, 16.375732%, 30.645752%)" offset="0.882812"/><stop stop-opacity="1" stop-color="rgb(35.800171%, 16.52832%, 30.738831%)" offset="0.890625"/><stop stop-opacity="1" stop-color="rgb(36.11145%, 16.679382%, 30.831909%)" offset="0.898438"/><stop stop-opacity="1" stop-color="rgb(36.422729%, 16.830444%, 30.924988%)" offset="0.90625"/><stop stop-opacity="1" stop-color="rgb(36.732483%, 16.981506%, 31.018066%)" offset="0.914062"/><stop stop-opacity="1" stop-color="rgb(37.043762%, 17.132568%, 31.111145%)" offset="0.921875"/><stop stop-opacity="1" stop-color="rgb(37.353516%, 17.28363%, 31.204224%)" offset="0.929688"/><stop stop-opacity="1" stop-color="rgb(37.664795%, 17.436218%, 31.298828%)" offset="0.9375"/><stop stop-opacity="1" stop-color="rgb(37.908936%, 17.555237%, 31.37207%)" offset="1"/></linearGradient><clipPath id="c85c9b6ff8"><path d="M 188.308594 247 L 280.558594 247 L 280.558594 317 L 188.308594 317 Z M 188.308594 247 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#4903ca3bb1)"><g clip-path="url(#b42751d20e)"><g clip-path="url(#32c43dade9)"><path id="main-bg-img" fill="#c864ff" d="M 129.335938 175.132812 C 128.148438 174.414062 127.601562 173.535156 127.292969 172.261719 L 121.128906 146.777344 C 120.515625 144.230469 121.960938 141.847656 124.503906 141.214844 L 149.953125 134.90625 C 152.496094 134.277344 154.867188 135.714844 155.484375 138.261719 C 156.101562 140.8125 154.652344 143.195312 152.109375 143.824219 L 131.113281 149.03125 L 136.199219 170.054688 C 136.816406 172.601562 135.371094 174.984375 132.824219 175.617188 C 131.550781 175.933594 130.519531 175.851562 129.335938 175.132812 Z M 129.335938 175.132812 " fill-opacity="1" fill-rule="nonzero"/></g></g></g><g clip-path="url(#8f1316b201)"><g clip-path="url(#ada42f2ed1)"><g clip-path="url(#5dfe1bf120)"><path id="main-bg-img" fill="#c864ff" d="M 168.847656 199.101562 C 167.664062 198.378906 167.113281 197.503906 166.804688 196.230469 C 166.1875 193.679688 167.636719 191.296875 170.179688 190.667969 L 191.175781 185.460938 L 186.089844 164.4375 C 185.472656 161.890625 186.921875 159.507812 189.464844 158.875 C 192.007812 158.246094 194.378906 159.683594 194.996094 162.230469 L 201.160156 187.714844 C 201.777344 190.261719 200.328125 192.644531 197.785156 193.277344 L 172.335938 199.585938 C 171.066406 199.902344 170.035156 199.820312 168.847656 199.101562 Z M 168.847656 199.101562 " fill-opacity="1" fill-rule="nonzero"/></g></g></g><g clip-path="url(#dee1ecfce6)"><g clip-path="url(#e1bea69fb2)"><g clip-path="url(#1920bc6300)"><path id="main-bg-img" fill="#c864ff" d="M 136.367188 190.269531 C 135.972656 190.03125 135.578125 189.789062 135.421875 189.152344 C 133.929688 187.160156 133.949219 184.453125 136.1875 182.550781 L 180.917969 144.449219 C 182.914062 142.941406 185.613281 142.949219 187.5 145.179688 C 188.996094 147.175781 188.976562 149.878906 186.738281 151.785156 L 142.007812 189.886719 C 140.253906 190.996094 137.949219 191.226562 136.367188 190.269531 Z M 136.367188 190.269531 " fill-opacity="1" fill-rule="nonzero"/></g></g></g><g clip-path="url(#dc38241f4b)"><path fill="#e44d26" d="M 10.367188 197.4375 L 4.5625 132.328125 L 68.347656 132.328125 L 62.535156 197.429688 L 36.414062 204.667969 Z M 10.367188 197.4375 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#f16529" d="M 57.5625 193.285156 L 62.527344 137.652344 L 36.453125 137.652344 L 36.453125 199.136719 Z M 57.5625 193.285156 " fill-opacity="1" fill-rule="nonzero"/><path fill="#ebebeb" d="M 36.425781 145.636719 L 16.429688 145.636719 L 18.582031 169.785156 L 36.453125 169.785156 L 36.453125 161.800781 L 25.886719 161.800781 L 25.15625 153.625 L 36.453125 153.625 L 36.453125 145.636719 Z M 36.453125 182.515625 L 36.417969 182.523438 L 27.527344 180.121094 L 26.960938 173.753906 L 18.941406 173.753906 L 20.058594 186.292969 L 36.417969 190.8125 L 36.453125 190.800781 Z M 36.453125 182.515625 " fill-opacity="1" fill-rule="nonzero"/><path fill="#ffffff" d="M 36.425781 169.785156 L 46.261719 169.785156 L 45.355469 180.140625 L 36.449219 182.542969 L 36.449219 190.851562 L 52.820312 186.3125 L 55.011719 161.796875 L 36.453125 161.796875 Z M 56.238281 147.78125 L 56.429688 145.636719 L 36.421875 145.636719 L 36.421875 153.621094 L 55.710938 153.621094 L 55.867188 151.828125 Z M 56.238281 147.78125 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#36ae86badf)"><path fill="#00d8ff" d="M 114.699219 270.175781 C 113.953125 269.917969 113.183594 269.675781 112.386719 269.445312 C 112.515625 268.910156 112.636719 268.382812 112.746094 267.867188 C 114.492188 259.351562 113.351562 252.492188 109.441406 250.234375 C 105.691406 248.070312 99.5625 250.328125 93.371094 255.722656 C 92.777344 256.242188 92.179688 256.792969 91.582031 257.367188 C 91.183594 256.988281 90.789062 256.621094 90.394531 256.265625 C 83.90625 250.496094 77.402344 248.0625 73.496094 250.328125 C 69.75 252.5 68.644531 258.949219 70.21875 267.015625 C 70.371094 267.796875 70.546875 268.59375 70.75 269.402344 C 69.828125 269.664062 68.941406 269.941406 68.089844 270.238281 C 60.484375 272.894531 55.625 277.058594 55.625 281.378906 C 55.625 285.839844 60.839844 290.316406 68.765625 293.027344 C 69.390625 293.242188 70.039062 293.445312 70.707031 293.636719 C 70.488281 294.511719 70.300781 295.367188 70.140625 296.207031 C 68.640625 304.136719 69.8125 310.429688 73.546875 312.585938 C 77.40625 314.816406 83.878906 312.523438 90.183594 307.003906 C 90.683594 306.570312 91.183594 306.105469 91.679688 305.621094 C 92.332031 306.246094 92.980469 306.839844 93.625 307.394531 C 99.730469 312.660156 105.761719 314.785156 109.492188 312.625 C 113.34375 310.386719 114.597656 303.625 112.972656 295.394531 C 112.847656 294.765625 112.703125 294.125 112.542969 293.472656 C 112.996094 293.339844 113.441406 293.199219 113.878906 293.054688 C 122.113281 290.316406 127.472656 285.902344 127.472656 281.378906 C 127.472656 277.042969 122.457031 272.851562 114.699219 270.175781 Z M 112.914062 290.136719 C 112.519531 290.265625 112.117188 290.390625 111.707031 290.511719 C 110.796875 287.628906 109.570312 284.5625 108.066406 281.394531 C 109.5 278.300781 110.679688 275.273438 111.5625 272.410156 C 112.296875 272.621094 113.011719 272.847656 113.699219 273.082031 C 120.347656 275.375 124.402344 278.769531 124.402344 281.378906 C 124.402344 284.160156 120.023438 287.773438 112.914062 290.136719 Z M 109.960938 295.992188 C 110.679688 299.628906 110.78125 302.921875 110.304688 305.492188 C 109.878906 307.804688 109.015625 309.34375 107.953125 309.960938 C 105.6875 311.273438 100.847656 309.566406 95.628906 305.066406 C 95.027344 304.546875 94.421875 303.996094 93.820312 303.414062 C 95.84375 301.195312 97.867188 298.617188 99.84375 295.753906 C 103.3125 295.445312 106.59375 294.941406 109.574219 294.25 C 109.71875 294.84375 109.847656 295.425781 109.960938 295.992188 Z M 80.121094 309.734375 C 77.910156 310.515625 76.148438 310.539062 75.082031 309.925781 C 72.816406 308.613281 71.875 303.558594 73.160156 296.78125 C 73.304688 296.003906 73.480469 295.203125 73.683594 294.390625 C 76.625 295.042969 79.882812 295.511719 83.367188 295.792969 C 85.355469 298.597656 87.4375 301.171875 89.53125 303.425781 C 89.074219 303.871094 88.617188 304.292969 88.164062 304.6875 C 85.375 307.132812 82.582031 308.863281 80.121094 309.734375 Z M 69.757812 290.117188 C 66.253906 288.917969 63.363281 287.359375 61.378906 285.65625 C 59.597656 284.128906 58.695312 282.609375 58.695312 281.378906 C 58.695312 278.757812 62.597656 275.414062 69.101562 273.144531 C 69.890625 272.867188 70.71875 272.605469 71.574219 272.363281 C 72.472656 275.292969 73.652344 278.355469 75.078125 281.453125 C 73.636719 284.597656 72.4375 287.707031 71.53125 290.675781 C 70.917969 290.5 70.328125 290.3125 69.757812 290.117188 Z M 73.230469 266.425781 C 71.882812 259.511719 72.777344 254.296875 75.035156 252.988281 C 77.4375 251.59375 82.753906 253.582031 88.355469 258.566406 C 88.714844 258.886719 89.074219 259.21875 89.433594 259.5625 C 87.347656 261.808594 85.285156 264.363281 83.3125 267.152344 C 79.933594 267.464844 76.699219 267.96875 73.726562 268.644531 C 73.539062 267.890625 73.375 267.148438 73.230469 266.425781 Z M 104.222656 274.09375 C 103.511719 272.863281 102.78125 271.660156 102.039062 270.492188 C 104.332031 270.785156 106.523438 271.167969 108.589844 271.640625 C 107.972656 273.628906 107.199219 275.707031 106.289062 277.839844 C 105.636719 276.597656 104.949219 275.347656 104.222656 274.09375 Z M 91.582031 261.761719 C 93 263.296875 94.417969 265.011719 95.8125 266.875 C 94.40625 266.808594 92.984375 266.773438 91.550781 266.773438 C 90.128906 266.773438 88.71875 266.808594 87.320312 266.871094 C 88.714844 265.027344 90.148438 263.316406 91.582031 261.761719 Z M 78.863281 274.113281 C 78.15625 275.347656 77.476562 276.589844 76.835938 277.835938 C 75.941406 275.714844 75.179688 273.625 74.554688 271.609375 C 76.605469 271.148438 78.789062 270.773438 81.066406 270.488281 C 80.3125 271.667969 79.578125 272.878906 78.863281 274.113281 Z M 81.132812 292.488281 C 78.78125 292.226562 76.5625 291.871094 74.511719 291.421875 C 75.144531 289.371094 75.925781 287.238281 76.839844 285.070312 C 77.484375 286.3125 78.164062 287.558594 78.878906 288.792969 C 79.605469 290.054688 80.359375 291.285156 81.132812 292.488281 Z M 91.667969 301.214844 C 90.214844 299.640625 88.761719 297.902344 87.347656 296.03125 C 88.722656 296.085938 90.125 296.113281 91.550781 296.113281 C 93.015625 296.113281 94.464844 296.078125 95.886719 296.015625 C 94.488281 297.921875 93.074219 299.664062 91.667969 301.214844 Z M 106.316406 284.960938 C 107.277344 287.152344 108.089844 289.273438 108.730469 291.289062 C 106.648438 291.765625 104.398438 292.148438 102.03125 292.433594 C 102.777344 291.25 103.511719 290.027344 104.234375 288.773438 C 104.96875 287.5 105.660156 286.226562 106.316406 284.960938 Z M 101.574219 287.238281 C 100.453125 289.1875 99.296875 291.050781 98.128906 292.804688 C 96 292.957031 93.796875 293.035156 91.550781 293.035156 C 89.3125 293.035156 87.136719 292.96875 85.042969 292.832031 C 83.828125 291.050781 82.648438 289.183594 81.53125 287.253906 L 81.535156 287.253906 C 80.421875 285.328125 79.394531 283.382812 78.46875 281.453125 C 79.394531 279.519531 80.417969 277.574219 81.523438 275.648438 L 81.523438 275.652344 C 82.632812 273.722656 83.800781 271.863281 85.007812 270.09375 C 87.144531 269.933594 89.335938 269.847656 91.550781 269.847656 C 93.777344 269.847656 95.96875 269.933594 98.101562 270.097656 C 99.292969 271.851562 100.453125 273.707031 101.566406 275.632812 C 102.691406 277.582031 103.726562 279.515625 104.660156 281.410156 C 103.730469 283.335938 102.699219 285.289062 101.574219 287.238281 Z M 107.90625 252.898438 C 110.3125 254.289062 111.25 259.894531 109.734375 267.242188 C 109.640625 267.714844 109.53125 268.191406 109.414062 268.675781 C 106.433594 267.984375 103.195312 267.472656 99.808594 267.15625 C 97.832031 264.339844 95.789062 261.777344 93.734375 259.5625 C 94.285156 259.027344 94.839844 258.519531 95.386719 258.042969 C 100.691406 253.417969 105.648438 251.59375 107.90625 252.898438 Z M 91.550781 274.949219 C 95.089844 274.949219 97.964844 277.828125 97.964844 281.378906 C 97.964844 284.925781 95.089844 287.804688 91.550781 287.804688 C 88.007812 287.804688 85.132812 284.925781 85.132812 281.378906 C 85.132812 277.828125 88.007812 274.949219 91.550781 274.949219 Z M 91.550781 274.949219 " fill-opacity="1" fill-rule="nonzero"/></g><g clip-path="url(#7268217a78)"><path fill="#f7df1e" d="M 49.980469 24.015625 L 114.480469 24.015625 L 114.480469 88.515625 L 49.980469 88.515625 Z M 49.980469 24.015625 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#000000" d="M 66.941406 77.914062 L 71.875 74.929688 C 72.828125 76.617188 73.695312 78.046875 75.773438 78.046875 C 77.761719 78.046875 79.019531 77.265625 79.019531 74.238281 L 79.019531 53.628906 L 85.078125 53.628906 L 85.078125 74.324219 C 85.078125 80.597656 81.402344 83.457031 76.03125 83.457031 C 71.183594 83.457031 68.367188 80.945312 66.9375 77.914062 " fill-opacity="1" fill-rule="nonzero"/><path fill="#000000" d="M 88.371094 77.265625 L 93.308594 74.40625 C 94.609375 76.53125 96.296875 78.089844 99.28125 78.089844 C 101.792969 78.089844 103.398438 76.835938 103.398438 75.101562 C 103.398438 73.023438 101.75 72.285156 98.980469 71.074219 L 97.464844 70.425781 C 93.09375 68.5625 90.191406 66.226562 90.191406 61.289062 C 90.191406 56.742188 93.652344 53.277344 99.066406 53.277344 C 102.921875 53.277344 105.691406 54.621094 107.683594 58.128906 L 102.964844 61.160156 C 101.925781 59.296875 100.800781 58.5625 99.066406 58.5625 C 97.292969 58.5625 96.164062 59.6875 96.164062 61.160156 C 96.164062 62.980469 97.292969 63.714844 99.890625 64.839844 L 101.402344 65.488281 C 106.554688 67.699219 109.457031 69.949219 109.457031 75.015625 C 109.457031 80.46875 105.171875 83.457031 99.414062 83.457031 C 93.785156 83.457031 90.148438 80.773438 88.371094 77.265625 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#29c6f350d7)"><path fill="#0277bd" d="M 261.109375 19.378906 L 195.128906 19.378906 L 200.953125 85.8125 L 228.121094 93.628906 L 255.289062 85.8125 Z M 261.109375 19.378906 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#039be5" d="M 228.121094 25.242188 L 228.121094 87.574219 L 249.855469 81.320312 L 254.707031 25.242188 Z M 228.121094 25.242188 " fill-opacity="1" fill-rule="nonzero"/><path fill="#ffffff" d="M 245.78125 35.011719 L 228.121094 35.011719 L 228.121094 42.828125 L 237.628906 42.828125 L 237.046875 50.644531 L 228.121094 50.644531 L 228.121094 58.460938 L 236.660156 58.460938 L 236.078125 67.25 L 228.121094 69.988281 L 228.121094 78.195312 L 243.453125 73.113281 L 244.808594 50.644531 Z M 245.78125 35.011719 " fill-opacity="1" fill-rule="nonzero"/><path fill="#eeeeee" d="M 228.121094 35.011719 L 228.121094 42.828125 L 210.847656 42.828125 L 210.265625 35.011719 Z M 219.191406 50.644531 L 219.582031 58.460938 L 228.121094 58.460938 L 228.121094 50.644531 Z M 219.96875 62.367188 L 212.207031 62.367188 L 212.789062 73.113281 L 228.121094 78.195312 L 228.121094 69.988281 L 220.164062 67.25 Z M 219.96875 62.367188 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#b012cf7724)"><g clip-path="url(#a3d6e35a04)"><path fill="url(#47953bc4cb)" d="M 261.441406 131.101562 L 261.441406 202.347656 L 332.492188 202.347656 L 332.492188 131.101562 Z M 261.441406 131.101562 " fill-rule="nonzero"/></g></g><path fill="#ffffff" d="M 297.445312 161.714844 C 299.265625 161.714844 300.640625 161.328125 301.582031 160.53125 C 302.519531 159.734375 302.988281 158.578125 302.988281 157.039062 C 302.988281 155.519531 302.519531 154.363281 301.582031 153.574219 C 300.636719 152.765625 299.261719 152.363281 297.445312 152.363281 L 291.066406 152.363281 L 291.066406 161.714844 L 297.445312 161.714844 M 297.835938 181.042969 C 300.152344 181.042969 301.890625 180.558594 303.046875 179.59375 C 304.226562 178.625 304.816406 177.164062 304.816406 175.210938 C 304.816406 173.296875 304.234375 171.867188 303.078125 170.921875 C 301.917969 169.953125 300.171875 169.472656 297.835938 169.472656 L 291.066406 169.472656 L 291.066406 181.042969 L 297.835938 181.042969 M 308.558594 165.148438 C 311.035156 165.859375 312.953125 167.171875 314.3125 169.085938 C 315.667969 171 316.347656 173.347656 316.347656 176.128906 C 316.347656 180.394531 314.890625 183.570312 311.976562 185.660156 C 309.058594 187.753906 304.625 188.796875 298.675781 188.796875 L 279.535156 188.796875 L 279.535156 144.617188 L 296.847656 144.617188 C 303.058594 144.617188 307.554688 145.546875 310.328125 147.402344 C 313.125 149.253906 314.523438 152.226562 314.523438 156.308594 C 314.523438 158.460938 314.011719 160.296875 312.996094 161.816406 C 311.976562 163.316406 310.492188 164.421875 308.5625 165.160156 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#c85c9b6ff8)"><path fill="#f06292" d="M 267.578125 287.117188 C 264.375 287.132812 261.601562 287.90625 259.277344 289.054688 C 258.429688 287.355469 257.566406 285.855469 257.421875 284.746094 C 257.253906 283.445312 257.058594 282.671875 257.261719 281.125 C 257.464844 279.578125 258.359375 277.386719 258.347656 277.222656 C 258.335938 277.054688 258.148438 276.269531 256.300781 276.253906 C 254.453125 276.242188 252.871094 276.613281 252.6875 277.101562 C 252.5 277.589844 252.144531 278.6875 251.925781 279.835938 C 251.601562 281.515625 248.238281 287.5 246.328125 290.632812 C 245.703125 289.410156 245.171875 288.332031 245.0625 287.480469 C 244.894531 286.183594 244.695312 285.40625 244.902344 283.859375 C 245.105469 282.3125 246 280.121094 245.984375 279.957031 C 245.972656 279.792969 245.785156 279.003906 243.9375 278.992188 C 242.09375 278.980469 240.511719 279.347656 240.324219 279.835938 C 240.140625 280.324219 239.941406 281.464844 239.5625 282.574219 C 239.183594 283.675781 234.714844 293.664062 233.542969 296.253906 C 232.945312 297.570312 232.425781 298.632812 232.058594 299.355469 C 232.058594 299.351562 232.058594 299.347656 232.058594 299.347656 C 232.058594 299.347656 232.035156 299.398438 231.996094 299.480469 C 231.683594 300.09375 231.496094 300.433594 231.496094 300.433594 C 231.496094 300.433594 231.5 300.4375 231.503906 300.449219 C 231.253906 300.898438 230.988281 301.320312 230.855469 301.320312 C 230.765625 301.320312 230.578125 300.117188 230.894531 298.460938 C 231.5625 295 233.160156 289.597656 233.144531 289.410156 C 233.136719 289.3125 233.441406 288.371094 232.101562 287.878906 C 230.796875 287.402344 230.332031 288.199219 230.214844 288.199219 C 230.097656 288.203125 230.015625 288.484375 230.015625 288.484375 C 230.015625 288.484375 231.464844 282.40625 227.246094 282.40625 C 224.605469 282.40625 220.949219 285.300781 219.144531 287.925781 C 218.007812 288.546875 215.574219 289.878906 212.996094 291.300781 C 212.003906 291.847656 210.992188 292.402344 210.03125 292.933594 C 209.96875 292.859375 209.898438 292.789062 209.832031 292.71875 C 204.714844 287.242188 195.25 283.371094 195.652344 276.011719 C 195.796875 273.335938 196.726562 266.289062 213.835938 257.746094 C 227.851562 250.746094 239.074219 252.671875 241.011719 256.941406 C 243.78125 263.039062 235.015625 274.375 220.460938 276.011719 C 214.914062 276.636719 211.992188 274.480469 211.265625 273.675781 C 210.503906 272.832031 210.386719 272.796875 210.101562 272.953125 C 209.636719 273.210938 209.929688 273.957031 210.101562 274.402344 C 210.539062 275.535156 212.320312 277.542969 215.359375 278.546875 C 218.035156 279.425781 224.546875 279.910156 232.421875 276.855469 C 241.242188 273.4375 248.128906 263.925781 246.105469 255.976562 C 244.046875 247.890625 230.671875 245.230469 218.007812 249.738281 C 210.464844 252.425781 202.308594 256.636719 196.441406 262.132812 C 189.46875 268.667969 188.355469 274.359375 188.8125 276.738281 C 190.441406 285.183594 202.058594 290.6875 206.710938 294.761719 C 206.484375 294.890625 206.265625 295.007812 206.070312 295.117188 C 203.738281 296.273438 194.882812 300.917969 192.667969 305.824219 C 190.152344 311.390625 193.066406 315.386719 194.996094 315.925781 C 200.96875 317.589844 207.097656 314.59375 210.394531 309.667969 C 213.691406 304.746094 213.289062 298.332031 211.777344 295.40625 C 211.757812 295.371094 211.738281 295.335938 211.71875 295.296875 C 212.320312 294.941406 212.933594 294.578125 213.542969 294.21875 C 214.730469 293.519531 215.894531 292.867188 216.90625 292.316406 C 216.339844 293.871094 215.925781 295.734375 215.710938 298.421875 C 215.457031 301.582031 216.75 305.667969 218.441406 307.273438 C 219.1875 307.980469 220.082031 307.996094 220.648438 307.996094 C 222.617188 307.996094 223.511719 306.359375 224.503906 304.417969 C 225.714844 302.039062 226.789062 299.265625 226.789062 299.265625 C 226.789062 299.265625 225.441406 306.75 229.117188 306.75 C 230.460938 306.75 231.808594 305.007812 232.410156 304.121094 C 232.410156 304.132812 232.410156 304.136719 232.410156 304.136719 C 232.410156 304.136719 232.445312 304.078125 232.515625 303.960938 C 232.65625 303.75 232.734375 303.613281 232.734375 303.613281 C 232.734375 303.613281 232.734375 303.597656 232.738281 303.574219 C 233.277344 302.636719 234.472656 300.5 236.265625 296.976562 C 238.582031 292.421875 240.800781 286.714844 240.800781 286.714844 C 240.800781 286.714844 241.007812 288.109375 241.683594 290.417969 C 242.082031 291.773438 242.925781 293.273438 243.59375 294.714844 C 243.058594 295.460938 242.730469 295.890625 242.730469 295.890625 C 242.730469 295.890625 242.730469 295.898438 242.738281 295.914062 C 242.308594 296.484375 241.828125 297.101562 241.324219 297.699219 C 239.496094 299.882812 237.320312 302.375 237.027344 303.089844 C 236.683594 303.9375 236.765625 304.5625 237.429688 305.0625 C 237.914062 305.429688 238.777344 305.488281 239.679688 305.425781 C 241.320312 305.316406 242.476562 304.90625 243.046875 304.660156 C 243.933594 304.34375 244.96875 303.847656 245.941406 303.132812 C 247.734375 301.8125 248.8125 299.921875 248.710938 297.417969 C 248.652344 296.039062 248.214844 294.671875 247.660156 293.382812 C 247.820312 293.148438 247.984375 292.910156 248.148438 292.671875 C 250.972656 288.53125 253.167969 283.984375 253.167969 283.984375 C 253.167969 283.984375 253.371094 285.378906 254.050781 287.683594 C 254.390625 288.851562 255.066406 290.128906 255.675781 291.375 C 253.019531 293.539062 251.371094 296.054688 250.796875 297.703125 C 249.742188 300.753906 250.570312 302.136719 252.121094 302.449219 C 252.828125 302.59375 253.820312 302.269531 254.570312 301.953125 C 255.5 301.644531 256.617188 301.128906 257.664062 300.359375 C 259.457031 299.035156 261.179688 297.1875 261.078125 294.683594 C 261.027344 293.546875 260.722656 292.414062 260.300781 291.328125 C 262.554688 290.386719 265.472656 289.867188 269.1875 290.300781 C 277.15625 291.234375 278.71875 296.21875 278.417969 298.304688 C 278.121094 300.394531 276.449219 301.539062 275.890625 301.886719 C 275.332031 302.234375 275.160156 302.355469 275.207031 302.613281 C 275.273438 302.984375 275.53125 302.972656 276.011719 302.890625 C 276.664062 302.78125 280.195312 301.195312 280.34375 297.34375 C 280.535156 292.445312 275.859375 287.074219 267.578125 287.117188 Z M 206.152344 307.871094 C 203.511719 310.757812 199.828125 311.847656 198.246094 310.929688 C 196.539062 309.9375 197.214844 305.6875 200.453125 302.625 C 202.425781 300.757812 204.976562 299.039062 206.667969 297.980469 C 207.050781 297.75 207.617188 297.410156 208.304688 296.996094 C 208.417969 296.929688 208.480469 296.894531 208.480469 296.894531 L 208.480469 296.890625 C 208.613281 296.8125 208.75 296.730469 208.886719 296.644531 C 210.070312 301.003906 208.925781 304.84375 206.152344 307.871094 Z M 225.386719 294.769531 C 224.464844 297.015625 222.542969 302.765625 221.371094 302.453125 C 220.363281 302.191406 219.753906 297.820312 221.171875 293.523438 C 221.882812 291.359375 223.40625 288.773438 224.300781 287.769531 C 225.742188 286.152344 227.328125 285.625 227.714844 286.28125 C 228.203125 287.117188 225.960938 293.363281 225.386719 294.769531 Z M 241.273438 302.367188 C 240.882812 302.570312 240.523438 302.699219 240.359375 302.601562 C 240.238281 302.527344 240.519531 302.257812 240.519531 302.257812 C 240.519531 302.257812 242.507812 300.117188 243.289062 299.140625 C 243.746094 298.574219 244.273438 297.898438 244.847656 297.148438 C 244.851562 297.222656 244.851562 297.296875 244.851562 297.371094 C 244.847656 299.9375 242.375 301.671875 241.273438 302.367188 Z M 253.507812 299.570312 C 253.21875 299.363281 253.269531 298.695312 254.222656 296.605469 C 254.597656 295.785156 255.457031 294.40625 256.945312 293.085938 C 257.117188 293.628906 257.21875 294.148438 257.21875 294.632812 C 257.199219 297.863281 254.902344 299.070312 253.507812 299.570312 Z M 253.507812 299.570312 " fill-opacity="1" fill-rule="nonzero"/></g></svg>
            </div>
        </main>

        <section id="projects">
            <div class="title-section">
                <h3 class="title-small"><?= $projectSubTitle; ?></h3>
                <h2 class="title"><?= $projectTitle; ?></h2>
            </div>
            <div class="content">
                <div class="project-boxes">
                    <?php
                    $allData = $data->prepare("SELECT * FROM projects where lang=? order by id desc");
                    $allData->execute(array($lang));
                    $fetchData = $allData->fetchAll(PDO::FETCH_ASSOC);
                    if($allData->rowCount()){
                        foreach ($fetchData as $key => $value) {
                            ?>
                            <div class="project-box">
                                <div class="project-img" onclick="showPopup('<?= $value['id'] ?>','project')">
                                    <img src="<?= $value['image'] ?>" alt="Proje Image">
                                </div>
                                <div class="project-title"><?= $value['name'] ?></div>
                                <div class="project-exp">
                                    <?= $value['exp'] ?> 
                                </div>
                                <div class="project-langs">
                                    <?php 
                                        $codingValues = explode("-",$value['coding']);
                                        $allDataCoding = $data->prepare("SELECT * FROM coding");
                                        $allDataCoding->execute();
                                        $fetchDataCoding = $allDataCoding->fetchAll(PDO::FETCH_ASSOC);
                                        if($allDataCoding->rowCount()){
                                            foreach ($codingValues as $valueCodingArray) {
                                                ?>
                                                <div class="project-hashtag <?= $fetchDataCoding[$valueCodingArray]['color'] ?>"><i class="<?= $fetchDataCoding[$valueCodingArray]['icon'] ?>"></i> <?= $fetchDataCoding[$valueCodingArray]['name'] ?></div>
                                                <?php
                                            } 
                                        }
                                    ?>
                                </div>
                                <div class="project-links">
                                    <a class="project-link" target="_blank" href="<?= $value['link'] ?>"><i class="bi bi-eye"></i> <?= $projectLinkText; ?></a>
                                </div>
                            </div>
                            
                            <!-- Popup Menu -->
                            <div class="project-popup-area" id="show-popup-project-<?= $value['id'] ?>">
                                <div class="project-popup-box">
                                    <div class="popup-img">
                                        <img src="<?= $value['image'] ?>" alt="Proje Image">
                                    </div>
                                    <div class="popup-content">
                                        <h2><?= $value['name'] ?></h2>
                                        <p>
                                            <?= $value['exp'] ?>
                                        </p>
                                        
                                        <?php 
                                            $codingValues = explode("-",$value['coding']);
                                            $allDataCoding = $data->prepare("SELECT * FROM coding");
                                            $allDataCoding->execute();
                                            $fetchDataCoding = $allDataCoding->fetchAll(PDO::FETCH_ASSOC);
                                            if($allDataCoding->rowCount()){
                                                foreach ($codingValues as $valueCodingArray) {
                                                    ?>
                                                    <div class="project-hashtag <?= $fetchDataCoding[$valueCodingArray]['color'] ?>"><i class="<?= $fetchDataCoding[$valueCodingArray]['icon'] ?>"></i> <?= $fetchDataCoding[$valueCodingArray]['name'] ?></div>
                                                    <?php
                                                } 
                                            }
                                        ?>

                                        <a class="popup-link" target="_blank" href="<?= $value['link'] ?>"><i class="bi bi-eye"></i> <?= $projectLinkText; ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <div class="grid-section">
            <section id="experiences">
                <div class="title-section">
                    <h3 class="title-small"><?= $experienceSubTitle; ?></h3>
                    <h2 class="title"><?= $experienceTitle; ?></h2>
                </div>

                <div class="content">
                    <div class="exp-boxes">
                    <?php
                    $allData = $data->prepare("SELECT * FROM experiences where lang=? order by id desc");
                    $allData->execute(array($lang));
                    $fetchData = $allData->fetchAll(PDO::FETCH_ASSOC);
                    if($allData->rowCount()){
                        foreach ($fetchData as $key => $value) {
                              ?>
                              <div class="exp-box">
                                <div class="exp-number">0<?= $key + 1; ?></div>
                                <div class="exp-detail">
                                    <div class="exp-header">
                                        <div class="exp-logo">
                                            <div class="exp-img">
                                                <img src="<?= $value['image'] ?>" alt="Company Logo">
                                            </div>
                                            <div class="exp-title">
                                                <h2><?= $value['title'] ?></h2>
                                                <p><?= $value['company'] ?> <span class="date-small"><?= $value['startDate'] ?> - <?= $value['endDate'] ?></span></p>
                                            </div>
                                        </div>
                                        <div class="exp-date">
                                        <?= $value['startDate'] ?> - <?= $value['endDate'] ?>
                                        </div>
                                    </div>
                                    <p class="exp-exp"><?= $value['exp'] ?></p>
                                    <div class="exp-buttons">
                                        <?php 
                                            $codingValues = explode("-",$value['coding']);
                                            
                                            $allDataCoding = $data->prepare("SELECT * FROM coding");
                                            $allDataCoding->execute();
                                            $fetchDataCoding = $allDataCoding->fetchAll(PDO::FETCH_ASSOC);
                                            $fetchCodingValues = array();
                                            if($allDataCoding->rowCount()){
                                                foreach ($fetchDataCoding as $keyCoding => $valueCoding) {
                                                    foreach($codingValues as $keyCodingValue => $valueCodingArray){
                                                        if($valueCodingArray == $keyCoding){
                                                            ?>
                                                            <div class="exp-btn <?= $valueCoding['color'] ?>"><i class="<?= $valueCoding['icon'] ?>"></i> <?= $valueCoding['name'] ?></div>
                                                            <?php
                                                        }
                                                    }
                                                } 
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                              <?php              
                        } 
                    }
                    ?>
                    </div>
                </div>
            </section>

            <section id="skills">
                <div class="title-section">
                    <h3 class="title-small"><?= $skillSubTitle; ?></h3>
                    <h2 class="title"><?= $skillTitle; ?></h2>
                </div>
    
                <div class="content">
                    <div class="skill-boxes">
                        <!-- Creating with JS (skillCounter.js) -->
                    </div>
                </div>
            </section>
        </div>

        <section id="works">
            <div class="title-section">
                <h3 class="title-small"><?= $workSubTitle; ?></h3>
                <h2 class="title"><?= $workTitle; ?></h2>
            </div>
            <div class="content">
                <div class="project-boxes">
                    <?php
                    $allData = $data->prepare("SELECT * FROM works where lang=? order by id desc");
                    $allData->execute(array($lang));
                    $fetchData = $allData->fetchAll(PDO::FETCH_ASSOC);
                    if($allData->rowCount()){
                        foreach ($fetchData as $key => $value) {
                            ?>
                            <div class="project-box">
                                <div class="project-img" onclick="showPopup('<?= $value['id'] ?>','work')">
                                    <img src="<?= $value['image'] ?>" alt="Work Image">
                                </div>
                                <div class="project-title"><?= $value['name'] ?></div>
                                <div class="project-exp"><?= $value['exp'] ?></div>

                                <div class="project-langs">
                                    <?php 
                                        $codingValues = explode("-",$value['coding']);
                                        $allDataCoding = $data->prepare("SELECT * FROM coding");
                                        $allDataCoding->execute();
                                        $fetchDataCoding = $allDataCoding->fetchAll(PDO::FETCH_ASSOC);
                                        if($allDataCoding->rowCount()){
                                            foreach ($codingValues as $valueCodingArray) {
                                                ?>
                                                <div class="project-hashtag <?= $fetchDataCoding[$valueCodingArray]['color'] ?>"><i class="<?= $fetchDataCoding[$valueCodingArray]['icon'] ?>"></i> <?= $fetchDataCoding[$valueCodingArray]['name'] ?></div>
                                                <?php
                                            } 
                                        }
                                    ?>
                                </div>

                                <div class="project-links">
                                    <?php
                                    if ($value['github']) {
                                        ?>
                                        <a class="github-link" target="_blank" href="<?= $value['github'] ?>"><i class="bi bi-github"></i> GitHub</a>
                                        <?php
                                    }
                                    if ($value['link']) {
                                        $httpCut = explode(":",$value['link']);
                                        if($httpCut[0] == "https" || $httpCut[0] == "http"){
                                            $valueLink = $value['link'];
                                        }else{
                                            $valueLink = $siteUrl . "projects/" . $value['link'] . "/";
                                        }
                                        ?>
                                        <a class="work-link" target="_blank" href="<?= $valueLink ?>"><i class="bi bi-eye"></i> <?= $workLinkText; ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                             <!-- Popup Menu -->
                             <div class="project-popup-area" id="show-popup-work-<?= $value['id'] ?>">
                                <div class="project-popup-box">
                                    <div class="popup-img">
                                        <img src="<?= $value['image'] ?>" alt="Proje Image">
                                    </div>
                                    <div class="popup-content">
                                        <h2><?= $value['name'] ?></h2>
                                        <p>
                                            <?= $value['exp'] ?>
                                        </p>
                                        
                                        <?php 
                                            $codingValues = explode("-",$value['coding']);
                                            $allDataCoding = $data->prepare("SELECT * FROM coding");
                                            $allDataCoding->execute();
                                            $fetchDataCoding = $allDataCoding->fetchAll(PDO::FETCH_ASSOC);
                                            if($allDataCoding->rowCount()){
                                                foreach ($codingValues as $valueCodingArray) {
                                                    ?>
                                                    <div class="project-hashtag <?= $fetchDataCoding[$valueCodingArray]['color'] ?>"><i class="<?= $fetchDataCoding[$valueCodingArray]['icon'] ?>"></i> <?= $fetchDataCoding[$valueCodingArray]['name'] ?></div>
                                                    <?php
                                                } 
                                            }
                                        ?>

                                        <?php
                                        $httpCut = explode(":",$value['link']);
                                        if($httpCut[0] == "https" || $httpCut[0] == "http"){
                                            $valueLink = $value['link'];
                                        }else{
                                            $valueLink = $siteUrl . "projects/" . $value['link'] . "/";
                                        }
                                        if($value['github'] && $value['link']){
                                            ?>
                                             <div class="popup-grid-link">
                                                <a class="popup-link gray" target="_blank" href="<?= $value['github'] ?>"><i class="bi bi-github"></i> GitHub</a>
                                                <a class="popup-link" target="_blank" href="<?= $valueLink ?>"><i class="bi bi-eye"></i> <?= $workLinkText; ?></a>
                                            </div>
                                            <?php
                                        }else{
                                            if($value['github']){
                                                ?>
                                                    <a class="popup-link gray" target="_blank" href="<?= $value['github'] ?>"><i class="bi bi-github"></i> GitHub</a>
                                                <?php
                                            }
                                            if($value['link']){
                                                ?>
                                                    <a class="popup-link" target="_blank" href="<?= $valueLink ?>"><i class="bi bi-eye"></i> <?= $workLinkText; ?></a>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <?php           
                        } 
                    }
                    ?>
                </div>
            </div>
        </section>

        <footer id="contact">
            <div class="section">
                <h3 class="title-small"><?= $contactTitle; ?></h3>
                <div class="footer-links">
                    <a target="_blank" href="<?= $fetchSettingsData['github'] ?>" target="_blank"><i class="fa-brands fa-github"></i> GitHub <span class="fa-solid fa-arrow-right"></span></a>
                    <a target="_blank" href="<?= $fetchSettingsData['linkedin'] ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i> Linkedin <span class="fa-solid fa-arrow-right"></span></a>
                    <a href="<?= $fetchSettingsData['instagram'] ?>" target="_blank"><i class="fa-brands fa-instagram"></i> Instagram <span class="fa-solid fa-arrow-right"></span></a>
                    <a target="_blank" href="mailto:<?= $fetchSettingsData['email'] ?>" target="_blank"><i class="fa-regular fa-envelope"></i> Email <span class="fa-solid fa-arrow-right"></span></a>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=9<?= $fetchSettingsData['whatsapp'] ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i> Whatsapp <span class="fa-solid fa-arrow-right"></span></a>
                </div>
            <div class="footer-term">
                <i class="fa-solid fa-copyright"></i> <?= $footerText; ?>
            </div>
            </div>
        </footer>
      
    </div>


    <script src="./assets/js/type.js"></script>
    <script src="./assets/js/skillCounte.js"></script>
    <script src="./assets/js/colors.js"></script>
    <script src="./assets/js/scriptts.js"></script>
    <script>
        <?= $typedAbout ?>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>