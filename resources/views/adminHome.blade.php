@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card bg-info text-white" style="margin-bottom: 20px ">
                <div class="card-body">
                    You are a Admin
                </div>
            </div>

            <div class="card">

                <div class="card-header bg-primary text-white" style="padding: 20px 10px;">
                    Total Data Siswa  :
                    {{ DB::table('siswas')->count() }}
                    <div>
                    </div>
                </div>

                <div style="width: 800px;margin: 0px auto;">
                    <canvas id="myChart"></canvas>
                </div>

                <div class="card-body">

                </div>

                @php
              use App\Models\Siswa;
              use App\Models\Guru;

                $jumlah_laki = Siswa::where('jk', 'perempuan') ->count();
                $jumlah_perempuan= Siswa::where('jk', 'Laki-laki')->count();
                @endphp

            </div>
        </div>
    </div>
</div>
<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ["Perempuan", "Laki-Laki"],
			datasets: [{
				label: '',
				data: [{{$jumlah_laki}},{{$jumlah_perempuan}}
				],
				backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
				],
				borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
</script>
@endsection
