<?
class L_login extends CI_Controller {       // login클래스 선언
	function __construct(){
            	parent::__construct();
            	$this->load->database();                     // 데이터베이스 연결
            	$this->load->model("l_login_m");    // 모델 l_login_m 연결
		$this->load->model("l_main_m");    // 모델 l_main_m 연결
		$this->load->helper(array("url", "date"));   
        }
        public function check()
	{
		$uid=$this->input->post("uid",TRUE);
		$pwd=$this->input->post("pwd",TRUE);

		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			
		$row = $this->l_login_m->getrow($uid,$pwd);
		if($row){
			$data=array(
				"uid"  =>$row->uid25,
				"rank" =>$row->rank25,
				"name" =>$row->name25
			);
			$this->session->set_userdata($data);
		}
		$data["text1"]=$text1;	
		$data["list1"]=$this->l_main_m->getgubun();   // 해당페이지 자료읽기
            	$data["list2"]=$this->l_main_m->getbrand();   // 해당페이지 자료읽기
			
		if($this->session->userdata("uid")=="admin"){ //uid가 admin인 경우 관리자 페이지 출력  
			$this->load->view("a_main_header"); 
			$this->load->view("a_main_footer");    
		}
		else{
			$this->load->view("l_main_header",$data); // 상단출력(메뉴)
			$this->load->view("l_introduce"); // 상단출력(메뉴)
			$this->load->view("l_main_footer"); // 하단 출력 
		}
        }
	public function logout()
	{
		$data = array('uid','rank','name');
		$this->session->unset_userdata($data);
		
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		
		$maindata["text1"]=$text1;	
		$maindata["list1"]=$this->l_main_m->getgubun();   // 해당페이지 자료읽기
		$maindata["list2"]=$this->l_main_m->getbrand();   // 해당페이지 자료읽기
		
		$this->load->view("l_main_header",$maindata);
		$this->load->view("l_introduce");
		$this->load->view("l_main_footer");                      
	}
}
?>
