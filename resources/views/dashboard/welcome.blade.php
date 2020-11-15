@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.dashboard')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                {{-- categories--}}


                {{--products--}}

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $products_count }}</h3>

                           <p>التقارير</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('dashboard.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">اضغط للتقارير!</h4>
                        <p>ابحث عن اسم الشهر والسنه لعرض التقرير </p>
                        <hr>
                        <p class="mb-0">التقرير يحتوي على الايرادات والمنصرفات واسم كل وارث وقيمه الورثه الكليه لكل وارث</p>
                      </div>




            </div><!-- end of row -->



        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

@push('scripts')



@endpush
