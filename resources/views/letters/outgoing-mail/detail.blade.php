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

    <div class="flex flex-col xl:flex-row gap-x-5">
        <div class="row w-full xl:w-[800px]">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title mb-3">Detail Surat Keluar</div>
                        <table class="table table-centered text-xs mb-0">
                            <tbody>
                                <tr>
                                    <td class="font-semibold whitespace-nowrap">Nomor Surat</td>
                                    <td>{{ $letter->letter_number }}</td>
                                </tr>
                                <tr>
                                    <td class="font-semibold whitespace-nowrap">Jenis Surat</td>
                                    <td>{{ $letter->type->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-semibold whitespace-nowrap">Pengirim</td>
                                    <td>{{ $letter->creator->user->name }}</td>
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
        </div>
        
        <div class="row w-full">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">Penerima</div>
                        <div class="table-responsive">
                            <table class="table table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth>
