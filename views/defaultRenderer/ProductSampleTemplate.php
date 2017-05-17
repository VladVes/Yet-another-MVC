<div class="product-sample">
	<h3>products</h3>
	<?=$welcome?>
	<div class="sample">
		<table>
			<tr>
				<td>ID</td>
				<td>BRAND</td>
				<td>TYPE</td>
				<td>QUANTITY</td>
				<td>PRICE</td>
				<td>DISCOUNT</td>
				<td>CATRGORY</td>
				<td>DESCRIPTION</td>
			</tr>
			<tr>
				<td><?=$sample['id']?></td>
				<td><?=$sample['product_brand']?></td>
				<td><?=$sample['product_type']?></td>
				<td><?=$sample['product_quantity']?></td>
				<td><?=$sample['product_price']?></td>
				<td><?=$sample['product_discount']?></td>
				<td><?=$sample['product_category']?></td>
				<td><?=$sample['product_description']?></td>
			</tr>
		</table>

		
	</div>
</div>
