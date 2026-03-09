<?php
include "common/navbar.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_POST['cart'])) {
    $cart = json_decode($_POST['cart'], true);

    foreach ($cart as $item) {
        $check = $conn->prepare("SELECT quantity FROM products WHERE id=?");
        $check->bind_param("i", $item['productId']);
        $check->execute();
        $check->bind_result($availableQty);
        $check->fetch();
        $check->close();

        if ($item['quantity'] > $availableQty) {
            echo "error";
            exit(); 
        }
    }

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['subTotal'];
    }

    $stmt = $conn->prepare("INSERT INTO sales(total_amount) VALUES(?)");
    $stmt->bind_param("d", $total);
    $stmt->execute();
    $sale_id = $conn->insert_id;
    $stmt->close();

    $stmt2 = $conn->prepare("INSERT INTO sale_items(sale_id,product_id,quantity,price,subtotal) VALUES(?,?,?,?,?)");

    foreach ($cart as $item) {
        $stmt2->bind_param(
            "iiidd",
            $sale_id,
            $item['productId'],
            $item['quantity'],
            $item['price'],
            $item['subTotal']
        );
        $stmt2->execute();
    }
    $stmt2->close();

    echo "success";
}
?>

<style>
    /* Minimal Design Enhancements */
    .sales-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .page-header {
        margin-bottom: 30px;
        color: #333;
        font-weight: 400;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
    }

    .form-group {
        display: flex;
        gap: 10px;
        margin-bottom: 30px;
        flex-wrap: wrap;
        align-items: center;
    }

    .form-select,
    .form-input {
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        transition: border 0.2s;
    }

    .form-select {
        min-width: 250px;
    }

    .form-input {
        width: 120px;
    }

    .form-select:focus,
    .form-input:focus {
        outline: none;
        border-color: #999;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-primary {
        background: #000;
        color: white;
    }

    .btn-primary:hover {
        background: #333;
    }

    .btn-danger {
        background: #dc3545;
        color: white;
        padding: 5px 12px;
        font-size: 13px;
    }

    .btn-danger:hover {
        background: #c82333;
    }

    .btn-success {
        background: #28a745;
        color: white;
        margin-top: 20px;
    }

    .btn-success:hover {
        background: #218838;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 14px;
    }

    .table th {
        background: #f8f9fa;
        padding: 12px;
        text-align: left;
        font-weight: 500;
        color: #555;
        border-bottom: 2px solid #dee2e6;
    }

    .table td {
        padding: 12px;
        border-bottom: 1px solid #dee2e6;
        color: #666;
    }

    .table tbody tr:hover {
        background: #f8f9fa;
    }

    .total-section {
        display: flex;
        justify-content: flex-end;
        margin: 20px 0;
        font-size: 18px;
    }

    .total-label {
        font-weight: 500;
        color: #555;
        margin-right: 10px;
    }

    .total-amount {
        font-weight: 600;
        color: #000;
    }

    .remove-btn {
        background: none;
        border: none;
        color: #dc3545;
        cursor: pointer;
        font-size: 13px;
        text-decoration: underline;
        padding: 0;
    }

    .remove-btn:hover {
        color: #c82333;
    }

    .alert {
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 20px;
        display: none;
    }

    .alert-error {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <!-- Top Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <button class="toggle-sidebar" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <h5 class="page-title">Dashboard</h5>
        </div>

        <div class="navbar-right">
            <div class="notification-icon">
                <i class="far fa-bell"></i>
                <span class="badge">3</span>
            </div>

            <div class="notification-icon">
                <i class="far fa-envelope"></i>
                <span class="badge">5</span>
            </div>

            <div class="user-dropdown">
                <div class="user-avatar">
                    JD
                </div>
                <div class="user-info">
                    <p class="user-name">John Doe</p>
                    <p class="user-role">Administrator</p>
                </div>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="sales-container">
        <h3 class="page-header">Create Sale</h3>

        <div class="form-group">
            <select id="productSelect" class="form-select">
                <option value="">Select Product</option>

                <?php
                $sql = $conn->prepare("SELECT id,name,price FROM products");
                $sql->execute();
                $sql->bind_result($id, $name, $price);
                while ($sql->fetch()) {
                    echo "<option value='$id' data-price='$price'>$name</option>";
                }
                ?>
            </select>

            <input type="number" id="quantity" class="form-input" placeholder="Quantity" min="1">

            <button onclick="addProduct()" class="btn btn-primary">Add Product</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody id="saleBody"></tbody>

        </table>

        <div class="total-section">
            <span class="total-label">Total:</span>
            <span class="total-amount">$<span id="total">0</span></span>
        </div>

        <button onclick="submitSale()" class="btn btn-success">Complete Sale</button>
    </div>
</div>

<script>
    let cart = [];

    function addProduct() {
        const select = document.getElementById('productSelect');
        const quantity = Number(document.getElementById('quantity').value);
        if (select.value == "" || quantity < 1) {
            alert("Select product and quantity");
            return;
        }

        const productId = select.value;
        const name = select.selectedOptions[0].text;
        const price = Number(select.selectedOptions[0].dataset.price);
        const subTotal = price * quantity;
        cart.push({
            productId,
            name,
            price,
            quantity,
            subTotal
        });
        renderTable();

    }

    function renderTable() {
        const tbody = document.getElementById('saleBody');

        tbody.innerHTML = "";
        let total = 0;
        cart.forEach((item, index) => {
            let row = tbody.insertRow();
            row.insertCell(0).innerText = index + 1;
            row.insertCell(1).innerText = item.name;
            row.insertCell(2).innerText = '$' + item.price.toFixed(2);
            row.insertCell(3).innerText = item.quantity;
            row.insertCell(4).innerText = '$' + item.subTotal.toFixed(2);
            let btn = document.createElement('button');
            btn.innerText = "Remove";
            btn.className = 'remove-btn';
            btn.onclick = () => removeItem(index);
            row.insertCell(5).appendChild(btn);

            total += item.subTotal;
        });

        document.getElementById('total').innerText = total.toFixed(2);
    }

    function removeItem(index) {
        cart.splice(index, 1);
        renderTable();
    }

    function submitSale() {
        if (cart.length == 0) {
            alert("Cart is Empty!!");
            return;
        }

        const formData = new FormData();
        formData.append('cart', JSON.stringify(cart));
        fetch('sales.php', {
            method: "POST",
            body: formData
        }).then(res => res.text()).then(data => {
            if (data === 'success') {
                alert("Sell Completed.");
                cart = [];
                renderTable();
            } else {
                alert("Quantity is not available");
            }

        });
    }
</script>

<?php
include "common/footer.php";
?>