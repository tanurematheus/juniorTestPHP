<!DOCTYPE html>
<html lang="en">
<?php
include_once "db/connection.php";
include_once "class/dvd.php";
include_once "class/furniture.php";
include_once "class/book.php";
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
    <form id="mass_delete" action="./db/mass-delete.php" method="POST">
        <?php
        foreach ($connection->list() as $value) {
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