<div class="alert productcolor1 mymargin5" role="alert">브랜드구분</div>
	<?php
		$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   
	?>
	<script>
		function find_text(){
			if(!form1.text1.value){
				form1.action="/a_brand/lists/page";
			}
			else{
				form1.action="/a_brand/lists/text1/"+form1.text1.value+"/page";
			}
			form1.submit();
		}
            	$(function(){
                	$("#a_brand_add").click( function() { // 저장버튼 클릭시 호출
				var name=$("#name").val(); //name에 입력한 값
				$.ajax({ //a_brand 함수 호출
					url: "/a_brand/a_brand_insert", //a_brand_insert함수 호출
					type: "POST",
					data:{
						"name":name
					},
					dataType: "text", //데이터 저장
					complete: function(xhr, textStatus){
						var no = xhr.responseText; //이부분을 통하여 출력된 값을 받아온다.
						$("#table_list").append(//나중에 추가시키는 WEB_API
						"<tr id='rowno"+no+"'>" + //제품 라인번호
						"<td> "+no+" </td>" +
						"<td> <a href='#collapseExampleEdit' data-toggle='collapse' class='a_brand_edit' aria-expanded='false' aria-controls='collapseExampleEdit' data-no='"+no+"' data-name='"+name+"'>"+name+"</a></td>"+
						"<td> <a href='#' rowno='"+no+"' class='a_brand_del btn btn-sm productcolor1'>삭제</a></td>"+           
						"</tr>"); //제품 라인번호와 맞는 라인의 내용을 추가.
					}
				});
				$("#collapseExample").collapse('hide');
                	});
                
                	$("#a_brand_edit").click( function() { // 저장버튼 클릭시 호출
				var no=$("#edit_no").val();
				var name=$("#edit_name").val(); //name에 입력한 값
				$.ajax({ //a_brand 함수 호출
					url: "/a_brand/a_brand_update", //a_brand_update함수 호출
					type: "POST",
					data:{
						"no":no,
						"name":name
					},
					dataType: "html", //데이터 저장
					complete: function(xhr, textStatus){
					$('#rowno'+no).replaceWith(
						"<tr id='rowno"+no+"'>" + 
						"<td> "+no+" </td>" + 
						"<td><a href='#collapseExampleEdit' data-toggle='collapse' class='a_brand_edit' aria-expanded='false' aria-controls='collapseExampleEdit' data-no='"+no+"' data-name='"+name+"'>"+name+"</a></td>"+ 
						"<td><a href='#' rowno='"+no+"' class='a_brand_del btn btn-sm productcolor1'>삭제</a></td>"+           
						"</tr>"); //제품 라인번호와 맞는 라인의 내용을 추가.
					}
				});
				$("#collapseExampleEdit").collapse('hide');
			});

                	$("#table_list").on("click",".a_brand_del",function() { //table_list에있는 a_brand_del을 클릭
				if(confirm("삭제할까요?")){
					no=$(this).attr("rowno");
					$.ajax({
						url: "/a_brand/a_brand_delete", //a_brand.php에서 a_brand_delete 호출
						type: "POST",
						data: {
							"no":no //삭제버튼에서 no값 읽기
						},
						dataType: "text",
						complete: function(xhr, textStatus){
							$('#rowno'+no).remove(); //화면에서 no번째 <tr>...</tr>삭제
						}//remove는 삭제하는 기능을 가진 API
					});
				}
                	});
            	});
		$(document).on('click','.a_brand_add',function(){
			$("#collapseExample").collapse('hide');
		});
		$(document).on('click','.a_brand_edit',function(){
			$("#collapseExample").collapse('hide');
			$('#edit_no').val( $(this).data('no') );
			$('#edit_name').val( $(this).data('name') );
		});
	</script>
	<form name="form1" method="post" action="">
		<div class="row">
			<div class="col-3" align="left">            
				<div class="input-group input-group-sm">
					<div class="input-group-prepend">
						<span class="input-group-text">이름</span>
					</div>
					<input type="text" name="text1" value="<?php echo $text1; ?>" class="form-control" onkeydown="if (event.keyCode == 13) { find_text(); }" >
					<div class="input-group-append">
						<button class="btn productcolor1" type="button" onClick="javascript:find_text();">검색</button>
					</div>
				</div>		
			</div>
			<div class="col-9" align="right">      
				<a href="#collapseExample" class="a_brand_add btn btn-sm productcolor1" data-toggle="collapse" 
                        	aria-expanded="false" aria-controls="collapseExample" data-id="" data-name="">추가</a>
			</div>
		</div>
	</form>
	<table class="table table-bordered table-sm mymargin5" id="table_list">
		<tr class="productcolor1">
			<td width="10%">번호</td>
			<td width="80%">구분명</td>
			<td width="10%">삭제</td>
		</tr>
		<?php
			foreach ($list as $row)// 연관배열 list를 row를 통해 출력한다.
			{
				$no=$row->no25;// 사용자번호
		?>
				<tr id="rowno<?php echo $no?>">
					<td><?php echo $no; ?></td>
					<td><a href="#collapseExampleEdit" data-toggle="collapse" class="a_brand_edit" 
					aria-expanded="false" aria-controls="collapseExampleEdit" data-no="<?php echo $no?>"
					data-name="<?php echo $row->name25?>"><?php echo $row->name25?></td>
					<td>
						<a href="#" rowno="<?php echo $no?>" class="a_brand_del btn btn-sm productcolor1">삭제</a>
					</td>
				</tr>
		<?php
			}
		?>
	</table>
	<div class="collapse mymargin5" id="collapseExample">
		<div class="card card-body" style="padding 0px 5px 0px 5px">
			<table class="table table-sm table-bordered mymargin5 alert-primary">
				<form name="form2">
					<tr>
						<td width="10%"></td>
						<td width="80%">
							<input type="text" name="name" value="" class="form-control form-control-sm" id="name">
						</td>
						<td width="10%" style="vertical-align:middle">
							<input type="button" id="a_brand_add" value="저장" class="btn btn-sm btn-primary">
						</td>
					</tr>
				</form>
			</table>
		</div>
	</div>
		
	<div class="collapse mymargin5" id="collapseExampleEdit">
		<div class="card card-body" style="padding 0px 5px 0px 5px">
			<table class="table table-sm table-bordered mymargin5 alert-primary">
				<form name="form3">
					<tr>
						<td width="10%">
							<input type="text" name="no" value=""disabled style="text-align:center" class="form-control form-control-sm" id="edit_no">
						</td>
						<td width="80%">
							<input type="text" name="name" value="" class="form-control form-control-sm" id="edit_name">
						</td>
						<td width="10%" style="vertical-align:middle">
							<input type="button" id="a_brand_edit" value="수정" class="btn btn-sm btn-primary">
						</td>
					</tr>
				</form>
			</table>
		</div>
	</div>
	<?php echo $pagination;?>
		
