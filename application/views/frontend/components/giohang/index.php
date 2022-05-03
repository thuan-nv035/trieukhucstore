<div class="row content-cart">
	<div class="container">
		<?php if($this->session->userdata('cart')):
			$cart = $this->session->userdata('cart');
			?>
			<form action="" method="post" id="cartformpage">
				<div class="cart-index">
				<h2 style="color: #006633;">Chi tiết giỏ hàng</h2>
					<div class="tbody text-center">
						<div class="col-xs-12 col-12 col-sm-12 col-md-8 col-lg-8">

							<table class="table table-list-product">

								<thead>
									<tr style="background: #f3f3f3;">
										<th>Hình ảnh</th>
										<th>Tên sản phẩm</th>
										<th class="text-center">Đơn giá</th>
										<th class="text-center">Số lượng</th>
										<th class="text-center">Thành tiền</th>
										<th class="text-center">Xóa</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($cart as $key => $value) :
										$row = $this->Mproduct->product_detail_id($key);
										?>
										<tr>
											<td class="img-product-cart">
												<a href="<?php echo $row['alias'] ?>">
													<img src="public/images/products/<?php echo $row['avatar'] ?>" alt="<?php echo $row['name'] ?>">
												</a>
											</td>
											<td>
												<a id="productName" href="<?php echo $row['alias'] ?>" class="pull-left"><?php echo $row['name'] ?></a>
											</td>
											<td>
												<span class="amount">
													<?php 
													if($row['price_sale'] > 0){
														echo (number_format($row['price_sale'])).' VNĐ';
													}else{
														echo (number_format($row['price'])).' VNĐ';
													}
													?>
												</span>
											</td>
											<td>
												<input type="text" id="productId" name="productId" value="<?php echo $row['id']; ?>" hidden>
												<div class="quantity clearfix">
													<input name="quantity" id="<?php echo $row['id'] ?>" class="quantity form-control" type="number" value="<?php echo $value ?>" min="1" max="1000" onchange="onChangeSL(<?php echo $row['id'] ?>)">
												</div>
											</td>
											<td>
												<span class="amount">
													<?php 
													if($row['price_sale'] > 0){
														echo (number_format($row['price_sale']*$value)).' VNĐ';
													}else{
														echo (number_format($row['price'] * $value)).' VNĐ';
													}
													?>
												</span>
											</td>
											<td>
												<a class="remove" title="Xóa" onclick="onRemoveProduct(<?php echo $row['id']; ?>)"><i class="fas fa-trash-alt"></i></a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<button class="btn" onclick="window.location.href='san-pham'" style="background: #006633;"> <a href="<?php echo base_url() ?>san-pham" style="color:white;">Mua hàng tiếp nào!</a></button>
						</div>
						<?php $total = 0; ?>
						<?php foreach ($cart as $key => $value) : 
							$row = $this->Mproduct->product_detail_id($key);?>
							<?php
							if($row['price_sale'] > 0)
								$sum = $row['price_sale'] * $value;
							else
								$sum = $row['price'] * $value;
							$total += $sum;
							?>	
						<?php endforeach; ?>
						<div class="col-xs-12 col-sm-12 col-md-4">
							<div class="clearfix btn-submit" style="padding-left: 10px;margin-top: 20px;">
								<table class="table total-price" style="border: 1px solid #ececec;">
									<tbody>
										<tr style="background: #f4f4f4;">
											<td>Tổng tiền</td>
											<td><strong><?php echo (number_format($total)).' VNĐ'; ?></strong></td>
										</tr>
										<tr>
											<td colspan="2"><h5>Mua hàng trực tiếp tại cửa hàng giảm giá 5%</h5></td>
										</tr>
										<tr>
											<td colspan="2"><h5>Nếu đặt online Bạn hãy đồng ý với điều khoản sử dụng & hướng dẫn hoàn trả.</h5></td>
										</tr>
										 
										<tr>

											<td colspan="2">
												<button id="dathang" style="background: #006633;" type="button" onclick="window.location.href='info-order'" class="btn-next-checkout">Đặt hàng</button>
											</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
					</div>

				</div>

			</form>
			<?php else: ?>
				<div class="cart-info">
					Chưa có sản phẩm nào trong giỏ hàng !
					<br>	
					<button class="btn" onclick="window.location.href='san-pham'" style="background: #006633 !important;"> Mua hàng tiếp nào!</button>
				</div>

			<?php endif;?>
		</div>
	</div>
	<script>
		function onChangeSL(id){
			var sl = document.getElementById(id).value;
			var strurl="<?php echo base_url();?>"+'/sanpham/update';
			jQuery.ajax({
				url: strurl,
				type: 'POST',
				dataType: 'json',
				data: {id: id, sl:sl},
				success: function(data) {
					document.location.reload(true);
				}
			});
		}
		function onRemoveProduct(id){
			var strurl="<?php echo base_url();?>"+'/sanpham/remove';
			jQuery.ajax({
				url: strurl,
				type: 'POST',
				dataType: 'json',
				data: {id: id},
				success: function(data) {
					document.location.reload(true);
					alert('Xóa sản phẩm thành công !!');
				}
			});
		}

         getById();
        function getById(){
        var productName = $("#productName").text();
        var productId = parseInt($("#productId").val());
        var url = `https://newservice-app.herokuapp.com/nhom7/product/${productId}`;
        var numberJustBuy = parseInt($("input[name=quantity]").val());
        setTimeout(function(){
        	console.log("Số mua = ",numberJustBuy);
        },3000);
        var requestOptions = {
         method: 'GET',
         redirect: 'follow'
        };
        fetch(url, requestOptions)
          .then(response => response.json())
          .then(result => {
             if(result.number-result.numberBuy - numberJustBuy  < 0 ){
             	alert("Sản phẩm "+productName +" số lượng mua là "+numberJustBuy+" vượt quá số lượng trong kho. Trong kho còn "+(result.number - result.numberBuy));
             	$('#dathang').prop('disabled', true)
             }else{
             	$('#dathang').prop('disabled', false)
             }
             console.log(result);
          })
          .catch(error => console.log('error', error));
      }
	</script>