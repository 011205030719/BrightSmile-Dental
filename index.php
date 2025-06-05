<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Introduction Internet Programming">
        <meta name="keyword" content="brightsmile, dental, dental clinic, dental">
        <meta name="viewport"content="width=device-width, initial-scale=1">

        <title>BrightSmile | Home</title>

        <link rel="stylesheet" href="./css/style.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                        <!-- <li>
                           <a href="#" class="dropdown__link">
                              <i class="ri-user-line"></i> Leadership Team
                           </a>                          
                        </li> -->

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

                     <ul class="dropdown__menu"style="font-size: small;">
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

      <section>
         <div class="main-container">
            <div class="image" data-aos="zoom-out" data-aos-duration="3000">
                <img src="img\hero-banner.png" alt="">
            </div>

            <div class="content">
               <h1 data-aos="fade-left" style="font-size:25px;" data-aos-duration="1500" data-aos-delay="700">Welcome to <span>BrightSmile Dental</span></h1>
               <div class="typewriter" style="font-size:35px;" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="900">We provide <span class="typewriter-text"></span><label for="">|</label></div>
               <p data-aos="flip-down" style="font-size:20px;" data-aos-duration="1500" data-aos-delay="1100" >
                  Our dental clinic provides high-quality care in a friendly environment. We offer preventive, cosmetic, and restorative treatments using the latest technology for efficient and comfortable visits. Whether you need a check-up, teeth whitening, or implants, we aim to give you a healthy, confident smile.
               </p>

               <div class="social-links">
                  
                  <a href="#booking-section" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1500">
                        <i class="fa-solid fa-calendar-check"></i>
                  </a>
                  
                  <a href="https://wa.me/660183712388" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1500" target="_blank">
                        <i class="fa-brands fa-whatsapp"></i>
                  </a>
                  
                  <a href="mailto:dental@example.com" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1500">
                     <i class="fa-solid fa-envelope"></i>
                  </a>
               </div>

               <div class="btn" data-aos="zoom-in" data-aos-duration="1500" data-aos-delay="1800">
                  <a href="index.php#booking-section" style="text-decoration: none;">
                     <button style="padding: 10px 20px; font-size: 16px;">Appointment</button>
                  </a>

                  <a href="https://wa.me/660183712388" target="_blank" style="text-decoration: none;">
                     <button style="padding: 10px 20px; font-size: 16px;">Call Us</button>
                  </a>

               </div>
            </div>
         </div>
      </section>

      <section class="services">
         <div class="background-card" style="height:85%; margin-top:3%; margin-bottom:1%;">
            <div class="container_service">
               <div class="services-title">
                  <div class="title" style="font-size:35px;">
                     <h2><span> Our </span> Services</h2>
                  </div>
               </div>

               <div class="services-box">
                  <div class="box">
                     <div class="ser-box" style="min-height:130px;">
                        <div class="icon" style="width:85px;height:85px;">
                           <img src="img\implant.svg">
                        </div>
                        <h4 style="font-size:15px;">Dental Implants</h4>
                     </div>
                  </div>

                  <div class="box">
                     <div class="ser-box" style="min-height:130px;">
                        <div class="icon" style="width:85px;height:85px;">
                           <img src="img\RootCanal.svg">
                        </div>
                        <h4 style="font-size:15px;">Root Canal Treatment</h4>
                     </div>
                  </div>

                  <div class="box">
                     <div class="ser-box" style="min-height:130px;">
                        <div class="icon" style="width:85px;height:85px;">
                           <img src="img\wisdom-teeth-1.svg">
                        </div>
                        <h4 style="font-size:15px;">Wisdom Tooth Surgery</h4>
                     </div>
                  </div>


                  <div class="box">
                     <div class="ser-box" style="min-height:130px;">
                        <div class="icon" style="width:85px;height:85px;">
                           <img src="img\EmergencyNight-Dentistry.svg">
                        </div>
                        <h4 style="font-size:15px;">Emergency & Night Dentistry</h4>
                     </div>
                  </div>

                  <div class="box">
                     <div class="ser-box" style="min-height:130px;">
                        <div class="icon" style="width:85px;height:85px;">
                           <img src="img\HolisticDentistry.svg">
                        </div>
                        <h4 style="font-size:15px;">Holistic Dentistry</h4>
                     </div>
                  </div>

                  <div class="box">
                     <div class="ser-box" style="min-height:130px;">
                        <div class="icon" style="width:85px;height:85px;">
                           <img src="img\DigitalDentistry.svg">
                        </div>
                        <h4 style="font-size:15px;">Digital Smile Design</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <div id="booking-section"> 
         <div class="booking">
            <div class="left-side">
               <img src="img/medical-appointment-1.svg" alt="Logo" class="logo">
               <h1 class="title">Book an <br> Appointment</h1>
               <p class="text">Fill out the form for any request or questions you have and we will contact you within one working day.</p>
            </div>
            <div class="right-side"><!--container-->
               <form class="form-group" method="POST" action="appontmentExec.php" onsubmit="return validateForm();">

                     <h1 class="text-center" style="margin-top: 1%;">BrightSmile Dental Clinic</h1>

                     <div id="form"><!--form-->
                        <h3 class="text-black">Booking Details</h3>

                        <div id="booking-details-container">
                           <div class="booking-details">
                                 <div id="input">
                                    <input type="text" style="width:250px;" id="input-group" placeholder="Patient Name" name="txtPatientName[]" required>
                                    <input type="text" style="width:250px;" id="input-group" placeholder="Age" name="txtAge[]" required>
                                    
                                    <select id="input-group" style="background: white; width:250px;" name="txtService[]" class="serviceSelect">
                                       <option value="">Choose Service</option>
                                       <?php
                                       include("inc/dbCon.php");
                                       $servicesQuery = "
                                          SELECT s.id, s.service_name 
                                          FROM services s 
                                          GROUP BY s.service_name
                                       ";
                                       $servicesResult = mysqli_query($db, $servicesQuery);
                                       
                                       while ($service = mysqli_fetch_assoc($servicesResult)) {
                                          echo "<option value=\"{$service['id']}\">{$service['service_name']}</option>";
                                       }
                                       ?>
                                    </select>

                                    <select id="input-group" style="background: white; width:250px;" name="txtDoctor[]" class="doctorSelect">
                                       <option value="">Preferred Doctor</option>
                                    </select>


                                    <input type="date" style="width:250px;" id="input-group" class="passdate" style="background: white;" name="txtDate[]" min="">


                                    <select id="input-group" style="background: white; width: 250px;" name="txtTime[]">
                                       <option value="">Preferred Time</option>
                                       <option value="09:00">09:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                       <option value="13:00">13:00</option>
                                       <option value="14:00">14:00</option>
                                       <option value="15:00">15:00</option>
                                       <option value="16:00">16:00</option>
                                       <option value="17:00">17:00</option>
                                       <option value="18:00">18:00</option>
                                    </select>

                                    <br>
                                    <span id="input-group" class="text-primary">Select Gender</span>
                                    <input type="radio" id="gender_female_0" name="txtGender[0]" value="0">
                                    <label class="text-black" for="gender_female_0">Female</label>

                                    <input type="radio" id="gender_male_0" name="txtGender[0]" value="1">
                                    <label class="text-black" for="gender_male_0">Male</label>

                                 </div>
                           </div>
                        </div>

                        <button type="button" id="add-form" class="btn btn-secondary">Add More</button>

                        <div id="input5">
                           <h3 class="text-black">Contact Info</h3>
                        </div>

                        <div id="input6">
                           <input type="text" style="width:250px;" id="input-group" placeholder="Full Name" name="contactName" required>
                           <input required type="number" style="width:250px;" id="input-group" placeholder="Phone Number" name="contactPhone" minlength="10" maxlength="11">
                           <input type="email" style="width:523px;" id="input-group1" placeholder="Email" name="contactEmail">
                        </div>

                        <button type="submit" class="btn btn-warning text-white" name="btnAppt">Submit Form</button>
                        <button type="reset" class="btn btn-primary">Clear Form</button>
                     </div>

               </form>
            </div>
         </div>
      </div>

     

      <!---------------------------------- #FOOTER ---------------------------------->

      <footer class="footer">

         <div class="footer-top section">
            <div class="container">

               <div class="footer-brand">

                  <!-- <a href="#" class="footer__logo">
                     <img src="img\dentalLogo.png" alt="Company Logo" class="footer__logo-img">
                  </a> -->

                  <div class="schedule">
                     <div class="schedule-icon">
                        <ion-icon name="time-outline"></ion-icon>
                     </div>

                     <span class="span">Monday - Saturday:<br>9:00am - 10:00Pm</span>
                  </div>

               </div>

               <ul class="footer-list">

                  <li>
                     <p class="footer-list-title">Other Links</p>
                  </li>

                  <li>
                     <a href="#" class="footer-link">
                        <ion-icon name="add-outline"></ion-icon>
                        <span class="span">Home</span>
                     </a>
                  </li>

                  <li>
                     <a href="#" class="footer-link">
                        <ion-icon name="add-outline"></ion-icon>
                        <span class="span">About Us</span>
                     </a>
                  </li>

                  <li>
                     <a href="https://wa.me/660183712388" class="footer-link">
                        <ion-icon name="add-outline"></ion-icon>
                        <span class="span">Contact Us</span>
                     </a>
                  </li>

               </ul>

               <ul class="footer-list">
                  <li>
                     <p class="footer-list-title">Our Services</p>
                  </li>

                  <li>
                     <div class="footer-link">
                        <ion-icon name="add-outline"></ion-icon>
                        <span class="span">Dental implants</span>
                     </div>
                  </li>

                  <li>
                     <div class="footer-link">
                        <ion-icon name="add-outline"></ion-icon>
                        <span class="span">Root Canal Treatment</span>
                     </div>
                  </li>

                  <li>
                     <div class="footer-link">
                        <ion-icon name="add-outline"></ion-icon>
                        <span class="span">Wisdom Tooth Surgery</span>
                     </div>
                  </li>

                  <li>
                     <div class="footer-link">
                        <ion-icon name="add-outline"></ion-icon>
                        <span class="span">Digital Smile Design</span>
                     </div>
                  </li>

                  <li>
                     <div class="footer-link">
                        <ion-icon name="add-outline"></ion-icon>
                        <span class="span">Holistic Dentistry</span>
                     </div>
                  </li>

                  <li>
                     <div class="footer-link">
                        <ion-icon name="add-outline"></ion-icon>
                        <span class="span">Emergency & Night Dentistry</span>
                     </div>
                  </li>

               </ul>

               <ul class="footer-list">
                  <li>
                     <p class="footer-list-title">Contact Us</p>
                  </li>

                  <li class="footer-item">
                     <div class="item-icon">
                        <ion-icon name="location-outline"></ion-icon>
                     </div>

                     <address class="item-text">
                        9, Jalan Teknologi, Pju 5 Kota Damansara, 47810 Petaling Jaya, Selangor
                     </address>
                  </li>

                  <li class="footer-item">
                     <div class="item-icon">
                        <ion-icon name="call-outline"></ion-icon>
                     </div>

                     <a href="tel:+917052101786" class="footer-link">+60 1234-5678</a>
                  </li>

                  <li class="footer-item">
                     <div class="item-icon">
                        <ion-icon name="mail-outline"></ion-icon>
                     </div>

                     <a href="mailto:help@example.com" class="footer-link">brightsmile@gmail.com</a>
                  </li>
               </ul>

            </div>
         </div>

         <div class="footer-bottom">
            <div class="container">

               <p class="copyright">
                  &copy; 2024 All Rights Reserved by BrightSmile Dental.
               </p>

            </div>
         </div>

      </footer>


      <!--=============== MAIN JS ===============-->
      <script src="./js/main.js"></script>
         <script>
               AOS.init({offset:0});
         </script>

         <script>
            document.getElementById('add-form').addEventListener('click', function() {
               const formSections = document.querySelectorAll('.booking-details');
               const maxForms = 3;

               if (formSections.length < maxForms) {
                  const formSection = formSections[0];
                  const newFormSection = formSection.cloneNode(true);
                  
                  // Clear input values in the cloned section
                  const inputs = newFormSection.querySelectorAll('input, select');
                  inputs.forEach(input => {
                        if (input.type !== 'radio' && input.type !== 'checkbox') {
                           input.value = '';
                        } else {
                           input.checked = false; // Uncheck radio and checkbox inputs
                        }
                  });

                  // Update names for gender radio buttons
                  const currentIndex = formSections.length; // This will give the current form count
                  const genderRadios = newFormSection.querySelectorAll('input[type="radio"]');
                  genderRadios.forEach(radio => {
                        radio.name = `txtGender[${currentIndex}]`; // Set unique name based on index
                        radio.id = `${radio.id.split('_')[0]}_${currentIndex}`; // Update id for uniqueness
                  });

                  // Append the cloned form section to the container
                  document.getElementById('booking-details-container').appendChild(newFormSection);
               } else {
                  alert('You can only add up to 3 booking forms.');
               }
            });


         </script>

         <script>
            $(document).ready(function() {
               $(document).on('change', '.serviceSelect', function() {
                  var serviceId = $(this).val(); 
                  var $doctorSelect = $(this).closest('.booking-details').find('.doctorSelect');

                  if (serviceId) {
                        $.ajax({
                           type: "POST",
                           url: "getDoctors.php",
                           data: { service_id: serviceId }, 
                           success: function(response) {
                              $doctorSelect.html(response); 
                           },
                           error: function(jqXHR, textStatus, errorThrown) {
                              console.error("AJAX request failed: " + textStatus + ", " + errorThrown); 
                           }
                        });
                  } else {
                        $doctorSelect.html('<option value="">Preferred Doctor</option>'); 
                  }
               });
            });

         </script>

         <script>
            document.addEventListener('DOMContentLoaded', function() {
            // Get all input elements with the class 'passdate'
            const dateInputs = document.querySelectorAll('.passdate');

            // Get today's date in the format YYYY-MM-DD
            const today = new Date().toISOString().split('T')[0];

            // Loop through each input and set the minimum attribute to today's date
            dateInputs.forEach(function(dateInput) {
               dateInput.setAttribute('min', today);
            });
         });

         </script>
         <script>
            function validateForm() {
               const patientNames = document.querySelectorAll("input[name='txtPatientName[]']");
               const ages = document.querySelectorAll("input[name='txtAge[]']");
               const phoneNumber = document.querySelector("input[name='contactPhone']");
               const fullName = document.querySelector("input[name='contactName']");
               
               for (let name of patientNames) {
                     if (name.value.trim() === "" || !/^[a-zA-Z\s]+$/.test(name.value)) {
                        alert("Please enter a valid patient name (only text).");
                        return false;
                     }
               }

               for (let age of ages) {
                     if (age.value.trim() === "" || isNaN(age.value) || age.value.length > 3) {
                        alert("Please enter a valid age (up to 3 digits).");
                        return false;
                     }
               }

               if (phoneNumber.value.trim() === "" || isNaN(phoneNumber.value) || phoneNumber.value.length > 11) {
                     alert("Please enter a valid phone number (up to 11 digits).");
                     return false;
               }

               if (fullName.value.trim() === "" || !/^[a-zA-Z\s]+$/.test(fullName.value)) {
                     alert("Please enter a valid full name (only text).");
                     return false;
               }
               return true;
            }
         </script>
   </body>
</html>