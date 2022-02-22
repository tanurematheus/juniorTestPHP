<?php

declare(strict_types=1);

require_once "./class/product.php";


class Book extends Product
{
    public function specialAtribute()
    {
?>
        <br>
        <p><b>Please, provide weight in KG</b></p><br>
        <div class="inputs">
            <label for="weight">
                Weight(KG)
            </label>
            <input id="weight" name="weight" type="number" step="0.01" required>
        </div>
<?php
    }
    public function info($value)
    {
        echo "Weight: " . $value['info'] . " KG";
    }
}
