<?php include('includes/menu.php'); ?>

<?php 
    //Mengecek Jika ID Makanan ada atau dtidak
    if(isset($_GET['food_id']))
    {
        //Mendapatkan ID Makanan dan Detail yang dipilih
        $food_id = $_GET['food_id'];

        //Mendapatkan detail dari makanan yang dipilih
        $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
        //Eksekusi Query
        $res = mysqli_query($conn, $sql);
        //Hitung Baris
        $count = mysqli_num_rows($res);
        //Mengecek apakah datanya ada atau tidak
        if($count==1)
        {
            //Mendapatkan data dari database
            $row = mysqli_fetch_assoc($res);

            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }
        else
        {
            //Jika makanan tidak ada
            //Redirect ke Home Page
            header('location:'.SITEURL);
        }
    }
    else
    {
        //Redirect ke homepage
        header('location:'.SITEURL);
    }
?>

<!-- Food Search Section-->
<section class="food-order" style="background-image: url(images/hakone.jpg); background-size: cover; background-position: center; background-attachment: fixed; width: 100%;height: 100vh;">
    <div class="container">        
        <h2 class="text-center text-gray">Please confirm to place order</h2>

        <form action="" method="POST" class="order" style="border: 2px solid white; background-color: #4CC9FE;">
            <fieldset>
                <legend style="color:white;">&nbspSelected Food&nbsp</legend>

                <div class="food-menu-img">
                    <?php 
                    
                        //Mengecek apakah gambarnya ada atau tidak
                        if($image_name=="")
                        {
                            //Gambar nggak ada
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //Gambarnya ada
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }
                    
                    ?>
                    
                </div>

                <div class="food-menu-desc">
                    <h3 style="color:white;"><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price" style="color:white;">Rp.<?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <div class="order-label" style="color:white;">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>
                    
                </div>

            </fieldset>
            
            <fieldset>
                <input type="submit" name="submit" value="Confirm Order" class="btn" style="background-color: #45637d; color: 
                white; padding: 10px 20px; font-size: 16px; border-radius: 4px; border: none; cursor: pointer; transition: background-color 0.3s ease, color 0.3s ease;"     
                onmouseover="this.style.backgroundColor='white'; this.style.color='#45637d';"
                onmouseout="this.style.backgroundColor='#45637d'; this.style.color='white';">
            </fieldset>

        </form>

        <?php 

            //Mengecek apakah tombol submitnya udah dipencet atau tidak
            if(isset($_POST['submit']))
            {
                if(empty($_SESSION["u_id"]))
{
header('location:login.php');
}
else{

  // Mendapatkan detail

  $food = $_POST['food'];
  $price = $_POST['price'];
  $qty = $_POST['qty'];

  $total = $price * $qty; // total = price x qty 

  $order_date = date("Y-m-d h:i:sa"); //Order DAte

  $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled
  $u_id=$_SESSION["u_id"];
  



  //Menyimpan Pesanan di Databaase
  //Membuat SQL untuk menyimpan data
  $sql2 = "INSERT INTO tbl_order SET 
      food = '$food',
      price = $price,
      qty = $qty,
      total = $total,
      order_date = '$order_date',
      status = '$status',
      u_id='$u_id'
       ";

  //echo $sql2; die();

  //Eksekusi Query
  $res2 = mysqli_query($conn, $sql2);

  //Mengecek apakah querynya udah sukses dieksekusi apa belum
  
  if($res2==true)
  {
      //Query tereksekusi dan pesanannya tersimpan
      
      $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
      header('location:'.SITEURL);
  }
  else
  {
      //Gagal menyimpan pesanan
      $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
      header('location:'.SITEURL);
  }
}
            }
        ?>

    </div>
</section>
<!-- Food Search Section Berakhir disini -->