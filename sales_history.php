<?php
include "common/navbar.php";

$products = [];
$stmt = $conn->prepare("SELECT id,sale_date,total_amount FROM sales");
$stmt->execute();
$stmt->bind_result($id, $date, $total_amount);
$stmt->store_result();
if ($stmt->num_rows > 0) {
    while ($stmt->fetch()) {
        $products[] = [
            "id" => $id,
            "sale_date" => $date,
            "total_amount" => $total_amount
        ];
    }
}

?>

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

    <div class="row">
        <div class="col-12">
            <div class="table-card">
                <div class="card-header">
                    <h5>Sales</h5>
                    <a href="sales.php" class="btn btn-sm btn-primary">Add Sale</a>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Sales ID</th>
                                <th>Date</th>
                                <th>Total Amount</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($products as $index => $product) { ?>
                                    <td>#<?= $index + 1 ?></td>
                                    <td><?= $product['id'] ?></td>
                                    <td><?= $product['sale_date'] ?></td>
                                    <td><?= $product['total_amount'] ?></td>

                                    <!-- <td>
                                        <button type="button" class="btn btn-primary" onclick="viewModal(<?= $product['id'] ?>)" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fas fa-eye"></i></button>
                                        <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="action-btn"><i class="fas fa-trash"></i></button>
                                    </td> -->
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
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
</div>

<script>

</script>

<?php
include "common/footer.php";
?>