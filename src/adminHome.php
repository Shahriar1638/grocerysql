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
<body class="bg-yellowPrimary">
    <header>
      <nav class="h-24 px-40 flex justify-between items-center">
        <div class="flex items-center">
          <img class="h-16 w-16" src="../ICON/logo.png" alt="">
          <h1 class="text-3xl font-bold ml-3">FreshBasket</h1>
        </div>  
        <?php
            if(isset($_COOKIE['username'])) {
                $username = $_COOKIE['username'];
            } else {
                echo "No username cookie set";
            }
            ?>
        <div>
          <h1 class="text-2xl font-semibold uppercase">Welcome to admin dashboard, <?php echo $username ?></h1>
        </div>
      </nav>
    </header>
    <main>
      <section class="pl-40 pt-4 h-screen">
        <div class="grid grid-cols-6">
          <div class="mt-16">
            <div class="flex flex-col items-start">
              <div class="flex items-center hover:text-redSecondary mb-6">
                <i class="fa-solid fa-chart-column mr-2 text-lg"></i>
                <a href="adminHome.php" class="text-lg font-semibold uppercase">statistics</a>
              </div>
              <div class="flex items-center hover:text-redSecondary mb-6">
                <i class="fa-regular fa-clipboard mr-2 text-lg"></i>
                <a href="publishedItems.php" class="text-lg font-semibold uppercase">Published Items</a>
              </div>
              <div class="flex items-center hover:text-redSecondary">
                <i class="fa-solid fa-hourglass-end mr-2"></i>
                <a href='pendingItems.php' class="text-lg font-semibold uppercase">Pending Items</a>
              </div>
            </div>
          </div>
          <?php
            require_once('DBconnect.php');
            $query = "SELECT COUNT(*) AS customer_count FROM users WHERE role = 'customer'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $customer_count = $row['customer_count'];
            $query = "SELECT COUNT(*) AS seller_count FROM users WHERE role = 'seller'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $seller_count = $row['seller_count'];
            // change the code below after updating the disjoint table;
            $query = "SELECT SUM(salary) AS total_salary FROM admins";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $total_salary = $row['total_salary'];
          ?>
          <div class="col-span-5 bg-white rounded-tl-3xl h-screen pl-12 pt-12">
            <div>
              <h1>Total revenue <?php echo $total_salary ?></h1>
              <h1>Current salary of admins <?php echo $total_salary ?></h1>
              <h1>total customer <?php echo $customer_count ?></h1>
              <h1>total sellers <?php echo $seller_count ?></h1>
            </div>
          </div>
        </div>
      </section>
    </main>
</body>
</html>