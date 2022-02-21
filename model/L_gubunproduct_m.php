<?
	 class L_gubunproduct_m extends CI_Model     // 모델 클래스 선언
    {
		public function getlist($start,$limit,$no)//정보목록보기
        {
			$sql="select proproduct.*, 
					progubun.name25 as gubun_name25,
					probrand.name25 as brand_name25
					from proproduct 
					left join progubun on 
					proproduct.progubun_no25=progubun.no25 
					left join probrand on
					proproduct.probrand_no25=probrand.no25 where
					proproduct.progubun_no25 like $no
					order by proproduct.price25 DESC limit $start,$limit";
			//proproduct에서 progubun의name25를 gubun_name25로 지정
			//				 probrand의name25를 brand_name25로 지정하고
			//				 proproduct에서 progubun,probrand의 no값이 같은 것 끼리 리턴하고
			//				 proproduct.progubun_no25와 $no 같은 값을 가져온다.
			//				 제품을 가격순으로 내림차순정렬하고 값을 $limit 만큼 가져온다.
			return $this->db->query($sql)->result();           // 쿼리실행, 결과 리턴
        }
		public function rowcount($no){
			$sql="select * from proproduct where proproduct.progubun_no25 like $no order by name25";
				//proproduct테이블의 name25에서 progubun_no25컬럼이 $no와 같은 조건의 번호를 선택
			return $this->db->query($sql)->num_rows();
		}
		public function gubunname($no){
			$sql="select proproduct.*, 
					progubun.name25 as gubun_name25
					from proproduct 
					left join progubun on 
					proproduct.progubun_no25=progubun.no25 where
					proproduct.progubun_no25 like $no";
			return $this->db->query($sql)->row();           // 쿼리실행, 결과 리턴
		}
		function getrow($no)  {//정보추가
			$sql="select proproduct.*, 
						progubun.name25 as gubun_name25,
						probrand.name25 as brand_name25
						from proproduct 
						left join progubun on 
						proproduct.progubun_no25=progubun.no25 
						left join probrand on
						proproduct.probrand_no25=probrand.no25 where
						proproduct.no25 like $no";
			return  $this->db->query($sql)->row();
		}
	}
?>