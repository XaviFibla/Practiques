<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <title>Hello, world!</title>
</head>

<body style="margin:10%;">
    <br />
    <h1>Hello, world!</h1>
    https://getbootstrap.com/docs/4.3/components/popovers/
    <br />
    <form id="projectForm" method="post">
        <div>
            Project Name:
            <input type="text" name="projectname" id="projectname" />

            <input type="submit" name="createBtn" id="createBtn" value="Create" />
        </div>
    </form>
    <br />
    <button id="example-popover" type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
    <div class="alert alert-warning alert-dismissible fade show" style="display:none;" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Progress</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</body>

</html>



<script type="text/javascript">
    $(document).ready(function() {

        $('#table_id').DataTable({
            "pagingType": "full_numbers",

            ajax: {
                url: 'project_create.php',
                dataSrc: ''
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'progress',
                    render: function(data, type, row, meta) {
                        return type === 'display' ?
                            '<progress value="' + data + '" max="100"></progress>' :
                            data;
                    }
                },
                {
                    data: 'date'
                },
            ]
        });

        $('.alert').hide();

        $('#example-popover').popover({
            container: 'body'
        })
        $('#projectForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'project_create.php',
                data: $(this).serialize(),
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        console.log(jsonData);
                        alert(jsonData.dani);
                        $('.alert').fadeIn(500);
                    } else {
                        alert('Error!');
                    }
                }
            });
        });
    });
</script>
</body>

</html>