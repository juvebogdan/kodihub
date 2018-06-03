<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kodihub extends MY_Controller {


	private $username;
	private $basepath = '/var/www/kodihub.net/';
	private $basepath2 = '/var/www/kodihub.net/public_html/';

	public function __Construct()
	{
		parent::__Construct();
		$this->username = $_SESSION['username'];
	}

	public function index()
	{
		$this->load->view('loggedin');			
	}

	public function upload()
	{
		$this->load->view('upload');
	}
	public function filiptry()
	{
		$this->load->view('index2');
	}

	public function help()
	{
		$this->load->view('help');
	}	

	public function edit()
	{
		$this->load->model('urls');
		$data['builds'] = $this->urls->getAllBuilds($this->username);
		$this->load->view('edit',$data);
	}
	public function stats()
	{
		$this->load->model('urls');
		$data['name']= $this->urls->getBuildsName($this->username);
		$this->load->view('stats',$data);	
	}
	public function loadstat()
	{
		$this->form_validation->set_rules('select','Build name','required|trim');
		if($this->form_validation->run()==FALSE){
			exit(validation_errors());
		}
		else {
			$this->load->model('urls');
			$build = $this->urls->getBuild($this->input->post('select'),$this->username);
			$genrerank = $this->urls->getgenreRank($this->input->post('select'),$this->username);
			$overallrank = $this->urls->getoverallRank($this->input->post('select'));
			$thismonth = $this->urls->thisMonth($this->input->post('select'),$this->username);
        	$this->output->set_content_type('application/json')//return json array
             ->set_output(json_encode(array("clicks" => $build[0]['clicks'], "url" => $build[0]['unique_chars'], "genrerank" => $genrerank, "overallrank" => $overallrank,'thismonth' => $thismonth[0]['broj'] )));
		}
	}	

	private function addMasterBuildAppyAPI($build)
	{
	    $username = 'appy';
	    $password = 'fisstops';
	     
	    // Alternative JSON version
	    // $url = 'http://twitter.com/statuses/update.json';
	    // Set up and execute the curl process
	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, 'http://appy.zone/rest/');
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl_handle, CURLOPT_POST, 1);
	    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
	        'build' => $build,
	    ));
	     
	    // Optional, delete this line if your API is open
	    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
	     
	    $buffer = curl_exec($curl_handle);
	    curl_close($curl_handle);
	     
	    $result = json_decode($buffer);
	 
	    //print_r($result);
	}

	public function editMasterBuildAppyAPI($old,$new) {
	    $username = 'appy';
	    $password = 'fisstops';
	     
	    // Alternative JSON version
	    // $url = 'http://twitter.com/statuses/update.json';
	    // Set up and execute the curl process
	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, 'http://appy.zone/rest/AppyAPI/editBuild');
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl_handle, CURLOPT_POST, 1);
	    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
	        'completebuild' => $old,
	        'newbuild' => $new
	    ));
	     
	    // Optional, delete this line if your API is open
	    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
	     
	    $buffer = curl_exec($curl_handle);
	    curl_close($curl_handle);
	     
	    $result = json_decode($buffer);	

	   //print_r($result);	
	}

	public function removeMasterBuildAppyAPI($old) {
	    $username = 'appy';
	    $password = 'fisstops';
	     
	    // Alternative JSON version
	    // $url = 'http://twitter.com/statuses/update.json';
	    // Set up and execute the curl process
	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, 'http://appy.zone/rest/AppyAPI/removeBuild');
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl_handle, CURLOPT_POST, 1);
	    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
	        'completebuild' => $old,
	    ));
	     
	    // Optional, delete this line if your API is open
	    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
	     
	    $buffer = curl_exec($curl_handle);
	    curl_close($curl_handle);
	     
	    $result = json_decode($buffer);	

	   //print_r($result);	
	}		

	private function formatImage($putanja,$width,$height,$type,$savepath)
	{
		$params = array(
				"putanja" => $putanja,
				"width" => $width,
				"height" => $height,
				"type" => $type,
				"savepath" => $savepath
			);

		$this->load->library('slika',$params);
		$this->slika->renewParams($params);
		$this->slika->obradiSliku();
	}	

	public function uploadbuild() {
		$this->form_validation->set_rules('title','Build Name','required|trim|alpha_dash_space|is_unique[urls.title]');
		$this->form_validation->set_rules('genre','Genre','trim|alpha_dash_space|required');
		$this->form_validation->set_rules('size','Size in MB','trim|numeric|required');

		if($this->form_validation->run()==FALSE){
			exit(validation_errors());
		}
		else {
			$this->load->library('upload');
			$error = array();
			$files = $_FILES;
			$path = $this->basepath2 . $this->username . "/" . $this->input->post('title');
			mkdir($path,0777,true);
			for ($i=0;$i<3;$i++) {
				$_FILES['files']['name'] = $files['files']['name'][$i];
				$_FILES['files']['type'] = $files['files']['type'][$i];
				$_FILES['files']['tmp_name'] = $files['files']['tmp_name'][$i];
				$_FILES['files']['error'] = $files['files']['error'][$i];
				$_FILES['files']['size'] = $files['files']['size'][$i];	

				if ($i<=1) {
					$config['upload_path'] = $path;
				}
				else {
					$config['upload_path'] = $this->basepath . "zipbuilds/";	
				}
				$config['allowed_types'] = $i <= 1 ? "png" : "zip";
				$config['max_size'] = $i <= 1 ? "10240":"307200";
				if ($i<=1) {
					$config['max_widht'] = '1920';
					$config['max_height'] = '1080';
				}
				else {
					unset($config['max_widht']);
					unset($config['max_height']);
				}
				$config['overwrite'] = TRUE;
				$config['remove_spaces'] = FALSE;
				if ($i==0) {
					$config['file_name'] = "icon.png";
				}
				else if ($i==1) {
					$config['file_name'] = "tile.png";
				}
				else {
					$config['file_name'] = $this->username . "_" . $this->input->post('title') . ".zip";
				}
				$this->upload->initialize($config);

				if(!$this->upload->do_upload('files')) {
					$error['error'] = $this->upload->display_errors();		
				}	
			}

			if(!empty($error)) {
				delete_files($path);
				if (file_exists($this->basepath . "zipbuilds/" . $this->username . "_" . $this->input->post('title') . ".zip")) {
					unlink($this->basepath . "zipbuilds/" . $this->username . "_" . $this->input->post('title') . ".zip");
				}
				rmdir($path);
				exit($error['error']);					
			}
			else {

				$this->formatImage($path . "/tile.png",340,200,"png",$path . "/tile.png");
				$this->formatImage($path . "/icon.png",200,200,"png",$path . "/icon.png");

				$this->load->model('urls');

				$file = $this->username . "_" . $this->input->post('title') . ".zip";

				$buildsize = (int) $this->input->post('size')*1048576;

				$title = $this->input->post('title');

				$genre = $this->input->post('genre');

				$code = $this->urls->createUrlCode();

				$url = 'https://kodihub.net/download.php?key=' . $code;

				$unique_chars = $this->urls->create();

				$this->urls->addBuild($title,$genre,$this->input->post('size'),$code,$url,$unique_chars,$this->username,$file);

				$buildstring = "https://kodihub.net/" . $this->username . "/" . $title . "/tile.png" . ";" . $title . ';https://kodihub.net/' . $unique_chars . ";" . $buildsize . ";" . $genre;

				$this->addMasterBuildAppyAPI($buildstring);

				exit('<p>Your build has been uploaded to our servers.</p><p>Click My Builds & Stats to get your download link</p>');
			}			
		}	
	}

