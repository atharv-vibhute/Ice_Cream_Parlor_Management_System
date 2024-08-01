function addItem() {
    var dropdown = document.getElementById("item-dropdown");
    var quantityInput = document.getElementById("quantity");
    var itemName = dropdown.options[dropdown.selectedIndex].text;
    var price = parseFloat(dropdown.value);
    var quantity = parseInt(quantityInput.value);
    if (itemName === "Select Item" || isNaN(quantity) || quantity <= 0) {
        alert("Please select an item and enter a valid quantity.");
        return;
    }

    var table = document.getElementById("invoice-table").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length - 1); // Insert before the last row (total row)
    var cols = [itemName, price.toFixed(2), quantity, (price * quantity).toFixed(2)];

    for (var i = 0; i < cols.length; i++) {
        var cell = newRow.insertCell(i);
        cell.innerHTML = cols[i];
    }

    var actionCell = newRow.insertCell(cols.length);
    actionCell.innerHTML = '<button class="btn" onclick="removeItem(this)">Remove</button>';

    calculateTotal();
}

function removeItem(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);

    calculateTotal();
}

function calculateTotal() {
    var table = document.getElementById("invoice-table").getElementsByTagName('tbody')[0];
    var netBill = 0;

    for (var i = 0, row; row = table.rows[i]; i++) {
        var quantity = parseInt(row.cells[2].innerHTML);
        var price = parseFloat(row.cells[1].innerHTML);
        netBill += quantity * price;
    }

    document.getElementById("net-bill").innerHTML = 'Rs ' + netBill.toFixed(2);
}
// print invoice
function printDiv(containers){
    var printContents = document.getElementById(containers).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

}

//product stock js
function toggleNewProductRow() {
    var newRow = document.getElementById("new-product-row");
    newRow.style.display = (newRow.style.display == "none") ? "table-row" : "none";
}

function addNewProduct() {
    var flavor = document.getElementById("new-flavor").value;
    var price = document.getElementById("new-price").value;
    var stock = document.getElementById("new-stock").value;

    if (flavor && price && stock) {
        var table = document.getElementById("stock-table").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length - 1); // Inserting before the new product row
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);

        cell1.innerHTML = flavor;
        cell2.innerHTML = "$" + price;
        cell3.innerHTML = stock;
        cell4.innerHTML = '<button onclick="removeFromStock(\'' + flavor.toLowerCase() + '\')">Remove</button>';

        // Reset the input fields
        document.getElementById("new-flavor").value = "";
        document.getElementById("new-price").value = "";
        document.getElementById("new-stock").value = "";

        // Hide the new product row
        toggleNewProductRow();
    } else {
        alert("Please fill in all fields for the new product.");
    }
}
