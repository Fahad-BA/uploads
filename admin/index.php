<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
<html lang="ar">
<head itemscope="" itemtype="http://schema.org/WebSite">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
    
            
        body {
            color: black;
            width: 100%;
            font-weight: bolder;
        }
        
        a, a:hover { 
            color:black; 
            text-decoration:none;
        }
        
        
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        
        .admin{
            color:white;
            text-shadow: 1px 1px #000000;
        }
        
        .pull-left{
            color:black;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
    <body style="background-color:#cfcfc4;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Dashboard</h2>
                    </div>
                    <?php

                    include 'sessions.php';
                    echo '<a href="logout.php" class="btn btn-danger">Sign Out from ';
                    echo htmlspecialchars($_SESSION["username"]);
                    echo "</a>";
                    echo "<br><br>";
                    
                    $dir = "../files";
chdir($dir);
array_multisort(array_map('filemtime', ($files = glob("*.*"))), SORT_DESC, $files);
foreach($files as $filename){
    if($filename == "index.php") { continue; }
	echo "<li>". "<a target=\"_blank\" href=\"../files/" . $filename . "\">" . $filename . "</a>"."</li>"; 
    echo "<a href='delete.php?ID=". $filename ."' title='Delete Record' data-toggle='tooltip'>DELETE</span></a><br>";
}


?>
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
