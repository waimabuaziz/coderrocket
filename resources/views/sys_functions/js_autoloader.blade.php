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


 //**------------------------------- */
 echo "\n"  ;
 echo '<!--    Auto  Page JS/lib   --> ' ."\n";
  foreach (glob(public_path('pages/'.$current_page.'/js/lib/*.js')) as $filename)
  {

          $filename =   basename($filename)   ;
         ?>
         <script src="{{ url('/') }}/pages/{{$current_page}}/js/lib/{{$filename}}{{$version}}"> </script>
         <?php
         // echo "\n"  ;
 }
//**------------------------------- */


 //**------------------------------- */
 echo "\n"  ;
 echo '<!--    Auto  Page JS/ajax   --> ' ."\n";
  foreach (glob(public_path('pages/'.$current_page.'/js/ajax/*.js')) as $filename)
  {

          $filename =   basename($filename)   ;
         ?>
         <script src="{{ url('/') }}/pages/{{$current_page}}/js/ajax/{{$filename}}{{$version}}"> </script>
         <?php
         // echo "\n"  ;
 }
//**------------------------------- */
 //**------------------------------- */
 echo "\n"  ;
 echo '<!--    Auto  Page JS/renders   --> ' ."\n";
  foreach (glob(public_path('pages/'.$current_page.'/js/renders/*.js')) as $filename)
  {

          $filename =   basename($filename)   ;
         ?>
         <script src="{{ url('/') }}/pages/{{$current_page}}/js/renders/{{$filename}}{{$version}}"> </script>
         <?php
         // echo "\n"  ;
 }
//**------------------------------- */





 //**------------------------------- */
 echo "\n"  ;
 echo '<!--    Auto  Page JS/charts   --> ' ."\n";
  foreach (glob(public_path('pages/'.$current_page.'/js/charts/*.js')) as $filename)
  {

          $filename =   basename($filename)   ;
         ?>
         <script src="{{ url('/') }}/pages/{{$current_page}}/js/charts/{{$filename}}{{$version}}"> </script>
         <?php
         // echo "\n"  ;
 }
//**------------------------------- */
 //**------------------------------- */
 echo "\n"  ;
 echo '<!--    Auto  Page JS/data   --> ' ."\n";
  foreach (glob(public_path('pages/'.$current_page.'/js/data/*.js')) as $filename)
  {

          $filename =   basename($filename)   ;
         ?>
         <script src="{{ url('/') }}/pages/{{$current_page}}/js/data/{{$filename}}{{$version}}"> </script>
         <?php
         // echo "\n"  ;
 }
//**------------------------------- */




     //**------------------------------- */
     echo "\n"  ;
     echo '<!--    Auto  Page JS/core   --> ' ."\n";
      foreach (glob(public_path('pages/'.$current_page.'/js/core/*.js')) as $filename)
      {

              $filename =   basename($filename)   ;
             ?>
             <script src="{{ url('/') }}/pages/{{$current_page}}/js/core/{{$filename}}{{$version}}"> </script>
             <?php
             // echo "\n"  ;
     }
    //**------------------------------- */

//**------------------------------- */

    echo "\n"  ;
    echo '<!--    Auto Load Current Page JS   --> ' ."\n";

     foreach (glob(public_path('pages/'.$current_page.'/js/*.js')) as $filename)
     {

         $filename =   basename($filename)   ;
            ?>
            <script src="{{ url('/') }}/pages/{{$current_page}}/js/{{$filename}}{{$version}}"> </script>
            <?php
            // echo "\n"  ;
    }
//**------------------------------- */


 //**------------------------------- */
    echo "\n"  ;
    echo '<!--    Auto  Page JS/events   --> ' ."\n";
     foreach (glob(public_path('pages/'.$current_page.'/js/events/*.js')) as $filename)
     {

             $filename =   basename($filename)   ;
            ?>
            <script src="{{ url('/') }}/pages/{{$current_page}}/js/events/{{$filename}}{{$version}}"> </script>
            <?php
            // echo "\n"  ;
    }
 //**------------------------------- */

 //**------------------------------- */
 echo "\n"  ;
 echo '<!--    Auto  Page JS/functions   --> ' ."\n";
  foreach (glob(public_path('pages/'.$current_page.'/js/functions/*.js')) as $filename)
  {

          $filename =   basename($filename)   ;
         ?>
         <script src="{{ url('/') }}/pages/{{$current_page}}/js/functions/{{$filename}}{{$version}}"> </script>
         <?php
         // echo "\n"  ;
 }
//**------------------------------- */

 //**------------------------------- */
 echo "\n"  ;
 echo '<!--    Auto  Page JS/forms   --> ' ."\n";
  foreach (glob(public_path('pages/'.$current_page.'/js/forms/*.js')) as $filename)
  {

          $filename =   basename($filename)   ;
         ?>
         <script src="{{ url('/') }}/pages/{{$current_page}}/js/forms/{{$filename}}{{$version}}"> </script>
         <?php
         // echo "\n"  ;
 }
//**------------------------------- */
 //**------------------------------- */
 echo "\n"  ;
 echo '<!--    Auto  Page JS/modals   --> ' ."\n";
  foreach (glob(public_path('pages/'.$current_page.'/js/modals/*.js')) as $filename)
  {

          $filename =   basename($filename)   ;
         ?>
         <script src="{{ url('/') }}/pages/{{$current_page}}/js/modals/{{$filename}}{{$version}}"> </script>
         <?php
         // echo "\n"  ;
 }
//**------------------------------- */




    // this is shared js


    foreach (glob(public_path('pages/shared/js/*.js')) as $filename)
    {

            $filename =   basename($filename)   ;
           ?>

           <script src="{{ url('/') }}/pages/shared/js/{{$filename}}{{$version}}"> </script>

           <?php
           // echo "\n"  ;
   }


    echo '<!--   End of Auto Load JS   -->'."\n" ;


   $str = $_ENV['APP_URL']   ;

    if($current_page == '')
    {
      $current_page = 'home'  ;
    }

    echo '<!--  Auto Load js links  -->' ."\n" ;
    include   '../'  .'public/pages/'. $current_page . '/links/js_links.php' ;



    echo '<!--  ####################  End of Auto Load #####################     -->' ."\n" ;




?>
