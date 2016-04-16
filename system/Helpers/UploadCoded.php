<?php

namespace Helpers;

class UploadCoded {
	
	function upload($element){
		$message = '';
		$reName = '';
		$valid_file = true;
		echo $element;
		if($_FILES[$element]['name'])
		{
			//if no errors...
			if(!$_FILES[$element]['error'])
			{
				//now is the time to modify the future file name and validate the file
				$reName = strtolower($_FILES[$element]['tmp_name']); //rename file
				if($_FILES[$element]['size'] > (1024000)) //can't be larger than 1 MB
				{
					$valid_file = false;
					$message = 'Oops!  Your file\'s size is to large.';
				}
				
				//if the file has passed the test
				if($valid_file)
				{
					//move it to where we want it to be
					move_uploaded_file($_FILES[$element]['tmp_name'], 'uploads/'.$reName);
					$message = 'Congratulations!  Your file was accepted.';
				}
			}
			//if there is an error...
			else
			{
				//set that to be the returned message
				$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES[$element]['error'];
			}
		}
		return $message;
	}
}