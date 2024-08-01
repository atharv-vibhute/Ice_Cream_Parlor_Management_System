<?php
include("connection.php");
if(isset($_POST['submit'])){
$username=$_POST['user'];
$password=$_POST['pass'];

$sql= "select * from logintable where name='$username' and pass='$password'";
$result= mysqli_query($conn,$sql);
$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
if($count==1){
    header("Location:dashboard.php");
}
else { 
    echo'<script>
window.location.href = "home.php";
alert("login failed. Invalid username and password")
</script>';

}
}
?>
<!-- product page php -->
<?php
// Assuming $mysqli is a valid MySQLi connection object

// Fetch invoice details from the database
// Example query: SELECT item, quantity, price FROM invoice_items
// Execute the query and fetch results

// For demonstration, let's assume we have sample data
$invoiceDetails = [
    ["item" => "Vanilla Ice Cream", "quantity" => 2, "price" => 5],
    ["item" => "Chocolate Ice Cream", "quantity" => 1, "price" => 6],
    ["item" => "Strawberry Ice Cream", "quantity" => 3, "price" => 4]
];

// Convert data to JSON format and output
header("Content-Type: application/json");
echo json_encode($invoiceDetails);
?>


