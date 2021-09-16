<!--table-->
<?php 
	$parent = 0;
	if(isset($product[0]['idproduct'])){
	$parent = $product[0]['idproduct'];
} ?>
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 
	<thead>

			<tr>
				<th>Thứ tự</th>
				<th>Độ khó</th>
				<th>Tiêu đề</th>
				<th>Chuyên mục</th>
				<th>ID</th>
				<th>Ngày</th>
				<th>Người đăng</th>
				<th>Hình ảnh</th>
				<th>-</th>
				<th>-</th>
			 </tr>

		 </thead>

		 <tfoot>

		  <tr>
				<th>Thứ tự</th>
				<th>Độ khó</th>
				<th>Tiêu đề</th>
				<th>Chuyên mục</th>
				<th>ID</th>
				<th>Ngày</th>
				<th>Người đăng</th>
				<th>Hình ảnh</th>
				<th>-</th>
				<th>-</th>
			 </tr>

		</tfoot>

  <tbody>
		  @foreach($rs_quiz as $row)
		  <tr>
			<td>{{ $row['orders'] }}</td>
			<td>{{ $row['difflevel'] }}</td>
			<td class="title">{{ $row['namepro'] }}</td>
			<td>{{ $row['listcat'] }}</td>
			<td>{{ $row['idproduct'] }}</td>
			<td>{{ $row['created_at'] }}</td>
			<td>{{ $row['author'] }}</td>
			<td><img class="thumb" src="{{ asset($row['urlfile']) }}"></td>
			<td class="btn-control-action">
			  <a href="{{ action('Admin\PostsController@edit',[$row['idproduct'],'idparent'=>$parent]) }}" class="info-number"><i class="fa fa-pencil-square"></i></a>
			</td>
			<td class="btn-control-action">
			  <a href="{{ action('Admin\PostsController@edit',[$row['idproduct'],'idparent'=>$parent]) }}" class="info-number"><i class="fa fa-pencil-square"></i></a>
			</td>
		  </tr>
		  @endforeach  
		</tbody>

  </table>
<!--end table-->