<?php

include_once "includesphp_login/dbh.php";

if (isset($_POST['input'])) {

    $input = $_POST['input'];

    $query = "SELECT * FROM allproducts WHERE P_name LIKE '{$input}%'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) { ?>

        <div class="allsearch">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {

                $CId = $row['P_id'];
                $C_name = $row['P_name'];
                $C_price = $row['P_price'];
                $C_image = $row['P_image'];
            ?>
                <link rel="stylesheet" href="css-files/searchlist.css">

                <div class="item-search">

                    <?php echo '<img style="width: 10%;" src="data:image;base64,' . base64_encode($row['P_image']) . '"alt="" >'; ?>

                    <div style="width: 370px;" class="info">

                        <h4><?php echo $C_name; ?></h1>
                            <h5>$<?php echo $C_price; ?></h2>

                    </div>

                    <div class="options">

                        <a href="single-product.php?product=<?= $row["P_name"]; ?>">
                            <p class="tb">View</p>
                        </a>
                    </div>

                </div>

            <?php
            }
            ?>
    <?php
    } else {
        echo "<h6>No data found<h6>";
    }
}
    ?>
        </div>
        </div>