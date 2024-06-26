<!-- Include glogal heder -->
<?php include('template_parts/header_footer/header.php');?>


<section class="hero">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://img.freepik.com/free-photo/pretty-young-stylish-sexy-woman-pink-luxury-dress-summer-fashion-trend-chic-style-sunglasses-blue-studio-background-shopping-holding-paper-bags-talking-mobile-phone-shopaholic_285396-2957.jpg?size=626&ext=jpg&ga=GA1.1.1412446893.1705017600&semt=ais" class="d-block w-100" alt="First Slide">
                        </div>
                        <div class="carousel-item">
                            <img src="https://img.freepik.com/free-photo/pretty-young-stylish-sexy-woman-pink-luxury-dress-summer-fashion-trend-chic-style-sunglasses-blue-studio-background-shopping-holding-paper-bags-talking-mobile-phone-shopaholic_285396-2957.jpg?size=626&ext=jpg&ga=GA1.1.1412446893.1705017600&semt=ais" class="d-block w-100" alt="Second Slide">
                        </div>
                        <div class="carousel-item">
                            <img src="https://img.freepik.com/free-photo/pretty-young-stylish-sexy-woman-pink-luxury-dress-summer-fashion-trend-chic-style-sunglasses-blue-studio-background-shopping-holding-paper-bags-talking-mobile-phone-shopaholic_285396-2957.jpg?size=626&ext=jpg&ga=GA1.1.1412446893.1705017600&semt=ais" class="d-block w-100" alt="Third Slide">
                        </div>
                        <div class="carousel-item">
                            <img src="img/slider/4.png" class="d-block w-100" alt="Third Slide">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="container mt-4">
        <div class="row">

            <?php
            // Include the database connection file
            include 'connect.php';

            // Check if the form is submitted (Add to Cart button is clicked)
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
                // Get the ProductID and UserID from the form
                $productID = $_POST['product_id'];
                // Perform the SQL query to insert into the Cart table
                $cartQuery = "INSERT INTO Cart (ProductID, CustomerID, ItemQuantity) VALUES ('$productID', '$customerID', '1')";
                mysqli_query($conn, $cartQuery);
            }

            // Perform the SQL query to retrieve products with images
            $query = "SELECT * FROM Product";
            $result = mysqli_query($conn, $query);

            // Loop through the results and display each product in a Bootstrap card with an "Add to Cart" button
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="' . $row['ProductImage'] . '" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['ProductName'] . '</h5>
                                <p class="card-text">Price: $' . $row['ProductPrice'] . '</p>
                                <p class="card-text">Quantity: ' . $row['ProductQuantity'] . '</p>
                                <form method="post">
                                    <input type="hidden" name="product_id" value="' . $row['ProductID'] . '">
                                    <button type="submit" class="btn btn-primary" name="add_to_cart">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                      </div>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>

        </div>
    </div>


<!-- Include glogal heder -->
<?php include('template_parts/header_footer/footer.php');?>