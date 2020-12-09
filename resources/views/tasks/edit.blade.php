<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}


                <form action="{{route('tasks.update', ['id' => $task->id])}}" method="POST" >
                    @method('PUT')
                    @csrf


                    <div class="input_fields_wrap">
                        <div class="form-group">
                            <label for="title">Task Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$task->title}}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>

                            @enderror
                          </div>

                          @if (old('emails') != null)
                            @foreach(old('emails') as $key => $email)
                                <div class="form-group mt-2 remove-field">
                                    <input class="form-control @error('emails.' . $key) is-invalid @enderror" name="emails[]" value="{{$email}}" type="text" placeholder="Email">
                                    <button class="btn remove-btn text-danger" style="font-size: 13px;float:right">Remove</button>

                                    @error('emails.' . $key)
                                        <span class="text-danger" style="font-size: 13px;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                            @endforeach

                         {{-- Retrieve value from database --}}
                          @else
                                @foreach ($task->emails as $key => $email)
                                    <div class="form-group mt-2 remove-field">
                                        <input class="form-control @error('emails.' . $key) is-invalid @enderror" name="emails[]" value="{{$email}}" type="text" placeholder="Email">
                                        <button class="btn remove-btn text-danger" style="font-size: 13px;float:right">Remove</button>

                                        @error('emails.' . $key)
                                            <span class="text-danger" style="font-size: 13px;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                @endforeach
                          @endif

                    </div>

                    <div class="mt-3">
                        <button class="btn btn-link btn-sm add_field_button" type="button">+ Add</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                  </form>


            </div>
        </div>
    </div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script type="text/javascript">


    $(document).ready(function() {
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            //add input box
            var field_html = `<div class="form-group mt-2 remove-field">
                                <input class="form-control" name="emails[]" type="text" placeholder="Email">
                                <button class="btn remove-btn text-danger" style="font-size: 13px;float:right;">Remove</button>
                            </div>`;

            $(wrapper).append(field_html);
        });

        $(wrapper).on('click', 'button.remove-btn',function(e) {
            e.preventDefault();
            $(this).parent('div.remove-field').remove();
        });
    });


</script>


</body>
</html>
