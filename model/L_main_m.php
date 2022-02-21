<?
    class L_main_m extends CI_Model     // 모델 클래스 선언
    {
        public function getgubun()//정보목록보기
        {
			$sql="select * from progubun";    
			return $this->db->query($sql)->result();           // 쿼리실행, 결과 리턴
        }
		public function getbrand()//정보목록보기
        {
			$sql="select * from probrand";    
			return $this->db->query($sql)->result();           // 쿼리실행, 결과 리턴
        }
		 public function getlist($text1,$start,$limit)//정보목록보기
        {
			$sql="select proproduct.*, 
						progubun.name25 as gubun_name25,
						probrand.name25 as brand_name25
						from proproduct 
						left join progubun on 
						proproduct.progubun_no25=progubun.no25 
						left join probrand on
						proproduct.probrand_no25=probrand.no25 where
						proproduct.name25 like '%$text1%'
						order by proproduct.price25 DESC limit $start,$limit";
			return $this->db->query($sql)->result();// 쿼리실행, 결과 리턴
        }
		public function rowcount( $text1 )
			{
			$sql="select * from proproduct where name25 like '%$text1%'";
			return $this->db->query($sql)->num_rows();
		}
    }
?>

