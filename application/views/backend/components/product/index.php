<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon"></i>Danh sách sản phẩm</h1>
		<div class="breadcrumb">
			
			<?php
			if($user['role']==1){
				echo '<a class="btn btn-warning" href="'.base_url().'admin/product/insert" role="button">
				<span class=""></span> Thêm sản phẩm
				</a>';
			}
			?>
			
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		
		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
					<div class="row">
						<div class="input-group col-md-3" style="margin-left: 950px; display: flex;">
			 
					 	<form action="<?php echo base_url() ?>admin/product/searchProduct" method="post" accept-charset="utf-8">
						  		<div style="display: flex;">
						  			<input type="text" class="form-control" placeholder="Nhập tên sản phẩm cần tìm" aria-label="Recipient's username" aria-describedby="basic-addon2" name="nameproduct" />
									<input type="submit" value="Tìm kiếm" class="btn btn-primary" />
						  		</div>
						  </form>
			</div>
					</div>
					<div class="box-header with-border">
						<!-- /.box-header -->
						<div class="box-body">
							<?php  if($this->session->flashdata('success')):?>
								<div class="row">
									<div class="alert alert-success">
										<?php echo $this->session->flashdata('success'); ?>
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									</div>
								</div>
							<?php  endif;?>
							<?php  if($this->session->flashdata('error')):?>
								<div class="row">
									<div class="alert alert-error">
										<?php echo $this->session->flashdata('error'); ?>
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									</div>
								</div>
							<?php  endif;?>
							<div class="row" style='padding:0px; margin:0px;'>
								<!--ND-->
								<div class="table-responsive" >
									<table class="table table-hover table-bordered">
										<thead>
											<tr>
												<!-- <th class="text-center" style="width:20px">ID</th> -->
												<th>Ảnh</th>
												<th>Tên sản phẩm</th>
												<th>Số lượng trong kho</th>
												<th>Loại</th>
												<!-- <th class="text-center">Trạng thái</th> -->
												<!-- <th class="text-center">Nhập hàng</th> -->
												<th class="text-center" colspan="4">Hành động</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($list as $row):?>
												<tr>
													<!-- <td class="text-center"><?php echo $row['id'] ?></td> -->
													<td style="width:70px">
														<img src="public/images/products/<?php echo $row['avatar'] ?>" alt="<?php echo $row['name'] ?>" class="img-responsive">
													</td>
													<td style="font-size: 16px;"><?php echo $row['name'] ?></td>
													<td class="text-center"> <?php echo $row['number'] - $row['number_buy'] ?></td>
													<?php 
													$namecat = $this->Mcategory->category_name($row['catid']);
													?>
													<td><?php echo $namecat ?></td>
														<!-- <td class="text-center">
														<a href="<?php echo base_url() ?>admin/product/status/<?php echo $row['id'] ?>">
															<?php if($row['status']==1):?>
																<span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
																<?php else: ?>
																	<span class="glyphicon glyphicon-remove-circle maudo"></span>
																<?php endif; ?>
															</a>
														</td> -->
														<?php  
														$quyen='';
														if($user['role']==1){
															$quyen.='
															<td class="text-center"><a class="btn btn-info" href="admin/product/import/'.$row['id'].'" role = "button">
															<span class="glyphicon"></span>Nhập kho
															</a>
															</td>
															';

														}else{
															$quyen.='
															<td class="text-center">
															<p class="fa fa-lock" style="color:red"> Không đủ quyền</p>
															</td>';
														}
														echo $quyen;
														?>
														<?php
														if($user['role']==1){
															echo '<td class="text-center">
															<a class="btn btn-primary" href="admin/product/update/'.$row['id'].'" role = "button"> Sửa
															</a>
															</td>';
														}
														?>
														
														<td class="text-center">
															<a class="btn btn-info" style="background: green" href="<?php echo base_url() ?>admin/product/trash/<?php echo $row['id'] ?>" onclick="return confirm('Xác nhận xóa sản phẩm này ?')" role = "button">Xóa
															</a>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
									<div class="row">
										<!-- <div class="col-md-12 text-center">
											<ul class="pagination">
												<?php echo $strphantrang ?>
											</ul>
										</div> -->
									</div>
									<!-- /.ND -->
								</div>
							</div><!-- ./box-body -->
						</div><!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div><!-- /.content-wrapper -->