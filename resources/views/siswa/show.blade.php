<!DOCTYPE html>
<html>
<head>
	<title>Tambah Siswa</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>

	<div class="container">

		<div class="card mt-5">
			<div class="card-header text-center">
				Show Siswa {{ $siswa->nama }}
			</div>
			<div class="card-body">
                <p>Nama : {{ $siswa->nama }}</p>
                <p>NIS : {{ $siswa->nis }}</p>
                <p>Alamat : {{ $siswa->alamat }}</p>
			</div>
            <div class="card-footer">
            <a class="btn btn-primary" href="/siswa"><< Kembali</a> 
            </div>
		</div>
	</div>
</body>
</html>