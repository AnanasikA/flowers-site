<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="./css/Style.css">
</head>
<body>

<?php @include 'header.php';?>

<section class="home">

    <div class="content">
        <h3>new collection</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod saepe vitae id corporis ipsam dolor?</p>
        <a href="about.php" class="btn">discover more</a>
    </div>

</section>

<section class="products">

    <h1 class="title">latest products</h1>

    

    <div class="box-container">

        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query filed');
            if(mysqli_num_rows($select_products) > 0) {
                while($fetch_products = mysqli_fetch_assoc($select_products)) {
        ?>
        <form action="" method="post" class="box">
            <a href="view_page.php?pid=<php echo $fetch_products['id']; >"></a>
        </form>
        <?php
          }
        }else{
            echo '<p class="empty">no products added yet!</p>';
        }
        ?>

    </div>

</section>



<?php @include 'footer.php';?>

<script src="./js/Script.js"></script>
    
</body>
</html>