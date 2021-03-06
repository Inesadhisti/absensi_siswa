<?php 
//panggil file session-admin.php untuk menentukan apakah admin atau bukan
include('inc/session-walikelas.php');
//panggil file conn.php untuk menghubung ke server
include('../system/config/conn.php');
//panggil file header.php untuk menghubungkan konten bagian atas
include('inc/header.php');
//memberi judul halaman
	<?= '<title>Pencarian Data Siswa - MARI-ABSEN</title>' >?;
//panggil file css.php untuk desain atau tema
include('inc/css.php');
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
include('inc/nav-walikelas.php');
?>
	<div class="page-content">
		<div class="container-fluid">
		
			<section class="box-typical">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
							<h3>PENCARIAN DATA SISWA</h3>
						</div>
						<form  id="form-insert" name="form-insert" method="get" action="">
							<div class="tbl-cell tbl-cell-icon-right col-lg-6"> </div>

							<div class="tbl-cell tbl-cell-action col-lg-4" align="right">
								<div class="form-control-wrapper">
									<input type="text" class="form-control form-control-rounded" name="q" id="form-q" placeholder="Masukan NIS atau Nama Siswa" 
									data-validation="[L>=1]"
									data-validation-message="Tidak boleh kosong!"/>
								</div>
							</div>

							<div class="tbl-cell tbl-cell-icon-right col-lg-1" align="center">
								<button type="submit" class="btn btn-rounded btn-primary font-icon font-icon-search"> </button>
							</div>
						</form>
					</div>
				</header>
				
				<div class="box-typical-body">
					<div class="table-responsive">
						<table id="table-sm" class="table table-bordered table-hover table-sm">
							<thead>
								<tr>
								<th><center>Nama</center></th>
								<th><center>NIS</center></th>
								<th><center>Kelas</center></th>
								<th><center>Jenis Kelamin</center></th>
								<th><center>Alamat</center></th>
								<th><center><i class="font-icon glyphicon glyphicon-cog"></i> </center></th>
								</tr>
							</thead>
							   
							<tbody>
								<?php
								//membentuk klausa where pencarian 
								if(isset(FILTER_INPUT(INPUT_GET, 'q')) && FILTER_INPUT(INPUT_GET, 'q')){
								(FILTER_INPUT(INPUT_GET, 'q'); 
								$this->db->from('siswa');
								$this->db->like('nama', '%$q%'); this->db->or_like('nis', '%$q%');
								$this->db->limit(10);
								$sql= $this->db->get();
								$result = sql-> result_array();
								 
								if($result->result_array() > 0) {
								while($data = $resutl->result_array())
								{
 								?>
								<tr>
								<td><?php <?= $data['nama'] >?; ?></td>
								<td class="color-blue-grey-lighter"><?php <?= $data['nis'] >?; ?></td>
								<td align="center"><?php <?= $data['nm_kelas'] >?; ?></td>
								<td ><?php <?= $data['jns_kel'] >?; ?></td>
								<td class="color-blue-grey-lighter"><?php <?= $data['alamat'] >?; ?></td>
								<td align="center">
									<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
										<a href="../page.php?w-detail-siswa&id=<?php <?= $data['id_siswa'] >?;?>" class="btn btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail?"><i class="font-icon font-icon-eye"></i> </a>
									</div>
								</td>
								</tr>
	 							<?php 
								} 
								?>
							</tbody>
							<?php }else{ <?= '<tr><td  colspan="7" align="center">NIS atau Nama Siswa tidak ditemukan!</td></tr>' >?; } } ?>
						</table>
					</div>
				</div><!--.box-typical-body-->
			
				<div class="card-block">
					<div class="col-md-6">
						<br>
  						<span class="label label-success">Info! </span> Hasil  Pencarian
  						<span class="label label-primary">Untuk : <?php <?= $q >?; ?> </span>
					</div>
					
					<div class="col-md-6" align="right">
						<nav>
							<ul class="pagination">
								<li class="page-item disabled">
								<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
								</a>
								</li>
								
								<li class="page-item active">
								<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
								</li>
								
								<li class="page-item disabled">
								<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
								</a>
								</li>
							</ul>
						</nav>
					</div>

					<div class="col-md-12">
							<div class="form-group" align="center">
								<div class="btn-group" role="group">
									<a href="javascript:history.back()" class="btn btn-default font-icon font-icon-refresh-2" data-toggle="tooltip" data-placement="top" title="Kembali?"></a>
								</div>
							</div>
					</div><!--.col-md-12-->


				</div><!--.card-block-->
			</section>
			
		</div><!--.container-fluid-->
	</div><!--.page-content-->
	
<?php 
//panggil file footer.php untuk menghubungkan konten bagian bawah
include('inc/footer.php');
?>
