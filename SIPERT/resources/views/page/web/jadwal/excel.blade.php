<html>
<head>
	<title>Jadwal Pemeliharaan Taman</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div style="width: 800px">
		<table style="border: thin">     
			<thead>
				<tr><td style="text-align: center" colspan="6"><h5>Jadwal Pemeliharaan Taman</h5></td></tr>
				<tr>
					<th>No</th>
					<th style="width: 100px;">Tanggal</th>
					<th style="width: 150px;">Lokasi</th>
					<th style="width: 150px;">Nama Petugas</th>
					<th style="width: 200px;">Tugas dan Pekerjaan</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach ($collection as $item)
				<tr>
					<td style="text-align: center">{{ $i++ }}</td>
					<td style="text-align: center">{{$item->tanggal}}</td>
					<td style="text-align: center">{{$item->lokasi}}</td>
					<td style="text-align: center">{{$item->nama_petugas}}</td>
					<td style="text-align: center">{{$item->tugas}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>