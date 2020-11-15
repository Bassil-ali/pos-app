@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>المنصرفات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.products.index') }}">المنصرفات</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.products.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}




                            <div class="form-group">
                                <label>وصف المنصرف :</label>
                                <textarea type="text" name="nameS" class="form-control" value=""placeholder="الاسم"></textarea>
                            </div>

                            <div class="form-group">
                                <label>قيمه  المنصرف :</label>
                                <input type="text" name="valueS" class="form-control" value="" placeholder="القيمه">
                            </div>
                            <div class="form-group">

                                <select name="month" class="form-control">
                                    <option value="">اختر الشهر</option>
                                    @foreach ($months as $month)
                                        <option value="{{ $month->month }}" }}>{{ $month->month }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">

                                    <select name="year" class="form-control">
                                        <option value="">اختر السنه</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year->year }}" }}>{{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                        <br>
                        <br>




                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
