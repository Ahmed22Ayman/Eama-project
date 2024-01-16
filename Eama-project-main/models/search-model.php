<?php

    if(isset($_POST["query"]))
    {
        $connect = mysqli_connect("localhost", "root", "", "eamaproject");
        $output = '';
        $query = "SELECT * FROM products WHERE Pname LIKE '%".mysqli_real_escape_string($connect, $_POST["query"])."%'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $output .= '
                <div style="padding: 10px; border: 1px solid #ccc; margin-bottom: 0px; width: 50%;">
                    <p>'.$row["pimage"].'</p>
                    <h3><a href="../views/product_details.php?id='.$row["id"].'style: text-decoration: none;">'.$row["Pname"].'</a></h3>
                    <p>'.$row["pcategory"].'</p>
                    <p>'.$row["pprice"].'</p>

                </div>
                ';
            }
        }
        else
        {
            $output .= '<h3>No Results</h3>';
        }
        echo $output;
    }
    ?>