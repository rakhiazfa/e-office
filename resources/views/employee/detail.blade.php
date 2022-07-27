<x-auth title="E Office | Detail Karyawan">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Detail Karyawan</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-title mb-3">Detail Karyawan</div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 mb-3">
                            <label class="text-sm mb-1">NIK</label>
                            <p>{{ $employee->nik }}</p>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <label class="text-sm mb-1">Nama</label>
                            <p>{{ $employee->user->name }}</p>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <label class="text-sm mb-1">Email</label>
                            <p>{{ $employee->user->email }}</p>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <label class="text-sm mb-1">No. KTP</label>
                            <p>{{ $employee->ktp }}</p>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <label class="text-sm mb-1">Alamat KTP</label>
                            <p>{{ $employee->ktp_address }}</p>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <label class="text-sm mb-1">Alamat</label>
                            <p>{{ $employee->address }}</p>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <label class="text-sm mb-1">Domisili Kota</label>
                            <p>{{ $employee->city }}</p>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <label class="text-sm mb-1">Level Jabatan</label>
                            <p>{{ $employee->job->jobLevel->name }}</p>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <label class="text-sm mb-1">Jabatan</label>
                            <p>{{ $employee->job->name }}</p>
                        </div>
                        @if ($employee->superior)
                            <div class="col-12 mb-3">
                                <label class="text-sm mb-1">Atasan</label>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-centered whitespace-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Jabatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $employee->superior->user->name }}</td>
                                                <td>{{ $employee->superior->user->email }}</td>
                                                <td>{{ $employee->superior->job->name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                        @if (count($employee->subordinates) > 0)
                            <div class="col-12">
                                <label class="text-sm mb-1">Bawahan</label>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-centered whitespace-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Jabatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employee->subordinates as $employee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $employee->user->name }}</td>
                                                <td>{{ $employee->user->email }}</td>
                                                <td>{{ $employee->job->name }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth>
