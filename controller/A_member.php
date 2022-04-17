<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class A_member extends CI_Controller {       // a_member클래스 선언
	function __construct(){
        	parent::__construct();
            	$this->load->database();                     // 데이터베이스 연결
            	$this->load->model("a_member_m");    // 모델 a_member_m 연결
		$this->load->helper(array("url", "date"));   
		$this->load->library("pagination");//라이브러리 선언
        }
        public function index()// 제일 먼저 실행되는 함수
	{
            	$this->lists();// list 함수 호출
        }
        public function lists()
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			
		if ($text1==""){ 
			$base_url = "/a_member/lists/page"; 
		}
		else{ 
			$base_url = "/a_member/lists/text1/$text1/page";
		}
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

		$config["per_page"] = 10;                              // 페이지당 표시할 line 수
		$config["total_rows"] = $this->a_member_m->rowcount($text1);  // 전체 레코드개수 구하기
		$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
		$config["base_url"] = $base_url;                // 기본 URL
		$this->pagination->initialize($config);//pagination 설정 적용
			
		$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
		$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성
			
		$start=$data["page"];                 // n페이지 : 시작위치
		$limit=$config["per_page"];        // 페이지 당 라인수

		$data["text1"]=$text1;						// text1 값 전달을 위한 처리
		$data["list"]=$this->a_member_m->getlist($text1,$start,$limit);   // 해당페이지 자료읽기

            	$this->load->view("a_main_header");                    // 상단출력(메뉴)
            	$this->load->view("a_member_list",$data);           // a_member_list에 자료전달
            	$this->load->view("a_main_footer");                      // 하단 출력 
        }
	public function view()
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
			
		$data["text1"]=$text1;
		$data["page"] = $page;
		$data["row"] = $this->a_member_m->getrow($no);

		$this->load->view("a_main_header");                    // 상단출력(메뉴)
            	$this->load->view("a_member_view",$data);           // a_member_list에 자료전달
           	$this->load->view("a_main_footer");     
	}
	public function del()
	{
		$uri_array = $this->uri->uri_to_assoc(3);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

		$this->a_member_m->deleterow($no);

		redirect("/a_member/lists".$text1.$page); // 목록화면으로 돌아가기
	}
	public function add(){//사용자추가
		$uri_array = $this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");
		$this->form_validation->set_rules("name","이름","required|max_length[20]");
		$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
		$this->form_validation->set_rules("pwd","암호","required|max_length[20]");

		if ($this->form_validation->run()==FALSE) 
		{
			$this->load->view("a_main_header");
			$this->load->view("a_member_add");// 입력화면 표시
			$this->load->view("a_main_footer");
		}
		else // 입력화면의 저장버튼 클릭한 경우
		{
			$phone1=$this->input->post("phone1",true);
			$phone2=$this->input->post("phone2",true);
			$phone3=$this->input->post("phone3",true);
			$phone=sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
			$data = array(	
				'name25'=> $this->input->post("name",true),
				'uid25' => $this->input->post("uid",true),
				'pwd25' => $this->input->post("pwd",true),
				'phone25' => $phone,	
				'rank25'=> $this->input->post("rank",true)
			);
			$this->a_member_m->insertrow($data);
			redirect("/a_member/lists".$text1.$page);//목록화면으로 이동.
		}
	}
	public function edit()//사용자 수정
	{
		$uri_array = $this->uri->uri_to_assoc(3);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

		$this->load->library("form_validation");

		$this->form_validation->set_rules("name","이름","required|max_length[20]");
		$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
		$this->form_validation->set_rules("pwd","암호","required|max_length[20]");
			
		if ($this->form_validation->run()==FALSE)
		{
			$this->load->view("a_main_header");
			$data["row"]=$this->a_member_m->getrow($no);
			$this->load->view("a_member_edit",$data);
			$this->load->view("a_main_footer");
		}
		else  // 수정화면의 저장버튼 클릭한 경우
		{  
			$phone1=$this->input->post("phone1",true);
			$phone2=$this->input->post("phone2",true);
			$phone3=$this->input->post("phone3",true);
			$phone=sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
			$data = array(	
				'name25'=> $this->input->post("name",true),
				'uid25' => $this->input->post("uid",true),
				'pwd25' => $this->input->post("pwd",true),
				'phone25' => $phone,	
				'rank25'=> $this->input->post("rank",true)
			);
			$this->a_member_m->updaterow($data,$no);
			redirect("/a_member/lists".$text1.$page);//목록화면으로 이동.
		}
	}
}
?>
