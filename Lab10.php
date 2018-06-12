<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here

$hostname="localhost";
$dbname="travel";
$username="root";
$pass="";

try{
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname","$username","$pass");
    $query1 ='select * from continents';
    $res1 = $pdo->prepare($query1);
    $res1->execute();

    $query2 ='select * from countries';
    $res2 = $pdo->prepare($query2);
    $res2->execute();

//    if ($_GET){
//        if ($_GET['continents']!=0&&$_GET['countries']==0){
//            getContinents();
//        }
//    }

}catch(PDOException $e)
{
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chapter 14</title>

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
            <form action="Lab10.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control">
                <option value="0" >Select Continent</option>
                <?php
                //Fill this place

//                //****** Hint ******
//                //display the list of continents

                $query ='select * from continents';
                $res = $pdo->prepare($query);
                $res->execute();

                while ($result =$res->fetch(PDO::FETCH_ASSOC)){
                echo '<option value=' . $result['ContinentCode'] . '>' . $result['ContinentName'] . '</option>';
                }
                ?>
              </select>     
              
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
                  <?php
                //Fill this place
                //****** Hint ******
                /* display list of countries */
                $query ='select * from countries';
                $res = $pdo->prepare($query);
                $res->execute();

                while ($result =$res->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value=' . $result['ISO'] . '>' . $result['CountryName'] . '</option>';
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


            function getCountries(){
                $hostname="localhost";
                $dbname="travel";
                $username="root";
                $pass="";
                $pdo = new PDO("mysql:host=$hostname;dbname=$dbname","$username","$pass");

                $query1 ='select * from countries';
                $res1 = $pdo->prepare($query1);
                $res1->execute();

                while ($result =$res1->fetch(PDO::FETCH_ASSOC)){
                    if ($_GET['countries']==$result['ISO'])
                        echo '<li><a "href=detail.php?id="'.$result['ImageID'].'" class="img-responsive"><img src="images/square-medium/'.$result['Path'].'" alt="'.$result['Title'].'">'.'<div class="caption"><div class="blur"></div><div class="caption-text"><p>'.$result['Title'].'</p></div></div></a></li>';
                }
            }

            function getContinents(){
                $hostname="localhost";
                $dbname="travel";
                $username="root";
                $pass="";
                $pdo = new PDO("mysql:host=$hostname;dbname=$dbname","$username","$pass");

                $query1 ='select * from continents';
                $res1 = $pdo->prepare($query1);
                $res1->execute();

                while ($result =$res1->fetch(PDO::FETCH_ASSOC)){
                    if ($_GET['continents']==$result['ContinentCode']){
                        echo '<li><a "href=detail.php?id="'.$result['ImageID'].'" class="img-responsive"><img src="images/square-medium/'.$result['Path'].'" alt="'.$result['Title'].'">'.'<div class="caption"><div class="blur"></div><div class="caption-text"><p>'.$result['Title'].'</p></div></div></a></li>';
                    }
                }
            }

            function getSearch(){
                $hostname="localhost";
                $dbname="travel";
                $username="root";
                $pass="";
                $pdo = new PDO("mysql:host=$hostname;dbname=$dbname","$username","$pass");

                $query1 ='select * from continents';
                $res1 = $pdo->prepare($query1);
                $res1->execute();


                $query2 ='select * from countries';
                $res2 = $pdo->prepare($query2);
                $res2->execute();

                while ($result =$res1->fetch(PDO::FETCH_ASSOC)){
                    if ($_GET['title']==$result['ContinentCode']){
                        echo '<li><a "href=detail.php?id="'.$result['ImageID'].'" class="img-responsive"><img src="images/square-medium/'.$result['Path'].'" alt="'.$result['Title'].'">'.'<div class="caption"><div class="blur"></div><div class="caption-text"><p>'.$result['Title'].'</p></div></div></a></li>';
                    }
                }

                while ($result =$res2->fetch(PDO::FETCH_ASSOC)){
                    if ($_GET['countries']==$result['ISO'])
                        echo '<li><a "href=detail.php?id="'.$result['ImageID'].'" class="img-responsive"><img src="images/square-medium/'.$result['Path'].'" alt="'.$result['Title'].'">'.'<div class="caption"><div class="blur"></div><div class="caption-text"><p>'.$result['Title'].'</p></div></div></a></li>';
                }


            }

            $query1 ='select * from ImageDetails';
            $res1 = $pdo->prepare($query1);
            $res1->execute();

            function check(){
                if (count($_GET)==0){
                    return true;
                }
                else
                    return false;
            };
                while ($result =$res1->fetch(PDO::FETCH_ASSOC)){
                    if (!check()){
                        echo '<li><a href="detail.php?id='.$result['ImageID'].'" class="img-responsive"><img src="images/square-medium/'.$result['Path'].'" alt="'.$result['Title'].'">'.'<div class="caption"><div class="blur"></div><div class="caption-text"><p>'.$result['Title'].'</p></div></div></a></li>';
                    }else {
                        $continent=$_GET['continent'];
                        $country=$_GET['country'];
                        $title=$_GET['title'];
                        if ($continent!=0 && $country==0 && $title==""){
                            getContinents();
                        } else if ($continent==0 && $country!=0 && $title==""){
                            getCountries();
                        }else if ($title != 0){
                            getSearch();
                        }
                    }
                }
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