<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <?php
            $prev="#";
            $next ="#";
            if (isset($nump) && isset($page)){
                if ($page>1){
                    $prev = $page-1;
                }
                else{
                    $prev=1;
                }
                if ($page<$nump){
                    $next = $page+1;
                }
                else{
                    $next = $page;
                }
            }?>
            <button class="page-link" onclick="promenaStrane(<?php echo $prev ?>)" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <!--                <span class="sr-only">Previous</span>-->
            </button>
            <!--            <a class="page-link" href="#">Previous</a>-->
        </li>
        <?php
        if (isset($nump) && isset($page)){
            for ($i=1;$i<=$nump;$i++){
                if ($i==$page){

                    ?>
                    <li class="page-item active"><button class="page-link" onclick="promenaStrane(<?php echo $i ?>)"><?php echo $i;?></button></li>
                    <?php

                }
                else{
                    ?>
                    <li class="page-item"><button class="page-link" onclick="promenaStrane(<?php echo $i ?>)"><?php echo $i;?></button></li>
                    <?php
                }

            }
        }


        ?>
        <!--        <li class="page-item"><a class="page-link" href="#">1</a></li>-->
        <!--        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
        <!--        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
        <li class="page-item">
            <button class="page-link" onclick="promenaStrane(<?php echo $next?>)" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </button>
            <!--            <a class="page-link" href="#">Next</a>-->
        </li>
    </ul>
</nav>