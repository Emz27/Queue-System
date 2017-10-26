<?php




$id = $_POST['center'];
include "../config.php";

// $dirPath = "../server/php/files/center/".$id."/";
// function deleteDir($dirPath){
//
// if (! is_dir($dirPath)) {
// 		//throw new InvalidArgumentException("$dirPath must be a directory");
// }
// if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
// 		$dirPath .= '/';
// }
// $files = glob($dirPath . '*', GLOB_MARK);
// foreach ($files as $file) {
// 		if (is_dir($file)) {
// 				self::deleteDir($file);
// 		} else {
// 				unlink($file);
// 		}
// }
// rmdir($dirPath);
//
// }
// deleteDir($dirPath);

mysqli_query($link,"delete from files where center_id=$id");
mysqli_query($link,"delete from center where id=$id");
if(mysqli_error($link)){
	$result['error']=mysqli_error($link);
	$result['result']=0;
}else{
	$result['error']='';
	$result['result']=1;
}
echo json_encode($result);

?>
