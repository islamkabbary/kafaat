@extends('admin.index')
@section('main')

<div class="app-content my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title" style="font-family:ar">مجالات الأعمال</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a style="font-family:ar" href="#">مجالات الأعمال</a></li>
					<li class="breadcrumb-item active" style="font-family:ar" aria-current="page">مجالات الأعمال</li>
				</ol>
			</div>
			<!--/Page-Header-->

			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title" style="font-family:ar;">مجالات الأعمال</h3>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered border-top mb-0">
								<thead style="font-family:ar">
									<tr>
										<th>الرقم المتسلسل</th>
										<th>الاسم</th>
										<th>الوصف</th>
										<th>الصورة</th>
									</tr>
								</thead>
								<tbody style="font-family:ar">
                                    @if(count($business_areas) < 1) <tr>
                                        <td colspan="3" class="text-center">لا توجد مجالات أعمال</td>
                                        </tr>
                                        @else
                                        @foreach($business_areas as $key => $business_area)
                                        <tr>
                                            <td>{{($key+1)}}</td>
                                            <td style="font-family:ar">{{$business_area->title}}</td>
                                            <td style="font-family:ar">{!!Str::limit($business_area->description,50)!!}</td>
                                            <td><img src="{{$business_area->image}}" width="50px" height="50px"></td>
                                            <td>
                                                <a href="business_area/edit/{{$business_area->id}}" class="btn btn-sm btn-info " style="font-family:ar" data-toggle="tooltip" data-original-title="تعديل">تعديل</a>
                                                <a href="business_area/delete/{{$business_area->id}}" class="btn btn-sm btn-danger " style="font-family:ar" data-toggle="tooltip" data-original-title="حذف">حذف</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                </tbody>
                                <tfoot>
                                    <td colspan="5">
                                        <div class="text-right">
											{!! $business_areas->withQueryString()->links('pagination::bootstrap-5') !!}
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
