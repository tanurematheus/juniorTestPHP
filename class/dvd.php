<?php

declare(strict_types=1);

require_once "./class/product.php";

class DVD extends Product
{
    public function specialAtribute()
    {
?>
        <br>
        <p><b>Please, provide size in MB</b></p><br>
        <div class="inputs">
            <label for="size">
                Size(MB)
            </label>
            <input id="size" name="size" type="number" step="0.01" required>
        </div>
<?php
    }
    public function info($value)
    {
        echo "Size: " . $value['info'] . " MB";
    }
}
