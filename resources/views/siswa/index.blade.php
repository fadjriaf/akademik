<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Siswa</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    
</head>
<body>
    <style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin: 3px;
		}

        .pagination {
            float: right;
        }
	</style>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Data Siswa</h3>
                <br>

                @if ($errors->has('file'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif

                @if ($sukses = Session::get('sukses'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $sukses }}</strong>
                    </div>
                @endif

                <div style="float: right;">
                <form action="/siswa/cari" method="GET" class="form-inline">
					<input class="form-control" style="margin-right: 5px;"  type="text" name="cari" placeholder="Search Siswa" value="{{ old('cari') }}">
					<input class="btn btn-info" type="submit" value="Search">
				</form>
                </div>
                <a href="/siswa/trash" class="btn btn-secondary" style="float: right; margin-right: 5px;">Trash</a>

                <a href="/siswa/tambah" class="btn btn-primary" style="float: left;">+ Siswa Baru</a>
                <a href="/siswa/cetak_pdf" class="btn btn-danger" target="_blank" style="float: left; margin-left:5px;">Export PDF</a>
                <a href="/siswa/export_excel" target="_blank" class="btn btn-success" style="float: left; margin-left:5px;">Export Excel</a>


                <button type="button" class="btn btn-success" style="float: left; margin-left: 5px;" data-toggle="modal" data-target="#exampleModal">
			        Import Excel
		        </button>

                <!-- Import Excel -->
                <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">
        
                                    {{ csrf_field() }}
        
                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <br><br>
                <table class="table table-bordered">
					<tr>
						<th>Nama</th>
						<th>NIS</th>
						<th>Alamat</th>
						<th>Action</th>
					</tr>
					@foreach($siswa as $sis)
					<tr>    
						<td>{{ $sis->nama }}</td>
						<td>{{ $sis->nis }}</td>
						<td>{{ $sis->alamat }}</td>
						<td width="20%">
                            <a class="btn btn-secondary btn-sm" href="/siswa/show/{{ $sis->id }}">Show</a>
							<a class="btn btn-warning btn-sm" href="/siswa/edit/{{ $sis->id }}">Edit</a>
							<a class="btn btn-danger btn-sm" href="/siswa/hapus/{{ $sis->id }}">Hapus</a>
						</td>
					</tr>
					@endforeach
				</table>

                <br/>
                <div style="float: left;">
				Halaman : {{ $siswa->currentPage() }} <br/>
				Jumlah Data : {{ $siswa->total() }}
                </div>

				{{ $siswa->links() }}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
</body>
</html>