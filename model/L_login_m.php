<?php
    class L_login_m extends CI_Model     // 모델 클래스 선언
    {
        public function getrow($uid,$pwd)//정보목록보기
        {
		$sql="select * from promember where uid25='$uid' and pwd25='$pwd'";
		return $this->db->query($sql)->row();
        }
    }
?>
