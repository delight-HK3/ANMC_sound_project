<?
class L_main extends CI_Controller {               // 클래스이름 첫 글자는 대문자
	function __construct(){
        parent::__construct();
        $this->load->database();                     // 데이터베이스 연결
		$this->load->helper(array("url", "date"));   
    }
    public function logout(){
		$data = array('uid','rank','name');
        $this->session->unset_userdata($data);
        $maindata["list1"]=$this->l_main_m->getgubun();   // 해당페이지 자료읽기
        $maindata["list2"]=$this->l_main_m->getbrand();   // 해당페이지 자료읽기
        redirect("/~sale25/l_main");
    }
    public function index()                              // 제일 먼저 실행되는 함수
    {   
        $this->load->view("a_main_header");   
        $this->load->view("a_main_footer"); 
    }
}
?>
