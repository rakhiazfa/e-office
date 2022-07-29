<x-auth title="E Office | Detail Notulen">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Detail Notulen</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">
        <div class="col-md-5">
            <div class="card h-[calc(100%-1.5rem)]">
                <div class="card-body">
                    <div class="header-title mb-3">Detail Notulen</div>
                    <table class="table table-centered text-xs mb-0">
                        <tbody>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Status Surat</td>
                                <td>{{ $letter->status }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Judul Notulen</td>
                                <td>{{ $letter->note_title }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Pembuat</td>
                                <td>{{ $letter->creator ? $letter->creator->user->name : "Tidak Ada" }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Agenda Meeting</td>
                                <td>{{ $letter->meeting->meeting_agenda }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Ruang Meeting</td>
                                <td>{{ $letter->meeting->meeting_room }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Tanggal Meeting</td>
                                <td>{{ $letter->meeting->meeting_date }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold whitespace-nowrap">Tanggal Notulen</td>
                                <td>{{ $letter->date_of_letter }}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card h-[calc(100%-1.5rem)]">
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

    <div class="row">
        <div class="col-12">
            <div class="card h-[calc(100%-1.5rem)]">
                <div class="card-body">
                    <div class="header-title">Anggota Meeting</div>
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
                                @foreach ($letter->meeting->members as $member)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $member->user->name }}</td>
                                        <td>{{ $member->job->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="flex items-center border-b uppercase px-3 pt-3 pb-[1.1rem]">
                    <h1 class="text-base font-semibold">Isi Notulen</h1>
                </div>
                <div class="card-body">
                    <div class="p-3">
                        {!! $letter->message !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth>