public function removebuild() {
		$this->form_validation->set_rules('buildname','Build Name','required|alpha_dash_space');	
		if($this->form_validation->run()==FALSE){
			exit(validation_errors());
		}
		else {
			$this->load->model('urls');
			$currentbuild = $this->urls->getBuild($this->input->post('buildname'),$this->username);

			$oldbuild = "https://kodihub.net/" . $this->username . "/" . $currentbuild[0]['title'] . "/tile.png" . ";" . $currentbuild[0]['title'] . ';https://kodihub.net/' . $currentbuild[0]['unique_chars'] . ";" . $currentbuild[0]['size']*1048576 . ";" . $currentbuild[0]['genre'];
			$this->urls->deletebuild($currentbuild[0]['title'],$this->username);
			delete_files($this->basepath2 . $this->username . "/" . $this->input->post('buildname'), true);
			rmdir($this->basepath2 . $this->username . "/" . $this->input->post('buildname'));
			unlink('/var/www/kodihub.net/zipbuilds/' . $this->username . '_' . $this->input->post('buildname') . '.zip');
			$this->removeMasterBuildAppyAPI($oldbuild);
			exit("Build " . $this->input->post('buildname') . " has been successfully removed");			
		}
}


public function editbuild() {
		$this->form_validation->set_rules('title','Build Name','trim|alpha_dash_space');
		$this->form_validation->set_rules('genre','Genre','trim|alpha_dash_space');
		$this->form_validation->set_rules('size','Size in MB','trim|numeric');
		$this->form_validation->set_rules('buildname','Build Name','required|alpha_dash_space');	
		if($this->form_validation->run()==FALSE){
			exit(validation_errors());
		}
		else {
			$this->load->library('upload');
			$error = array();
			$files = $_FILES;
			$path = $this->basepath2 . $this->username . "/" . $this->input->post('buildname');
			if (!empty($files)) {
				for ($i=0;$i<3;$i++) {
					if(array_key_exists($i,$files['files']['name'])) {
						$_FILES['files']['name'] = $files['files']['name'][$i];
						$_FILES['files']['type'] = $files['files']['type'][$i];
						$_FILES['files']['tmp_name'] = $files['files']['tmp_name'][$i];
						$_FILES['files']['error'] = $files['files']['error'][$i];
						$_FILES['files']['size'] = $files['files']['size'][$i];	

						if ($i<=1) {
							$config['upload_path'] = $path;
						}
						else {
							$config['upload_path'] = $this->basepath . "zipbuilds/";	
						}
						$config['allowed_types'] = $i <= 1 ? "png" : "zip";
						$config['max_size'] = $i <= 1 ? "10240":"307200";
						if ($i<=1) {
							$config['max_widht'] = '1920';
							$config['max_height'] = '1080';
						}
						else {
							unset($config['max_widht']);
							unset($config['max_height']);
						}
						$config['overwrite'] = TRUE;
						$config['remove_spaces'] = FALSE;
						if ($i==0) {
							$config['file_name'] = "icon.png";
						}
						else if ($i==1) {
							$config['file_name'] = "tile.png";
						}
						else {
							$config['file_name'] = $this->username . "_" . $this->input->post('buildname') . ".zip";
						}
						$this->upload->initialize($config);

						if(!$this->upload->do_upload('files')) {
							$error['error'] = $this->upload->display_errors();		
						}
					}	
				}
			}
			if(!empty($error)) {
				exit($error['error']);					
			}
			else {

				$this->formatImage($path . "/tile.png",340,200,"png",$path . "/tile.png");
				$this->formatImage($path . "/icon.png",200,200,"png",$path . "/icon.png");;
				$this->load->model('urls');

				$currentbuild = $this->urls->getBuild($this->input->post('buildname'),$this->username);

				$oldbuild = "https://kodihub.net/" . $this->username . "/" . $currentbuild[0]['title'] . "/tile.png" . ";" . $currentbuild[0]['title'] . ';https://kodihub.net/' . $currentbuild[0]['unique_chars'] . ";" . $currentbuild[0]['size']*1048576 . ";" . $currentbuild[0]['genre'];

				$title = $this->input->post('title')=='' ? $currentbuild[0]['title'] : $this->input->post('title');
				$genre = $this->input->post('genre')=='' ? $currentbuild[0]['genre'] : $this->input->post('genre');
				$size = $this->input->post('size')=='' ? $currentbuild[0]['size'] : $this->input->post('size');

				$newbuild = "https://kodihub.net/" . $this->username . "/" . $title . "/tile.png" . ";" . $title . ';https://kodihub.net/' . $currentbuild[0]['unique_chars'] . ";" . $size*1048576 . ";" . $genre;

				if ($this->input->post('title')!='') {
					rename($this->basepath2 . $this->username . "/" . $this->input->post('buildname'),$this->basepath2 . $this->username . "/" . $this->input->post('title'));
				}

				$this->editMasterBuildAppyAPI($oldbuild,$newbuild);

				$this->urls->editBuild($title,$genre,$size,$this->input->post('buildname'),$this->username);

				exit("Your build has been updated");
			
			}			

		}			
	}

	public function filledit() {

		$this->form_validation->set_rules('buildname','Build Name','required|alpha_dash_space');	

		if($this->form_validation->run()==FALSE){
			exit(validation_errors());
		}
		else {

			$this->load->model('urls');
			$currentbuild = $this->urls->getBuild($this->input->post('buildname'),$this->username);

        	$this->output->set_content_type('application/json')//return json array
             ->set_output(json_encode(array("title" => $currentbuild[0]['title'], "genre" => $currentbuild[0]['genre'], "size" => $currentbuild[0]['size'])));
		}
	}

//brisanje starih zip fajlova

	// public function deleteOldBuilds() {
	// 	$this->load->model('urls');
	// 	$builds = scandir('/var/www/kodihub.net/zipbuilds');
	// 	$allbuilds = array();
	// 	for ($i=2; $i<count($builds);$i++) {
	// 		$allbuilds[] = $builds[$i];
	// 	}
	// 	//exit(print_r($allbuilds));
	// 	foreach ($allbuilds as $build) {
	// 		if($this->urls->getBuildbyname($build)==1) {
	// 			//echo 'postoji';
	// 		}
	// 		else {
	// 			//unlink('/var/www/kodihub.net/zipbuilds/' . $build);
	// 			echo $build . "</br>";
	// 		}
	// 	}
	// }




}
