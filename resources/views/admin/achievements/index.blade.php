@extends('admin.index')
@section('main')

<div class="app-content my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title" style="font-family:ar;">الإنجازات</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a style="font-family:ar;" href="#">الإنجازات</a></li>
					<li class="breadcrumb-item active" style="font-family:ar;" aria-current="page">الإنجازات</li>
				</ol>
			</div>
			<!--/Page-Header-->

			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="card" >
						<div class="card-header">
							<h3 class="card-title" style="font-family:ar;">الإنجازات</h3>
						</div>
						<div class="table-responsive table-bordered">
							<table class="table table-bordered border-top mb-0">
								<thead style="font-family:ar;">
									<tr>
										<th style="font-family:ar;">الرقم المتسلسل</th>
										<th style="font-family:ar;">الميديا</th>
										<th style="font-family:ar;">الاسم</th>
										<th style="font-family:ar;">الوصف</th>
									</tr>
								</thead>
								<tbody style="font-family:ar;">
                                    @if(count($achievements) < 1) <tr>
                                        <td colspan="3" class="text-center">لا توجد إنجازات</td>
                                        </tr>
                                        @else
                                        @foreach($achievements as $key => $achievement)
                                        <tr>
                                            <td>{{($key+1)}}</td>
                                            <td><img src="{{$achievement->media}}" height="50px" width="50px"></td>
                                            <td style="font-family:ar">{{$achievement->name}}</td>
                                            <td style="font-family:ar">{!!Str::limit($achievement->description,30)!!}</td>
                                            <td>
                                                <a href="achievements/edit/{{$achievement->id}}" class="btn btn-sm btn-info " style="font-family:ar" data-toggle="tooltip" data-original-title="تعديل">تعديل</a>
                                                <a href="achievements/delete/{{$achievement->id}}" class="btn btn-sm btn-danger " style="font-family:ar" data-toggle="tooltip" data-original-title="حذف">حذف</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                </tbody>
                                <tfoot>
                                    <td colspan="5">
                                        <div class="text-right">
											{!! $achievements->withQueryString()->links('pagination::bootstrap-5') !!}
                                        </div>
                                    </td>
                                </tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection