<html>
<head>
<style>
	
	table { width:100%; table-layout: fixed; }
	
	table:tr
	{

	
			//margin-top:10%;
		
		
	}
	td{ 
	     width:100px;
	     padding:20px;
		 word-break:break-all;
         /*white-space: nowrap; 
         overflow: hidden;
         text-overflow: ellipses;		 
		*/}
		td:hover
		{
			
		}
	
	.d { opacity:0.5; }
</style>
<title>Display</title>
</head>
<body>

	   <?php
			$db=mysqli_connect("localhost","root","","files");
			$displayQuery="select * from documents where  ORDER by ID desc";
			$doc=mysqli_query($db,$displayQuery);
			$i=1;
			echo"<table><tr>";
			while($row=mysqli_fetch_array($doc))
			{
				
			  $filename=$row['FileName'];
			   $fileExt=explode('.',$filename);	
			   $fileActualExt=strtolower(end($fileExt));	
              			   
			  if($fileActualExt=='doc' || $fileActualExt=='docx')
			 {
					
					echo"<td><img src='doc.png' height='50' width='50' class='shape'>";
					echo "<br><h4>$filename</h4>";
					echo"<a href='FILES/".$row['FileName']."' download><img src='download.png' height='15' width='15' class='d'></a></td>";
			 }	
							 
			 elseif($fileActualExt=='pdf')
			 {
					
					echo"<td><img src='pdf.png' height='50' width='50' class='shape'>";
					echo "<br><h4>$filename</h4>";
					echo"<a href='FILES/".$row['FileName']."' download><img src='download.png' height='15' width='15' class='d'></a></td>";
						
			 }					 
				elseif($fileActualExt=='pptx' || $fileActualExt=='ppt')
			   {
				   
					echo"<td><img src='ppt.png' height='50' width='50' class='shape'>";
					echo "<br><h4>$filename</h4>";
					echo"<a href='FILES/".$row['FileName']."' download><img src='download.png' height='15' width='15' class='d'></a></td>";
					 
			   }
			

					elseif($fileActualExt=='rar' || $fileActualExt=='zip')
			   {
					
			       echo"<td><img src='compressed.jpg' height='50' width='50' class='shape'>";
				   echo "<br><h4>$filename</h4>";
				   echo"<a href='FILES/".$row['FileName']."' download><img src='download.png' height='15' width='15' class='d'></a></td>";
													 
								 
			  }
			 
			   elseif($fileActualExt=='jpg' || $fileActualExt=='jpeg' || $fileActualExt=='png')
			   {
				   
					echo "<td><a href='FILES/".$row['FileName']."'><img  height='50' width='50' src='FILES/".$row['FileName']."' class='shape'></a>";
					echo "<br><h4>$filename</h4>";
					echo"<a href='FILES/".$row['FileName']."' download><img src='download.png' height='15' width='15' class='d'></a></td>";
												 
			  }
					if($i%7==0){
						$i=1;
						echo"</tr><tr>";
					}	else{
						
						$i++;		  
					}
			} 
			
			echo"</tr></table"; 
	   ?>
</body>
</html> 