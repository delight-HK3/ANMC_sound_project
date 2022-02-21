<?
    class A_product_m extends CI_Model     // 모델 클래스 선언
    {
        public function getlist($text1,$start,$limit)//정보목록보기
        {
            if (!$text1){
				 $sql="select proproduct.*, 
						progubun.name25 as gubun_name25,
						probrand.name25 as brand_name25
						from proproduct 
						left join progubun on 
						proproduct.progubun_no25=progubun.no25 
						left join probrand on
						proproduct.probrand_no25=probrand.no25 
						order by proproduct.name25 limit $start,$limit";
			}
			else{
				$sql="select proproduct.*, 
						progubun.name25 as gubun_name25,
						probrand.name25 as brand_name25
						from proproduct 
						left join progubun on 
						proproduct.progubun_no25=progubun.no25 
						left join probrand on
						proproduct.probrand_no25=probrand.no25 where 
						proproduct.name25 like '%$text1%'
						order by proproduct.name25 limit $start,$limit";
			}
			return $this->db->query($sql)->result();           // 쿼리실행, 결과 리턴
        }
		function getlist_gubun()
		{
			$sql="select * from progubun order by name25";
			return $this->db->query($sql)->result();
		}
		function getlist_brand()
		{
			$sql="select * from probrand order by name25";
			return $this->db->query($sql)->result();
		}
		public function rowcount( $text1 ){
			if (!$text1){
				$sql="select * from proproduct order by name25";
			}
			else{
				$sql="select * from proproduct where name25 like '%$text1%' ";
			}
			return $this->db->query($sql)->num_rows();
		}
		function getrow($no)  {//정보추가
			$sql="select proproduct.*, 
						progubun.name25 as progubun_name25,
						probrand.name25 as probrand_name25
						from proproduct 
						left join progubun on 
						proproduct.progubun_no25=progubun.no25 
						left join probrand on
						proproduct.probrand_no25=probrand.no25
						where proproduct.no25=$no";
			return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {//정보삭제
			$sql="delete from proproduct where no25=$no";
			return $this->db->query($sql);
		}
		function insertrow($row)//정보추가
		{
			return $this->db->insert("proproduct",$row);
		}
		function updaterow($row,$no)//정보수정
		{
			$where=array("no25"=>$no);
			return $this->db->update("proproduct",$row,$where);
		}
    }
?>
