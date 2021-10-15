<?php
namespace App\Http\Controllers\Core;
use App\Http\Controllers\Core\LogManager;
use Storage;
class FileManager  
{
  private $LOG ;
    public  $app_path;
    public  $public_path;
    public  $resource_path;
    public  $routers_path;

    public  $Local_app_path;
    public  $Local_public_path;
    public  $Local_resource_path;
    public  $Local_routers_path;

    public function __construct()
    {
        $this->LOG = new LogManager() ;

        $this->Local_app_path = app_path(); 
        $this->Local_public_path = public_path(); 
        $this->Local_resource_path = resource_path();
        $this->Local_routers_path = base_path() . '\routes'  ;  


        // ================= set global destination =========================================
        $json = Storage::disk('local')->get('config.json');
        $json = json_decode($json, true);
        $this->app_path =  $json['base_path'] .'\\'. $json['project_path'] . '\app'  ; 
        $this->public_path =  $json['base_path'] .'\\'. $json['project_path'] . '\public'  ; 
        $this->resource_path = $json['base_path'] .'\\'. $json['project_path'] . '\resources'  ; 
        $this->routers_path  = $json['base_path'] .'\\'. $json['project_path'] . '\routes'  ; 
       // ================= End set global destination =========================================

      }



      function file_create($sentarr,$reparr)
      {
 
    
        //     $this->LOG->clearlog() ;
      
            //  $this->LOG->printlog('app_path-> '. $this->app_path) ;
            //  $this->LOG->printlog('public_path-> '. $this->public_path) ;
            // $this->LOG->printlog('resource_path-> '. $this->resource_path) ;
            //  $this->LOG->printlog('routers_path-> ' . $this->routers_path) ;
           //   $this->LOG->printlog($sentarr['file_ext']) ;

        $page_name = $sentarr['page_name'];
        $prefix =  $sentarr['prefix'];
        $pure_name =  $sentarr['pure_name'];
        $suffix =  $sentarr['suffix'];
        $dir_type =  $sentarr['dir_type'];
        $parent_dir =  $sentarr['parent_dir'];
        $content =  $sentarr['content'];
        $file_ext =  $sentarr['file_ext'];
        $overwrite =  $sentarr['overwrite'];
        $content_type =  $sentarr['content_type'];
        $template_path =  $sentarr['template_path'];
        $template_name =  $sentarr['template_name'];
        $template_ext =  $sentarr['template_ext'];
        //-----------------------------------------
        $dir_path = $this->get_file_path($dir_type) ; 
        $file_path =   $prefix . $pure_name . $suffix . $file_ext  ;
        //========================================== 

       $full_template_path  =   $template_path .  $template_name .  $template_ext ; 
        //  $this->LOG->printlog($file_path . '->' . $content_type . '   ->' . $template_path ) ;

        $file_content = '' ;
        switch($content_type)
        {
            case 'template' :
                $file_content = $this->get_template_content($full_template_path,$reparr)  ;
            break;
            case 'content' :
                $file_content = $content ;
            break;
        }

      ##  $this->LOG->printlog($content_type) ;

                  // start creating the file 
             $new_filepath = $dir_path . $page_name  . '/'. $parent_dir . '/'.   $file_path ; 
            $this->LOG->printlog($new_filepath) ;
             return $this->i_createfile($new_filepath ,$file_content,$overwrite) ; 
        //========================================== 
      //  $this->LOG->printlog($page_name) ; 
      }


      function file_append($sentarr,$reparr)
      {
        $page_name = $sentarr['page_name'];
        $prefix =  $sentarr['prefix'];
        $pure_name =  $sentarr['pure_name'];
        $suffix =  $sentarr['suffix'];
        $tier_type =  $sentarr['tier_type'];
        $parent_dir =  $sentarr['parent_dir'];
        $content =  $sentarr['content'];      
        $file_ext =  $sentarr['file_ext'];
        $overwrite =  $sentarr['overwrite'];
        $content_type =  $sentarr['content_type'];
        $template_path =  $sentarr['template_path'];
        //-----------------------------------------
        $dir_path = $this->get_file_path($tier_type) ; 
        $file_path = $prefix . $pure_name  . $file_ext  ;
        //========================================== 
        $file_content = '' ;
        switch($content_type)
        {
            case 'template' :
                $file_content = $this->get_template_content($template_path,$reparr)  ;
            break;
            case 'content' :
                $file_content = $content ;
            break;
        }
 
        $new_filepath = $dir_path . $page_name  . '/'. $parent_dir . '/'.   $file_path ; 
       // $this->LOG->printlog($file_content) ; 
        return $this->i_file_append($new_filepath ,$file_content,$overwrite) ; 

      }


     
      ###########################################################################
      ###########################################################################
      public function i_createfile($filepath,$content,$overwrite)
      {
 
        switch($overwrite)
        {
            case true: // just create it any way 
                    touch($filepath);
                    chmod($filepath, 0777); // giving permission to file
                    $fp = fopen($filepath,"wb");
                    fwrite($fp,$content);
                    fclose($fp);
                  
                    return 'file has been created ! ' ; 
            break;
            case false: // check if not exist create it else dont create it 
                if(!file_exists($filepath)) 
                {
                    touch($filepath);
                    chmod($filepath, 0777); // giving permission to file
                    $fp = fopen($filepath,"wb");
                    fwrite($fp,$content);
                    fclose($fp);
                    return 'File has been created ! ' ; 
                }
                else
                {
                    return 'File is existed ! ' ;
                }
            break;
        }
      }

