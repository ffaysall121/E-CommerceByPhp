<?php

include('include/header.php');

?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>OUR COLLECTION</h2>
                <?php
                $collection = getAllActive("catagories");
                if(mysqli_num_rows($collection) > 0 )
                {
                    foreach($collection as $item)
                    {
                    

                    ?>
                    <h4><?=$item['name']   ?></h4>
                    
                    <?PHP
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>