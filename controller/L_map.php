<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class L_map extends CI_Controller { // 클래스이름 첫 글자는 대문자
	function __construct(){
		parent::__construct();
		$this->load->database(); // 데이터베이스 연결
		$this->load->model("l_main_m");    // 모델 l_main_m 연결
		$this->load->helper(array("url", "date"));   
		$this->load->library("pagination");//라이브러리 선언
	}
	public function index() // 제일 먼저 실행되는 함수
	{   
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		$data["text1"]=$text1; // text1 값 전달을 위한 처리

		$data["list1"]=$this->l_main_m->getgubun();   // 해당페이지 자료읽기
		$data["list2"]=$this->l_main_m->getbrand();   // 해당페이지 자료읽기

        	$this->load->view("l_main_header",$data); // 상단출력(메뉴)
		$this->load->view("l_map");
        	$this->load->view("l_main_footer"); 
    	}
}
?>
