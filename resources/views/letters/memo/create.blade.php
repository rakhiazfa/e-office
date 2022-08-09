<x-auth title="E Office | Tambah E-Memo">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tambah E-Memo</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('memos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Tanggal Surat</label>
                                <input type="date" class="field" name="date_of_letter">
                                @error('date_of_letter')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
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
                                <label class="text-xs ml-1">Pengirim</label>
                                <select type="text" class="field" name="creator">
                                    <option selected disabled>Pilih Pengirim</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->job->name }} - {{ $employee->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('creator')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Tembusan</label>
                                <select type="text" class="field" name="copy">
                                    <option selected disabled>Pilih Tembusan</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->job->name }} - {{ $employee->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('copy')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Tujuan</label>
                                <select type="text" class="field" name="destination">
                                    <option selected disabled>Pilih Tujuan</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->job->name }} - {{ $employee->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('destination')
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
                            <div class="col-12 mb-3">
                                <label class="text-xs ml-1">Pesan Memo</label>
                                <textarea name="message" id="editor"></textarea>
                                @error('message')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="incoming-letters-tab" data-bs-toggle="tab" data-bs-target="#incoming-letters" type="button" role="tab" aria-controls="incoming-letters" aria-selected="true">Pesan Masuk</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="outgoing-letters-tab" data-bs-toggle="tab" data-bs-target="#outgoing-letters" type="button" role="tab" aria-controls="outgoing-letters" aria-selected="false">Pesan Keluar</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="memo-tab" data-bs-toggle="tab" data-bs-target="#memo" type="button" role="tab" aria-controls="memo" aria-selected="false">E-Memo</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="file-tab" data-bs-toggle="tab" data-bs-target="#file" type="button" role="tab" aria-controls="file" aria-selected="false">File</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="incoming-letters" role="tabpanel" aria-labelledby="incoming-letters-tab">
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <label class="text-xs ml-1">Lampiran / Referensi</label>
                                                <select class="field multiple" name="references[]" multiple>
                                                    @foreach ($incomingLetters as $reference)
                                                        <option value="{{ $reference->id }}">{{ $reference->letter_number }} | {{ $reference->regarding }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="outgoing-letters" role="tabpanel" aria-labelledby="outgoing-letters-tab">
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <label class="text-xs ml-1">Lampiran / Referensi</label>
                                                <select class="field multiple" name="references[]" multiple>
                                                    @foreach ($outgoingLetters as $reference)
                                                        <option value="{{ $reference->id }}">{{ $reference->letter_number }} | {{ $reference->regarding }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="memo" role="tabpanel" aria-labelledby="memo-tab">
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <label class="text-xs ml-1">Lampiran / Referensi</label>
                                                <select class="field multiple" name="references[]" multiple>
                                                    @foreach ($memos as $reference)
                                                        <option value="{{ $reference->id }}">{{ $reference->letter_number }} | {{ $reference->regarding }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="file" role="tabpanel" aria-labelledby="file-tab">
                                        <div class="row">
                                            <div class="col-12 my-3">
                                                <button type="button" class="button bg-blue-500 text-white" id="add-file-input">Tambah Attachment</button>
                                            </div>
                                        </div>
                                        <div class="row" id="attachments">
                                            <div class="col-12 mb-3">
                                                <label class="text-xs ml-1">File Attachment</label>
                                                <div class="flex flex-col md:flex-row items-center gap-3">
                                                    <input type="file" class="form-control" name="attachments[]">
                                                    <input type="text" class="form-control" name="labels[]" placeholder="Label File">
                                                </div>
                                                @error('attachment')
                                                    <p class="invalid">{{ $message }}</p>
                                                @enderror
                                                @error('labels')
                                                    <p class="invalid">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="button bg-blue-500 text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let fileInput = `
            <div class="col-12 mb-3">
                <div class="flex flex-col md:flex-row items-center gap-3">
                    <input type="file" class="form-control" name="attachments[]">
                    <input type="text" class="form-control" name="labels[]" placeholder="Label File">
                </div>
            </div>
        `;

        $("#add-file-input").click(function(e) {
            $("#attachments").append(fileInput);
        });
    </script>
</x-auth>
