<?php
require 'includes/db.php';

$stmt = $pdo->query('SELECT * FROM customers');
$customers = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
</head>
<body>
    <div class="container mt-5">
        <h2>List Customer</h2>
        <a href="add_customer.php" class="btn btn-primary mb-3">Tambah Customer Baru</a>
        <table id="customerTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= $customer['id'] ?></td>
                    <td><?= htmlspecialchars($customer['name']) ?></td>
                    <td><?= htmlspecialchars($customer['email']) ?></td>
                    <td><?= htmlspecialchars($customer['phone']) ?></td>
                    <td>
                        <a href="edit_customer.php?id=<?= $customer['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_customer.php?id=<?= $customer['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>