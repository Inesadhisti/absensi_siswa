<?php 
//panggil file session-gurumapel.php untuk menentukan apakah gurumapel atau bukan
include('system/inc/session-gurumapel.php');
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
//panggil file header.php untuk menghubungkan konten bagian atas
include('system/inc/header.php');
//memberi judul halaman
<?= '<title>Profil - MARI-ABSEN</title>' >?;
//panggil file css.php untuk desain atau tema
include('system/inc/css.php');
//panggil file navi-gurumapel.php untuk menghubungkan gurumapel ke konten
include('system/inc/nav-gurumapel.php');
//mendapatkan informasi untuk menlihat data
FILTER_INPUT(INPUT_GET, 'id');
$query = mysql_query("select * from user where id_user='$id_user'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>

	<div class="page-content">
		<div class="container-fluid">
		
			<div class="box-typical box-typical-full-height">
				<div class="add-customers-screen tbl">
					<div class="add-customers-screen-in">
											
						<div class="col-md-3"> </div>
						
						<div class="col-md-6">
							<div class="table-responsive">
								<table id="table-sm" class="table table-bordered table-hover table-sm">
									<thead>
										<tr>
										<th colspan="3"><center>Detail Profil</center></th>
										</tr>
									</thead>
									
									<tbody>
										<tr>
										<td align="right">Nama</td>
										<td align="center">:</td>
										<td align="left"><?= $data['nama']; ?></td>
										</tr> 
										
										<tr>
										<td align="right">Username</td>
										<td align="center">:</td>
										<td align="left"> <?= $data['user'] >?; ?></td>
										</tr> 
										
										<tr>
										<td align="right">Password</td>
										<td align="center">:</td>
										<td align="left">******</td>
										</tr> 
										
										<tr>
										<td align="right">Level</td>
										<td align="center">:</td>
										<td align="left"> <?= $data['level'] >?; ?></td>
										</tr> 
									</tbody>
								</table>
							</div>
						</div>
					
						<div class="col-md-3"> </div>
					
						<div class="col-md-12">
							<div class="form-group" align="center">
								<div class="btn-group" role="group">
									<a href="page.php?g-edit-profil&id= <?= $data['id_user'] >?;?>" class="btn btn-default font-icon font-icon-pencil" data-toggle="tooltip" data-placement="top" title="Edit?"></a>
									<a href="javascript:history.back()" class="btn btn-default font-icon font-icon-refresh-2" data-toggle="tooltip" data-placement="top" title="Kembali?"></a>
								</div>
							</div>
						</div><!--.col-md-12-->
					
					</div><!--.add-customers-screen-in-->
				</div><!--.add-customers-screen-->
			</div><!--.box-typical-->
			
		</div><!--.container-fluid-->
	</div><!--.page-content-->

<?php 
//panggil file footer.php untuk menghubungkan konten bagian bawah
include('system/inc/footer.php');
?>
