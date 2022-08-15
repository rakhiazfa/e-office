<x-auth title="E Office | Edit Jabatan">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Data Jabatan</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jobs.update', ['id' => $job->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <select type="text" class="field" name="job_level">
                                    <option disabled selected>Pilih Level Jabatan</option>
                                    @foreach ($jobLevels as $jobLevel)
                                        <option value="{{ $jobLevel->id }}" {{ $job->jobLevel->id == $jobLevel->id ? "selected" : "" }}>{{ $jobLevel->name }}</option>
                                    @endforeach
                                </select>
                                @error('job_level')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 col-md-6 mb-3">
                                <select type="text" class="field" name="job_id" data-selected="{{ $job->parent->id ?? '' }}" disabled>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="field" name="name" value="{{ $job->name }}" placeholder="Masukan nama jabatan">
                                @error('name')
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

    <script>
        $(document).ready(function() {
            var $jobLevelField = $("select[name='job_level']");

            if($jobLevelField.val()) {
                $.getJSON(`/ajax/job-levels/${$jobLevelField.val()}/parent/jobs`, function(response) {
                    $jobField = $("select[name='job_id']");
                    $jobField.html('');

                    if(Object.keys(response).length > 0) {
                        $jobField.append($('<option>', {
                            text: `Pilih ${response.name}`,
                            selected: true,
                            disabled: true,
                        }));

                        if(response.jobs) {
                            response.jobs.forEach(function(job) {
                                $jobField.append($('<option>', {
                                    value: job.id,
                                    text: job.name,
                                    selected: job.id == $jobField.data('selected'),
                                }));
                            });
                        }
                    }

                    $jobField.prop('disabled', false);
                });
            }

            $("select[name='job_level']").change(function(e) {
                var id = e.target.value;

                $.getJSON(`/ajax/job-levels/${id}/parent/jobs`, function(response) {
                    $jobField = $("select[name='job_id']");
                    $jobField.html('');

                    if(Object.keys(response).length > 0) {
                        $jobField.append($('<option>', {
                            text: `Pilih ${response.name}`,
                            selected: true,
                            disabled: true,
                        }));

                        if(response.jobs) {
                            response.jobs.forEach(function(job) {
                                $jobField.append($('<option>', {
                                    value: job.id,
                                    text: job.name,
                                }));
                            });
                        }
                    }

                    $jobField.prop('disabled', false);
                });
            });
        })
    </script>
</x-auth>
