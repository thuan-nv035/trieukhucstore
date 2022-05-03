<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-user"></i> Danh sách khách hàng</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary" href="admin/customer/recyclebin" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thùng rác <!-- (<?php $total=$this->Mcustomer->customer_trash_count(); echo $total; ?>) -->
			</a>
		</div>
	</section>
	<section class="content">
		
		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
					<div class="row">
						<div class="input-group col-md-3" style="margin-left: 950px; display: flex;">
			 
					 	<form action="<?php echo base_url() ?>admin/customer/search" method="post" accept-charset="utf-8">
						  		<div style="display: flex;">
						  			<input type="text" class="form-control" placeholder="Nhập tên khách hàng" aria-label="Recipient's username" aria-describedby="basic-addon2" name="name" />
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
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th>Tên khách hàng</th>
											<th>Email</th>
											<th>Điện thoại</th>
											<th class="text-center" colspan="2">Thao tác</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($list as $row):?>
										<tr>
											<td class="text-center"><?php echo $row['id'] ?></td>
											<td><?php echo $row['fullname'] ?></td>
											<td><?php 
											if($row['email']){
												echo $row['email'];
											}else{
												echo 'Khách vãng lai';
											}
											 ?></td>
											<td><?php echo $row['phone'] ?></td>
											<td class="text-center">
												<a class="btn btn-info" href="<?php echo base_url() ?>admin/customer/update/<?php echo $row['id'] ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span>Xem
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-info" style="background: orange" href="<?php echo base_url() ?>admin/customer/trash/<?php echo $row['id'] ?>" onclick="return confirm('Xác nhận xóa thông tin khách hàng này ?')" role = "button">
													<span class="glyphicon glyphicon-trash"></span>Xóa
												</a>
											</td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">

									<ul class="pagination">
										<?php echo $strphantrang ?>
									</ul>
								</div>
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
</div>