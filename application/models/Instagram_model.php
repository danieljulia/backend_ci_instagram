<?php




class Instagram_model extends CI_Model {
		var $instagram_key;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->config->load('instagram');
                $this->instagram_key=$this->config->item('INSTAGRAM_KEY');
        }

        public function get_user_id($username)
        {
        
		    $requser="https://api.instagram.com/v1/users/search?q=".$username."&client_id=". $this->instagram_key;
		    $res=file_get_contents($requser);

		    $user_data=json_decode($res);
		    $user_id=0;
		   

		    foreach($user_data->data as $user){
		        if( $user->username==$username){
		            $user_id=$user->id;
		           	return $user_id;
		            break;
		        }
		    }
		    if($user_id==0){
		        return false;
		    }
        }

        public function get_photos($user_id,$num=5)
        {
         
		    //and now get the pictures
		    $uri="https://api.instagram.com/v1/users/".$user_id."/media/recent?count=".$num."&client_id=". $this->instagram_key;
		    $res=file_get_contents($uri);
		    $content=json_decode($res);
		    return $content->data;
    
        }


        public function get_photos_by_tag($tag,$num=5)
        {
         
		    //and now get the pictures
		    $uri="https://api.instagram.com/v1/tags/".$tag."/media/recent?count=".$num."&client_id=".INSTAGRAM_KEY;
		    $res=file_get_contents($uri);
		    $content=json_decode($res);
		    return $content->data;
    
        }

    

}