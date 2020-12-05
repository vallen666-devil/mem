<!--/ Services Star /-->
<section class="section-services section-t8">
	<div class="container">
		<?=
			$this->session->flashdata('pesan');
		?>
		<h1 class="h3 mb-4 text-gray-800"> <?= $title; ?></h1>
		<div class="row">
			<div class="col-lg-4">
				<!-- Page Heading -->
				<div class="card mb-3" style="max-width: 580px;">
					<div class="row no-gutters">
						<div class="col-md-4"></div>
						<div class="col-md-4"><br>
							<img src="<?= base_url('assets/img/') . $user['gambar']; ?>" class="card-img">
						</div>
						<div class="col-md-4"></div>
					</div>
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<center>
									<h5 class="card-title"><?= $user['name']; ?></h5>
									<a href="<?= base_url('user/edit_profile'); ?>"><button type=" button" class="btn btn-success">Edit Profile</button></a>
									<a href="<?= base_url('user/edit_profile'); ?>"><button type="button" class="btn btn-danger">Ganti Password</button></a>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<!-- Page Heading -->
				<div class="card mb-3" style="max-width: 580px;">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<table class="table bg-white">
									<thead>
										<tr>
											<th scope="col">Nama</th>
											<th scope="col"><?= $user['name']; ?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">Nik</th>
											<td><?= $user['nik']; ?></td>
										</tr>
										<tr>
											<th scope="row">Email</th>
											<td><?= $user['email']; ?></td>
										</tr>
										<tr>
											<th scope="row">Bergabung Sejak</th>
											<td><?= date('d F Y', $user['tanggal_dibuat']) ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ Services End /-->