@extends('app')

@section('content')
	<a href="{{ route('claims.index') }}" class="btn btn-dark mb-3">Kembali</a>
	<div class="card mb-3">
		<div class="card-header">
			Detail Data Klaim - {{ $claim->nomor_polis . ' (' . $claim->nama_tertanggung . ')' }}
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							Data Polis
						</div>
						<div class="card-body">
							<table class="table table-bordered">
								<tr>
									<th>Nomor Polis</th>
									<td>{{ $claim->nomor_polis }}</td>
								</tr>
								<tr>
									<th>Nama Tertanggung</th>
									<td>{{ $claim->nama_tertanggung }}</td>
								</tr>
								<tr>
									<th>Kondisi Pertanggungan</th>
									<td>{{ $claim->kondisi_pertanggungan }}</td>
								</tr>
								<tr>
									<th>Harga Pertanggungan</th>
									<td>Rp. {{ number_format($claim->harga_pertanggungan) }}</td>
								</tr>
								<tr>
									<th>Periode</th>
									<td>{{ \Carbon\Carbon::parse($claim->periode_awal)->format('d/m/Y') . ' - ' . \Carbon\Carbon::parse($claim->periode_akhir)->format('d/m/Y') }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							Data Kendaraan
						</div>
						<div class="card-body">
							<table class="table table-bordered">
								<tr>
									<th>Merk Kendaraan</th>
									<td>{{ $claim->merk->merk }}</td>
								</tr>
								<tr>
									<th>Jenis Kendaraan</th>
									<td>{{ $claim->jenis->jenis }}</td>
								</tr>
								<tr>
									<th>Nomor Polisi</th>
									<td>{{ $claim->nomor_polisi }}</td>
								</tr>
								<tr>
									<th>Nomor Rangka</th>
									<td>{{ $claim->nomor_rangka }}</td>
								</tr>
								<tr>
									<th>Nomor Mesin</th>
									<td>{{ $claim->nomor_mesin }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-12 mt-3">
					<div class="card">
						<div class="card-header">
							Data Klaim
						</div>
						<div class="card-body">
							<table class="table table-bordered">
								<tr>
									<th>Tanggal Kejadian</th>
									<td>{{ \Carbon\Carbon::parse($claim->tanggal_kejadian)->format('d/m/Y') }}</td>
								</tr>
								<tr>
									<th>Kronologis Kejadian</th>
									<td>{{ $claim->kronologis_kejadian }}</td>
								</tr>
								<tr>
									<th>Resiko Sendiri</th>
									<td>Rp. {{ number_format($claim->or_count * $claim->or_price) }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection