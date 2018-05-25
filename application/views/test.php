    <?php
    if($list->num_rows() > 0){
             foreach ($list->result() as $row)
             {
                $data[] = $row;
             }
            return $data;
    }