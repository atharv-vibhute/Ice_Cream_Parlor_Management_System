<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="bill_div">
        <div class="header2">
        <div class="side-nav">
    <div class="admin_info">
        <img src="img/profile.png" alt="Admin image">
        <div class="admin_heading">
            <h2>Admin</h2>
           
        </div>
     
    </div>
    <ul>
        <li><a href="dashboard.php"><img src="img/dashboard.png" alt=" Dashboard"><p> Dashboard</p></a></li>
        <li><a href="product.php"><img src="img/rewards.png" alt="product"><p>Products</p></a></li>
       
    </ul>
    <ul>
        <li><a href="home.php"><img src="img/logout.png" alt="logout"> <p>Logout</p></a></li>
    </ul>
    </div>
    <div id="containers">
<div class="container" >
        <h2>Ice Cream Parlor Invoice</h2>
        <table class="invoice" id="invoice-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price (per unit)</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Invoice items will be inserted here -->
            </tbody>
           
            <tfoot>
                <tr class="total">
                    <td colspan="3">Net Bill Amount</td>
                    <td id="net-bill">0.00</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        </div>
        <select id="item-dropdown">
            <option value="0">Select Item</option>
            <option value="2.50">Vanilla Ice Cream</option>
            <option value="3.00">Chocolate Ice Cream</option>
            <option value="2.75">Strawberry Ice Cream</option>
        </select>
        <input type="number" id="quantity" placeholder="Quantity">
        <button class="btn" onclick="addItem()">Add Item</button>
        <button class="btn print-btn" onclick="printDiv('containers')">Print</button>
    </div>
    </div>
    </div>
    <script src="script.js"></script>
</body>
</html>