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
                    <select class="form-control" wire:model='tbl_id' wire:change='set_childs( )'>
                        <option value="0">Select</option>
                        @foreach ($tbls as $tbl)
                            <option value="{{ $tbl['id'] }}">{{ $tbl['name'] }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="but">
                    <button type="button" class="btn btn-outline-primary" wire:click='migration'>Migration</button>
                    <button type="button" class="btn btn-outline-secondary">Model</button>
                    <button type="button" class="btn btn-outline-success">Route</button>
                    <div class="d-none">
                        <button type="button" class="btn btn-outline-danger">Danger</button>

                        <button type="button" class="btn btn-outline-info">Info</button>

                        <button type="button" class="btn btn-outline-dark">Dark</button>
                    </div>

                </div>

                <!-- childs -->
                <div class="bg-info mt-2">
                    <p class="h5 py-2 mx-2">Children</p>
                    <ul class="list-group">
                        @foreach ($childs as $ch)
                            <li class="list-group-item fw-bold">{{ $ch }}</li>
                        @endforeach
                    </ul>
                </div>


            </div>

            <div class="col-md-8 pt-4">
                <table class="table table-hover table-bordered table-responsive">
                    <thead class="text-white text-center bg-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Null</th>
                            <th>Fill</th>
                            <th>Hidden</th>
                            <th>Unique</th>
                            <th>Parent</th>
                            <th>Relation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cols as $key => $col)
                            <tr>
                                <td scope="row"> {{ $key + 1 }}</td> {{--  --}}
                                <td>{{ $col->name }}</td>
                                <td>{{ $col->type }}</td>
                                <td>{{ $col->null }}</td>
                                <td>{{ $col->fill }}</td>
                                <td>{{ $col->hidden }}</td>
                                <td>{{ $col->unique }}</td>
                                <td>{{ $col->parent_tbl }}</td>
                                <td>{{ $col->relation }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mb-3">
                    <label for="" class="form-label">Code :</label>
                    <textarea class="form-control" wire:model='body' rows="5"></textarea>
                </div>
            </div>

        </div>
