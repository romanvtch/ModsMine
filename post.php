<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styled/style.css" type="text/css">
    <link rel="shortcut icon" href="/assets/img/logoSite.png" type="image/x-icon">
    
    <?php
    require_once 'db_connect.php';

    // Fetching page information from the database
    $row = false;
    if (isset($_REQUEST["url"]))
        $result = $conn->query("SELECT * FROM post WHERE link = '" . $_REQUEST["url"] . "'");
    else
        $result = $conn->query("SELECT * FROM post WHERE id = '" . $_REQUEST["id"] . "'");

    // Extracting page data from the result set
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pageTitle = isset($row['title']) ? htmlspecialchars($row['title']) : '';
        $seodescription = isset($row['seodescription']) ? htmlspecialchars($row['seodescription']) : '';
        $seotag = isset($row['seotag']) ? htmlspecialchars($row['seotag']) : '';
        $canonicalLink = isset($row['link']) ? "https://www.modsmine.fun/" . $row['link'] : '';
        $image = isset($row['image']) ? htmlspecialchars($row['image']) : '';
    } else {
        $pageTitle = '';
        $seodescription = '';
        $seotag = '';
        $canonicalLink = '';
        $image = '';
    }
    ?>
    
    <!-- Meta tags for search engines -->
    <meta name="robots" content="index, follow"> <!-- Allow search engines to index and follow links -->
    <meta name="description" content="<?php echo htmlspecialchars($seodescription); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($seotag); ?>">
   
    <meta name="author" content="ModsMine"> <!-- Specify the author of the page -->
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1"> <!-- Optimize for Googlebot -->

    <!-- Schema.org markup for rich snippets - Helps search engines better understand your content -->
    <meta itemprop="name" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta itemprop="description" content="<?php echo htmlspecialchars($seodescription); ?>">
    <meta itemprop="image" content="<?php echo $image; ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    
   
<meta name="twitter:site" content="@minemodsp">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($seodescription); ?>">
    <meta name="twitter:image" content="<?php echo $image; ?>">

    <!-- Facebook Open Graph data -->
    <meta property="og:url" content="<?php echo $canonicalLink; ?>">
    <meta property="og:image" content="<?php echo $image; ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($seodescription); ?>">
    <meta property="og:site_name" content="ModsMine">
    <meta property="og:type" content="article">
    <meta property="og:locale" content="en_US">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Canonical link -->
    <link rel="canonical" href="<?php echo $canonicalLink; ?>">

    <!-- Additional CSS and Preloader -->
    <link rel="stylesheet" href="./styled/preloader.css">

    <!-- Additional JavaScript or other optimizations can be added here -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6105184170467211"
     crossorigin="anonymous"></script>
    <title><?php echo htmlspecialchars($pageTitle); ?> - ModsMine</title>
</head>


<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__over">
                <div class="header__container">
                    <a class="logo" href="https://www.modsmine.fun/">
                        <h1>Mods<span>Mine</span></h1>
                        <img src="/assets/img/logo.png" alt="logo modsmine">
                    </a>

                    <nav class="nav">
                         <input class="search" type="text" placeholder="Search..">
                        <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                            <path d="M23.809 21.646l-6.205-6.205c1.167-1.605 1.857-3.579 1.857-5.711 0-5.365-4.365-9.73-9.731-9.73-5.365 0-9.73 4.365-9.73 9.73 0 5.366 4.365 9.73 9.73 9.73 2.034 0 3.923-.627 5.487-1.698l6.238 6.238 2.354-2.354zm-20.955-11.916c0-3.792 3.085-6.877 6.877-6.877s6.877 3.085 6.877 6.877-3.085 6.877-6.877 6.877c-3.793 0-6.877-3.085-6.877-6.877z" />
                        </svg>
                        <a href="mailto:modsminehelp@gmail.com">Contact</a>
                    </nav>
                    </nav>
                    <script>
                        const search = document.querySelector('.search');
                        const svg = document.querySelector('.svg');
                        svg.addEventListener('click', () => {
                            search.classList.toggle('active');
                        });
                    </script>
                    

                    <div class="menu" id="menu">
                        <span class="line line1"></span>
                        <span class="line line2"></span>
                        <span class="line line3"></span>
                    </div>

                </div>
            </div>

            <ul class="nav__list" id="nav__list">
                <input style="
                max-width:95%;
                width:100%; 
                background:#fff;
                text-align:center;
                padding:12px 10px; 
                margin:12px 9.5px;
                border-radius:5px;" 
                class="search search1" 
                type="text" 
                placeholder="Search..">
            </ul>

            <script>
                const menu = document.getElementById('menu'),
                    navList = document.getElementById('nav__list');
                menu.addEventListener('click', () => {
                    menu.classList.toggle('active');
                    navList.classList.toggle('active');
                });
            </script>
        </header>

        <main class="main">
       
         <article class="article" style="margin-top:5px">
               

  <?php
