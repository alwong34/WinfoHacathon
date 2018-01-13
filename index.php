<title>Home</title>
<h1 align="center">Welcome to Aashray's first PHP Application</h1>
<!-- ACTION ITEM, UPDATE NAV TO DISPLAY FORMS ON INDEX.PHP WHEN CLICKED, E.G. SHOW LOGIN FORM WHEN CLICKED INSTEAD OF GOING TO LOGIN.PHP PAGE -->
<p align="center">
<?php
    require "nav.php";
   $contact_info = "aashray@uw.edu"; # Update based on whoever is
   									# actively maintaining this page
   echo "seeking assistance? contact me:\n$contact_info";
?>
</p>
