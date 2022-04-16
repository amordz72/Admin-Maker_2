<div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-6">
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

                    </div>
                    <div class="col-6">

                        <!-- tbls chbx -->
                        <div class="mb-3">
                            <label for="" class="form-label">Project</label>
                            <select class="form-control" wire:model='tbl_id' wire:change='set_childs( )'>
                                <option value="0">Select</option>
                                @foreach ($tbls as $tbl)
                                    <option value="{{ $tbl['id'] }}">{{ $tbl['name'] }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                <div class="but">
                    <button type="button" class="btn btn-outline-primary"
                        wire:click.prevent='migration'>Migration</button>
                    <button type="button" class="btn btn-outline-secondary"
                        wire:click.prevent='get_model'>Model</button>
                    <button type="button" class="btn btn-outline-success">Route</button>
                    <button type="button" class="btn btn-outline-danger" onclick="copy()">Copy</button>
                    <button type="button" class="btn btn-outline-info" wire:click="getStr">Get</button>
        <button type="button" class="btn btn-outline-dark" wire:click="clear">Clear</button>
                    <div class="d-none">


                    </div>

                </div>


                <!-- childs -->
                <div class="  mt-2 fw-bold">
                    @if ($tbl_softDelete)
                        <div class="alert alert-info mb-3">Soft Delete Table</div>
                    @endif

                    @if (count($childs) > 0)
                        <div class="alert alert-danger mb-3  ">Children</div>
                        <ul class="list-group">
                            @foreach ($childs as $ch)
                                <li class="list-group-item fw-bold">{{ $ch }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>


            </div>

            <div class="col-md-8 pt-4">


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Code</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Other</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-hover table-bordered table-responsive fw-bold">
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
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cols as $key => $col)
                                    <tr>
                                        <td scope="row"> {{ $key + 1 }}</td> {{--  --}}
                                        <td>{{ $col->name }}</td>
                                        <td>{{ Str::replace('unsignedBigInteger', 'FK', $col->type) }}</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input"
                                                @checked($col->null)>

                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input"
                                                @checked($col->fill)>

                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input"
                                                @checked($col->hidden)>

                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input"
                                                @checked($col->unique)>

                                        </td>

                                        <td>{{ $col->parent_tbl }}</td>
                                        <td>{{ $col->relation }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                wire:click='details_model({{ $col }})' data-bs-toggle="modal"
                                                data-bs-target="#colsModel">
                                                View
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="mb-3">
                            <label for="" class="form-label">Code :</label>
                            <textarea class="form-control fw-bold" id="textA" wire:model='body' rows="16"></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>



            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="colsModel" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Other Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Casts</label>
                                <textarea class="form-control" wire:model="me_casts" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Default</label>
                            <textarea class="form-control" wire:model="me_default" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <script>
            function copy() {
                /* Get the text field */
                var copyText = document.getElementById("textA");

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                navigator.clipboard.writeText(copyText.value);

                /* Alert the copied text
                alert("Copied the text: " + copyText.value);*/
            }


        </script>

    </div>
