<!DOCTYPE html>
<html data-theme="light" lang="en" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshBasket</title>
    <!-- design plugs -->
    <script src="https://kit.fontawesome.com/5f28ebb90a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              yellowPrimary: '#FFBF00',
              redSecondary: '#D2222D',
              greenSecondary: '#008F11',
            }
          }
        }
      }
    </script>
</head>
<body>
    <header>
      <nav class="h-24 px-60 flex justify-between items-center">
        <div class="flex items-center">
          <img class="h-16 w-16" src="../ICON/logo.png" alt="">
          <h1 class="text-3xl font-bold ml-3">FreshBasket</h1>
        </div>  
        <div class="flex items-center">
          <div class="flex items-center hover:text-redSecondary">
            <i class="fa-solid fa-house fa-rotate-by mr-2"></i>
            <a href="customerHome.php" class="text-xl font-semibold uppercase">Home</a>
          </div>
          <div class="flex items-center ml-5 hover:text-redSecondary">
            <i class="fa-solid fa-list mr-2"></i>
            <a href="allItems.php" class="text-xl font-semibold uppercase">Items</a>
          </div>
          <div class="flex items-center ml-5 hover:text-redSecondary">
            <i class="fa-solid fa-shopping-cart mr-2"></i>
            <a href="Cart.php" class="text-xl font-semibold uppercase">Cart</a>
          </div>
        </div>
        <div>
          <?php
            if(isset($_COOKIE['userID'])) {
                $username = $_COOKIE['username'];
                echo 
                "<div class='flex items-center'>
                  <i class='fa-solid fa-user mr-2 text-2xl'></i>
                  <h1 class='text-xl font-semibold uppercase'>$username</h1>
                 </div>";
            } else {
                echo "No username cookie set";
            }
            ?>
        </div>
      </nav>
    </header>
    <main>
      <section class="h-80">
        <div class="bg-cover bg-center h-[30rem]" style="background-image: linear-gradient(to bottom right,rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.2)),url(../ICON/banner.jpg);">
          <h1 class="text-7xl font-bold text-center py-10 text-white">Welcome to FreshBasket</h1>
          <p class="text-center text-white text-lg">Your one stop shop for all your grocery needs</p>
        </div>
      </section>
      <section>
        <!-- Rivan start -->
        <div class="my-56 px-60">
          <h1 class="my-16 text-5xl font-extrabold text-center"><i class="fa-solid fa-chart-line text-5xl mr-4"></i>Top selling products</h1>
          <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30" slides-per-view="3">
          <?php
            require('DBconnect.php');
            $query = "SELECT * FROM products ORDER BY cartcount DESC LIMIT 6";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
            ?>
              <swiper-slide>
                <div class='w-72 h-96 rounded-lg relative' style='background-image: linear-gradient(to top,rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.2)),url(<?php echo $row['imgurl']; ?>); background-size: cover; background-repeat: no-repeat;'>
                  <div class='flex flex-col justify-start absolute bottom-4 left-6'>
                    <h1 class='text-3xl font-bold text-white'><?php echo $row['name']; ?></h1>
                    <div class='flex flex-row items-center'>
                      <p class='text-white mr-4 flex items-center gap-2'><img class='w-4 h-4' src='../ICON/categories.png'><?php echo $row['category']; ?></p>
                      <p class='text-white flex items-center gap-2'><i class='fa-solid fa-dollar-sign'></i><?php echo $row['price']; ?></p>
                    </div>
                  </div>
                </div>
              </swiper-slide>
            <?php  
            }
            } else {
              echo "Oops.....No products found.";
            }
            ?>
            </swiper-container>
          <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        </div>
        <div class="my-24 px-60">
          <h1 class="my-16 text-5xl font-extrabold text-center"><i class="fa-regular fa-calender text-5xl mr-4"></i>Recently published products</h1>
          <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30" slides-per-view="3">
          <?php
            require_once('DBconnect.php');
            $customeremail = $_COOKIE['email'];
            $query = "SELECT * FROM products WHERE status='published' ORDER BY publishdate DESC LIMIT 6";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
            ?>
              <swiper-slide>
                <div class='w-72 h-96 rounded-lg relative' style='background-image: linear-gradient(to top,rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.2)),url(<?php echo $row['imgurl']; ?>); background-size: cover; background-repeat: no-repeat;'>
                  <div class='flex flex-col justify-start absolute bottom-4 left-6'>
                    <h1 class='text-3xl font-bold text-white'><?php echo $row['name']; ?></h1>
                    <div class='flex flex-row items-center'>
                      <p class='text-white mr-4 flex items-center gap-2'><img class='w-4 h-4' src='../ICON/categories.png'><?php echo $row['category']; ?></p>
                      <p class='text-white flex items-center gap-2'><i class='fa-solid fa-dollar-sign'></i><?php echo $row['price']; ?></p>
                    </div>
                  </div>
                </div>
              </swiper-slide>
            <?php  
            }
            } else {
              echo "Oops.....No products found.";
            }
            ?>
            </swiper-container>
          <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        </div>
      </section>
      <!-- Rivan -->
    </main>
</body>
</html>