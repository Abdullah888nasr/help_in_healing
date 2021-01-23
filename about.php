<?php
    include "includes/templates/header.php";
    if(isset($_GET['contact'])):?>
        <p class="connected">
            Facebook page : help in healing<br>Twitter page : help in healing<br>Youtube channel : help in healing<br>Linkedin page : help in healing<br>Googleplus page : help in healing
        </p>
    <?php else:?>
        <p class = "about-us">
            A group of second grade students of the faculty of computing and information Minya University (FCI-MU) , who found the idea has been applied to make things easier for patients seeking doctors in various provinces and the face of the challenges and difficulties in transportation and congestion
        </p>
<?php endif; ?>
    
    
<?php include "includes/templates/footer.php"; ?>
