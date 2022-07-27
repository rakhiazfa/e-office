<x-auth title="E Office | Data Karyawan">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <a href="{{ route('employees.create') }}" class="btn btn-primary ms-2">
                            Tambah Data Karyawan
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Data Karyawan</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}    
        </div> 
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-title">Data Karyawan</div>
                    <div class="table-responsive">
                        <table class="table table-centered whitespace-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->nik }}</td>
                                    <td>{{ $employee->user->name }}</td>
                                    <td>{{ $employee->user->email }}</td>
                                    <td>{{ $employee->job->name }}</td>
                                    <td class="table-action flex justify-center items-center gap-3">
                                        <a href="{{ route('employees.show', ['id' => $employee->id]) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                        <form action="{{ route('employees.destroy', ['id' => $employee->user->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-icon" onclick="return confirm('Yakin ingin menghapus karyawan ini?')"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </td>
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
