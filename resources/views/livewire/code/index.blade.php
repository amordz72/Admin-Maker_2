<div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- proj -->
                <div class="mb-3">
                    <label for="" class="form-label">Project</label>
                    <select class="form-control" wire:model='project_id'>
                        <option value="0">Select</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project['id'] }}">{{ $project['name'] }}</option>
                        @endforeach

                    </select>
                </div>

                <!-- tbls -->
                <div class="mb-3">
                    <label for="" class="form-label">Project</label>
                    <select class="form-control" wire:model='tbl_id'>
                        <option value="0">Select</option>
                        @foreach ($tbls as $tbl)
                            <option value="{{ $tbl['id'] }}">{{ $tbl['name'] }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="col-md-8">
                {{ $project_id }} <br>
                {{ $tbl_id }} <br>
            </div>

        </div>
