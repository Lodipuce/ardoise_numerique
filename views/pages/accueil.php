
<h1 class="title">ARDOISE NUMERIQUE</h1>
<?php
     foreach ($ardoises as $ardoise) {
             echo ('<span class="name_color">'.$ardoise->getPrenom().'</span> 
                    <span class="sum_color">'.$ardoise->getMontant().' €</span><br/>');
        }
?>