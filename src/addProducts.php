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
            <a href="sellerHome.php" class="text-xl font-semibold uppercase">Home</a>
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
            if(isset($_COOKIE['username'])) {
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
        <section class="px-[15rem]">
            <h1 class="text-center text-5xl font-extrabold my-10">
                Fill up the form before you add a product
            </h1>
            <div class="my-24">
                <form action="handleAddProducts.php" method="POST">
                    <div class="flex flex-row items-center">
                        <div class="flex flex-row items-center mr-6 flex-1">
                            <label for="productname" class="text-2xl font-semibold mr-4 w-72">Product Name:</label>
                            <input type="text" name="productname" id="productname" class="w-full h-12 border-2 border-gray-300 rounded-lg px-4 my-4" required>
                        </div>
                        <div class="flex flex-row items-center flex-1">
                            <label for="productprice" class="text-2xl font-semibold mr-4 w-72">Product Price:</label>
                            <input type="number" name="productprice" id="productprice" class="w-full h-12 border-2 border-gray-300 rounded-lg px-4 my-4" required>
                        </div>
                    </div>
                    <div class="flex flex-row items-center">
                        <label for="productquantity" class="text-2xl font-semibold mr-2 w-80">Product Amount Type:</label>
                        <input type="text" name="productquantity" id="productquantity" class="w-full h-12 border-2 border-gray-300 rounded-lg px-4 my-4 mr-4" required>
                        <button class="" onclick="my_modal_1.showModal()"><i class="fa-solid fa-circle-exclamation text-4xl"></i></button>
                        <dialog id="my_modal_1" class="modal">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">Here is the instruction on how you will set the amount for products:</h3>
                                <p class="py-4">Firstly set the how you will measure the unit:</p>
                                <div class="flex flex-col items-start py-4 gap-y-2">
                                    <p>wp - weight in pounds</p>
                                    <p>wk - weight in kilograms</p>
                                    <p>wg - weight in grams</p>
                                    <p>p - pieces</p>
                                    <p>ml - milliliters</p>
                                    <p>l - liters</p>
                                </div>
                                <p class="py-4">Then use a comma and set the able amount of the products with , like this- wp,1,2,0.5,5 </p>
                                <p class="py-4">Here is an example: wp,1,2,3 . Means weight measurements type is pound and able ammount is 1 pound, 2 pound , 3 pound</p>
                                <p class="py-4">Here is an example: p,4,10,20 . Means each package will contain 4 pieces, 10 pieces , 20 pieces</p>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <button class="btn" onclick="my_modal_1.close()">Close</button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                    </div>
                    <div class="flex flex-col items-center">
                        <label for="productdescription" class="text-2xl font-semibold">Product Description</label>
                        <textarea name="productdescription" id="productdescription" class="w-96 h-32 border-2 border-gray-300 rounded-lg px-4 my-4" required></textarea>
                    </div>
                    <div class="flex flex-col items-center">
                        <label for="productimage" class="text-2xl font-semibold">Product Image</label>
                        <input type="file" name="productimage" id="productimage" class="w-96 h-12 border-2 border-gray-300 rounded-lg px-4 my-4" required>
                    </div>
                    <div class="flex flex-col items-center">
                        <button type="submit" class="w-96 h-12 bg-yellowPrimary text-white text-2xl font-semibold rounded-lg my-4">Add Product</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>