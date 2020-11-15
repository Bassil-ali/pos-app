@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>التقارير</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">التقارير</li>

            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                                <div class="">
                                        <a href="{{ route('dashboard.index2') }}"  type="button" class="btn btn-warning"><i></i>اضغط هنا للبحث حسب السنه</a><br>


                                    </div><br>


                    <h3 class="box-title" style="margin-bottom: 15px">التقارير الشهريه <small></small></h3>

                    <form action="{{ route('dashboard.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">

                                    <select name="month" class="form-control" value="{{ request()->month }}">
                                        <option value="">اختر الشهر</option>

                                        @foreach($months as $month)
                                        <option value="{{ $month->month}}" {{ request()->month == $month->month ? 'selected' : '' }}>{{ $month->month }}</option>
                                      @endforeach

                                    </select>
                                </div>
                            </div>





                        <div class="col-md-4">
                            <div class="form-group">

                                <select name="year" class="form-control" value="{{ request()->year }}">
                                    <option value="">اختر السنه</option>

                                    @foreach($years as $year)
                                    <option value="{{ $year->year }}" {{ request()->year == $year->year ? 'selected' : '' }}>{{ $year->year }}</option>
                                  @endforeach

                                </select>
                            </div>
                        </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>


                            </div>


                        </div>
                    </form><!-- end of form -->


                </div><!-- end of box header -->

                <div class="box-body">

                        @php
                            $catsuma = 0;
                            $prodsuma =0;
                        @endphp

                    @if ($products->count() > 0)

						@if ($categories->count() == 0)
						<table class="table table-hover table-responsive">
								<thead>
								  <tr>
                                    <th scope="col"></th>
									<th scope="col"><h4>لا توجد إيرادات</h4></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
								  </tr>
                                 </thead>
								 <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">وصف المنصرف</th>
                                  <th scope="col">قيمه المنصرف</th>
                                  <th scope="col">زمن الانشاء</th>
                                </tr>
                              </thead>
                              @foreach($products as $index=>$product)
                              @php
                                $prodsuma += $product->valueS;
                              @endphp
                              <tbody>
                                <tr>
                                  <th scope="row">{{ $index + 1 }}</th>
                                  <td>{{ $product->nameS  }}</td>
                                  <td>{{ $product->valueS }}</td>
                                  <td>{{ $product->created_at }}</td>
                                  </tr>
                                </tbody>
                            @endforeach


                            <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">إجمالي المنصرفات</th>
                                            <th scope="col">{{ $prodsuma }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thread>
                                    <tbody>
                                        <tr>
                                            <th scope="row"></th>
                                        </tr>
                                    </tbody>


                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">اجمالي الايرادات و المنصرفات</th>
                                        <th scope="col">{{0- $prodsuma}}</th>
                                        <th scope="col"></th>
                                        </tr>
                                    </thead>


								  <tbody>
                                  <tr><th scope="row"></th></tr>
                                  </tbody>
                                  <thead>
								  <tr>
                                    <th scope="col"></th>
									<th scope="col"><h4>الوارثين</h4></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
								  </tr>
                                 </thead>


								<thead>
									<tr>
									  <th scope="col">#</th>
									  <th scope="col">اسم الوارث</th>
									  <th scope="col">نسبه الورثه</th>
									  <th scope="col">قيمه الورثه</th>
									</tr>
								  </thead>
								  @foreach($users as $index=>$user)
								  <tbody>
									<tr>
									  <th scope="row">{{ $index + 1 }}</th>
									  <td>{{ $user->totalname  }}</td>
									  <td>{{ $user->neth }}</td>
									  <td>{{$user->neth *  (0-$prodsuma)}}</td>
									</tr>
								  </tbody>
								  @endforeach
						</table>



						@else

							<table class="table table-hover table-responsive">
								<thead>
								  <tr>
									<th scope="col">#</th>
									<th scope="col">وصف الايراد</th>
									<th scope="col">قيمه الايراد</th>
									<th scope="col">زمن الانشاء</th>
								  </tr>
								</thead>
								@foreach($categories as $index=>$category)

                                @php
                                    $catsuma += $category->nameV;
                                @endphp
								<tbody>
								  <tr>
									<th scope="row">{{ $index + 1 }}</th>
									<td>{{ $category->nameA  }}</td>
									<td>{{ $category->nameV }}</td>
									<td>{{ $category->created_at }}</td>
								  </tr>
								</tbody>
								@endforeach
                                <thead>
								  <tr>
									<th scope="col">#</th>
                                    <th scope="col">إجمالي الإيرادات</th>
                                    <th scope="col">{{ $catsuma }}</th>
                                  </tr>
                                </thread>
                                <tbody>
                                    <tr>
                                    <th scope="row"></th>
                                    </tr>
                                </tbody>

								  <thead>
									<tr>
									  <th scope="col">#</th>
									  <th scope="col">وصف المنصرف</th>
									  <th scope="col">قيمه المنصرف</th>
									  <th scope="col">زمن الانشاء</th>
									</tr>
								  </thead>

								  @foreach($products as $index=>$product)

                                  @php
                                    $prodsuma += $product->valueS;
                                  @endphp
								  <tbody>
									<tr>
									  <th scope="row">{{ $index + 1 }}</th>
									  <td>{{ $product->nameS  }}</td>
									  <td>{{ $product->valueS }}</td>
									  <td>{{ $product->created_at }}</td>
                                    </tr>
								  @endforeach
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">إجمالي المنصرفات</th>
                                            <th scope="col">{{ $prodsuma }}</th>
                                        </tr>
                                    </thread>
                                    <tbody>
                                        <tr>
                                            <th scope="row"></th>
                                        </tr>
                                    </tbody>

								  </tbody>
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">اجمالي الايرادات و المنصرفات</th>
                                        <th scope="col">{{$catsuma - $prodsuma}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th scope="row"></th>
                                        </tr>
                                        </tbody>

								  <thead>
									<tr>
									  <th scope="col">#</th>
									  <th scope="col">اسم الوارث</th>
									  <th scope="col">نسبه الورثه</th>
									  <th scope="col">قيمه الورثه</th>
									</tr>
								  </thead>
								  @foreach($users as $index=>$user)
								  <tbody>
									<tr>
									  <th scope="row">{{ $index + 1 }}</th>
									  <td>{{ $user->totalname  }}</td>
									  <td>{{ $user->neth }}</td>
									  <td>{{$user->neth *  ($catsuma - $prodsuma)}}</td>
									</tr>
								  </tbody>
								  @endforeach
							</table>


						@endif



                    @else

						@if ($categories->count() > 0)
							<table class="table table-hover table-responsive">
							<thead>
								  <tr>
									<th scope="col">#</th>
									<th scope="col">وصف الايراد</th>
									<th scope="col">قيمه الايراد</th>
									<th scope="col">زمن الانشاء</th>
								  </tr>
								</thead>
								@foreach($categories as $index=>$category)

                                @php
                                    $catsuma += $category->nameV;
                                @endphp
								<tbody>
								  <tr>
									<th scope="row">{{ $index + 1 }}</th>
									<td>{{ $category->nameA  }}</td>
									<td>{{ $category->nameV }}</td>
									<td>{{ $category->created_at }}</td>
								  </tr>
								</tbody>
								@endforeach
                                <thead>
								  <tr>
									<th scope="col">#</th>
                                    <th scope="col">إجمالي الإيرادات</th>
                                    <th scope="col">{{ $catsuma }}</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thread>
                                <tbody>
                                    <tr>
                                    <th scope="row"></th>
                                    </tr>
                                </tbody>
								<thead>
								  <tr>
                                    <th scope="col"></th>
									<th scope="col"><h4>لا يوجد منصرفات</h4></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
								  </tr>
                                 </thead>
                                  <thead>
                                        <tr>
                                        <th scope="col"></th>
                                        <th scope="col">اجمالي الايرادات و المنصرفات</th>
                                        <th scope="col">{{$catsuma}}</th>
                                        <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <th scope="row"></th>
                                    </tr>
                                </tbody>
									<tr>
									  <th scope="col">#</th>
									  <th scope="col">اسم الوارث</th>
									  <th scope="col">نسبه الورثه</th>
									  <th scope="col">قيمه الورثه</th>
									</tr>
								  </thead>
								  @foreach($users as $index=>$user)
								  <tbody>
									<tr>
									  <th scope="row">{{ $index + 1 }}</th>
									  <td>{{ $user->totalname  }}</td>
									  <td>{{ $user->neth }}</td>
									  <td>{{$user->neth *  $catsuma}}</td>
									</tr>
								  </tbody>
								  @endforeach
						</table>

						@else

							<h2>@lang('site.no_data_found')</h2>
						@endif

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
