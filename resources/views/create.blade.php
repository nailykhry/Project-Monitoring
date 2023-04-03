<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Monitoring</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="title">
        <h1>FORM MENAMBAHKAN PROJECT</h1>
    </div>

    <div class="container my-3">
        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class=" form-group">
                <label for="project_name">Project Name</label>
                <input type="text" class="form-control" id="project_name" name="project_name"
                    placeholder="Enter Project Name">
            </div>
            <div class="form-group">
                <label for="client">Client</label>
                <input type="text" class="form-control" id="client" name="client" placeholder="Enter Client Name">
            </div>
            <div class="form-group">
                <label for="pl_name">Project Leader Name</label>
                <input type="text" class="form-control" id="pl_name" name="pl_name"
                    placeholder="Enter Project Leader Name">
            </div>
            <div class="form-group">
                <label for="pl_email">Project Leader Email</label>
                <input type="email" class="form-control" id="pl_email" name="pl_email"
                    placeholder="Enter project leader email">
            </div>
            <div class="form-group">
                <label for="pl_image">Project Leader Profile</label>
                <input type="file" class="form-control" id="pl_image" name="pl_image">

            </div>

            <div class="form-group">
                <label for="start">Start Date</label>
                <input type="date" class="form-control" id="start" name="start" placeholder="Enter start project date">
            </div>

            <div class="form-group">
                <label for="end">End Date</label>
                <input type="date" class="form-control" id="end" name="end" placeholder="Enter end project date">
            </div>


            <div class="form-group">
                <label for="progress">Progress</label>
                <input type="number" class="form-control" id="progress" aria-describedby="progress" name="progress"
                    placeholder="Masukkan sebuah bilangan bulat">
                <small id="progress" class="form-text text-muted">Masukkan bilangan bulat menunjukkan progress dalam
                    persen</small>
            </div>


            <button type="submit" class="float-right mx-3"><i class="bi bi-send-plus"></i>&nbsp;&nbsp;Submit</button>
            <div style="clear: both;"></div>
        </form>
    </div>
</body>

</html>