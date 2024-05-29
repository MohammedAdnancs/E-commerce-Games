<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css-files/admin.css">
    <link rel="stylesheet" href="css-files/navbar.css">
    <link rel="stylesheet" href="css-files/header.css">
    <link rel="stylesheet" href="css-files/footer.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <a href="https://www.flaticon.com/free-icons/gamer" title="gamer icons"></a>
    <script src="https://kit.fontawesome.com/26f7f6db71.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Admin Page</title>
</head>

<body>

    <img src="images/My project.png" class="logo-header-real"></img>

    <div id="eda">

        <header>

            <img src="images/My project.png" class="logo-header"></img>

            <div class="search-cont">
                <div class="search-bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" class="search-input" placeholder="search" id="search" style="font-size: 17px; letter-spacing: 1px;">
                    <button class="search-button">Search</i></button>
                </div>
            </div>

            <div class="user">
                <a href="cart.php" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></a>

                <?php
                if (isset($_SESSION["Ufname"])) {
                    echo "<a href='#' class='sign-up'>" . $_SESSION['Ufname'] . "</a>";
                    echo "<a href='includesphp_login/log_out.php' class='log-in'>Log out</a>";
                } else {
                    echo "<a href='login.php' class='log-in'>Log in</a>";
                    echo "<a href='sign-up.php' class='sign-up'>sign up</a>";
                }
                ?>
            </div>

        </header>

        <div id="searchresult"></div>

        <?php
        include_once "navbar.php";
        ?>
        <h1 class="t3">Add Product</h1>
        <div id="add">

            <div class="fadd">

                <form id="formI" class="formadd" method="POST" enctype="multipart/form-data">

                    <div class="choose">

                        <label class="lab">Product Image : </label>

                        <label for="console-image" class="labS">Select an Image</label>
                        <input style="display: none;" type="file" name="product-image" id="console-image" required><br>

                        <label class="lab" for="Producttype">Product type : </label>

                        <select name="Producttype" id="Ptype">
                            <option value="Game">Game</option>
                            <option value="Console">Console</option>
                            <option value="e-card">e-card</option>
                        </select>

                    </div>

                    <label class="lab" for="product-name">Product Name : </label>
                    <input type="text" name="product-name" id="product-name" class="alltxt" required><br>

                    <label class="lab" for="product-price">Product Price : </label>
                    <input type="number" name="product-price" id="product-price" class="alltxt" required><br>

                    <label class="lab" for="product-description">Product Description : </label><br>
                    <textarea name="product-description" id="product-description" rows="4" class="alltxt" required></textarea><br>

                    <input id="ADD" type="submit" value="Add Product" style="margin-top: 2%;">

                    <div class="message" id="message">
                    </div>
                </form>

            </div>
        </div>

        <h1 class="t2">Edit & Remove Product</h1>

        <?php
        require_once 'includesphp_login/dbh.php';
        $sql = "SELECT * FROM allproducts";
        $all_products = $conn->query($sql);
        ?>

        <div class="allp">
            <?php
            while ($row = mysqli_fetch_assoc($all_products)) {
            ?>
                <?php $pname = $row['P_name'] ?>
                <div class="card">

                    <div class="c_image">
                        <?php
                        echo '<img src="data:image;base64,' . base64_encode($row['P_image']) . '"alt="" >';
                        ?>
                    </div>
                    <h2 class="c_name"><?php echo $row["P_name"]; ?></h2>
                    <div class="cbutton">
                        <a class="db" name="<?php echo $row["P_id"]; ?>">Delete</a>
                        <a href="editpage.php?product=<?= $row["P_id"]; ?>" class="eb">edit</a>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
        <div class="message" id="message">
            <?php
            include_once "footer.php";
            ?>
        </div>


        <script>
            $(document).ready(function() {

                $("#search").keyup(function() {
                    var input = $(this).val();

                    if (input != "") {
                        $.ajax({
                            url: "live.php",
                            method: "POST",
                            data: {
                                input: input
                            },

                            success: function(data) {
                                $("#searchresult").html(data);
                                $("#searchresult").css("display", "block");
                            }
                        });
                    } else {
                        $("#searchresult").css("display", "none");
                    }
                })
            });
        </script>

        <script>
            $(document).ready(function() {

                $("#formI").on("submit", function(e) {

                    e.preventDefault();

                    var form_data = new FormData(this);

                    $.ajax({
                        url: "includesphp_login/addproduct.php",
                        method: "POST",
                        data: form_data,
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(data) {
                            const message = document.getElementById('message');
                            message.innerHTML = "New item added successfully";
                        },
                        error: function(xhr, status, error) {
                            const message = document.getElementById('message');
                            message.innerHTML = "New item added successfully";
                        }
                    });
                });
            });
        </script>

        <script>
            $(document).ready(function() {

                $(".db").click(function() {
                    let product = $(this).attr("name");
                    let pname = '<?php echo $pname ?>'
                    $.ajax({
                        type: "POST",
                        url: "includesphp_login/product_delete.php",
                        data: {
                            product: product,
                            pname: pname,
                        },
                        cache: false,
                        success: function(data) {
                            message.innerHTML = "New item added successfully";
                            $('#eda').load(location.href + "#eda");
                        },
                        error: function(xhr, status, error) {
                            message.innerHTML = "New item added successfully";
                            console.error(xhr);
                        }
                    });
                });
            });
        </script>

</body>

</html>