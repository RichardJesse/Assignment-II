<?php


class Table {

    public function content($headers, $content){
        ob_start();
        ?>

            <div id="table-container" class="mx-auto" style="display: none">
              <div class=" d-flex flex-column justify-content-center align-items-center vh-100 mx-auto"  >

                    <h1 style="font-family: SUSE" class="text-center mb-3">Signed Up Users</h1>

                  <table class="table  table-hover table-striped rounded w-75">
                    <thead>
                    <tr>
                        <?php
                        foreach($headers as $header){
                            ?>
                            <th><?php echo $header  ?></th>
                            <?php

                        }
                        ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach($content as $row){
                        echo '<tr>';
                        echo '<td>' . $row['id'].'</td>';
                        echo '<td>' . $row['username'].'</td>';
                        echo '<td>' . $row['email'].'</td>';
                        echo '<td>' . $row['created_at'].'</td>';
                        echo '</tr>';

                    }

                    ?>

                    </tbody>
                </table>



              </div>
            </div>


<?php
        return ob_get_clean();
    }

}