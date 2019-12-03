<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Siswa</title>
</head>
<body>
<h3>Edit Siswa</h3>
 
 <a href="/siswa"> Kembali</a>
 
 <br/>
 <br/>

 @foreach($siswa as $sis)
 <form action="/siswa/update" method="post">
     {{ csrf_field() }}
     <input type="hidden" name="id" value="{{ $sis->id }}"> <br/>
     Nama <br>
     <input type="text" required="required" name="nama" value="{{ $sis->nama }}"> <br/>
     NIS <br>
     <input type="text" required="required" name="nis" value="{{ $sis->nis }}"> <br/>
     Alamat <br>
     <textarea required="required" name="alamat">{{ $sis->alamat }}</textarea> <br/>
     <input type="submit" value="Update">
 </form>
 @endforeach
</body>
</html>