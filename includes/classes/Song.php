<?php 

   class Song {
       private $conn;
       private $id;
       private $mysqliData;
       private $title;
       private $artistId;
       private $albumId;
       private $genre;
       private $duration;
       private $path;



          	  

       public function __construct($conn,$id){
          $this->conn = $conn;
       	  $this->id=$id;


         $albumQuery = mysqli_query($this->conn,"SELECT * FROM songs WHERE id='$this->id'");
         $this->mysqliData= mysqli_fetch_array($albumQuery);

         $this->title=$this->mysqliData['title'];
         $this->artistId=$this->mysqliData['artist'];
         $this->albumId=$this->mysqliData['album'];
         $this->genre=$this->mysqliData['genre'];
         $this->duration=$this->mysqliData['duration'];
         $this->path=$this->mysqliData['path'];

       } 

      public function  getTitle(){
        return $this->title;
      } 

      public function  getArtist(){
        return  new  Artist($this->conn,$this->artistId) ;
      } 

       public function  getAlbum(){
        return  new  Artist($this->conn,$this->albumId) ;
      }

       public function  getPath(){
        return $this->path;
      }

       public function  getDuration(){
        return $this->duration;
      }

       public function  getGenre(){
        return $this->genre;
      }

       public function  getmysqliData(){
        return $this->mysqliData;
      }



}

 ?> 










