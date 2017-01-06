<?php
    $keyword = $_POST["d"];
	$handle = file_get_contents("findimage.txt");
	$y=Explode("\r\n",$handle);
    foreach($y as $r){  
	 $imagedisp = Explode(';',$r);
	 $keymatch = $imagedisp[0];
	 $imagenumber = $imagedisp[1];
	 $space = Explode(" ",$keymatch);
	 $oneword = Explode(" ",$keyword);
	 $catch = 0;
	 foreach($oneword as $term) {
	 	foreach($space as $record){
		// $oneword = Explode(" ",$keyword)	
		     $check = stripos($record, $term);
			 if($check !== false && $catch != $imagenumber) {
				 $img = "<img src ='tn_$imagenumber.jpg'></img>"."<br><br>"; // for the thumbnail(as it has been renamed as 'imagename-1'
		         $link = "<a href = '$imagenumber.jpg'>$img</a>"; // displaying the thumbnail and creating it as a link to the original image
				 $catch = $imagenumber;
	             $concat.=$link; //collects all the results that satisfy the condition
			 }
			 else if($check === false) {
				 continue;
		 	 }
		 }
		 
	 }
}
	
	 echo $concat;
?>