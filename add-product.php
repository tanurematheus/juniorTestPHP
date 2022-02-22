<!DOCTYPE html>
<html lang="en">
<?php
require "./class/dvd.php";
require "./class/furniture.php";
require "./class/book.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/product_add.css">
</head>

<body>
    <header>
        <h1>Product Add</h1>
        <div class="buttons">
            <button type="submit" form="product_form" id="save-product-btn">
                Save
            </button>
            <button>
                <a href="./index.php">
                    Cancel
                </a>
            </button>
        </div>
    </header>
    <form id="product_form" method="POST" action="<?php echo (isset($_POST['productType'])) ? "./index.php" : "./add-product.php" ?>" name="product_form">
        <div class="inputs">
            <label for="sku">
                SKU
            </label>
            <input id="sku" name="sku" type="text" value="<?php echo (isset($_POST['sku'])) ? $_POST['sku'] : ''; ?>" required>
        </div>
        <div class="inputs">
            <label for="name">
                Name
            </label>
            <input id="name" name="name" type="text" value="<?php echo (isset($_POST['name'])) ? $_POST['name'] : ''; ?>" required>
        </div>
        <div class="inputs">
            <label for="price">
                Price($)
            </label>
            <input id="price" name="price" type="number" step="0.01" value="<?php echo (isset($_POST['price'])) ? $_POST['price'] : ''; ?>" required>
        </div>
        <div class="inputs">
            <label for="productType">Type Switcher</label>
            <select name="productType" id="productType" <?php
                                                        if (!isset($_POST['productType'])) {
                                                        ?> onchange="product_form.submit();" <?php
                                                                                            }
                                                                                                ?> required>
                <option hidden>Type Switcher</option>
                <option value="DVD" id="DVD" <?php if (isset($_POST['productType'])) {
                                                    echo $_POST['productType'] == "DVD" ? "selected" : 'hidden';
                                                }; ?>>DVD</option>
                <option value="Furniture" id="Furniture" <?php if (isset($_POST['productType'])) {
                                                                echo $_POST['productType'] == "Furniture" ? "selected" : 'hidden';
                                                            }; ?>>Furniture</option>
                <option value="Book" id="Book" <?php if (isset($_POST['productType'])) {
                                                    echo $_POST['productType'] == "Book" ? "selected" : 'hidden';
                                                }; ?>>Book</option>
            </select>
        </div>
        <?php
        if (isset($_POST['productType'])) {
            $specialAtribute = new $_POST['productType'];
            $specialAtribute->specialAtribute();
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