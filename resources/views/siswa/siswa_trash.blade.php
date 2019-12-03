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

				<a href="/siswa"><< Kembali</a> 
                <br><br>
				<!-- |
				<a href="/siswa/trash" class="btn btn-sm btn-primary">Tong Sampah</a> -->

				<a href="/siswa/kembalikan_semua">Kembalikan Semua</a>
				|
				<a href="/siswa/hapus_permanen_semua">Hapus Permanen Semua</a>
				<br/>
				<br/>

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
	
</body>
</html>