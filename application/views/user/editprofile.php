<!--/ Services Star /-->
<section class="section-services section-t8">
	<div class="container">
		<?=$this->session->flashdata('pesan');?>
		<h1 class="h3 mb-4 text-gray-800"> <?= $title ;?></h1>
		<div class="row">
			<div class="col-lg-6">
				<!-- Page Heading -->
				<div class="card mb-3" style="max-width: 580px;">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<form action="<?= base_url('user/edit_profile');?>" method="POST" enctype=multipart/form-data>
									<div class="form-group row">
										<label for="email" class="col-sm-3 col-form-label">Email</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="email" name="email" readonly=""
												value="<?= $user['email']?>"> </div>
									</div>
									<div class="form-group row">
										<label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
										<div class="col-sm-9">
											<input type="name" class="form-control" id="name" name="name"
												value="<?= $user['name']?>">
											<?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-3">Gambar</div>
										<div class="col-sm-9">
											<div class="row">
												<div class="col-sm-3">
													<img src="<?= base_url('asset/img/profile/').$user['gambar'];?>" class="img-thumbnail">
												</div>
												<div class="col-sm-9">
													<div class="custom-file">
														<input type="file" id="gambar" name="gambar">
														<!-- <label class="custom-file-label" for="gambar">Choose file</label> -->
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="from-group row justify-content-end">
										<div class="col-sm-9">
											<button type="submit" class="btn btn-success">Edit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card mb-3" style="max-width: 580px;">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<form action="<?= base_url('user/ganti_password');?>" method="POST">
									<div class="form-group">
										<label for="passwordlama">Password Lama </label> <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="masukkan password lama">
										<?= form_error('password_lama','<small class="text-danger pl-3">','</small>'); ?>
									</div>
									<div class="form-group">
										<label for="passwordbaru">Password Baru</label> <input type="password" class="form-control" id="password_baru1" name="password_baru1" placeholder="masukkan password baru">
										<?= form_error('password_baru1','<small class="text-danger pl-3">','</small>'); ?>
									</div>
									<div class="form-group">
										<label for="passwordbaru">Ulangi Password</label> <input type="password" class="form-control" id="password_baru2" name="password_baru2" placeholder="ulangi password baru">
										<?= form_error('password_baru2','<small class="text-danger pl-3">','</small>'); ?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">Ganti Password</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ Services End /-->
