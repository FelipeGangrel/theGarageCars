<?

	$profile_id = 'novathumb';
	$postId = $_GET['c'];

/***********************************************************
	0 - Remove The Temp image if it exists
***********************************************************/
if (!isset($_POST['x']) && !isset($_FILES['image']['name']) ){
	//Delete users temp image
		$temppath = 'images/'.$profile_id.'_temp.jpeg';
		if (file_exists ($temppath)){ @unlink($temppath); }
} 


if(isset($_FILES['image']['name'])){	
	/***********************************************************
		1 - Upload Original Image To Server
	***********************************************************/	
		//Get Name | Size | Temp Location		    
			$ImageName = $_FILES['image']['name'];
			$ImageSize = $_FILES['image']['size'];
			$ImageTempName = $_FILES['image']['tmp_name'];
		//Get File Ext   
			$ImageType = @explode('/', $_FILES['image']['type']);
			$type = $ImageType[1]; //file type	
		//Set Upload directory    
			$uploaddir = '../../../posts/';

			//$uploaddir = SITE.'upload/img/thumbs';
		//Set File name	
			$file_temp_name = $profile_id.'_original.'.md5(time()).'n'.$type; //the temp file name
			$fullpath = "$uploaddir/".$file_temp_name; // the temp file path
			$file_name = $profile_id.'_temp.jpeg'; //$profile_id.'_temp.'.$type; // for the final resized image
			$fullpath_2 = "$uploaddir/".$file_name; //for the final resized image
		//Move the file to correct location
			$move = move_uploaded_file($ImageTempName ,$fullpath) ; 
			chmod($fullpath, 0777);  
   		//Check for valid uplaod
			if (!$move) { 
				die ('File didnt upload');
			} else { 
				$imgSrc= '../../../posts/'.$file_name.'?x='.rand(); // the image to display in crop area
				$msg= "Upload Complete!";  	//message to page
				$src = $file_name;	 		//the file name to post from cropping form to the resize
			} 

	/***********************************************************
		2  - Resize The Image To Fit In Cropping Area
	***********************************************************/		
			//get the uploaded image size	
				clearstatcache();				
				$original_size = getimagesize($fullpath);
				$original_width = $original_size[0];
				$original_height = $original_size[1];	
			// Specify The new size
				$main_width = 800; // set the width of the image
				$main_height = $original_height / ($original_width / $main_width);	// this sets the height in ratio									
			//create new image using correct php func			
				if($_FILES["image"]["type"] == "image/gif"){
					$src2 = imagecreatefromgif($fullpath);
				}elseif($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/pjpeg"){
					$src2 = imagecreatefromjpeg($fullpath);
				}elseif($_FILES["image"]["type"] == "image/png"){ 
					$src2 = imagecreatefrompng($fullpath);
				}else{ 
					$msg .= "There was an error uploading the file. Please upload a .jpg, .gif or .png file. <br />";
				}
			//create the new resized image
				$main = imagecreatetruecolor($main_width,$main_height);
				imagecopyresampled($main,$src2,0, 0, 0, 0,$main_width,$main_height,$original_width,$original_height);
			//upload new version
				$main_temp = $fullpath_2;
				imagejpeg($main, $main_temp, 90);
				chmod($main_temp,0777);
			//free up memory
				@imagedestroy($src2);
				@imagedestroy($main);
				@imagedestroy($fullpath);
				@unlink($fullpath); // delete the original upload
		
}//ADD Image 	

/***********************************************************
	3- Cropping & Converting The Image To Jpg
***********************************************************/
	if ($_POST['x']){
		
		//the file type posted
			$type = $_POST['type'];	
		//the image src
			$src = '../../../posts/'.$_POST['src'];	
			$finalname = md5(time());	
		
		if($type == 'jpg' || $type == 'jpeg' || $type == 'JPG' || $type == 'JPEG'){	
		
			//the target dimensions 150x150
				$targ_w = $targ_h = 960;
			//quality of the output
				$jpeg_quality = 90;
			//create a cropped copy of the image

				$img_r = imagecreatefromjpeg($src);
				$dst_r = imagecreatetruecolor( $targ_w, $targ_h );
				imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
				$targ_w,$targ_h,$_POST['w'],$_POST['h']);
			//save the new cropped version
				imagejpeg($dst_r, "../../../posts/".$finalname.".jpg", 90); 	
				 		
		}else if($type == 'png' || $type == 'PNG'){
			
			//the target dimensions 150x150
				$targ_w = $targ_h = 960;
			//quality of the output
				$jpeg_quality = 90;
			//create a cropped copy of the image
				$img_r = imagecreatefrompng($src);
				$dst_r = imagecreatetruecolor( $targ_w, $targ_h );		
				imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
				$targ_w,$targ_h,$_POST['w'],$_POST['h']);
			//save the new cropped version
				imagejpeg($dst_r, "../../../posts/".$finalname.".jpg", 90); 	
							
		}else if($type == 'gif' || $type == 'GIF'){
			
			//the target dimensions 150x150
				$targ_w = $targ_h = 960;
			//quality of the output
				$jpeg_quality = 90;
			//create a cropped copy of the image
				$img_r = imagecreatefromgif($src);
				$dst_r = imagecreatetruecolor( $targ_w, $targ_h );		
				imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
				$targ_w,$targ_h,$_POST['w'],$_POST['h']);
			//save the new cropped version
				imagejpeg($dst_r, "../../../posts/".$finalname.".jpg", 90); 	
			
		}
			//free up memory
				imagedestroy($img_r); // free up memory
				imagedestroy($dst_r); //free up memory
				@ unlink($src); // delete the original upload					
			
			//return cropped image to page	
			$displayname ="../../../posts/".$finalname.".jpg";

			$arquivo = $finalname.".jpg";

			$sql = mysql_query("SELECT POST_IMAGEM FROM ".DB_PREFIX."postagem WHERE POST_ID = $postId ");
			$imagemAtual = mysql_fetch_array($sql);
			$imagemAtual = $imagemAtual['POST_IMAGEM'];
			if($imagemAtual != NULL){
				unlink("../../../posts/".$imagemAtual);
			}

			if($postId){
				mysql_query("UPDATE ".DB_PREFIX."postagem SET POST_IMAGEM = '$arquivo' WHERE POST_ID = $postId");
			}else{
				mysql_query("INSERT INTO ".DB_PREFIX."postagem (POST_IMAGEM) VALUES ('$arquivo')");
				$postId = mysql_insert_id();
			}

			header("location: ".SITE."dashboard/pages/posts/post.php?c=$postId");
			exit;									
	}
?>