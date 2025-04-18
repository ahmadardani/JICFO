<?php
include('includes/menu.php'); 

// Mengecek jika ID makanan dikirimkan
if (isset($_GET['food_id']) && is_numeric($_GET['food_id'])) {
    $food_id = (int) $_GET['food_id'];

    // Query: Ambil data makanan berdasarkan ID
    $sql = "SELECT * FROM tbl_food WHERE id = $food_id";
    $res = mysqli_query($conn, $sql);

    if ($res && mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        // Redirect jika ID tidak ditemukan
        header('Location: ' . SITEURL);
        exit;
    }
} else {
    // Redirect jika tidak ada food_id
    header('Location: ' . SITEURL);
    exit;
}
?>

<!-- Food Order Section -->
<section class="food-order" style="background-image: url(images/hakone.jpg); background-size: cover; background-position: center; background-attachment: fixed; width: 100%;height: 100vh;">
    <div class="container">
        <h2 class="text-center text-gray">Please confirm to place order</h2>

        <form action="" method="post" class="order" style="border: 2px solid white; background-color: #4CC9FE;">
            <fieldset>
                <legend style="color:white;">&nbsp;Selected Food&nbsp;</legend>

                <div class="food-menu-img">
                    <?php if (empty($image_name)): ?>
                        <div class='error'>Image not available.</div>
                    <?php else: ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo htmlspecialchars($image_name); ?>" alt="Food Image" class="img-responsive img-curve">
                    <?php endif; ?>
                </div>

                <div class="food-menu-desc">
                    <h3 style="color:white;"><?php echo htmlspecialchars($title); ?></h3>
                    <input type="hidden" name="food" value="<?php echo htmlspecialchars($title); ?>">

                    <p class="food-price" style="color:white;">Rp.<?php echo number_format($price, 0, ',', '.'); ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <div class="order-label" style="color:white;">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" min="1" required>
                </div>
            </fieldset>

            <fieldset>
                <input type="submit" name="submit" value="Confirm Order" class="btn"
                    style="background-color: #45637d; color:white; padding: 10px 20px; font-size: 16px; border-radius: 4px; border: none; cursor: pointer; transition: background-color 0.3s ease, color 0.3s ease;"
                    onmouseover="this.style.backgroundColor='white'; this.style.color='#45637d';"
                    onmouseout="this.style.backgroundColor='#45637d'; this.style.color='white';">
            </fieldset>
        </form>

        <?php
        // Tangani form submission
        if (isset($_POST['submit'])) {
            // Cek apakah user login
            if (empty($_SESSION["u_id"])) {
                header('Location: login.php');
                exit;
            }

            // Ambil data dari form
            $food = mysqli_real_escape_string($conn, $_POST['food']);
            $price = (float) $_POST['price'];
            $qty = (int) $_POST['qty'];
            if ($qty < 1) $qty = 1;

            $total = $price * $qty;
            $order_date = date("Y-m-d H:i:s");
            $status = "Ordered";
            $u_id = $_SESSION["u_id"];

            // Query simpan pesanan
            $sql2 = "INSERT INTO tbl_order (food, price, qty, total, order_date, status, u_id)
                     VALUES ('$food', $price, $qty, $total, '$order_date', '$status', '$u_id')";

            $res2 = mysqli_query($conn, $sql2);

            if ($res2) {
                $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
            } else {
                $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
            }
            header('Location: ' . SITEURL);
            exit;
        }
        ?>
    </div>
</section>
<!-- End Food Order Section -->
