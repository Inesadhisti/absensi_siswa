<?php 
//panggil file session-admin.php untuk menentukan apakah admin atau bukan
include('system/inc/session-admin.php');
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
//panggil file header.php untuk menghubungkan konten bagian atas
include('system/inc/header.php');
//memberi judul halaman
<?= '<title>Edit Siswa - MARI-ABSEN</title>' >?;
//panggil file css.php untuk desain atau tema
include('system/inc/css.php');
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
include('system/inc/nav-admin.php');
//mendapatkan informasi untuk mengedit data
FILTER_INPUT(INPUT_GET, 'id');
$this->db->from('siswa');
$this->db->where('id_siswa', '$id_siswa');
$query= $this->db->get();

$data = $query->result_array();
?>

	<div class="page-content">
		<div class="container-fluid">
	
			<section class="card">
				<h6 align="center" class="with-border m-t-lg"><strong>EDIT SISWA</strong></h6>	
				<div class="card-block">
					<div class="row">  
						<form id="form-insert" name="form-insert" action="page.php?process-edit-siswa" enctype="multipart/form-data" method="POST">
							<input type="hidden" name="id_siswa" value="<?php <?= $id_siswa >?; ?>" />
							<div class="col-md-6">
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-nama"><i class="font-icon font-icon-user"></i> Nama</label>
									<div class="form-control-wrapper">
										<input id="insert-nama" value="<?php <?= $data['nama'] >?; ?>" class="form-control" name="nama" placeholder="Nama Siswa" type="text"
										data-validation="[L>=1]"
										data-validation-message="Nama Siswa Tidak Boleh Kosong">
									</div>
								</div>
								
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-nis"><i class="font-icon font-icon-contacts"></i> NIS</label>
									<div class="form-control-wrapper">
										<input id="insert-nis" value="<?php <?= $data['nis'] >?; ?>" class="form-control" name="nis" placeholder="NIS Siswa" type="text"
										data-validation="[L>=1]"
										data-validation-message="NIS Siswa Tidak Boleh Kosong">
									</div>
								</div>
								
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-kelas"><i class="font-icon font-icon-learn"></i>  Kelas</label>
									<div class="form-control-wrapper">	
										<select  class="bootstrap-select" name="nm_kelas">
										<option value="<?php  <?= $data['nm_kelas'] >?; ?>"><?php  <?= $data['nm_kelas'] >?; ?></option>
										<?php 
										$this->db->from('kelas');
										$this->db->order_by('nm_kelas', 'asc');
										$query= $this->db->get();
										while($row=$query->result_array()){
										?>
										<option value="<?php  <?= $row['nm_kelas'] >?; ?>"><?php  <?= $row['nm_kelas'] >?; ?></option>
										<?php 
										}
										?>
										</select>	
									</div>
								</div>
								
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-jns_kel"><i class="font-icon font-icon-users"></i> Jenis Kelamin</label>
									<div class="form-control-wrapper">
										<select class="bootstrap-select" name="jns_kel" >
										<option value="<?php <?= $data['jns_kel'] >?; ?>"  selected/ ><?php <?= $data['jns_kel'] >?; ?></option>
										<option value="Laki-Laki">Laki-Laki </option>
										<option value="Perempuan">Perempuan </option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-alamat"><i class="font-icon font-icon-home"></i> Alamat</label>
									<div class="form-control-wrapper">
										<input id="insert-alamat" value="<?php <?= $data['alamat'] >?; ?>" class="form-control" name="alamat" placeholder="Alamat Siswa" type="text"
										data-validation="[L>=1]"
										data-validation-message="Alamat Siswa Tidak Boleh Kosong">
									</div>
								</div>
							</div><!--.col-md-6-->
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-tmpt_lahir"><i class="font-icon font-icon-pin-2"></i> Tempat Lahir</label>
									<div class="form-control-wrapper">
										<input id="insert-tmpt_lahir" value="<?php <?= $data['tmpt_lahir'] >?; ?>" class="form-control" name="tmpt_lahir"  placeholder="Tempat Lahir Siswa" type="text"
										data-validation="[L>=1]"
										data-validation-message="Tempat Lahir Siswa Tidak Boleh Kosong">
									</div>
								</div>
								
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-tgl_lahir"><i class="font-icon font-icon-calend"></i> Tanggal Lahir</label>
									<div class="form-control-wrapper">
										<input class="form-control" id="daterange3" type="text" name="tgl_lahir" value="<?php <?= $data['tgl_lahir'] >?; ?>"
										data-validation="[L>=1]"
										data-validation-message="Tanggal Lahir Siswa Tidak Boleh Kosong">
									</div>
								</div>

								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-tmpt_lahir"><i class="font-icon font-icon-user"></i> Nama Orang Tua</label>
									<div class="form-control-wrapper">
										<input id="insert-nama_ortu" value="<?php <?= $data['nama_ortu'] >=; ?>" class="form-control" name="nama_ortu"  placeholder="Nama Orang Tua Siswa" type="text"
										data-validation="[L>=1]"
										data-validation-message="Nama Orang Tua Siswa Tidak Boleh Kosong">
									</div>
								</div>
								
							</div><!--.col-md-6-->
							
							<div class="col-md-12 m-t-lg">
								<div class="form-group" align="center">
									<div class="btn-group" role="group">
										<button type="submit" class="btn btn-default font-icon font-icon-pencil" data-toggle="tooltip" data-placement="top" title="Edit?"></button>
										<a href="page.php?delete-siswa&id=<?php <?= $data['id_siswa'] >? ;?>" onClick="return confirm('Yakin akan menghapus data ini?');" class="btn btn-default font-icon font-icon-trash" data-toggle="tooltip" data-placement="top" title="Hapus?"></a>
										<a href="javascript:history.back()" class="btn btn-default font-icon font-icon-refresh-2" data-toggle="tooltip" data-placement="top" title="Kembali?"></a>
									</div>
								</div>
							</div><!--.col-md-12-->
						</form>
					</div><!--.row-->
				</div><!--.card-block-->
			</section>
		
		</div><!--.container-fluid-->
	</div><!--.page-content-->	

<?php 
//panggil file footer.php untuk menghubungkan konten bagian bawah
include('system/inc/footer.php');
?>
