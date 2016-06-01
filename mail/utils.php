<?php
	class FileUtils
	{
		public function fileExtensionIsValid($fileName)
		{
			$allowed='doc,docx,pdf';  //which file types are allowed seperated by comma

		    $extension_allowed=  explode(',', $allowed);
		    $file_extension=  pathinfo($fileName, PATHINFO_EXTENSION);
		    
		    if(array_search($file_extension, $extension_allowed))
		    {
		        return true;
		    }
		    else
		    {
		        return false;
		    }
		}
	}
?>