<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
<br><br>
<div class="container-fluid well span6">
     <div class="row-fluid">
        <div class="span2" >
              <img src="" class="img-circle">
        </div>
        
        <div class="span8">
          <?php            
               
                    
                       echo '<h3>'. $record->username . '</h3>';
                       echo '<h6>'. $record->name . '</h6>';
                       echo '<h6>'. $record->email . '</h6>';
                       echo '<h6>'. $record->phone_number . '</h6>';
                       echo '<h6>'. $record->description . '</h6>';
                       
                   
               
    ?>
        </div>
        
        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action 
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="icon-wrench"></span> Modify</a></li>
                    <li><a href="#"><span class="icon-trash"></span> Delete</a></li>
                </ul>
            </div>
        </div>
</div>
</div>
</body>
</html>