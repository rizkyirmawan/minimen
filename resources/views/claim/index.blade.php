@extends('app')

@section('content')
	<a href="{{ route('claims.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
	<div class="card">
		<div class="card-header">
			Data Claim
		</div>
		<div class="card-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Nomor Polis</th>
						<th>Nama Tertanggung</th>
						<th>Tanggal Kejadian</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($claims as $claim)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $claim->nomor_polis }}</td>
						<td>{{ $claim->nama_tertanggung }}</td>
						<td>{{ $claim->tanggal_kejadian }}</td>
						<td>
							<a href="{{ route('claims.show', ['claim' => $claim->id]) }}" class="btn btn-primary btn-sm">Detail</a> 
							<a href="{{ route('claims.edit', ['claim' => $claim->id]) }}" class="btn btn-success btn-sm">Edit</a> 
							<a href="#" onclick="deleteClaim({{ $claim->id }})" class="btn btn-danger btn-sm">Hapus</a> 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
@endsection

@section('scripts')
	<script>
		function deleteClaim(id) {
			if (confirm('Anda yakin akan menghapus data klaim ini?')) {
				$.ajax({
					url: `/api/claim/${id}`,
					type: 'DELETE',
					data: {
						_token: $('input[name=_token]').val()
					},
					success: function(res) {
						if (res) alert('Data klaim berhasil dihapus.');
						window.location = "{{ route('claims.index') }}";
					}
				});
			}
		}
	</script>
@endsection