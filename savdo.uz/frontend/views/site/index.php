<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        
    </div>

    <div class="body-content">

        <div class="row">
           
            <table class="table table-bordered">
                <tr>
                    <td>#</td>
                    <td>Nomi</td>
                    <td>Narxi</td>
                </tr>
                <?php
                    $i=1;
                    foreach ($mahsulotlar as $mahsulot) {
                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>".$mahsulot->nomi_uz."</td>";
                        echo "<td>".$mahsulot->narxi."</td>";
                        echo "</tr>";
                        $i++;
                    }
                ?>
            </table>

        </div>

    </div>
</div>
