@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                           id="sliders">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>caption ar</th>
                            <th>caption en</th>
                            <th>url</th>
                            <th>actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr class="odd gradeX">
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->caption_ar }}</td>
                                <td>{{ $slider->caption_en }}</td>
                                <td>{{ $slider->url }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('backend.slider.edit',$slider->id) }}">
                                                    <i class="fa fa-edit"></i> edit slide</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection