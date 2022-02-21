<?
    class A_product extends CI_Controller {       // a_product클래스 선언
        function __construct(){
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("a_product_m");    // 모델 a_product_m 연결
			$this->load->helper(array("url", "date"));   
			$this->load->library('pagination');
			$this->load->library('upload');
			$this->load->library('image_lib');
        }
        public function index()// 제일 먼저 실행되는 함수
		{
            $this->lists();                                        // list 함수 호출
        }
		public function call_upload($pic)
		{
			$config['upload_path'] = './product_img';
			$config['allowed_types'] = 'gif|jpg|png'; 
			$config['overwrite'] = TRUE; 
			$config['max_size'] = 10000000;
			$config['max_width'] = 0;
            $config['max_height'] = 0;
			$this->upload->initialize($config); 

			if (!$this->upload->do_upload($pic)){ 
				$picname="";
			}
			else{
				$picname=$this->upload->data("file_name");

				$config['image_library'] = 'gd2';
				$config['source_image'] = './product_img/' . $picname;
				$config['thumb_marker'] = '';
				$config['new_image'] = './product_img/';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
			}
			return $picname;
		}
        public function lists(){
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			
			if ($text1==""){ 
				$base_url = "/a_product/lists/page"; 
			}
			else{ 
				$base_url = "/a_product/lists/text1/$text1/page";
			}
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			$base_url = "/~sale25" . $base_url;

			$config["per_page"] = 10;                              // 페이지당 표시할 line 수
			$config["total_rows"] = $this->a_product_m->rowcount($text1);  // 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
			$config["base_url"] = $base_url;                // 기본 URL
			$this->pagination->initialize($config);           // pagination 설정 적용
			
			$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
			$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성
			
			$start=$data["page"];                 // n페이지 : 시작위치
			$limit=$config["per_page"];        // 페이지 당 라인수

			$data["text1"]=$text1;						// text1 값 전달을 위한 처리
			$data["list"]=$this->a_product_m->getlist($text1,$start,$limit);   // 해당페이지 자료읽기

            $this->load->view("a_main_header");                    // 상단출력(메뉴)
            $this->load->view("a_product_list",$data);           // a_product_list에 자료전달
            $this->load->view("a_main_footer");                      // 하단 출력 
        }
		public function view(){
			$uri_array=$this->uri->uri_to_assoc(3);
			$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
			
			$data["text1"]=$text1;
			$data["page"] = $page;
			$data["row"] = $this->a_product_m->getrow($no);

			$this->load->view("a_main_header");                    // 상단출력(메뉴)
            $this->load->view("a_product_view",$data);           // a_product_list에 자료전달
            $this->load->view("a_main_footer");     
		}
		public function del(){
			$uri_array = $this->uri->uri_to_assoc(3);
			$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

			$this->a_product_m->deleterow($no);

			redirect("/~sale25/a_product/lists".$text1.$page); // 목록화면으로 돌아가기
		}
		public function add(){//사용자추가
			$uri_array = $this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

			$this->load->library("form_validation");
			$this->form_validation->set_rules("progubun_no","구분명","required");
			$this->form_validation->set_rules("probrand_no","브랜드명","required");
			$this->form_validation->set_rules("name","이름","required|max_length[50]");
			$this->form_validation->set_rules("price","단가","required|numeric");
			
			if ($this->form_validation->run()==FALSE ) 
			{
				$this->load->view('a_main_header');
				$this->load->view('a_product_add');
				$this->load->view('a_main_footer');
			}
			else // 입력화면의 저장버튼 클릭한 경우
			{
				$data = array(	
					"progubun_no25" => $this->input->post("progubun_no",TRUE),
					"probrand_no25" => $this->input->post("probrand_no",TRUE),
					"name25"	 => $this->input->post("name",TRUE),
					"price25"	 => $this->input->post("price",TRUE)
				);
				$pic1 = "pic";
				$pic2 = "changepic";
				$pic3 = "detailpic";

				$picname1=$this->call_upload($pic1);
				$picname2=$this->call_upload($pic2);
				$picname3=$this->call_upload($pic3);

				if($picname1){
					$data["pic25"]=$picname1;
				}
				if($picname2){
					$data["changepic25"]=$picname2;
				}
				if($picname3){
					$data["detailpic25"]=$picname3;
				}
				$result = $this->a_product_m->insertrow($data);
				redirect("/~sale25/a_product/lists".$text1.$page);//목록화면으로 이동.
			}
		}
		public function edit()//사용자 수정
		{
			$uri_array = $this->uri->uri_to_assoc(3);
			$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

			$this->load->library("form_validation");
			$this->form_validation->set_rules("progubun_no","구분명","required");
			$this->form_validation->set_rules("name","이름","required|max_length[50]");
			$this->form_validation->set_rules("price","단가","required|numeric");
			
			if ($this->form_validation->run()==FALSE)
			{
				$this->load->view("a_main_header");
				$data["row"]=$this->a_product_m->getrow($no);
				$this->load->view("a_product_edit",$data);
				$this->load->view("a_main_footer");
			}
			else  // 수정화면의 저장버튼 클릭한 경우
			{  
				$data = array(	
					"progubun_no25" => $this->input->post("progubun_no",TRUE),
					"probrand_no25" => $this->input->post("probrand_no",TRUE),
					"name25"	 => $this->input->post("name",TRUE),
					"price25"	 => $this->input->post("price",TRUE),
				);
				$pic1 = "pic";
				$pic2 = "changepic";
				$pic3 = "detailpic";

				$picname1=$this->call_upload($pic1);
				$picname2=$this->call_upload($pic2);
				$picname3=$this->call_upload($pic3);

				if($picname1){
					$data["pic25"]=$picname1;
				}
				if($picname2){
					$data["changepic25"]=$picname2;
				}
				if($picname2){
					$data["detailpic25"]=$picname3;
				}

				$this->a_product_m->updaterow($data,$no);
				redirect("/~sale25/a_product/lists".$text1.$page);//목록화면으로 이동.
			}
		}
    }
?>
