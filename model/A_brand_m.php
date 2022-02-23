<?php
class A_brand_m extends CI_Model{// 모델 클래스 선언
        public function getlist($text1,$start,$limit)//정보목록보기
        {
		if (!$text1){
			$sql="select * from probrand order by name25 limit $start,$limit";    
		}
		else{
			$sql="select * from probrand where name25 like '%$text1%' order by name25 limit $start,$limit";
		}
		return $this->db->query($sql)->result();           // 쿼리실행, 결과 리턴
        }
	public function rowcount( $text1 ){
		if (!$text1){
			$sql="select * from probrand order by name25";
		}
		else{
			$sql="select * from probrand where name25 like '%$text1%' ";
		}
		return $this->db->query($sql)->num_rows();
	}
	function getrow($no){//정보추가
		$sql="select * from probrand where no25=$no";
		return  $this->db->query($sql)->row();
	}
	function deleterow($no){//정보삭제
		$sql="delete from probrand where no25=$no";
		return $this->db->query($sql);
	}
	function insertrow($row)//정보추가
	{
		return $this->db->insert("probrand",$row);
	}
	function updaterow($row,$no)//정보수정
	{
		$where=array("no25"=>$no);
		return $this->db->update("probrand",$row,$where);
	}
}
?>
