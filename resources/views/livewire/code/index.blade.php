<div>
    <div class="container">
        <div class="row">
            <div class="my-3">


                @foreach ( $codes as $code)
                <textarea class="form-control" rows="6">

                {{ ($code['body']) }}

                </textarea>

                @endforeach

            </div>
        </div>
