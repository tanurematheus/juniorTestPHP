<?php

declare(strict_types=1);

require_once "./class/product.php";


class Furniture extends Product
{
    public function specialAtribute()
    {
?>
        <br>
        <p><b>Please, provide dimensions in HxWxL format</b></p><br>
        <div class="inputs">
            <label for="height">
                Height(CM)
            </label>
            <input id="height" name="height" type="number" step="0.01" required>
        </div>
        <div class="inputs">
            <label for="width">
                Width(CM)
            </label>
            <input id="width" name="width" type="number" step="0.01" required>
        </div>
        <div class="inputs">
            <label for="length">
                Length(CM)
            </label>
            <input id="length" name="length" type="number" step="0.01" required>
        </div>
<?php
    }
    public function info($value)
    {
        echo "Dimension: " . $value['info'];
    }
}
