@extends('app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('claims.index') }}" class="btn btn-dark mb-3 me-2 p-2">Kembali</a>
        <button data-bs-toggle="modal" data-bs-target="#upload-modal" class="btn btn-primary mb-3 p-2">Upload Foto
            Kerusakan</button>
    </div>

    <!-- Upload Modal -->
    <div class="modal fade" id="upload-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload Foto Kerusakan</h5>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" enctype="multipart/form-data" id="upload-foto">
                        @csrf
                        <input type="hidden" id="claim-id" value="{{ $claim->id }}">
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Kerusakan:</label>
                            <input class="form-control" name="foto[]" type="file" id="foto" multiple>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary" id="submit-upload">Upload</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

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
                                    <td>{{ \Carbon\Carbon::parse($claim->periode_awal)->format('d/m/Y') . ' - ' . \Carbon\Carbon::parse($claim->periode_akhir)->format('d/m/Y') }}
                                    </td>
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
                @if (count($foto) != 0)
                    <div class="col-md-12 mt-3">
                        <div class="accordion accordion-flush" id="foto-kerusakan-accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-foto-kerusakan" aria-expanded="false"
                                        aria-controls="flush-foto-kerusakan">
                                        Foto Kerusakan
                                    </button>
                                </h2>
                                <div id="flush-foto-kerusakan" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#foto-kerusakan-accordion">
                                    @foreach ($foto as $pic)
                                        <img src="{{ asset('foto/' . $pic->foto) }}" class="img-fluid img-thumbnail mt-2"
                                            width="200">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#upload-foto').submit(function(e) {
            e.preventDefault();

            const claimID = $('#claim-id').val();
            let formData = new FormData(this);
            let fotoLength = $('#foto')[0].files.length; //Total Images
            let foto = $('#foto')[0];
            for (let i = 0; i < fotoLength; i++) {
                formData.append('foto' + i, foto.files[i]);
            }
            formData.append('fotoLength', fotoLength);
            formData.append('claimID', claimID);
            $('#submit-upload').addClass('disabled');

            $.ajax({
                type: 'POST',
                url: "{{ route('claim.uploadFotoKerusakan') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    alert('Foto kerusakan berhasil diupload.');
                    location.reload();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
