<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>
</head>
<body>
<h3>Tambah Siswa</h3>
 
 <a href="/siswa"> Kembali</a>
 
 <br/>
 <br/>

 <form action="/siswa/store" method="post">
     {{ csrf_field() }}
     Nama <br>
     <input type="text" name="nama"> <br/>
     NIS <br>
     <input type="text" name="nis"> <br/>
     Alamat <br>
     <textarea name="alamat"></textarea> <br/>
     <input type="submit" value="Submit">
 </form>

 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>