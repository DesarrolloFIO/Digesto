<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <!-- Font Awesome --> --}}
    <link rel="stylesheet" href="{{ asset('assets/lte3/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- <!-- Ionicons --> --}}
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    {{-- <!-- daterange picker --> --}}
    <link rel="stylesheet" href="{{ asset('assets/lte3/plugins/daterangepicker/daterangepicker.css') }}">

    {{-- <!-- DataTables --> --}}
    <link rel="stylesheet" href="{{ asset('assets/lte3/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    {{-- <!-- Theme style --> --}}
    <link rel="stylesheet" href="{{ asset('assets/lte3/dist/css/adminlte.min.css') }}">
    {{-- <!-- Google Font: Source Sans Pro --> --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- <!-- Tempusdominus Bootstrap 4 --> --}}
    <link rel="stylesheet"
        href="{{ asset('assets/lte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    {{-- <!-- Bootstrap Color Picker --> --}}
    <link rel="stylesheet"
        href="{{ asset('assets/lte3/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    {{-- <!-- Select2 --> --}}
    <link rel="stylesheet" href="{{ asset('assets/lte3/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/lte3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    {{-- <!-- Bootstrap4 Duallistbox --> --}}
    <link rel="stylesheet"
        href="{{ asset('assets/lte3/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
</head>

<body>
    @include('header')

    @yield('content')


    <!-- jQuery -->

    <script src="{{ asset('assets/lte3/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/lte3/plugins/jquery/jquery.min.js') }}"></script>


    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/lte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- InputMask -->
    <script src="{{ asset('assets/lte3/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lte3/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/lte3/plugins/inputmask/jquery.inputmask.js') }}"></script> --}}

    <!-- DataTables -->
    <script src="{{ asset('assets/lte3/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/lte3/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

    <!-- date-range-picker -->
    <script src="{{ asset('assets/lte3/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <!-- bs-custom-file-input -->
    <script src="{{ asset('assets/lte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script src="{{ asset('assets/lte3/dist/js/adminlte.min.js') }}"></script>


    <script>
        $(function() {

            bsCustomFileInput.init()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/aaaa'
            })
            //Datemask dd/mm/yyyy
            $('#numero').inputmask('9999-9999', {
                'placeholder': '0000-0000'
            })


        })
    </script>
    <script>
        $(function() {
            $('#userList').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,
            });
        });


        $('th').click(function() {
            var table = $(this).parents('table').eq(0)
            var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
            this.asc = !this.asc
            if (!this.asc) {
                rows = rows.reverse()
            }
            for (var i = 0; i < rows.length; i++) {
                table.append(rows[i])
            }
            setIcon($(this), this.asc);
        })

        function comparer(index) {
            return function(a, b) {
                var valA = getCellValue(a, index),
                    valB = getCellValue(b, index)
                return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
            }
        }

        function getCellValue(row, index) {
            return $(row).children('td').eq(index).html()
        }

        function setIcon(element, asc) {
            $("th").each(function(index) {
                $(this).removeClass("sorting");
                $(this).removeClass("asc");
                $(this).removeClass("desc");
            });
            element.addClass("sorting");
            if (asc) element.addClass("asc");
            else element.addClass("desc");
        }
    </script>

    @yield('jsuser')
    @yield('jsdoc')

</body>

</html>
