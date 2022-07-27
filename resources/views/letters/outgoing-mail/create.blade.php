<x-auth title="E Office | Tambah Surat Keluar">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tambah Surat Keluar</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('outgoing-mails.store') }}" method="POST">
                        @csrf
                        <div class="tab-content" id="create-employee-tabs">
                            <div class="tab-pane fade pt-3 show active" id="one" role="tabpanel"
                                aria-labelledby="one-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Jenis Surat</label>
                                        <select type="text" class="field" name="letter_type">
                                            <option selected disabled>Pilih Jenis Surat</option>
                                            @foreach ($letterTypes as $letterType)
                                                <option value="{{ $letterType->id }}">{{ $letterType->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('letter_type')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Tanggal Surat</label>
                                        <input type="date" class="field bg-gray-100" value="{{ $currentDate }}" readonly name="date_of_letter">
                                        @error('date_of_letter')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Pengirim</label>
                                        <select type="text" class="field" name="sender">
                                            <option selected disabled>Pilih Pengirim</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('sender')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Departemen</label>
                                        <select type="text" class="field" name="department">
                                            <option selected disabled>Pilih Departemen</option>
                                        </select>
                                        @error('department')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Pembuat Surat</label>
                                        <select type="text" class="field" name="creator">
                                            <option selected disabled>Pilih Pembuat Surat</option>
                                        </select>
                                        @error('creator')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Perihal</label>
                                        <input type="text" class="field" name="regarding" placeholder="Masukan perihal surat">
                                        @error('regarding')
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
                                        <label class="text-xs ml-1">Instansi / Lembaga / Perusahaan</label>
                                        <select type="text" class="field" name="company">
                                            <option selected disabled>Pilih Instansi / Lembaga / Perusahaan</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('company')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Nama Penerima</label>
                                        <input type="text" class="field" name="recipient_name" placeholder="Masukan nama penerima surat">
                                        @error('recipient_name')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Kota / Kabupaten</label>
                                        <input type="text" class="field bg-gray-100" readonly id="company-city" placeholder="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Alamat</label>
                                        <input type="text" class="field bg-gray-100" readonly id="company-address" placeholder="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Kode Pos</label>
                                        <input type="text" class="field bg-gray-100" readonly id="company-postal-code" placeholder="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">Email Instansi / Lembaga / Perusahaan</label>
                                        <input type="text" class="field bg-gray-100" readonly id="company-email" placeholder="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-xs ml-1">No. Telp Instansi / Lembaga / Perusahaan</label>
                                        <input type="text" class="field bg-gray-100" readonly id="company-phone" placeholder="">
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
                                    <div class="col-12 mb-3">
                                        <label class="text-xs ml-1">Pemeriksa</label>
                                        <select type="text" class="field multiple" name="checker[]" multiple="multiple">
                                            <option selected disabled>Pilih Pemeriksa</option>
                                            @foreach ($directors as $director)
                                                <option value="{{ $director->id }}">{{ $director->job->name }} - {{ $director->user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('checker')
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

        $("select[name='company']").change(function(e) {
            var id = e.target.value;

            $.getJSON(`/ajax/companies/${id}`, function(response) {
                if(Object.keys(response).length > 0) {
                    $("input#company-city").val(response.city);
                    $("input#company-address").val(response.address);
                    $("input#company-postal-code").val(response.postal_code);
                    $("input#company-email").val(response.email);
                    $("input#company-phone").val(response.phone);
                }
            });
        });

        $("select[name='sender']").change(function(e) {
            var id = e.target.value;

            $.getJSON(`/ajax/jobs/${id}/childrens`, function(response) {
                var $jobField = $("select[name='department']");
                $jobField.html('');

                $jobField.append($('<option>', {
                    text: 'Pilih Departemen',
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

        $("select[name='department']").change(function(e) {
            var id = e.target.value;

            $.getJSON(`/ajax/jobs/${id}/employees`, function(response) {
                var $creatorField = $("select[name='creator']");
                $creatorField.html('');

                $creatorField.append($('<option>', {
                    text: 'Pilih Pembuat Surat',
                    selected: true,
                    disabled: true,
                }));

                response.forEach(function(employee) {
                    $creatorField.append($('<option>', {
                        value: employee.id,
                        text: employee.user.name,
                    }));
                });
            });
        })
    </script>
</x-auth>
