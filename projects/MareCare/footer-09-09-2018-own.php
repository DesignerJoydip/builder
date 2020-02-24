<!-- footer open -->
<div class="footerFullArea">
<div class="footerTopArea">
<div class="container">
<div class="row">


    <div class="col-sm-2">
    <h3 class="footerHeading">link</h3>
    <!-- <ul class="openingHours">
    	<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>dasdasdas</a></li>
    	<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>dasdasdas</a></li>
    	<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>dasdasdas</a></li>
    	<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>dasdasdas</a></li>
    	<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>dasdasdas</a></li>
    </ul> -->
    <?php 
        wp_nav_menu( array(
            'theme_location' => 'footer',
            'depth'          => 2,
            'container'      => 'ul', // menu area wrap element
            'container_class'   => '',// menu area wrap class
            'container_id'      => '', // menu area wrap ID
            'menu_class'     => 'openingHours',// menu ul class
            'fallback_cb'       => false,
            )
        );
    ?>
    </div>
    
    <!--<div class="col-sm-4">
    <h3 class="footerHeading">Contact Info</h3>
    <ul class="Address">
    <li><i class="fa fa-map-marker"></i><div>33 Farlane Street<br>Keilor East VIC 3033<br>Australia</div></li>
    <li><i class="fa fa-phone-square"></i><div><a href="tel:+123 655 655">+123 655 655</a>, <a href="tel:+123 755 755">+123 755 755</a></div></li>
    </ul>
    </div>-->

    <div class="col-sm-10">
    <h3 class="footerHeading">About Us</h3>
    <p>Maryanne Russell started Mare Care in 2018 to care for those in need, families who need those whom they love the most to be cared for, anyone in between. Rainsing a family of 5, combined with decades of care and nursing experience, Maryanne will provide the most reliable and warm care to those who need it most.</p>
    </div>

</div>
</div>
</div><!-- Top area closed -->
<div class="footerBottomArea">
© Copyright 2018
</div><!-- bottom area closed -->
</div>
<!-- footer closed -->
<?php wp_footer(); ?>

</body>
</html>