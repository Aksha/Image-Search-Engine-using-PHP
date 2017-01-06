<?php
    $keyword = $_POST["e"]; // whatever text is found in the search box
	$handle = file_get_contents("findimage.txt"); // It reads the entire contents of the text file
	$y=Explode("\r\n",$handle); // it nows reads line by line as the explode operation takes place on carriage return line feed(EOL and the enter key pressd)
    foreach($y as $r) { // The commands that follow are applied for each line.     
		 $imagedisp = Explode(';',$r); // In every single line, when you find a 'semicolon' , split it
		 $keymatch = $imagedisp[0];  // the first portion of the line before the semicolon is read into this variable
		 $imagenumber = $imagedisp[1]; // the portion of the line after the semicolon is read into this variable
		 $findimage = stripos($keymatch,$keyword); //The stripos() function returns the position of the first occurrence of a string inside another string.
		 $space = Explode(" ",$keymatch);
		 $oneword = Explode(" ",$keyword);
		 $flag = 1;
		 $catch = 0;
		 foreach($oneword as $term) {
			foreach($space as $record){
				 $check = stripos($record, $term);
					if($check === false) {
						//echo "here"."<br>";
						$flag = 0;
						continue;
						}
					else if($check !== false) { 	//If the string is not found, this function returns FALSE.   
						//echo "first true tab";
						$flag = 1;		
						break;
					}	
			}
				if($check !== false) {
					//echo "second true tab"."<br>";
					continue;
				}
				/*else {
					echo "Well, I am exiting";
					exit;
				}*/
		 }
		 		//echo "before the last check";
				if($flag === 1 && $catch != $imagenumber) {
					$img = "<img src ='tn_$imagenumber.jpg'></img>"."<br><br>"; // for the thumbnail(as it has been renamed as 'imagename-1'
					$link = "<a href = '$imagenumber.jpg'>$img</a>"; // displaying the thumbnail and creating it as a link to the original image
					//$prev = $term;
					$catch = $imagenumber;
					$concat.=$link; //collects all the results that satisfy the condition
				}
	}
	echo $concat;
?>