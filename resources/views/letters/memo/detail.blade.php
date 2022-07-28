<x-auth title="E Office | Detail E-Memo">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Detail E-Memo</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="flex flex-col xl:flex-row gap-x-5">
        <div class="row w-full xl:w-[800px]">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title mb-3">Detail E-Memo</div>
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
                                    <td class="font-semibold whitespace-nowrap">Tujuan</td>
                                    <td>{{ $letter->destination->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-semibold whitespace-nowrap">Pengirim</td>
                                    <td>{{ $letter->creator->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-semibold whitespace-nowrap">Tanggal Memo</td>
                                    <td>{{ $letter->date_of_letter }}</td>
                                </tr>
                                <tr>
                                    <td class="font-semibold whitespace-nowrap">Status Memo</td>
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
                        <div class="header-title">Isi Memo</div>
                        <div class="py-3 px-1">
                            {!! $letter->message !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">Tembusan</div>
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
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $letter->carbonCopy->user->name }}</td>
                                        <td>{{ $letter->carbonCopy->job->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth>
