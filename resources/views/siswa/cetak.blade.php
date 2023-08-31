<center><h2>Cetak Data Laporan Siswa</h2></center>
<div class="table-responsive">
    <table border="1" id="siswa">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
            @foreach ($siswa as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->kelas}}</td>
                <td>{{$data->jk}}</td>
                <td>{{$data->jurusan}}</td>
                <td>{{$data->alamat}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
