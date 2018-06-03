<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urls extends CI_Model {
	private $table = 'urls';
  
//
    public function most_downloaded() 
    {
      $this->db->order_by('clicks','desc');
      $this->db->limit(5);
      $query = $this->db->get($this->table);
      return $query->result_array();
    }
    public function recently_updated() 
    {
      $this->db->order_by('updated_at','desc');
      $this->db->limit(5);
      $query = $this->db->get($this->table);
      return $query->result_array();
    }
    public function most_popular() {
      date_default_timezone_set('Europe/London');
      $datum = date('Y-m-d H:i:s', strtotime("-1 week"));
      $this->db->select('id, COUNT(id) as total');
      $this->db->where('date_time >',$datum);
      $this->db->group_by('id'); 
      $this->db->order_by('total', 'desc'); 
      $this->db->limit(5);
      $query = $this->db->get('downloads');  
      $downloads =  $query->result_array();    
      $data = $this->getbuildsWithIds($downloads);

      $final_data = array();

      for($i=0;$i<count($downloads);$i++) {
          for($j=0;$j<count($data);$j++) {
              if($downloads[$i]['id']==$data[$j]['id']) {
                  $final_data[] = $data[$j];
              }
          }
      }

      return $final_data;   
    }

    private function getbuildsWithIds($data) {
      $ids = array();
      for($i=0; $i<=4; $i++) {
        $ids[] = $data[$i]['id'];
      }
      //print_r($ids);
      $this->db->where_in('id',$ids);
      $query = $this->db->get($this->table);
      return $query->result_array();
    }
    public function smallest_builds() {
      $this->db->order_by('size','asc');
      $this->db->limit(5);
      $query = $this->db->get($this->table);
      return $query->result_array();
    }
    public function new_arrivals() {
      $this->db->order_by('created_at','desc');
      $this->db->limit(5);
      $query = $this->db->get($this->table);
      return $query->result_array();
    } 
//
  function addBuild($title,$genre,$size,$code,$url,$unique_chars,$username,$file) {
    $updated = date('Y-m-d h:i:s');
    $data = array(
      'url' => $url,
      'unique_chars' => $unique_chars,
      'clicks' => 0,
      'username' => $username,
      'genre' => $genre,
      'size' => $size,
      'code' => $code,
      'title' => $title,
      'file' => $file,
      'created_at' => $updated,
      'updated_at' => $updated
    );
    $this->db->insert($this->table,$data);
  }

function generate_chars()  
{  
 $num_chars = 5; //max length of random chars  
 $i = 0;  
 $my_keys = "123456789abcdefghijklmnopqrstuvwxyz"; //keys to be chosen from  
 $keys_length = strlen($my_keys);  
 $url  = "";  
 while($i<$num_chars)  
 {  
  $rand_num = mt_rand(1, $keys_length-1);  
  $url .= $my_keys[$rand_num];  
  $i++;  
 }  
 return $url;  
}  

function isUnique($chars)  
{  
  $this->db->where('unique_chars',$chars);
  $query = $this->db->get($this->table);

  if($query->num_rows()==0) {
    return true;
  }
  else {
    return false;
  }

}

function createUrlCode() {

    $code = md5(microtime());
    $this->db->where('code',$code);
    $query = $this->db->get($this->table);

    if ($query->num_rows()==0) {
      return $code;
    }
    else {
      $this->createUrlCode();
    }

  }


function create()  
{  
   $chars = $this->generate_chars(); //generate random characters  
  /* We check the uniqueness of the characters. The following loop 
  continues until it generates unique characters */  
   while( !$this->isUnique($chars) )  
   {  
    $chars = $this->generate_chars();  
   }  
    
   return $chars; 
 
} 

function getBuild($name,$username) {
  $this->db->where('username',$username);
  $this->db->where('title',$name);
  $query = $this->db->get($this->table);
  if ($query->num_rows()==1) {
    return $query->result_array();
  }
  else {
    $query = array();
    return $query;
  }
}


function getAllBuilds($username) {
  $this->db->where('username',$username);
  $query = $this->db->get($this->table);
  return $query->result();
}

//search fajlova
// function getBuildbyname($build) {
//   $this->db->where('file',$build);
//   $query = $this->db->get($this->table);
//   return $query->num_rows();
// }

  function editBuild($title,$genre,$size,$buildname,$username) {
    $updated = date('Y-m-d h:i:s');
    $data = array(
      'genre' => $genre,
      'size' => $size,
      'title' => $title,
      'updated_at' => $updated
    );
    $this->db->where('username',$username);
    $this->db->where('title',$buildname);
    $this->db->update($this->table,$data);
  }

  function picturesget()
  {
    $this->db->order_by("clicks", "desc");
    $this->db->limit(10);   
    $query = $this->db->get($this->table);
    return $query->result_array();
  }

  function getBuildsName($username)
  {
   $this->db->where('username',$username);
   $query = $this->db->get($this->table);
   return $query->result_array(); 
  }

  function statsload($username,$build)
  {
    $this->db->where('username',$username);
    $this->db->where('title',$build);
    $query = $this->db->get($this->table);
    return $query->result_array(); 
  }

  function getgenreRank($name,$username) {
    $build = $this->getBuild($name,$username);
    $currentGenre = $build[0]['genre'];
    return $this->getCurrentRank($name,$currentGenre);
  }

  function thisMonth($name,$username)
  {
    $where=sprintf("(select id from urls where title='%s' and username='%s')",$name,$username);
    //$id = $this->getID($name,$username);
     return $this->db
        ->select('count(*) as broj')
        ->from('downloads')
        ->where('id',$where,FALSE)
        ->where('month(date_time)','month(now())',FALSE)
        ->get()
        ->result_array();
  }

  function getID($name,$username) {
    $this->db->where('title',$name);
    $this->db->where('username',$username);
    $query = $this->db->get($this->table);
    return $query->result_array()[0]['id'];
  }

  function getCurrentRank($name,$genre) {
      $this->db->where('genre',$genre);
      $this->db->order_by('clicks','desc');
      $query = $this->db->get($this->table);
      $buildarray = $query->result_array();
      for ($i=0; $i<count($buildarray); $i++) {
          if($buildarray[$i]['title']==$name) {
            return $i+1;
          }
      }
      return 0;
  }

  function getoverallRank($name) {
      $this->db->order_by('clicks','desc');
      $query = $this->db->get($this->table);
      $buildarray = $query->result_array();
      for ($i=0; $i<count($buildarray); $i++) {
          if($buildarray[$i]['title']==$name) {
            return $i+1;
          }
      }
      return 0;      
  }

  function deletebuild($title,$username) {
    $this->db->where('username',$username);
    $this->db->where('title',$title);
    $this->db->delete($this->table);
  }



}




?>