

<?php               
 
 $project_public_path =  URL::to('/') ; 
   
     // get router name (shoud have a name in router/web)
     // echo  Route::currentRouteName();

     // get full reguested path in the url => http:localhost/project/public ...etc 
     // echo url()->current() ; 

     
      // get the requested page after public/???
      echo Request::path(); 

 
 
   
   echo "
   <!-- Bootstrap CSS -->
   <link href='$project_public_path/bootstrap-4/css/bootstrap.min.css' rel='stylesheet' /> 
    ";
          
    



   
                 








?>