<!DOCTYPE html>
<html>
<head>
	<title>Soft Delete</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>

	<div class="container">

		<div class="card mt-5">
			<div class="card-header text-center">
				Recycle Bin Siswa
			</div>
			<div class="card-body">
				<a href="/siswa" class="btn btn-primary"><< Kembali</a> 
				<!-- |
				<a href="/siswa/trash" class="btn btn-sm btn-primary">Tong Sampah</a> -->

				<div class="text-right" style="float: right;">
				<a href="/siswa/kembalikan_semua" class="btn btn-success">Kembalikan Semua</a>
				<a href="/siswa/hapus_permanen_semua" class="btn btn-danger">Hapus Permanen Semua</a>
				</div>

				<br/><br>
				@if ($sukses = Session::get('sukses'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $sukses }}</strong>
                    </div>
                @endif

                @if ($hapus = Session::get('hapus'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $hapus }}</strong>
                    </div>
                @endif
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama</th>
                            <th>NIS</th>
							<th>Alamat</th>
							<th width="30%">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($siswa as $sis)
						<tr>
							<td>{{ $sis->nama }}</td>
                            <td>{{ $sis->nis }}</td>
							<td>{{ $sis->alamat }}</td>
							<td>
								<a href="/siswa/kembalikan/{{ $sis->id }}" class="btn btn-success btn-sm">Restore</a>
								<a href="/siswa/hapus_permanen/{{ $sis->id }}" class="btn btn-danger btn-sm">Hapus Permanen</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> @include('sweet::alert')
</body>
</html>