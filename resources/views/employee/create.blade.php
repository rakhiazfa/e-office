<x-auth title="E Office | Tambah Karyawan">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tambah Data Karyawan</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-title">Identitas Pegawai</div>
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="tab-content" id="create-employee-tabs">
                            <div class="tab-pane fade pt-3 show active" id="one" role="tabpanel"
                                aria-labelledby="one-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">NIK</label>
                                        <input type="text" class="field" value="{{ old('nik') }}" name="nik" placeholder="Masukan nik karyawan">
                                        @error('nik')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">No. Handphone</label>
                                        <input type="text" class="field" value="{{ old('phone') }}" name="phone" placeholder="Masukan nomor handphone karyawan">
                                        @error('phone')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">No. KTP</label>
                                        <input type="text" class="field" value="{{ old('ktp') }}" name="ktp" placeholder="Masukan nomor ktp karyawan">
                                        @error('ktp')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Alamat KTP</label>
                                        <input type="text" class="field" value="{{ old('ktp_address') }}" name="ktp_address" placeholder="Masukan alamat sesuai kpt karyawan">
                                        @error('ktp_address')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Domisili Kota</label>
                                        <input type="text" class="field" value="{{ old('city') }}" name="city" placeholder="Masukan domisili kota karyawan">
                                        @error('city')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Alamat</label>
                                        <input type="text" class="field" value="{{ old('address') }}" name="address" placeholder="Masukan alamat karyawan">
                                        @error('address')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 flex justify-end">
                                        <button type="button" class="button bg-blue-500 text-white" id="next-button" data-current-tab="#one" data-next-tab="#two">Lanjut</button>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade pt-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Tempat Lahir</label>
                                        <input type="text" class="field" value="{{ old('place_of_birth') }}" name="place_of_birth" placeholder="Masukan tempat lahir karyawan ( Opsional )">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Tanggal Lahir</label>
                                        <input type="date" class="field" value="{{ old('date_of_birth') }}" name="date_of_birth">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Agama</label>
                                        <input type="text" class="field" value="{{ old('religion') }}" name="religion" placeholder="Masukan agama karyawan ( Opsional )">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Jenis Kelamin</label>
                                        <select type="text" class="field" name="gender">
                                            @foreach ($genders as $key => $value)
                                                <option value="{{ $key }}" {{ old('gender') == $key ? "selected" : "" }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Golongan Darah</label>
                                        <select type="text" class="field" name="blood_group">
                                            @foreach ($bloodGroups as $key => $value)
                                                <option value="{{ $key }}" {{ old('blood_group') == $key ? "selected" : "" }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Status Pernikahan</label>
                                        <select type="text" class="field" name="marital_status">
                                            @foreach ($maritalStatus as $key => $value)
                                                <option value="{{ $key }}" {{ old('marital_status') == $key ? "selected" : "" }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 flex justify-between">
                                        <button type="button" class="button bg-zinc-200" id="prev-button" data-current-tab="#two" data-prev-tab="#one">Kembali</button>
                                        <button type="button" class="button bg-blue-500 text-white" id="next-button" data-current-tab="#two" data-next-tab="#three">Lanjut</button>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade pt-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Level Jabatan</label>
                                        <select type="text" class="field" name="job_level">
                                            <option selected disabled>Pilih Level Jabatan</option>
                                            @foreach ($jobLevels as $jobLevel)
                                                <option value="{{ $jobLevel->id }}">{{ $jobLevel->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('job_level')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Jabatan</label>
                                        <select type="text" class="field" name="job">
                                            <option selected disabled>Pilih Jabatan</option>
                                        </select>
                                        @error('job')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Atasan</label>
                                        <select type="text" class="field" name="superior">
                                            <option selected disabled>Pilih Atasan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Nama Pegawai</label>
                                        <input type="text" class="field" value="{{ old('name') }}" name="name" placeholder="Masukan mana karyawan">
                                        @error('name')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="text-xs ml-1">Email</label>
                                        <input type="text" class="field" value="{{ old('email') }}" name="email" placeholder="Masukan email karyawan">
                                        @error('email')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Password</label>
                                        <input type="password" class="field" name="password" placeholder="Masukan kata sandi">
                                        @error('password')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Password Confirmation</label>
                                        <input type="password" class="field" name="password_confirmation" placeholder="Konfirmasi kata sandi">
                                        @error('password_confirmation')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 flex justify-between">
                                        <button type="button" class="button bg-zinc-200" id="prev-button" data-current-tab="#three" data-prev-tab="#two">Kembali</button>
                                        <button type="submit" class="button bg-blue-500 text-white">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("button#next-button").click(function(e) {
            $($(this).data('current-tab')).removeClass("show");
            $($(this).data('current-tab')).removeClass("active");

            $($(this).data('next-tab')).addClass("show");
            $($(this).data('next-tab')).addClass("active");
        });

        $("button#prev-button").click(function(e) {
            $($(this).data('current-tab')).removeClass("show");
            $($(this).data('current-tab')).removeClass("active");

            $($(this).data('prev-tab')).addClass("show");
            $($(this).data('prev-tab')).addClass("active");
        });

        var $invalidFeedback = $($("p.invalid")[0]);

        if($invalidFeedback.length) {
            var $currentTab = $($invalidFeedback.parent().parent().parent());

            $(".tab-pane").not($currentTab).removeClass("show");
            $(".tab-pane").not($currentTab).removeClass("active");

            $currentTab.addClass("show");
            $currentTab.addClass("active");
        }

        $("select[name='job_level']").change(function(e) {
            var id = e.target.value;

            $.getJSON(`/ajax/job-levels/${id}/jobs`, function(response) {
                $jobField = $("select[name='job']");
                $jobField.html('');

                $jobField.append($('<option>', {
                    text: 'Pilih Jabatan',
                    selected: true,
                    disabled: true,
                }));

                response.forEach(function(job) {
                    $jobField.append($('<option>', {
                        value: job.id,
                        text: job.name,
                    }));
                });
            });
        });

        $("select[name='job']").change(function(e) {
            var id = e.target.value;

            $.getJSON(`/ajax/jobs/${id}/superiors`, function(response) {
                var $superiorField = $("select[name='superior']");
                $superiorField.html('');

                $superiorField.append($('<option>', {
                    text: 'Pilih Atasan',
                    selected: true,
                    disabled: true,
                }));

                response.forEach(function(job) {
                    job.employees.forEach(function(employee) {
                        $superiorField.append($('<option>', {
                            value: employee.id,
                            text: `${job.name} - ${employee.user.name}`,
                        }));
                    })
                });
            });
        });
    </script>
</x-auth>
