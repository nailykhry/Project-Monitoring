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
        <h1>PROJECT MONITORING</h1>
    </div>
    <div class="container my-4">
        <div class="d-flex justify-content-between mb-3">
            {{-- ADD PROJECT --}}
            <a href={{ route('project.create') }}><button><i class="bi bi-plus-lg"></i>
                    &nbsp;&nbsp;
                    Tambah
                    Project</button>
            </a>

            {{-- SEARCH --}}
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search"
                    value={{ request('search')}}>
                <button class="btn search-bar my-2 my-sm-0" type="submit">Search</button>
            </form>

        </div>

        {{-- TABLE --}}
        <table class="table table-borderless">
            <thead>
                <tr style="font-size: 1.2em">
                    <th scope="col">PROJECT NAME</th>
                    <th scope="col">CLIENT</th>
                    <th scope="col">PROJECT LEADER</th>
                    <th scope="col">START DATE</th>
                    <th scope="col">END DATE</th>
                    <th scope="col">PROGRESS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project['project_name'] }}</td>
                    <td>{{ $project['client'] }}</td>
                    <td>
                        <table>
                            <tr>
                                <td rowspan="2" class="centered"> <img
                                        src="{{ asset('storage/' . $project->pl_image) }}" style="border-radius: 50%"
                                        width="30px" height="30px" alt="error"></td>
                                <td style="margin:0%; padding:0%">{{ $project['pl_name'] }}</td>
                            </tr>
                            <tr>
                                <td style="margin:0%; padding:0%; font-size:0.9em">{{ $project['pl_email'] }}</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        @php
                        $dateFromDatabase =$project['start'];
                        $date = strtotime($dateFromDatabase);
                        $formatted_date = date('d M Y', $date);
                        @endphp
                        {{ $formatted_date }}
                    </td>
                    <td>@php
                        $dateFromDatabase =$project['end'];
                        $date = strtotime($dateFromDatabase);
                        $formatted_date = date('d M Y', $date);
                        @endphp
                        {{ $formatted_date }}</td>
                    <td>
                        <div class="progress">
                            @if($project['progress']<100) <div class="progress-bar bg-warning" role="progressbar"
                                style="width: {{ $project['progress'] }}%" aria-valuenow={{ $project['progress'] }}
                                aria-valuemin="0" aria-valuemax="100">{{ $project['progress'] }}%</div>
                        @else
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ $project['progress'] }}%" aria-valuenow={{ $project['progress'] }}
                            aria-valuemin="0" aria-valuemax="100">{{ $project['progress'] }}%</div>
                        @endif
    </div>
    </td>
    <td>
        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('project.destroy', $project->id) }}"
            method="POST">
            <a href="{{ route('project.edit', $project->id) }}" class="btn btn-sm button-secondary"><i
                    class="bi bi-pencil-square"></i></a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm button-tertiary"><i class="bi bi-trash3"></i></button>
        </form>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    <div class="pagination d-flex justify-content-end">{{ $projects->links('pagination::bootstrap-4') }}</div>
    </div>
</body>

</html>