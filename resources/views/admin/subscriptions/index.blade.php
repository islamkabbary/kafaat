@extends('admin.index')
@section('main')

<div class="app-content my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title" style="font-family:ar;">الاشتراكات</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a style="font-family:ar;" href="#">الاشتراكات</a></li>
					<li class="breadcrumb-item active" style="font-family:ar;" aria-current="page">الاشتراكات</li>
				</ol>
			</div>
			<!--/Page-Header-->

			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title" style="font-family:ar;">الاشتراكات</h3>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered border-top mb-0">
								<thead style="font-family:ar;">
									<tr>
										<th>الرقم المتسلسل</th>
										<th>رقم الجوال</th>
									</tr>
								</thead>
								<tbody style="font-family:ar;">
                                    @if(count($subscribes) < 1) <tr>
                                        <td colspan="3" class="text-center">لا توجد اشتراكات</td>
                                        </tr>
                                        @else
                                        @foreach($subscribes as $key => $subscribe)
                                        <tr>
                                            <td>{{($key+1)}}</td>
                                            <td style="font-family:ar">{{$subscribe->phone}}</td>
                                            <td>
                                                <a href="subscriptions/show/{{$subscribe->id}}" style="font-family:ar" class="btn btn-sm btn-info " data-toggle="tooltip" data-original-title="عرض">عرض</a>
                                                <a href="subscriptions/delete/{{$subscribe->id}}" style="font-family:ar" class="btn btn-sm btn-danger " data-toggle="tooltip" data-original-title="حذف">حذف</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                </tbody>
                                <tfoot>
                                    <td colspan="5">
                                        <div class="text-right">
											{!! $subscribes->withQueryString()->links('pagination::bootstrap-5') !!}
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