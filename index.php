<?php include('includes/menu.php'); ?>
   <!-- Food Search Section -->
   <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Food Search Section berakhir disini -->

    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
                //Membuat SQL Query untuk menampilkan Categories dari Database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Eksekusi Query
                $res = mysqli_query($conn, $sql);
                //Hitung baris untuk memeriksa apakah kategori tersebut tersedia atau tidak
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //Categories yang tersedia
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Dapatkan Nilai seperti id, judul, nama_gambar
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Mengecek apakah gambarnya ada atau tidak
                                    if($image_name=="")
                                    {
                                        //Menampilkan pesan
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Gambarnya ada
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories tidak tersedia
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section berakhir disini-->



    <!-- Food Menu Section -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Featured Foods</h2>

            <?php 
            
            //Mendapatkan makanan dari database yang aktif dan featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //Eksekusi Query
            $res2 = mysqli_query($conn, $sql2);

            //Hitung Baris
            $count2 = mysqli_num_rows($res2);

            //Mengecek apakah makanannya ada atau tidak
            if($count2>0)
            {
                //Makanan tersedia
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Mendapatkan semua nilai
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                //Mengecek apakah gambarnya ada atau tidak
                                if($image_name=="")
                                {
                                    //Gambar tidak ada
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Gambar ada
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">Rp.<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //Makanan tidak ada 
                echo "<div class='error'>Food not available.</div>";
            }
            
            ?>

            

 

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="http://localhost/food-order/foods.php">See All Foods</a>
        </p>
    </section>
    <!-- Food Menu Section Berakhir disini -->

    
