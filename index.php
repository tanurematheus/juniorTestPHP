<!DOCTYPE html>
<html lang="en">
<?php
require "./class/db.php";
require "./class/dvd.php";
require "./class/furniture.php";
require "./class/book.php";

$database   = 'mysql';
$host       = '127.0.0.1';
$dbname = 'products';
$port       = 3306;
$user       = 'root';
$password   = '';

$product = new db($database, $host, $dbname, $port, $user, $password);

if (isset($_POST['delete_checkbox'])) {
    $products_to_delete = $_POST['delete_checkbox'];
    foreach ($products_to_delete as $delete_checkbox) {
        $product->delete($delete_checkbox);
    }
}

if (isset($_POST['sku'])) {
    if (isset($_POST['size'])) {
        $info = $_POST['size'];
    } else if (isset($_POST['weight'])) {
        $info = $_POST['weight'];
    } else {
        $info = $_POST['height'] . 'x' . $_POST['width'] . 'x' . $_POST['length'];
    }
    try {
        $product->insert($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['productType'], $info);
    } catch (Exception $e) {
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <header>
        <h1>Product List</h1>
        <div class="buttons">
            <button>
                <a href="./add-product.php">
                    ADD
                </a>
            </button>
            <button id="delete-product-btn" type="submit" form="mass_delete">
                MASS DELETE
            </button>
        </div>
    </header>
    <form id="mass_delete" action="./index.php" method="POST">
        <?php
        foreach ($product->list() as $value) {
        ?>
            <div class="product">
                <input class="delete-checkbox" name="delete_checkbox[]" type="checkbox" value="<?php echo $value['sku'] ?>">
                <p><?php echo $value['sku'] ?></p>
                <p><?php echo $value['name'] ?></p>
                <p><?php echo $value['price'] . " $" ?></p>
                <p><?php
                    $info = new $value['productType'];
                    $info->info($value);
                    ?>
                </p>
            </div>
        <?php
        }
        ?>
    </form>
    <footer>
        <hr>
        <div class="info">
            <p>Scandweb Test assignment</p>
        </div>
    </footer>
</body>

</html>