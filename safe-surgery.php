<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Safe Surgery page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
        <link rel="stylesheet" href="css\infection-control.css">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php include "navigationBar.php"; ?>
        <?php include "social-link-icon.php"; ?>
        <section id="about-section" style="width:1400px;">

            <!-- about left  -->
            <div class="about-left">
                <img src="img\Safe Surgery.png" alt="About Img" style="width:620px;">
            </div>

            <!-- about right  -->
            <div class="about-right">
                <h1>Safe Surgery</h1>
                <p>At Nuffield Dental, we ensure all dental surgeries are done with your safety in mind.</p>
                <br>
                <p>With regards to all wisdom teeth, bone grafting and implant surgery, you can be assured that we adopt a strict full surgical set-up and follow compulsory sterilisation protocol.</p>
                <br>
                <p>We do this for the safety of our patients, to reduce cross-infection between patients. This decreases infections after the surgery and increases success rates for the surgical procedures.</p>

            </div>
        </section>

        <section id="sterilisation-section" style="display: flex; align-items: flex-start;height: 550px; width: 1250px;">
            <!-- Image Section -->
            <div class="sterilisation-image" style="padding-right: 10px;">
                <img src="img\general-safety.png" alt="Electric Motor-Driven Surgical Handpiece Drill" 
                    style="width: 100px; height: auto; border-radius: 8px;">
            </div>

            <!-- Content Section -->
            <div class="sterilisation-content" style="flex: 1; max-width: 900px; text-align: justify;">
                <h2 style="font-size: 30px; color: #e74d06; margin-bottom: 20px;">How Do We Ensure Safety?</h2>

                <ul style="list-style-type: none; padding: 0;">
                    <!-- Electric Motor-Driven Surgical Handpiece Drill -->
                    <li>
                        <h3 style="color: #292929;font-family: Source Sans Pro, serif;font-style: normal;font-weight: 700;text-decoration: none;">Use of an Electric Motor-Driven Surgical Handpiece Drill</h3>
                        <p style="color: #444; line-height: 36px; font-size: 16px;width: 1020px;">
                            All our wisdom teeth and implant surgeries are done using an electric motor-driven surgical handpiece drill. We use this machine to prevent contamination at the surgical site with the lubricating oils. This handpiece also regulates the torque and is cooled with saline, which acts as a disinfectant wash. Since it is not air-driven, it reduces the risk of cross-contamination with air and the body, which can lead to serious issues.
                        </p>
                        <p style="color: #444; line-height: 36px; font-size: 16px;width: 1020px;">
                            Prior to these handpieces, drills were designed to be connected to the dental chair. This design reduced the controlling force and lacked disinfecting properties. Due to the advantages of using the motor-driven surgical handpiece drill over this design, we have opted to use it in all our surgeries.
                        </p>
                    </li>
                    <br>

                    <li>
                        <h3 style="color: #292929;font-family: Source Sans Pro, serif;font-style: normal;font-weight: 700;text-decoration: none;">Doing a Thorough Assessment of a Patient’s Medical History</h3>
                        <p style="color: #444; line-height: 36px; font-size: 16px;width: 1020px;">
                            With every surgical procedure, we ensure that the treatment provided is suitable for our patients. We thoroughly assess the patient’s medical history, including any illnesses or issues they may be experiencing. This ensures the best possible outcome for the long-term success of the surgery—whether it is a dental implant procedure or root canal treatment.
                        </p>
                    </li>
                </ul>
            </div>
        </section>



        <?php include "footer.php"; ?>
    </body>

</html>
