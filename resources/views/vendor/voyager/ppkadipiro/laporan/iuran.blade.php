@extends('voyager::ppkadipiro.master')

@section('page_title', setting('site.title') . ' - ' . $title)

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-browser"></i> {{ $title }}
        </h1>
    </div>
@stop

@section('content')
<div class="page-content browse container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Unik</th>
                                    <th>No Rumah</th>
                                    <th>Nama Pemilik / Penghuni</th>
                                    @foreach ($monthMap as $month)
                                        <th>{{ $month }}</th>
                                    @endforeach
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item as $house)
                                <tr>
                                    <td>{{ $house->code }}</td>
                                    <td>{{ $house->number }}</td>
                                    <td>{{ $house->owner_name }}</td>
                                    @foreach ($house->last_iuran_map as $hasPaid)
                                        @if ($hasPaid)
                                            <td><i class="voyager-check"></i></td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endforeach
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
