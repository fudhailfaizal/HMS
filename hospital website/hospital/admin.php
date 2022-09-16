<?php include "external\header.php"; ?>

<body>
<header class="header">
    <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> medcare. </a>
    <nav class="navbar">
        <a href="login.php" link text class="btn"> Logout </a>  
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
</header>



<section class="home" id="home">
    <div class="image">
        <img src="image/home-img.svg" alt="">
    </div>
    <div class="content">
        <h3>Hello, Administrator</h3>
        <p>View Patient records, Manage hospitals and Manage subscriptons and offers </br> Right from your dashboard.</p>
        <a href="adminPatients.php" class="btn"> Dashboard <span class="fas fa-chevron-right"></span> </a>
    </div>
</section>

<?php include "external\uiFooter.php"; ?>
<?php include "external\Footer.php"; ?>