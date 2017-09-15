<!DOCTYPE HTML>
<html>

<head>
    <title>Result page</title>

    <style type="text/css">
        .results {
            margin-left: 12%;
            margin-right: 12%;
            margin-top: 10px;
        }
    </style>
</head>

<body bgcolor="#F5DEB3">

            <form action="result.php" method="get">



                <span>Write your keyword:</span><input type="text" name="user_keyword" size="120" />
                <input type="submit" name="result" value="Search Now" />


            </form>
            <a href="search.html"><button>Go Back</button></a>
            <?php

            mysqli_connect("localhost","root","", "search");

            if (isset($_GET['search'])) {
                $get_value = $_GET['user_query'];

                if ($get_value == ''){

                    echo "<h3 align='center'><b>Please search something</b></h3>";
                    exit();

                }

                $result_query = "SELECT * from sites where site_keywords like '%$get_value%'";

                $run_result = mysqli_query(mysqli_connect("localhost","root","", "search"), $result_query);

                if (mysqli_num_rows($run_result)<1){
                    echo "<h3 align='center'><b>Nothing is found in database</b></h3>";
                    exit();
                }


                while ($row_result = mysqli_fetch_array($run_result)) {

                    $site_title = $row_result['site_title'];
                    $site_link = $row_result['site_link'];
                    $site_desc = $row_result['site_desc'];
                    $site_image = $row_result['site_image'];

                    echo "<div class='results'>

                        <h2>$site_title</h2>
                        <a href='$site_link' target='_blank'>$site_link</a>
                        <p align='justify'>$site_desc</p>
                        <img src='images/$site_image' width='100' height='100' />
                        
                         </div>";
                }
            }
            ?>


</body>
</html>