<?php
include "common/navbar.php";
if (isset($_POST['createbtn'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $stmt = $conn->prepare("INSERT INTO products(name, price, quantity) VALUES(?,?,?)");
    $stmt->bind_param("sdi", $name, $price, $quantity);
    if ($stmt->execute()) {
        echo $conn->insert_id;
    } else {
        echo "error";
    }
    exit();
}
if (isset($_POST['deletebtn'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $del = $conn->prepare("DELETE from products WHERE id=?");
        $del->bind_param("i", $id);
        if ($del->execute()) {
            echo "success";
        } else {
            echo "error";
        }
        $del->close();
        exit();
    }
}
if (isset($_POST['updatebtn'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("UPDATE products SET name=?,price=?,quantity=? WHERE id=?");
    $stmt->bind_param("sdii", $name, $price, $quantity, $id);
    $stmt->execute();
    exit();
}

$sql = $conn->prepare("SELECT id, name, price, quantity, created_at FROM products");
$sql->execute();
$sql->store_result();
$sql->bind_result($id, $name, $price, $quantity, $created_at);
$products = [];
if ($sql->num_rows > 0) {
    while ($sql->fetch()) {
        $products[] = [
            "id" => $id,
            "name" => $name,
            "price" => $price,
            "quantity" => $quantity,
            "created_at" => $created_at
        ];
    }
    $total_products = count($products);
}


?>
<div class="main-content" id="mainContent">
    <!-- Top Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <button class="toggle-sidebar" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <h5 class="page-title">Products</h5>
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
    <div class="content">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

        <div class="modal fade" id="createModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Create Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">

                        <form method="POST" action="products.php" onsubmit="return createProduct(event)">

                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" id="create_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" step="0.01" id="create_price" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" id="create_quantity" class="form-control" required>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    Create Product
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">

                        <form method="POST" action="products.php" onsubmit="return updateProduct(event)">

                            <!-- Hidden Product ID -->
                            <input type="hidden" name="id" id="product_id">

                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" id="product_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" step="0.01" name="price" id="product_price" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="product_quantity" class="form-control" required>
                            </div>

                            <div class="text-end">
                                <button type="submit" name="updatebtn" class="btn btn-success">
                                    Update Product
                                </button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel">View Product Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Hidden Product ID (keep it hidden for reference) -->
                        <input type="hidden" id="view_product_id">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Name</label>
                            <p class="form-control-static" id="view_product_name" style="padding: 0.375rem 0; border-bottom: 1px solid #dee2e6;"></p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Price</label>
                            <p class="form-control-static" id="view_product_price" style="padding: 0.375rem 0; border-bottom: 1px solid #dee2e6;"></p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Quantity</label>
                            <p class="form-control-static" id="view_product_quantity" style="padding: 0.375rem 0; border-bottom: 1px solid #dee2e6;"></p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Created Date</label>
                            <p class="form-control-static" id="view_product_date" style="padding: 0.375rem 0; border-bottom: 1px solid #dee2e6;"></p>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Stats Cards -->
        <div class="row">
            <!-- Total Products Card - Left Side (8 columns) -->
            <div class="col-md-6 col-lg-12">
                <div class="stats-card d-flex align-items-center">
                    <div class="stats-icon me-3">
                        <i class="fas fa-box"></i>
                    </div>
                    <div>
                        <h3 class="stats-number mb-0"><?= $total_products; ?></h3>
                        <p class="stats-title mb-1">Total Products</p>
                        <small class="text-success">
                            <i class="fas fa-arrow-up"></i> 12% increase
                        </small>
                    </div>
                </div>
            </div>

            <!-- Create Product Button - Right Side (4 columns) -->

        </div>

        <!-- Quick Actions -->


        <!-- Charts Row -->
        <!-- <div class="row">
                <div class="col-md-6">
                    <div class="chart-card">
                        <h5>Revenue Overview</h5>
                        <div class="text-center mt-4">
                            <i class="fas fa-chart-line fa-4x text-primary"></i>
                            <p class="mt-3 text-muted">Chart would display here</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="chart-card">
                        <h5>User Activity</h5>
                        <div class="text-center mt-4">
                            <i class="fas fa-chart-pie fa-4x text-success"></i>
                            <p class="mt-3 text-muted">Chart would display here</p>
                        </div>
                    </div>
                </div>
            </div> -->

        <!-- Recent Orders Table -->
        <div class="row">
            <div class="col-12">
                <div class="table-card">
                    <div class="card-header">
                        <h5>Products</h5>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createModal">Add Product</button>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Product ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $serial = 1;
                                foreach ($products as $index => $product) { ?>
                                    <tr>
                                        <td><?= "#" . $serial; ?></td>
                                        <td><?= $product["id"]; ?></td>
                                        <td id="rowname<?= $product['id'] ?>"><?= $product["name"]; ?></td>
                                        <td id="rowprice<?= $product['id'] ?>"><?= $product["price"]; ?></td>
                                        <td id="rowquantity<?= $product['id'] ?>"><?= $product["quantity"]; ?></td>
                                        <td id="rowdate<?= $product['id'] ?>"><?= $product["created_at"]; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="viewModal('<?= $product['id'] ?>', '<?= $product['name'] ?>', '<?= $product['price'] ?>', '<?= $product['quantity'] ?>', '<?= $product['created_at'] ?>')" data-bs-toggle="modal"
                                                data-bs-target="#viewModal"><i class="fas fa-eye"></i></button>
                                            <button class="action-btn" onclick="editProduct('<?= $product['id'] ?>', '<?= $product['name'] ?>', '<?= $product['price'] ?>',  '<?= $product['quantity'] ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="action-btn" onclick="deleteProduct('<?= $product['id'] ?>','<?= $product['name'] ?>', this,event)"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php $serial++;
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<script>
    function editProduct(id, name, price, quantity) {
        document.getElementById('product_id').value = id;
        document.getElementById('product_name').value = name;
        document.getElementById('product_price').value = price;
        document.getElementById('product_quantity').value = quantity;
    }

    function viewModal(id, name, price, quantity, created_at) {
        document.getElementById('view_product_name').innerText = name;
        document.getElementById('view_product_price').innerText = price;
        document.getElementById('view_product_quantity').innerText = quantity;
        document.getElementById('view_product_date').innerText = created_at;
    }

    function updateProduct(event) {
        event.preventDefault();
        const id = document.getElementById('product_id').value;
        const name = document.getElementById('product_name').value;
        const price = document.getElementById('product_price').value;
        const quantity = document.getElementById('product_quantity').value;

        fetch('products.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `updatebtn=1&id=${id}&name=${name}&price=${price}&quantity=${quantity}`
        }).then(res => res.text()).then(data => {
            alert("Product Updated Successfully");
            document.getElementById("rowname" + id).innerText = name;
            document.getElementById('rowprice' + id).innerText = price;
            document.getElementById('rowquantity' + id).innerText = quantity;
            if (document.activeElement) {
                document.activeElement.blur();
            }
            var modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
            modal.hide();
        });
    }

    function deleteProduct(id, name, buttonElement, event) {
        event.preventDefault();
        console.log(buttonElement);
        if (!confirm(`Are you sure you want to delete ${name}?`)) {
            return;
        }

        fetch('products.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `deletebtn=1&id=${id}`
        }).then(res => res.text()).then(data => {
            if (data.includes('success')) {
                alert(`${name} deleted successfully`);
                const row = buttonElement.closest('tr');
                row.remove();
                const rows = document.querySelectorAll('tbody tr');
                const total_product = rows.length;
                document.querySelector('.stats-number').innerText = total_product;
                rows.forEach((row, index) => {
                    row.cells[0].innerText = '#' + (index + 1);
                })
            }
        });
    }

    function createProduct(event) {
        event.preventDefault();
        const name = document.getElementById('create_name').value;
        const price = document.getElementById('create_price').value;
        const quantity = document.getElementById('create_quantity').value;

        fetch('products.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `createbtn=1&name=${encodeURIComponent(name)}&price=${price}&quantity=${quantity}`
        }).then(res => res.text()).then(data => {
            if (data !== 'error') {
                alert(`${name} added successfully`);
                const newId = data.trim();


                location.reload();
            }
        });
    }
</script>

<?php
include "common/footer.php";
?>