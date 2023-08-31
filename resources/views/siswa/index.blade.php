@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header" >
                    Data siswa
                    <a href="{{route('siswa.create')}}" class="btn btn-sm btn-outline-primary float-right" style="float: right">Tambah Data</a>

                    <a href="{{ route('siswa.cetak') }}"
                    class="btn btn-sm btn-outline-primary float-right mx-3 font-semibold font-display focus:outline-none hover:bg-indigo-600 bg-indigo-500 text-gray-100 rounded-full w-1/6 "
                    target="_blank" style="float: right"><i class="bi bi-file-earmark-pdf-fill"></i></a>

                </div>
                <div class="container-fluid d-grid" style="heigth: 30px">
                    <form action="{{ route('siswa.cari') }}" method="GET" style="position: absolute; right: 10px;"
                        class="mt-3 mx-auto max-w-xl row rounded-full bg-white border  flex focus-within:border-gray-300 border-3 ">
                        <input type="text" name="cari" placeholder="Cari siswa" value="{{ old('cari') }}" style="width: 240px"
                            class="bg-transparent col form-control w-full focus:outline-none border font-semibold  focus:ring-0 px-0 py-0">
                        <input type="submit" value="Search"
                            class="btn btn-primary col-4">
                    </form>


                <div class="car-body" style="padding-top: 70px">
                    <div class="table-responsive">
                        <table class="table" id="siswa">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama siswa</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
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
                                    <td>
                                        <form action="{{route('siswa.destroy',$data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('siswa.edit',$data->id)}}" class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></a>
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
