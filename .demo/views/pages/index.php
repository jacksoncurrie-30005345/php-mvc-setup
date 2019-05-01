<?php include(APPROOT . "/views/includes/header.php"); ?>

<div class="row">
    <div class="col-sm-12">
    <h1><?php echo $data['title']; ?></h1>
    <hr>
        <table class="table">
            <thead class="myheader">
                <tr>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $output = "";

                    $today = new DateTime('now');
                    $todayPrint = $today->format('d/m/Y');

                    foreach($data['people'] as $item) {

                        $date = new DateTime($item['DOB']);
                        $datePrint = $date->format('d/m/Y');

                        $diff = date_diff($today, $date);
                        $diff = $diff->format('%y Years');

                        $output .= "<tr><td>";
                        $output .= $item['FNAME'];
                        $output .= " ";
                        $output .= $item['LNAME'];
                        $output .= "</td><td>";
                        $output .= $datePrint;
                        $output .= "</td><td>";
                        $output .= $diff;
                        $output .= "</td></tr>";
                    }

                    echo $output;
                ?>
            </tbody>
        </table>
    </div>
</div>


<?php include(APPROOT . "/views/includes/footer.php"); ?>