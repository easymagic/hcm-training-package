@include('js_cdns.swal')
@if ($errors->any())
    <script>

        Swal.fire(
            'Error!',
            '@foreach ($errors->all() as $k=>$error) {{ $error }}! <br /> @endforeach',
            'error'
        )

    </script>
@endif

<script>

    var sessions = {!! json_encode(session()->all()) !!};

</script>

@if (session()->has('message'))

    @if (session()->has('error') && session()->get('error'))

        <script>

            Swal.fire(
                'Error!',
                '{{ session()->get('message') }}',
                'error'
            )

        </script>

    @else
        <script>

            Swal.fire(
                'Success!',
                '{{ session()->get('message') }}',
                'success'
            )

        </script>
    @endif

@endif