// Виведення детальної інформації про пост
if ($row) {
    echo "<div class='post'>";
    echo "<img width='100%' src='" . $row['image'] . "' alt='mods modsmine'>";
    echo "<div class='flex__social'>";
    echo "<div class='social__iccon'><a href='https://www.facebook.com/sharer.php?u=" . $canonicalLink . "'><img src='./assets/img/social/facebook.png' alt='facebook'></a></div>";
    echo "<div class='social__iccon'><a href='https://twitter.com/share?url=" . $canonicalLink . "&text=" . urlencode($pageTitle) . "'><img src='./assets/img/social/twitter.png' alt='twitter'></a></div>";
    echo "<div class='social__iccon'><a href='https://t.me/minemodsp'><img src='./assets/img/social/telegram.png' alt='telegram'></a></div>";
   echo "<div class='social__iccon'><a href='https://www.youtube.com/channel/UC8nGHhU3VHT-9B-gtuty4BA'><img src='./assets/img/social/youtube.png' alt='youtube'></a></div>";
    echo "</div>";
    echo "<h2 class='title' style='margin-bottom:5px;color:#fff;'>" . $row['title'] . "</h2>";
    echo "<p class='date'>" . $row['data_add'] . "</p>";
    echo "<p style='margin:8px 0; font-size:18px; color: #fff;' class='description'>" . $row['description'] . "</p>";
    echo "<img width='100%' src='" . $row['image2'] . "' alt='mods modsmine'>";
    echo "<p style='margin:8px 0; font-size:18px; color: #fff;' class='description'>" . $row['description2'] . "</p>";
    echo "<img width='100%' src='" . $row['image3'] . "' alt='mods modsmine'>";
    echo "<p style='margin:8px 0; font-size:18px; color: #fff;' class='description'>" . $row['description3'] . "</p>";
    echo "<a href='" . $row['download'] . "'><div class='d__minecraft'>Download 
            <svg xmlns='http://www.w3.org/2000/svg' fill='#fff' width='18' height='18' viewBox='0 0 24 24'>
                <path d='M24 12l-9-8v6h-15v4h15v6z' />
            </svg>
        </div></a>";
    echo "<a href='https://linkify.ru/r/ModsMine'><div class='d__minecraft'>Earn Money 
            
        </div></a>";
    echo "</div>";
} else {
    echo "Post not found.";
}
?>



   


            </article>
       <aside class="aside">
                <div class="aside__container">
                     <a href="https://linkify.ru/r/ModsMine" class="aside__content">
                         <img src="https://i.ibb.co/X3cdhYW/modsmine.png" alt="earn money minecraft pe" width="100%">
                        <p style="text-align:center;">Earn Money</p>
                    </a>
                    <a href="/minecraft-pe-1.20" class="aside__content">
                         <img src="https://i.ibb.co/8Mbx11v/minecraftpe1-20.webp" alt="download minecraft pe" width="100%">
                        <p>Minecraft PE 1.20</p>
                    </a>
                    <a href="/vic-s-modern-warfare-mcpe" class="aside__content">
                        <img src="https://i.ibb.co/N1MLJzq/vics-modern-warfare.webp" alt="vics-modern-warfare" width="100%">
                        <p>Vic's Modern Warfare MCPE</p>
                    </a>
                    <a href="/jenny-mod-minecraft-pe" class="aside__content">
                        <img src="https://i.ibb.co/mqkKjZ8/sideBar2.jpg" alt="jenny mod" width="100%">
                        <p>Jenny mod - Minecraft PE 1.20</p>
                    </a>
                    <div class="aside__social">
                        <a target="_blank" href="https://www.youtube.com/@modsmine">
                            <img class="item__social" src="/assets/img/youtube.png" alt="youtube channel">
                        </a>
                        <a target="_blank" href="https://t.me/minemodsp">
                            <img class="item__social" src="/assets/img/telegram.png" alt="mods minecraft modsmine">
                        </a>
                    </div>
                </div>
            </aside>
        </main>
      
        <footer class="footer">
            <div class="footer__container">
                <div class="footer__link">
                    <a class="logo" href="https://www.modsmine.fun/">
                        <h1>Mods<span>Mine</span></h1>
                        <img src="/assets/img/logo.png" alt="modsmine logo">
                    </a>
                    <div class="about">
                        <a  href="https://www.modsmine.fun/privacy">Privacy</a>
                        <a  href="https://www.modsmine.fun/terms">Terms of Use</a>
                        <a  href="https://www.modsmine.fun/about">About us</a>

                    </div>
                </div>
                <p class="copyright">© Copyright 2023 ModsMine. All rights reserved</p>
            </div>
        </footer>
    </div>
    </div>
</body>

</html>