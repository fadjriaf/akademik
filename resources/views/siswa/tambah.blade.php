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
				Tambah Siswa
			</div>
			<div class="card-body">
				<form action="/siswa/store" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" name="nis">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat"></textarea>
                </div>
                    <center>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </center>
                </form>
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
			</div>
            <div class="card-footer">
            <a class="btn btn-primary" href="/siswa"><< Kembali</a> 
            </div>
		</div>
	</div>
</body>
</html>