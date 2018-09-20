<?php include "includes/header.php";  ?>

     <?php 

        if(isset($_GET['id'])){
        	 $albumId= $_GET['id'];
        }

       else {
       	  header("Location:index.php");
       }
      
         $album = new Album($conn,$albumId);

         $artist= $album->getArtist();

        // echo $album->getTitle(). "<br>";
         //echo $artist->getName();

     ?>

     <div class="entityInfo">
     	 
     	 <div class="leftSection">
     	 	<img src="<?php echo $album->getArtworkPath(); ?>">
     	 </div>

     	 <div class="rightSection">
     	 	<h2><?php echo $album->getTitle(); ?></h2>
     	 	<p>By <?php echo $artist->getName();  ?></p>
     	 	<p> <?php echo $album->getNumberOfSongs();  ?> Songs</p>
     	 </div>

     </div>

 <div class="trackListContainer" >
 	
      <ul class="trackList">

      	<?php 
    
               $songsIdArray= $album->getSongIds();
            
                 $i=1;
            foreach($songsIdArray as $songId){

              $albumSong  = new Song($conn,$songId);

              // $albumSong->getTitle();
              
            
              $albumArtist =  $albumSong->getArtist();


              echo "<li class='trackListRow' >
                          <div class='trackCount'> 
                             <img class= 'play' src = 'assets/images/icons/play-white.png'>
                              <span class='trackNumber'>$i</span>
                          </div>

                         <div class='trackInfo1'> 
                             <span class='trackName1'>" . $albumSong->getTitle() . "</span> 
                             <span class='artistName1'>" . $albumArtist->getName() . "</span>
                         </div>

                         <div  class='trackOptions'> 
                            <div class='lefting'> 

                            <img class='optinsButton' src='assets/images/icons/more.png'>
                            </div>

                             <div class='lefting'> </div>
                         <div>

                         <div class='trackDuration'>
                             <span class='duration1'>" . $albumSong->getDuration() . " </span>

                         </div>




              </li>" ;
              
              $i = $i+1;	

              // $albumSong->getAlbum();

            //  echo $albumSong->getPath();
   
     //           echo $albumSong->getDuration();

       //       echo $albumSong->getGenre();
            	



            }
      	?>
     

      </ul>

 </div>




 <?php include "includes/footer.php";  ?> 	
















