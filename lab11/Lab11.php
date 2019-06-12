<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here

error_reporting(E_ALL^E_NOTICE);

@$db = new mysqli('localhost:3506','root','Hzj336688','travel');
if (mysqli_connect_errno()){
    echo '<p>Error: Could not connect to database.<br/>
                                 Please try again later.</p>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="Lab11.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control">
                <option value="0">Select Continent</option>
                <?php
                //Fill this place

                //****** Hint ******
                //display the list of continents

                $result=mysqli_query($db,"SELECT * FROM `continents`");
                while($row = $result->fetch_assoc()) {
                  echo '<option value='.$row['ContinentCode'].'>'.$row['ContinentName'].'</option>';
                }

                ?>
              </select>     
              
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
                <?php 
                //Fill this place

                //****** Hint ******
                /* display list of countries */
                $continent_code = explode("&",$_SERVER["QUERY_STRING"]);
                $code__ = explode("=",$continent_code[0]);
                $code = $code__[1];
                if ($code){
                    $result_countries=mysqli_query($db,"SELECT * FROM `countries` WHERE `Continent`='$code'");
                    while($row_countries = $result_countries->fetch_assoc()) {
                        echo '<option value='.$row_countries['ISO'].'>'.$row_countries['CountryName'].'</option>';
                    }
                }else{
                    $result_countries=mysqli_query($db,"SELECT * FROM `countries`");
                    while($row_countries = $result_countries->fetch_assoc()) {
                        echo '<option value='.$row_countries['ISO'].'>'.$row_countries['CountryName'].'</option>';
                    }
                }

                ?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name=title>
              <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>

          </div>
        </div>     
                                    

		<ul class="caption-style-2">
            <?php 
            //Fill this place

            //****** Hint ******
            /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
            <li>
              <a href="detail.php?id=????" class="img-responsive">
                <img src="images/square-medium/????" alt="????">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <p>????</p>
                  </div>
                </div>
              </a>
            </li>        
            */
            $code = explode("&",$_SERVER["QUERY_STRING"]);
            $code__conti = explode("=",$code[0]);
            $continent_code = $code__conti[1];
            $code__country = explode("=",$code[1]);
            $country_code = $code__country[1];

            if ($country_code){
                findByCountry($country_code);
            }else if ($continent_code){
                findByContinent($continent_code);
            }else{
                find_all();
            }

            function find_all(){
                @$db = new mysqli('localhost:3506','root','Hzj336688','travel');
                if (mysqli_connect_errno()){
                    echo '<p>Error: Could not connect to database.<br/>
                                 Please try again later.</p>';
                    exit;
                }
                $result_image=mysqli_query($db,"SELECT * FROM `imagedetails`");
                while ($array_image=mysqli_fetch_assoc($result_image)){
                    $imageID = $array_image["ImageID"];
                    $path = $array_image["Path"];
                    $title = $array_image["Title"];
                    $Description = $array_image["Description"];

                    echo "<li>
              <a href=\"detail.php?id=$imageID\" class=\"img-responsive\">
                <img src=\"images/square-medium/$path\" alt=\"$title\">
                <div class=\"caption\">
                  <div class=\"blur\"></div>
                  <div class=\"caption-text\">
                    <p>$Description</p>
                  </div>
                </div>
              </a>
            </li>   ";
                }
            }
            function findByCountry($data){
                @$db = new mysqli('localhost:3506','root','Hzj336688','travel');
                if (mysqli_connect_errno()){
                    echo '<p>Error: Could not connect to database.<br/>
                                 Please try again later.</p>';
                    exit;
                }
                $result_image=mysqli_query($db,"SELECT * FROM `imagedetails` WHERE `CountryCodeISO`='$data'");
                while ($array_image=mysqli_fetch_assoc($result_image)){
                    $imageID = $array_image["ImageID"];
                    $path = $array_image["Path"];
                    $title = $array_image["Title"];
                    $Description = $array_image["Description"];

                    echo "<li>
              <a href=\"detail.php?id=$imageID\" class=\"img-responsive\">
                <img src=\"images/square-medium/$path\" alt=\"$title\">
                <div class=\"caption\">
                  <div class=\"blur\"></div>
                  <div class=\"caption-text\">
                    <p>$Description</p>
                  </div>
                </div>
              </a>
            </li>   ";
                }
            }
            function findByContinent($data){
                @$db = new mysqli('localhost:3506','root','Hzj336688','travel');
                if (mysqli_connect_errno()){
                    echo '<p>Error: Could not connect to database.<br/>
                                 Please try again later.</p>';
                    exit;
                }
                $result_image=mysqli_query($db,"SELECT * FROM `imagedetails` WHERE `ContinentCode`='$data'");
                while ($array_image=mysqli_fetch_assoc($result_image)){
                    $imageID = $array_image["ImageID"];
                    $path = $array_image["Path"];
                    $title = $array_image["Title"];
                    $Description = $array_image["Description"];

                    echo "<li>
              <a href=\"detail.php?id=$imageID\" class=\"img-responsive\">
                <img src=\"images/square-medium/$path\" alt=\"$title\">
                <div class=\"caption\">
                  <div class=\"blur\"></div>
                  <div class=\"caption-text\">
                    <p>$Description</p>
                  </div>
                </div>
              </a>
            </li>   ";
                }
            }
//            function findByCC($data0,$data1){
//                @$db = new mysqli('localhost:3506','root','Hzj336688','travel');
//                if (mysqli_connect_errno()){
//                    echo '<p>Error: Could not connect to database.<br/>
//                                 Please try again later.</p>';
//                    exit;
//                }
//                $result_image=mysqli_query($db,"SELECT * FROM `imagedetails` WHERE `CountryCodeISO`=`{$data0}` and `ContinentCode`=`{$data1}`");
//                while ($array_image=mysqli_fetch_assoc($result_image)){
//                    $imageID = $array_image["ImageID"];
//                    $path = $array_image["Path"];
//                    $title = $array_image["Title"];
//                    $Description = $array_image["Description"];
//
//                    echo "<li>
//              <a href=\"detail.php?id=$imageID\" class=\"img-responsive\">
//                <img src=\"images/square-medium/$path\" alt=\"$title\">
//                <div class=\"caption\">
//                  <div class=\"blur\"></div>
//                  <div class=\"caption-text\">
//                    <p>$Description</p>
//                  </div>
//                </div>
//              </a>
//            </li>   ";
//                }
//            }

            $db->close();
            ?>
       </ul>       

      
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>