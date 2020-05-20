<?php
/*
Plugin Name: profile photo upload feature
Plugin URI:  github.com 
Description: xx
Version:     1
Author:      Mark Daniel Louwe, Danica Niña Louwe
Author URI:  https://louwewebdesignservices.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

//test
//test2

//make shortcode 

add_shortcode( 'profile_pic_louwe', 'profile_pic_louwe_f' );
add_action('wp_enqueue_scripts', 'enqueue_styles'); 

function enqueue_styles(){
    wp_register_style( 'foo-styles',  plugin_dir_url( __FILE__ ) . 'css/styles.css?'. rand(0, 1000) );
    wp_enqueue_style( 'foo-styles' );

    
	wp_enqueue_script( 'dir-list', plugin_dir_url(__FILE__) . 'js/plugin.js', array( 'jquery' ), date("h:i:s"), true );
	wp_localize_script( 'dir-list', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	

}

function profile_pic_louwe_f( $atts ) {
    //return "hellooo";

    //find profile pic na same og id sa user like pp-id
    ?>
    <form class="form_louwe"action="" method="post" enctype="multipart/form-data" id="form_louwe_id">
    <div id="foo2">	
            <div id="foo1">
                    <img class="photo_louwe" onerror="console.log('nierror'); this.src='<?php echo plugin_dir_url(__FILE__) .'user-photos/default.jpg';?>'"    src="<?php echo plugin_dir_url(__FILE__) .'user-photos/profile-pic-'. get_current_user_id() . '.jpg?'.rand(1, 1000); ?>" width="200" height="200"></p>
                        
                    <label for="fileToUpload" id="label1">
                        <img src="<?php echo plugin_dir_url(__FILE__) .'user-photos/technology.png';?>" style="width: 30px"/>
                    </label>

            </div><!--end of foo1-->

            
            <div>
                <input style="display:none"class="choosebox_louwe" type="file" name="fileToUpload" id="fileToUpload">
            </div>
            
            
            <div>
                <input style="display:none" class="input_louwe" type="submit" value="Upload Photo" name="submit">
            </div>
        </div>	
    </form>

    <?php

    $target_dir = plugin_dir_path( __FILE__ ) . 'user-photos/';
    //echo "target_dir: ".$target_dir."<br>";

    //final file name part bef user id
    //temp name ni
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $uploadOk = 1;

    
		
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		//echo "file type:". $imageFileType."<br>";
		//finalizing file name chuchu
	$target_file = $target_dir . 'profile-pic-'. get_current_user_id().'.'.$imageFileType;
        //echo "user_id: ".get_current_user_id()."<br>";
    
    if(isset($_POST["submit"])) {

        // Check if file already exists
			if (file_exists($target_file)) {
				
				// del file
				unlink($target_file);

            }
            

            // Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "jpeg") {
				echo "<p>Sorry, only JPEG/JPG files are allowed.</p>";
				$uploadOk = 0;
            }
            
            // Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "<p>upload failed, $uploadOK == 0</p>";
			// if everything is ok, try to upload file
			} else {

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					//done nothing 
					/*
					q
					x get_current_user_id()
					x iset ang has_profile_{{id}} nga chongkang
					x
					x 

					*/
					//update_option('has_pp_'.get_current_user_id(),'yes');
					
				} else {
					//update_option('has_pp_'.get_current_user_id(),'no');
                    echo "<p>move_uploaded_file() error: </p>";
                    echo $_FILES["fileToUpload"]["error"];
				}

            }// close if uploadok   

    }// close isset..

}// close profile photo louwe fun 


