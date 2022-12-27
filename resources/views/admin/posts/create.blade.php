@extends('adminlte::page')

@section('title', 'JMProjects - Dashboard')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open([
                'route' => 'admin.posts.store',
                'autocomplete' => 'off',
                'files' => true,
            ]) !!}

            @include('admin.posts.partials.form')

            {!! Form::submit('Crear post', [
                'class' => 'btn btn-primary',
            ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="shortcut icon" href="{{ Storage::url('IC_JMProject.png') }}">

    <style>
        .ck-media__wrapper[data-oembed-url*="ckeditor.com"] .ck-media__placeholder__icon * {
            display: none;
        }

        .ck-media__wrapper[data-oembed-url*="ckeditor.com"] .ck-media__placeholder {
            background: hsl(282, 44%, 47%);
        }

        .ck-media__wrapper[data-oembed-url*="ckeditor.com"] .ck-media__placeholder__icon {
            background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSIxMDFweCIgaGVpZ2h0PSIxMDFweCIgdmlld0JveD0iMCAwIDEwMSAxMDEiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+ICAgICAgICA8dGl0bGU+bG9nby1lY29zeXN0ZW0tM2NhYTI3MDIxODwvdGl0bGU+ICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPiAgICA8ZGVmcz48L2RlZnM+ICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPiAgICAgICAgPGcgaWQ9ImxvZ28tZWNvc3lzdGVtLTNjYWEyNzAyMTgiIGZpbGw9IiNGRkZGRkYiIGZpbGwtcnVsZT0ibm9uemVybyI+ICAgICAgICAgICAgPHJlY3QgaWQ9IlJlY3RhbmdsZSIgZmlsbC1vcGFjaXR5PSIwIiB4PSIwIiB5PSIwIiB3aWR0aD0iMTAxIiBoZWlnaHQ9IjEwMSI+PC9yZWN0PiAgICAgICAgICAgIDxwYXRoIGQ9Ik02NC44LDM4Ljg5MTIzODIgQzY2LjEwODU1MzgsMzkuOTE3NzU4MiA2Ny43MjMxODI2LDQwLjQ3MzI5MyA2OS4zODQ0NTk1LDQwLjQ2ODU4MzQgQzczLjQzMTIxNjIsNDAuNDY4NTgzNCA3Ni43MTE1MTM1LDM3LjI1Nzc4MTkgNzYuNzExNTEzNSwzMy4yOTUwOTE4IEM3Ni43MTE1MTM1LDI5LjMzMzAyNTIgNzMuNDMxMjE2MiwyNi4xMjA5NzY4IDY5LjM4NDQ1OTUsMjYuMTIwOTc2OCBDNjUuMzM3NzAyNywyNi4xMjA5NzY4IDYyLjA1ODAyNywyOS4zMzMwMjUyIDYyLjA1ODAyNywzMy4yOTUwOTE4IEM2Mi4wNTgwMjcsMzQuMzY0MzE5OSA2Mi4yOTY3Mjk3LDM1LjM3ODY4MzggNjIuNzI1MDI3LDM2LjI5MDE3NzMgTDU4LjM3MzA1NDEsNDAuNTUwODc5NyBDNTYuMjU3MjU2OCwzOS4xMjEwNDg1IDUzLjc2MjYxNjcsMzguMzYwMzA1NSA1MS4yMTEzNTE0LDM4LjM2NjkxMTIgQzQ4LjMzMzg2NDksMzguMzY2OTExMiA0NS42ODIwMjcsMzkuMzEwODI0NSA0My41NjEwNTQxLDQwLjg5OTM5MTkgTDM5LjY1NjY0ODYsMzcuMDc2MzU2MSBDNDAuMzc1NDcxNiwzNS45NDcwNDM1IDQwLjc1Njg0NDgsMzQuNjM0OTA3OSA0MC43NTU2NzU3LDMzLjI5NTA5MTggQzQwLjc1NTY3NTcsMjkuMzMzMDI1MiAzNy40NzUzNzg0LDI2LjEyMDk3NjggMzMuNDI4NjIxNiwyNi4xMjA5NzY4IEMyOS4zODE4NjQ5LDI2LjEyMDk3NjggMjYuMTAxNTY3NiwyOS4zMzMwMjUyIDI2LjEwMTU2NzYsMzMuMjk1MDkxOCBDMjYuMTAxNTY3NiwzNy4yNTcxNTg1IDI5LjM4MTg2NDksNDAuNDY5MjA2OSAzMy40Mjg2MjE2LDQwLjQ2OTIwNjkgQzM0Ljg0NTkxODksNDAuNDY5MjA2OSAzNi4xNjkzNTE0LDQwLjA3NTE4MjMgMzcuMjkwMTM1MSwzOS4zOTMxMjA4IEw0MS4xOTUxNjIyLDQzLjIxNjE1NjYgQzM5LjU3MjcyOTcsNDUuMjkyODkwNSAzOC42MDc5NzMsNDcuODg5NTg3MiAzOC42MDc5NzMsNTAuNzA2OTg3NiBDMzguNjA2NjIzNyw1My4yMjAyMjEzIDM5LjM4NjcwNSw1NS42NzEzMjggNDAuODM5NTk0Niw1Ny43MTkwMDM5IEwzNi40ODcsNjEuOTgwMzI5NyBDMzUuNTI1MTEwNSw2MS41NDc5NzY5IDM0LjQ4MjY4OTMsNjEuMzI1Mjc3MyAzMy40Mjg2MjE2LDYxLjMyNjk0NzIgQzI5LjM4MTg2NDksNjEuMzI2OTQ3MiAyNi4xMDE1Njc2LDY0LjUzODk5NTYgMjYuMTAxNTY3Niw2OC41MDEwNjIzIEMyNi4xMDE1Njc2LDcyLjQ2Mzc1MjQgMjkuMzgxODY0OSw3NS42NzUxNzczIDMzLjQyODYyMTYsNzUuNjc1MTc3MyBDMzcuNDc1Mzc4NCw3NS42NzUxNzczIDQwLjc1NTY3NTcsNzIuNDYzNzUyNCA0MC43NTU2NzU3LDY4LjUwMTA2MjMgQzQwLjc1NTY3NTcsNjYuODAyMTQzIDQwLjE1MjcwMjcsNjUuMjQxMDA3NyAzOS4xNDM4MTA4LDY0LjAxMjE3NDggTDQzLjA5MjM1MTQsNjAuMTQ2MTIwNCBDNDUuMjg1NDMyNCw2MS45NTYwMTQ5IDQ4LjExODE2MjIsNjMuMDQ3MDY0IDUxLjIxMDcyOTcsNjMuMDQ3MDY0IEM1NC4wODg4Mzc4LDYzLjA0NzA2NCA1Ni43NDAwNTQxLDYyLjEwMzE1MDcgNTguODYxNjQ4Niw2MC41MTM5NTk4IEw2My4xNTcwNTQxLDY0LjcxOTc5OCBDNjIuNDM4MjMxMSw2NS44NDkxMTA2IDYyLjA1Njg1NzksNjcuMTYxMjQ2MiA2Mi4wNTgwMjcsNjguNTAxMDYyMyBDNjIuMDU4MDI3LDcyLjQ2Mzc1MjQgNjUuMzM4MzI0Myw3NS42NzUxNzczIDY5LjM4NDQ1OTUsNzUuNjc1MTc3MyBDNzMuNDMxMjE2Miw3NS42NzUxNzczIDc2LjcxMTUxMzUsNzIuNDYzNzUyNCA3Ni43MTE1MTM1LDY4LjUwMTA2MjMgQzc2LjcxMTUxMzUsNjQuNTM4OTk1NiA3My40MzEyMTYyLDYxLjMyNjk0NzIgNjkuMzg0NDU5NSw2MS4zMjY5NDcyIEM2Ny45NjcxNjIyLDYxLjMyNjk0NzIgNjYuNjQ0MzUxNCw2MS43MjA5NzE4IDY1LjUyMjk0NTksNjIuNDAzNjU2OCBMNjEuMjI3NTQwNSw1OC4xOTc4MTg2IEM2Mi44NDk5NzMsNTYuMTIwNDYxMiA2My44MTQxMDgxLDUzLjUyMzc2NDUgNjMuODE0MTA4MSw1MC43MDY5ODc2IEM2My44MTQxMDgxLDQ3LjY3ODIzNTUgNjIuNzAwMTYyMiw0NC45MDUxMDA1IDYwLjg1MTQ1OTUsNDIuNzU3OTE2IEw2NC44LDM4Ljg5MTIzODIgWiBNNTUuOTc5MTg5MiwxLjMwNjc4MDg3IEw5Mi4wMjA4MTA4LDIxLjY4MDcxODkgQzk1LjEwMTU2NzYsMjMuNDIyNjU2NiA5NywyNi42NDIxODY1IDk3LDMwLjEyNjA2MTkgTDk3LDcwLjg3MzkzODEgQzk3LDc0LjM1NzgxMzUgOTUuMTAxNTY3Niw3Ny41NzczNDM0IDkyLjAyMDgxMDgsNzkuMzE5MjgxMSBMNTUuOTc5MTg5Miw5OS42OTM4NDI2IEM1Mi44ODY4MTA4LDEwMS40MzUzODYgNDkuMTEzMTg5MiwxMDEuNDM1Mzg2IDQ2LjAyMDgxMDgsOTkuNjkzODQyNiBMOS45NzkxODkxOSw3OS4zMTkyODExIEM2Ljg5ODQzMjQzLDc3LjU3NzM0MzQgNSw3NC4zNTc4MTM1IDUsNzAuODczOTM4MSBMNSwzMC4xMjYwNjE5IEM1LDI2LjY0MjE4NjUgNi44OTg0MzI0MywyMy40MjI2NTY2IDkuOTc5MTg5MTksMjEuNjgwNzE4OSBMNDYuMDIwODEwOCwxLjMwNjE1NzQxIEM0OS4xMTMxODkyLC0wLjQzNTM4NTgwMyA1Mi44ODY4MTA4LC0wLjQzNTM4NTgwMyA1NS45NzkxODkyLDEuMzA2MTU3NDEgTDU1Ljk3OTE4OTIsMS4zMDY3ODA4NyBaIE01MS4yMTEzNTE0LDU5Ljc5NjM2MTMgQzQ2LjA4NDIxNjIsNTkuNzk2MzYxMyA0MS45MjgwNTQxLDU1LjcyNzA2MDEgNDEuOTI4MDU0MSw1MC43MDYzNjQxIEM0MS45MjgwNTQxLDQ1LjY4NjkxNTEgNDYuMDg0MjE2Miw0MS42MTY5OTA0IDUxLjIxMTM1MTQsNDEuNjE2OTkwNCBDNTYuMzM4NDg2NSw0MS42MTY5OTA0IDYwLjQ5NDY0ODYsNDUuNjg2OTE1MSA2MC40OTQ2NDg2LDUwLjcwNjk4NzYgQzYwLjQ5NDY0ODYsNTUuNzI3MDYwMSA1Ni4zMzg0ODY1LDU5Ljc5Njk4NDcgNTEuMjExMzUxNCw1OS43OTY5ODQ3IEw1MS4yMTEzNTE0LDU5Ljc5NjM2MTMgWiBNNjkuMzg0NDU5NSw3Mi40MjUwOTgxIEM2Ny4xNzE0ODY1LDcyLjQyNTA5ODEgNjUuMzc3NDg2NSw3MC42NjgxOTc0IDY1LjM3NzQ4NjUsNjguNTAxMDYyMyBDNjUuMzc3NDg2NSw2Ni4zMzQ1NTA2IDY3LjE3MTQ4NjUsNjQuNTc3NjQ5OSA2OS4zODQ0NTk1LDY0LjU3NzY0OTkgQzcxLjU5NzQzMjQsNjQuNTc3NjQ5OSA3My4zOTIwNTQxLDY2LjMzNDU1MDYgNzMuMzkyMDU0MSw2OC41MDEwNjIzIEM3My4zOTIwNTQxLDcwLjY2ODE5NzQgNzEuNTk4MDU0MSw3Mi40MjUwOTgxIDY5LjM4NDQ1OTUsNzIuNDI1MDk4MSBaIE0zMy40Mjg2MjE2LDcyLjQyNTA5ODEgQzMxLjIxNTY0ODYsNzIuNDI1MDk4MSAyOS40MjE2NDg2LDcwLjY2ODE5NzQgMjkuNDIxNjQ4Niw2OC41MDEwNjIzIEMyOS40MjE2NDg2LDY2LjMzNDU1MDYgMzEuMjE1NjQ4Niw2NC41Nzc2NDk5IDMzLjQyODYyMTYsNjQuNTc3NjQ5OSBDMzUuNjQxNTk0Niw2NC41Nzc2NDk5IDM3LjQzNTU5NDYsNjYuMzM0NTUwNiAzNy40MzU1OTQ2LDY4LjUwMTA2MjMgQzM3LjQzNTU5NDYsNzAuNjY4MTk3NCAzNS42NDE1OTQ2LDcyLjQyNTA5ODEgMzMuNDI4NjIxNiw3Mi40MjUwOTgxIFogTTMzLjQyODYyMTYsMzcuMjE4NTA0MiBDMzEuMjE1NjQ4NiwzNy4yMTg1MDQyIDI5LjQyMTY0ODYsMzUuNDYyMjI2OSAyOS40MjE2NDg2LDMzLjI5NTA5MTggQzI5LjQyMTY0ODYsMzEuMTI3OTU2NyAzMS4yMTU2NDg2LDI5LjM3MTY3OTUgMzMuNDI4NjIxNiwyOS4zNzE2Nzk1IEMzNS42NDE1OTQ2LDI5LjM3MTY3OTUgMzcuNDM1NTk0NiwzMS4xMjc5NTY3IDM3LjQzNTU5NDYsMzMuMjk1MDkxOCBDMzcuNDM1NTk0NiwzNS40NjIyMjY5IDM1LjY0MTU5NDYsMzcuMjE4NTA0MiAzMy40Mjg2MjE2LDM3LjIxODUwNDIgWiBNNjkuMzg0NDU5NSwzNy4yMTg1MDQyIEM2Ny4xNzE0ODY1LDM3LjIxODUwNDIgNjUuMzc3NDg2NSwzNS40NjIyMjY5IDY1LjM3NzQ4NjUsMzMuMjk1MDkxOCBDNjUuMzc3NDg2NSwzMS4xMjc5NTY3IDY3LjE3MTQ4NjUsMjkuMzcxNjc5NSA2OS4zODQ0NTk1LDI5LjM3MTY3OTUgQzcxLjU5NzQzMjQsMjkuMzcxNjc5NSA3My4zOTIwNTQxLDMxLjEyNzk1NjcgNzMuMzkyMDU0MSwzMy4yOTUwOTE4IEM3My4zOTIwNTQxLDM1LjQ2MjIyNjkgNzEuNTk4MDU0MSwzNy4yMTg1MDQyIDY5LjM4NDQ1OTUsMzcuMjE4NTA0MiBaIiBpZD0iU2hhcGUiPjwvcGF0aD4gICAgICAgIDwvZz4gICAgPC9nPjwvc3ZnPg==);
        }

        .ck-media__wrapper[data-oembed-url*="ckeditor.com"] .ck-media__placeholder__url .ck-media__placeholder__url__text {
            color: hsl(282, 100%, 93%);
        }

        .ck-media__wrapper[data-oembed-url*="ckeditor.com"] .ck-media__placeholder__url .ck-media__placeholder__url__text:hover {
            color: hsl(0, 100%, 100%);
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create(document.querySelector('#extract'), {
                removePlugins: ['MediaEmbed'],
                simpleUpload: {
                    uploadUrl: "{{ route('image.upload') }}",
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#body'), {
                removePlugins: ['MediaEmbed'],
                simpleUpload: {
                    uploadUrl: "{{ route('image.upload') }}",
                }
            })
            .catch(error => {
                console.error(error);
            });

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {

            var file = event.target.files[0];

            var reader = new FileReader();

            reader.onload = (event) => {

                document.getElementById("picture").setAttribute('src', event.target.result)

            };

            reader.readAsDataURL(file);

        }
    </script>
@stop
