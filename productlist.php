<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/catgory.php';?>
<?php include '../class/brand.php' ?>
<?php include '../class/product.php' ?>
<?php include_once '../helper/format.php'?>
<?php 
$pd = new product();
$fm = new Format();
if (isset($_GET['delid'])){
    $id = $_GET['delid'];
    $delete = $pd->delete_product($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product Image</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php

$pdlist=$pd->showproduct();
if($pdlist)
{
	$i=0;
	while($result = $pdlist->fetch_assoc())
	{$i++;
?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['price'] ?></td>
					<td><img src="upload/<?php echo $result['image'] ?>" width="80"></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><?php echo $fm->textShorten($result['productdesc'],20)?></td>
					<td><?php if($result['type']==1){
						echo 'Feathered';
					}else echo "Non-Feathered";
					 ?></td>
					
					<td><a href="productedit.php?productid=<?php echo $result['productID'] ?>">Edit</a> || <a onclick="return confirm('Bạn có muốn xóa không ??')" href="?delid=<?php echo $result['productID']?>">Delete</a></td>
				</tr>
				<?php 	}
} ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
