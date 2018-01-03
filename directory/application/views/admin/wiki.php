<?php 
error_reporting(E_ALL); ini_set('display_errors', 1);
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
  include('db.php');
   if(!(isset($_SESSION['id'])))
   {
      header("location:index.php");
   }

   if(isset($_POST['add_category']))
     {
        $title=$_POST['name']; 
        $category=$_POST['sub_category']; 

        $jsonData = json_decode(file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles='.$title.'&prop=images&format=json'));
    //  echo'<pre>';

             $jsonObj = $jsonData->query->pages;
            foreach ($jsonObj as $key) {
                
                for ($i=0; $i < count($key->images); $i++) { 

                     $titi=urlencode($key->images[$i]->title);

                      $jsonData1 = json_decode(file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles='.$titi.'&prop=imageinfo&iiprop=url&format=json'));
                       $jsonObj2 = $jsonData1->query->pages;
                       //print_r($jsonObj2);
                       foreach ($jsonObj2 as $key1) {
                             $url=$key1->imageinfo[0]->url;
                             $query = mysqli_query($con,"INSERT INTO `image`(`image`,`sub_cat_id`,`status`) VALUES ('$url','$category','wiki')");
                       }
                   
                }

                

            }

        if($query)
                {
                   header("location:image.php");
                }
                else
                {
                   echo "try latter";
                }


       }
 ?>