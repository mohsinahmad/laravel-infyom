@extends('admin.layouts.app')
@section('title')
    Add Module Wizard
@endsection

@section('content')
    <section id="content_section" class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <!-- Your Page Content Here -->
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabtittle1">
                            <a id="" href="{{ Request::segment(4)==null?'javascript:void(0)':url('admin/module/step1/'.$id) }}" data-toggle="">
                                <i class="fa fa-info"></i> Step 1-Module Information
                            </a>
                        </li>
                        <li id="tabtittle2">
                            <a id="" href="{{ Request::segment(4)==null?'javascript:void(0)':url('admin/module/step2/'.$id) }}" data-toggle="">
                                <i class="fa fa-table"></i> Step 2 - Table Display
                            </a>
                        </li>
                        <li id="tabtittle3">
                            <a id="" href="{{ Request::segment(4)==null?'javascript:void(0)':url('admin/module/step3/'.$id) }}" data-toggle="">
                                <i class="fa fa-wrench"></i> Step 3 - Form Display
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        @include('admin.module.'.$step)

                        {{--@include('admin.module.step1')
                        <!-- /.tab-pane -->
                        @include('admin.module.step2')
                        <!-- /.tab-pane -->
                        @include('admin.module.step3')--}}
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
