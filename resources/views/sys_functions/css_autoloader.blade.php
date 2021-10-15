<?php               
         $version = '?' . date('y/m/d') . date('h:i:sa') ; 
    //     $version = '?' . '1' ; // disable this on debug mode 
       
        $project_public_path =  URL::to('/') ; 
   
     // get router name (shoud have a name in router/web)
     // echo  Route::currentRouteName();

     // get full reguested path in the url => http:localhost/project/public ...etc 
     // echo url()->current() ; 

     
      // get the requested page after public/???
     $current_page =  Request::path(); 
     list($current_page)=explode('/', $current_page);

   
     
        echo '<!--  #################### Auto Load  ###################  -->' ."\n" ;
    
 
      
     echo '<!--  Auto Load css links  -->' ."\n" ;
       if($current_page == '')
        {
         $current_page = 'home'  ;
        }
    
        include "../public/" .'pages/'. $current_page . '/links/css_links.php';

     echo '<!--  Auto Load Current Page CSS -->' ."\n" ;

     foreach (glob(public_path('pages/'.$current_page.'/css/*.css')) as $filename) 
     {
        
             $filename =   basename($filename)   ;
           
            ?>
            
            <link href="{{ url('/') }}/pages/{{$current_page}}/css/{{$filename}}{{$version}}" rel="stylesheet"/> 
            <?php
            // echo "\n"  ;
    } 


    foreach (glob(public_path('pages/'.$current_page.'/css/lib/*.css')) as $filename) 
    {
       
            $filename =   basename($filename)   ;
          
           ?>
           
           <link href="{{ url('/') }}/pages/{{$current_page}}/css/lib/{{$filename}}{{$version}}" rel="stylesheet"/> 
           <?php
           // echo "\n"  ;
   } 


    echo '<!--   Auto Load Shared css -->' ."\n" ;
    // this is for shared css 
 
    foreach (glob(public_path('pages/shared/css/*.css')) as $filename) 
    {
            $filename =   basename($filename)   ;
           ?>
             <link href="{{ url('/') }}/pages/shared/css/{{$filename}}{{$version}}" rel="stylesheet"/> 
        
           <?php
           // echo "\n"  ;
   } 
   
   echo '<!--   End of shard  CSS   -->' ."\n" ;

    echo '<!--   End of Auto Load CSS   -->' ."\n" ;
    echo '<!--  ####################  End of Auto Load #####################     -->' ."\n" ;





?>