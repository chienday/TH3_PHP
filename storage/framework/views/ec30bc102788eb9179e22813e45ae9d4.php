<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEMO</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin="anonymous">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";
$items_per_page = 10;

// Lấy trang hiện tại từ query string, nếu không có thì mặc định là trang 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn đếm tổng số bản ghi
    $total_items_sql = "SELECT COUNT(*) FROM demo";
    $total_items_stmt = $conn->prepare($total_items_sql);
    $total_items_stmt->execute();
    $total_items = $total_items_stmt->fetchColumn();
    
    // Truy vấn dữ liệu với phân trang
    $sql = "SELECT * FROM demo LIMIT $offset, $items_per_page";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo $e->getMessage();
}

$conn = null;
?>

    <div class="container">
        <h1 class="text-primary text-center">QUẢN LÝ BÀI VIẾT</h1>
        <button class="btn btn-primary">+ Thêm mới</button>
        <table class="table table-light table-striped-columns">
            <thead class="table-light">
                <tr>
                    <th scope="col" rowspan="2" class="text-center align-middle">STT</th>
                    <th scope="col" rowspan="2" class="text-center align-middle">title</th>
                    <th scope="col" rowspan="2" class="text-center align-middle">content</th>
                    <th scope="col" rowspan="2" class="text-center align-middle">author</th>
                    <th scope="col" rowspan="2" class="text-center align-middle">created_at</th>
                    <th scope="col" colspan="3" class="text-center">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $index => $item): ?>
                    <tr>
                        <td><?= $index + 1 + $offset ?></td>
                        <td><?= htmlspecialchars($item['title']) ?></td>
                        <td><?= htmlspecialchars($item['content']) ?></td>
                        <td><?= htmlspecialchars($item['author']) ?></td>
                        <td><?= htmlspecialchars($item['created_at']) ?></td>
                        </td> <td scope="col" class="text-center"><a href="view.php?id=<?= $item['id'] ?>" class="btn btn-primary">Xem</a></td>
                        <td scope="col" class="text-center" ><a href="update.php?id=<?=  $item['id'] ?>" class="btn btn-primary">Sửa</a></td>
                        <td scope="col" class="text-center"><a href="delete.php?id=<?=  $item['id'] ?>" class="btn btn-primary">Xóa</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php
        $total_pages = ceil($total_items / $items_per_page);
        if ($total_pages > 1): ?>
           <nav aria-label="Page navigation"> 
              <ul class="pagination justify-content-center">
                 <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                     <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous"> 
                        <span aria-hidden="true">&laquo; Trước</span>
                     </a> 
                    </li> 
                     <?php for ($i = 1; $i <= $total_pages; $i++): ?> 
                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                             <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a> 
                            </li> <?php endfor; ?> 
                            <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>"> 
                                <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next"> 
                                    <span aria-hidden="true">Sau &raquo;</span> 
                                </a> 
                            </li> 
                </ul> 
            </nav>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\testPHP\mytask\resources\views/welcome.blade.php ENDPATH**/ ?>