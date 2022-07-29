<x-auth title="E Office | Detail Surat Keluar">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Detail Surat Keluar</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">
        <div class="col-md-5">
            <div class="card h-[calc(100%-1.5rem)]">
                <div class="card-body">
                    <div class="header-title mb-3">Detail Surat Keluar</div>
                    <table class="table table-centered text-xs mb-0">
                        <tbody>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Nomor Surat</td>
                                <td>{{ $letter->letter_number ?? "Belum Digenerate" }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Jenis Surat</td>
                                <td>{{ $letter->type->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Pengirim</td>
                                <td>{{ $letter->creator ? $letter->creator->job->name . " - " : "Tidak Ada" }} {{ $letter->creator ? $letter->creator->user->name : "" }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Perihal</td>
                                <td>{{ $letter->regarding }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Tanggal Surat</td>
                                <td>{{ $letter->date_of_letter }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Tanggal Keluar</td>
                                <td>{{ $letter->date_of_letter }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Status Surat</td>
                                <td>{{ $letter->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card h-[calc(100%-1.5rem)]">
                <div class="card-body">
                    <div class="header-title">Penerima</div>
                    <table class="table table-bordered table-centered text-xs mb-3">
                        <tbody>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Nama Instansi / Lembaga / Perusahaan</td>
                                <td>{{ $letter->company->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Alamat</td>
                                <td>{{ $letter->company->address }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Kota / Kabupaten</td>
                                <td>{{ $letter->company->city }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Email</td>
                                <td>{{ $letter->company->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">No Telepon</td>
                                <td>{{ $letter->company->phone }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-centered text-xs mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penerima</th>
                            </tr>
                        </thead>
                        <tbody class="text-xs">
                            <tr>
                                <td>1</td>
                                <td>{{ $letter->recipient_name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-title">Pemeriksa</div>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach ($letter->checkers as $checker)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $checker->user->name }}</td>
                                        <td>{{ $checker->job->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth>
