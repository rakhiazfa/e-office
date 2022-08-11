<x-auth title="E Office | Detail Surat Masuk">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Detail Surat Masuk</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="flex flex-col xl:flex-row gap-x-5">
        <div class="row w-full xl:w-[800px]">
            <div class="col-12">
                <div class="card h-[calc(100%-1.5rem)]">
                    <div class="card-body">
                        <div class="header-title mb-3">Detail Surat Masuk</div>
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
                                    <td>{{ $letter->sender_name }}</td>
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
                                    <td class="font-semibold whitespace-nowrap">Tanggal Masuk</td>
                                    <td>{{ $letter->date_of_entry }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row w-full">
            <div class="col-12">
                <div class="card h-[calc(100%-1.5rem)]">
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
                                <tbody class="text-xs">
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $letter->destination ? $letter->destination->user->name : "Tidak Ada" }}</td>
                                        <td>{{ $letter->destination ? $letter->destination->job->name : "Tidak Ada" }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card h-[calc(100%-1.5rem)]">
                    <div class="card-body">
                        <div class="header-title">Pegawai CC</div>
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
                                        <td>{{ $letter->carbonCopy ? $letter->carbonCopy->user->name : "Tidak Ada" }}</td>
                                        <td>{{ $letter->carbonCopy ? $letter->carbonCopy->job->name : "Tidak Ada" }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-title">File Attachement</div>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Lampiran</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($letter->references as $reference)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $reference->label ? $reference->label : "" }}</td>
                                        <td><a class="text-blue-600" href="{{ route('preview', [
                                            'path' => $reference->file
                                        ]) }}">Lihat Lampiran</a></td>
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
