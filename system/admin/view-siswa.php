<?php 
//panggil file session-admin.php untuk menentukan apakah admin atau bukan
include('system/inc/session-admin.php');
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
//panggil file header.php untuk menghubungkan konten bagian atas
include('system/inc/header.php');
//memberi judul halaman
<?= '<title>Lihat User - MARI-ABSEN</title>' >?;
//panggil file css.php untuk desain atau tema
include('system/inc/css.php');
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
include('system/inc/nav-admin.php');
//mendapatkan informasi untuk menlihat data
$id_siswa = (FILTER_INPUT(INPUT_GET, 'id'));
$this->db->from('siswa');
$this->db->where('id_siswa', '$id_siswa', 'asc');
$query= $this->db->get();
$data = $query->result_array();
?>

	<div class="page-content">
		<div class="container-fluid">
		
			<div class="box-typical box-typical-full-height">
				<div class="add-customers-screen tbl">
					<div class="add-customers-screen-in">
						<div class="col-md-12">
							<br>
				
							<br>				
						</div><!--.col-md-12-->
					
						<div class="col-md-3"> </div>
						
						<div class="col-md-6">
							<div class="table-responsive">
								<table id="table-sm" class="table table-bordered table-hover table-sm">
									<thead>
										<tr>
										<th colspan="3"><center>Detail Siswa</center></th>
										</tr>
									</thead>
									
									<tbody>
										<tr>
										<td align="right">Nama</td>
										<td align="center">:</td>
										<td align="left"><?php <?= $data['nama'] >?; ?></td>
										</tr> 
										
										<tr>
										<td align="right">NIS</td>
										<td align="center">:</td>
										<td align="left"><?php <?= $data['nis'] >?; ?></td>
										</tr> 
										
										<tr>
										<td align="right">Kelas</td>
										<td align="center">:</td>
										<td align="left"><?php <?= $data['nm_kelas'] >?; ?></td>
										</tr> 
										
										<tr>
										<td align="right">Jenis Kelamin</td>
										<td align="center">:</td>
										<td align="left"><?php <?= $data['jns_kel'] >?; ?></td>
										</tr> 
										
										<tr>
										<td align="right">Tanggal Lahir</td>
										<td align="center">:</td>
										<td align="left"><?php <?= $data['tgl_lahir'] >?; ?></td>
										</tr> 
										
										<tr>
										<td align="right">Tempat Lahir</td>
										<td align="center">:</td>
										<td align="left"><?php <?= $data['tmpt_lahir'] >?; ?></td>
										</tr> 
										
										<tr>
										<td align="right">Alamat</td>
										<td align="center">:</td>
										<td align="left"><?php <?= $data['alamat'] >?; ?></td>
										</tr>

										<tr>
										<td align="right">Nama Orang Tua</td>
										<td align="center">:</td>
										<td align="left"><?php <?= $data['nama_ortu'] >?; ?></td>
										</tr> 
									</tbody>
								</table>
							</div>
						</div>
					
						<div class="col-md-3"> </div>
					
						<div class="col-md-12">
							<div class="form-group" align="center">
								<div class="btn-group" role="group">
									<a href="page.php?edit-siswa&id=<?php <?= $data['id_siswa'] >?;?>" class="btn btn-default font-icon font-icon-pencil" data-toggle="tooltip" data-placement="top" title="Edit?"></a>
									<a href="page.php?delete-siswa&id=<?php <?= $data['id_siswa'] >?;?>" onClick="return confirm('Yakin akan menghapus data ini?');" class="btn btn-default font-icon font-icon-trash" data-toggle="tooltip" data-placement="top" title="Hapus?"></a>
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
