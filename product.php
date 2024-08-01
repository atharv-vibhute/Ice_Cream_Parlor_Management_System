
<?php
// Establish a connection to the MySQL database
$host = 'localhost'; // Assuming the database is hosted locally
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password
$database = 'login'; // Replace with your database name
$port='3307';
$mysqli = new mysqli($host, $username, $password, $database,$port);

// Check the connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}


// Assuming $mysqli is a valid MySQLi connection object

if(isset($_POST['add'])){
    // Check if all form fields are set
    if(isset($_POST['flavour']) && isset($_POST['price']) && isset($_POST['stock'])) {
        $flavour = $_POST['flavour'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        // Concatenate values directly into the SQL query string (less secure)
        $query = "INSERT INTO stock (flavour, price, stock) VALUES ('$flavour', '$price', '$stock')";

        // Execute the query
        if($mysqli->query($query)) {
            echo "Success";
        } else {
            echo "Failed";
        }
    } else {
        echo "All form fields are required.";
    }
}

// Close the MySQL connection
// $mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main_div">
<div class="header1">
    <div class="side-nav">
    <div class="admin_info">
        <img src="img/profile.png" alt="Admin image">
        <div class="admin_heading">
            <h2>Admin</h2>
           
        </div>
     
    </div>
    <ul>
        <li><a href="dashboard.php"><img src="img/dashboard.png" alt=" Dashboard"><p> Dashboard</p></a></li>
       <li id="addProductBtn"><a href="" ><img src="img/add prodct.png" alt="Add product"><p> Add Products</p></a></li>
        <li><a href="bill.php"><img src="img/reports.png" alt="Invoice"><p>Invoice</p></a></li>
    </ul>
    <ul>
        <li><a href="home.php"><img src="img/logout.png" alt="logout"> <p>Logout</p></a></li>
    </ul>
    </div>

    <div class="container">
    <h2>Ice Cream Stock Management</h2>
    <table class="stock" id="stock-table">
        <thead>
            <tr>
                <th>Ice Cream Flavor</th>
                <th>Price (per unit)</th>
                <th>Available Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Vanilla</td>
                <td>$2.50</td>
                <td><span id="vanilla-stock">10</span></td>
                <td><button onclick="removeFromStock('vanilla')">Remove</button></td>
            </tr>
            <tr>
                <td>Chocolate</td>
                <td>$3.00</td>
                <td><span id="chocolate-stock">15</span></td>
                <td><button onclick="removeFromStock('chocolate')">Remove</button></td>
            </tr>
            <tr>
                <td>Strawberry</td>
                <td>$2.75</td>
                <td><span id="strawberry-stock">8</span></td>
                <td><button onclick="removeFromStock('strawberry')">Remove</button></td>
            </tr>
            <!-- New product row -->
            <form action="" method="POST">
            <tr id="new-product-row" style="display:none;">
                <td><input type="text" id="new-flavor" placeholder="New Flavor" name="flavour"></td>
                <td><input type="number" id="new-price" placeholder="Price" name="price"></td>
                <td><input type="number" id="new-stock" placeholder="Stock" name="stock"></td>
                <td><button onclick="addNewProduct()" name="add">Add</button></td>
            </tr>
</form>
        </tbody>
    </table>
    <button onclick="toggleNewProductRow()">Add New Product</button>
</div>

  </div>
  
  <script src="script.js"></script>
</body>
</html>
<?php
// Assuming $mysqli is a valid MySQLi connection object

if(isset($_POST['add'])){
    // Check if all form fields are set
    if(isset($_POST['flavour']) && isset($_POST['price']) && isset($_POST['stock'])) {
        $flavour = $_POST['flavour'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        // Concatenate values directly into the SQL query string (less secure)
        $query = "INSERT INTO stock (flavour, price, stock) VALUES ('$flavour', '$price', '$stock')";

        // Execute the query
        if($mysqli->query($query)) {
            echo "Success";
        } else {
            echo "Failed";
        }
    } else {
        echo "All form fields are required.";
    }
}
?>