@extends('app')

@section('content')
	<a href="{{ route('claims.index') }}" class="btn btn-dark mb-3">Kembali</a>
	<form action="#" id="create-claim">
		@csrf
		<div class="card">
			<div class="card-header">
				Tambah Data Claim
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="nomor-polis">Nomor Polis:</label>
						<input type="text" class="form-control" id="nomor-polis" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="nama-tertanggung">Nama Tertanggung:</label>
						<input type="text" class="form-control" id="nama-tertanggung" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="kondisi-pertanggungan">Kondisi Pertanggungan:</label>
						<select id="kondisi-pertanggungan" class="form-control">
							<option selected disabled>Pilih Kondisi Pertanggungan</option>
							<option value="Comprehensive">Comprehensive</option>
							<option value="TLO">TLO</option>
						</select>
					</div>
					<div class="col-md-6 mb-3">
						<label for="harga-pertanggungan">Harga Pertanggungan:</label>
						<input type="text" class="form-control" id="harga-pertanggungan" onkeypress="isNumber(event)" onkeyup="javascript:this.value=Comma(this.value);" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="periode-awal">Periode Awal:</label>
						<input type="date" class="form-control" id="periode-awal" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="periode-akhir">Periode Akhir:</label>
						<input type="date" class="form-control" id="periode-akhir" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="tanggal-kejadian">Tanggal Kejadian:</label>
						<input type="date" class="form-control" id="tanggal-kejadian" required>
					</div>
					<div class="col-md-12 mb-3">
						<label for="kronologis-kejadian">Kronologis Kejadian:</label>
						<textarea id="kronologis-kejadian" cols="30" rows="5" class="form-control"></textarea>
					</div>
					<div class="col-md-4 mb-3">
						<label for="nomor-polisi">Nomor Polisi:</label>
						<input type="text" class="form-control" id="nomor-polisi" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="nomor-rangka">Nomor Rangka:</label>
						<input type="text" class="form-control" id="nomor-rangka" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="nomor-mesin">Nomor Mesin:</label>
						<input type="text" class="form-control" id="nomor-mesin" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="merk-id">Merk:</label>
						<select id="merk-id" class="form-control">
							<option selected disabled>Pilih Merk Kendaraan</option>
							@foreach($merk as $brand)
							<option value="{{ $brand->id }}">{{ $brand->merk }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6 mb-3">
						<label for="jenis-id">Jenis:</label>
						<select id="jenis-id" class="form-control">
							<option selected disabled>Pilih Jenis Kendaraan</option>
						</select>
					</div>
					<div class="col-md-6 mb-3">
						<label for="bengkel-id">Bengkel:</label>
						<select id="bengkel-id" class="form-control">
							<option selected disabled>Pilih Bengkel Rekanan</option>
							@foreach($bengkel as $repairer)
							<option value="{{ $repairer->id }}">{{ $repairer->bengkel . ' - ' . $repairer->lokasi }}</option>
							@endforeach
						</select>
					</div>
					<label for="or-count">Resiko Sendiri:</label>
					<div class="col-md-3 mb-3">
						<input type="number" class="form-control" id="or-count" required>
					</div>
					x
					<div class="col-md-3 mb-3">
						<input type="text" class="form-control" id="or-price" onkeyup="javascript:this.value=Comma(this.value);" required>
					</div>
				</div>
			</div>
		</div>
		<div class="align-right mt-2 mb-5">
			<button type="submit" class="btn btn-sm btn-primary" id="submit-claim">Submit</button>
		</div>
	</form>
@endsection

@section('scripts')
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/getJenis.js') }}"></script>
	<script>
		$(document).ready(function() {

			$('#create-claim').submit(function(e) {
				e.preventDefault();

				const merkID = $('#merk-id').val();
				const jenisID = $('#jenis-id').val();
				const bengkelID = $('#bengkel-id').val();
	 			const nomorPolis = $('#nomor-polis').val();
				const namaTertanggung = $('#nama-tertanggung').val();
				const kondisiPertanggungan = $('#kondisi-pertanggungan').val();
				const hargaPertanggungan = $('#harga-pertanggungan').val();
				const periodeAwal = $('#periode-awal').val();
				const periodeAkhir = $('#periode-akhir').val();
				const tanggalKejadian = $('#tanggal-kejadian').val();
				const kronologisKejadian = $('#kronologis-kejadian').val();
				const nomorPolisi = $('#nomor-polisi').val();
				const nomorRangka = $('#nomor-rangka').val();
				const nomorMesin = $('#nomor-mesin').val();
				const orCount = $('#or-count').val();
				const orPrice = $('#or-price').val();

				$('#submit-claim').addClass('disabled');

				$.ajax({
					url: "{{ route('claim.store') }}",
					type: "POST",
					data: {
						merk_id: merkID,
						jenis_id: jenisID,
						bengkel_id: bengkelID,
						nomor_polis: nomorPolis,
						nama_tertanggung: namaTertanggung,
						kondisi_pertanggungan: kondisiPertanggungan,
						harga_pertanggungan: Number(hargaPertanggungan.replaceAll(',', '')),
						periode_awal: periodeAwal,
						periode_akhir: periodeAkhir,
						tanggal_kejadian: tanggalKejadian,
						kronologis_kejadian: kronologisKejadian,
						nomor_polisi: nomorPolisi,
						nomor_rangka: nomorRangka,
						nomor_mesin: nomorMesin,
						or_count: orCount,
						or_price: Number(orPrice.replaceAll(',', '')),
						_token: $('input[name=_token]').val()
					},
					success: function(res) {
						if(res) alert('Data claim berhasil disubmit.');
						window.location = "{{ route('claims.index') }}";
					}
				});
			});
		});
	</script>
@endsection