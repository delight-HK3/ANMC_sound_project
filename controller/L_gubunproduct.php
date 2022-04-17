<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class L_gubunproduct extends CI_Controller {       // product클래스 선언
	function __construct(){
        	parent::__construct();
            	$this->load->database(); // 데이터베이스 연결
            	$this->load->model("l_gubunproduct_m");    // 모델 product_m 연결
		$this->load->model("l_main_m");    // 모델 gubun_m 연결
		$this->load->helper(array("url", "date"));   
		$this->load->library('pagination');
        }
        public function lists()
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;

		if ($text1==""){ 
			$base_url = "/l_gubunproduct/lists/no/$no/page"; 
		}
		else{ 
			$base_url = "/l_gubunproduct/lists/no/$no//text1/$text1/page";
		}
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			
		$config["per_page"] = 8;                              // 페이지당 표시할 line 수
		$config["total_rows"] = $this->l_gubunproduct_m->rowcount($no);  // 전체 레코드개수 구하기
		$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
		$config["base_url"] = $base_url;                // 기본 URL
		$this->pagination->initialize($config);           // pagination 설정 적용
			
		$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
		$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성
			
		$start=$data["page"];                 // n페이지 : 시작위치
		$limit=$config["per_page"];        // 페이지 당 라인수

		$data["list"]=$this->l_gubunproduct_m->getlist($start,$limit,$no);   // 해당페이지 자료읽기
		$data["gubunname"]=$this->l_gubunproduct_m->gubunname($no);
		$data["total"]= $this->l_gubunproduct_m->rowcount($no);

		$maindata["text1"]=$text1;						// text1 값 전달을 위한 처리
		$maindata["list1"]=$this->l_main_m->getgubun();   // 해당페이지 자료읽기
		$maindata["list2"]=$this->l_main_m->getbrand();   // 해당페이지 자료읽기				

            	$this->load->view("l_main_header",$maindata); // 상단출력(메뉴)
            	$this->load->view("l_gubunproduct_list",$data); // product_list에 자료전달
            	$this->load->view("l_main_footer"); // 하단 출력 
        }
	public function view()
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;

		$data["page"] = $page;
		$data["row"] = $this->l_gubunproduct_m->getrow($no);
		$maindata["text1"]=$text1;						// text1 값 전달을 위한 처리
		$maindata["list1"]=$this->l_main_m->getgubun();   // 해당페이지 자료읽기
		$maindata["list2"]=$this->l_main_m->getbrand();   // 해당페이지 자료읽기		
			
		$this->load->view("l_main_header",$maindata);                    // 상단출력(메뉴)
            	$this->load->view("l_gubunproduct_view",$data);           // product_list에 자료전달
            	$this->load->view("l_main_footer");     
	}
}
?>