      function i_file_append($filepath,$content,$overwrite)
      {
       // $this->LOG->printlog($filepath) ; 
            $file = fopen($filepath, 'a');
            fwrite($file,  "\n" . $content );
            fclose($file);
          return 'done' ; 
      }
  ###########################################################################
      ###########################################################################
     
      function get_template_content($templatepath,$rep_arr)
      {
          // All templates should be in app/console/Commands  
          $temp_file_path = $this->Local_app_path  . '/Http/Controllers/Templates/' . $templatepath ;
          $content  = '' ;

        ##  $this->LOG->printlog($temp_file_path) ;  
         // return $temp_file_path ; 
          foreach(file($temp_file_path) as $line) {
              // loop with $line for each line of yourfile.txt
              $content .= $line ;
          }
          // replace with reparr 
           foreach($rep_arr as $key=>$value) {
            $originalstr = $key ; 
            $newstr = $value ; 
          //   $this->LOG->printlog($originalstr . '=>' . $newstr) ; 
            $content = str_replace($originalstr,$newstr,$content); // replace with rep_arr  
        } 
        return $content ; 
      }

        function get_file_path($tiertype)
        {
            switch($tiertype)
            {

                case 'controller' :
                    $dirpath =$this->app_path . '/Http/Controllers/Pages/'  ;
                break;

                case 'core' :
                    $dirpath =$this->app_path . '/Http/Controllers/Pages/'  ;
                break;
                case 'public' :
                    $dirpath = $this->public_path  . '/Pages' . '/';
                break;
                case 'view' :
                    $dirpath =$this->resource_path  . '/views/Pages' . '/';
                break;
                case 'router' :
                    $dirpath = $this->routers_path  . '/';
                break;

            
            }
            return $dirpath ; 
        }

          ###########################################################################
      ###########################################################################
   
   

 
  

   ###########################################################################
      ###########################################################################

        public function append_string_to_file($filepath,$content)
        {
            $old_content =  file_get_contents($filepath); 
        
                // first we replace the content if existed  with empty string
                $new_content =  str_replace($content,'',$old_content); 
                file_put_contents($filepath,  $new_content);
              
                // second we append the content to the file
                $new_content .= "\n" . $content;
                file_put_contents($filepath, $new_content);
        }

        public function replace_string_in_file($filepath,$replacer_string,$new_string)
        {
            $old_content =  file_get_contents($filepath); 
        
            try
               {
                //   we replace the content if existed  
                   $new_content =  str_replace($replacer_string,$new_string,$old_content); 
                 
                   file_put_contents($filepath, $new_content);
                   //$this->LOG->printlog('fff') ; 
                   return 'saved' ;
               }
               catch(Exception $e)
               {
              //  $this->LOG->printlog(  'Exception ') ; 
               }
               catch (\Throwable $ex) {
             //   $this->LOG->printlog(  'Throwable ') ; 
            }

               
        }


        public function delete_string_in_file($filepath,$content)
        {
         //   $this->LOG->printlog(  ' $filepaht =>' . $filepath) ; 
           // $this->LOG->printlog(  ' $content =>' . $content) ; 
            $old_content =  file_get_contents($filepath); 
                //   we replace the content if existed  with empty string
               try
               {
                $new_content =  str_replace($content,'',$old_content); 
                file_put_contents($filepath,  $new_content);
               }
               catch(Exception $e)
               {
              //  $this->LOG->printlog(  'Exception ') ; 
               }
               catch (\Throwable $ex) {
              //  $this->LOG->printlog(  'Throwable ') ; 
            }
               
        }




 
         
   ###########################################################################
      ###########################################################################
          
           

    

}// End of class
 

 