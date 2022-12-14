<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">

    <title>Hello, world!</title>
</head>

<body style="margin:10%;">
    <br />
    <h1>Hello, world!</h1>

    <br />
    <form id="projectForm" method="post">
        <div>
            Project Name:
            <input type="text" name="projectname" id="projectname" />
            <input type="submit" name="createBtn" id="createBtn" value="Create" />
        </div>
    </form>
    <br />
    <div id="content"></div>
    <table id="table" data-toggle="table" data-height="460" data-ajax="ajaxRequest">
        <thead>
            <tr>
                <th data-field="id">ID</th>
                <th data-field="name">Name</th>
                <th data-field="progress">Progress</th>
            </tr>
        </thead>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
</body>

</html>



<script type="text/javascript">
    $(document).ready(function() {

        $('#projectForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'project_create.php',
                data: $(this).serialize(),
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "OK") {
                        console.log(jsonData);
                        alert(jsonData.name);
                        $('#content').append('<div>' + jsonData.name + '</div>');
                    } else {
                        alert('Error!');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        });
    });


    // your custom ajax request here
    function ajaxRequest(params) {
        var url = 'http://localhost:3000/projects.php'
        $.get(url).then(function(res) {
            params.success(JSON.parse(res))
        })
    }
</script>
</body>

</html>