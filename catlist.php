﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/catgory.php' ?>
<?php 
$cat= new catgory();
if (isset($_GET['delid'])){
    $id = $_GET['delid'];
    $delete = $cat->delete_category($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách con giống</h2>
                <div class="block">
					<?php
					if(isset($delete))
					echo $delete;
					?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Tên con giống</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_cat=$cat->showcategory();
						if($show_cat)
						{
							$i=0;
							while($result = $show_cat->fetch_assoc())
							{
								$i++;
							
						?>
						
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['catName']?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catID'];?>">Edit</a> || <a onclick="return confirm('Bạn có muốn xóa không ??')" href="?delid=<?php echo $result['catID']?>">Delete</a></td>
						</tr>
					<?php	}
					}
					?>

						
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