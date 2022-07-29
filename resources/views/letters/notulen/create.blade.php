<x-auth title="E Office | Tambah Notulen">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tambah Notulen</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('notulens.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Judul Notulen</label>
                                <input type="text" class="field" name="note_title" placeholder="Masukan judul notulen">
                                @error('note_title')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Tanggal Notulen</label>
                                <input type="date" class="field" value="{{ $currentDate }}" name="date_of_letter">
                                @error('date_of_letter')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-xs ml-1">Pembuat</label>
                                <select type="text" class="field" name="creator">
                                    <option selected disabled>Pilih Pembuat</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('creator')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="text-xs ml-1">Rapat</label>
                                <select type="text" class="field" name="meeting">
                                    <option selected disabled>Pilih Rapat</option>
                                    @foreach ($meetings as $meeting)
                                        <option value="{{ $meeting->id }}">{{ date('d M Y', strtotime($meeting->meeting_date)) }} | {{ $meeting->meeting_agenda }} ( {{ $meeting->meeting_room }} )</option>
                                    @endforeach
                                </select>
                                @error('meeting')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="text-xs ml-1">Pemeriksa</label>
                                <select type="text" class="field multiple" name="checkers[]" multiple="multiple">
                                    <option selected disabled>Pilih Pemeriksa</option>
                                    @foreach ($directors as $director)
                                        <option value="{{ $director->id }}">{{ $director->job->name }} - {{ $director->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('checkers')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="text-xs ml-1">Pesan Notulen</label>
                                <textarea name="message" id="editor"></textarea>
                                @error('message')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
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
</x-auth>
