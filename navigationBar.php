<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Introduction Internet Programming">
        <meta name="keyword" content="brightsmile, dental, dental clinic, dental">
        <meta name="viewport"content="width=device-width, initial-scale=1">

        <title>BrightSmile | Home</title>

        <link rel="stylesheet" href="./css/style.css">

        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

        <link rel="icon" href="favicon.ico" type="image/x-icon">
    </head>

    <body>
      <!--=============== HEADER ===============-->
      <header class="header">
         <nav class="nav container">
            <div class="nav__data">
               <a href="index.php" class="nav__logo" style="font-size:1rem;">
                <img src="img\dentalLogo.png" alt="Company Logo" class="nav__logo-img" style="height:75px; width:75px;">| BrightSmile
               </a>

               
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line nav__burger"></i>
                  <i class="ri-close-line nav__close"></i>
               </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
                  <li><a href="index.php" class="nav__link" style="font-size: small;">Home</a></li>

                  <li class="dropdown__item">
                     <div class="nav__link" style="font-size: small;">
                        About Us <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                     </div>

                     <ul class="dropdown__menu">
                        <li>
                           <a href="infection-control.php" class="dropdown__link" style="font-size: small;">
                              <i class="ri-lock-line"></i> Infection Control
                           </a>
                        </li>

                        <li>
                           <a href="material-equipment.php" class="dropdown__link" style="font-size: small;">
                              <i class="ri-message-3-line"></i> Matetials & Equipment
                           </a>
                        </li>

                        <li>
                           <a href="safe-surgery.php" class="dropdown__link" style="font-size: small;">
                              <i class="ri-message-3-line"></i> Safe Surgery
                           </a>
                        </li>
                     </ul>
                  </li>
                  <!--=============== DROPDOWN 2 ===============-->
                  <li class="dropdown__item">
                     <div class="nav__link" style="font-size: small;">
                        Associates <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                     </div>

                     <ul class="dropdown__menu">
                        <li>
                           <a href="loginPage.html" class="dropdown__link" style="font-size: small;">
                              <i class="ri-user-line"></i> Login
                           </a>                          
                        </li>
                     </ul>
                  </li>

                  <li class="dropdown__item">
                     <div class="nav__link" style="font-size: small;">
                        Contact Us <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                     </div>

                     <ul class="dropdown__menu">
                        <li>
                           <a href="https://wa.me/660183712388" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1500" target="_blank" class="dropdown__link">
                              <i class="ri-user-line"></i> Virtual Consultation
                           </a>                          
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>

      <!--=============== MAIN JS ===============-->
      <script src="./js/main.js"></script>
        <script>
            AOS.init({offset:0});
        </script>
   </body>
</html>