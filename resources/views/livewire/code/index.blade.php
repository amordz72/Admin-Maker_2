<div>
    <div class="container">
        <div class="row">
            <div class="my-3">


                @foreach ($codes as $code)
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button text-dark fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $code['id'] }}"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    {{ $code['short'] }}
                                </button>
                            </h2>
                            <div id="collapseOne{{ $code['id'] }}" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <textarea class="accordion-body form-control" rows="10">
                                {{ ltrim($code['body']) }}
                            </textarea>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
