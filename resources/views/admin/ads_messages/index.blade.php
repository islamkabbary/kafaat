@extends('admin.index')
@section('main')

<div class="app-content my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title" style="font-family:ar">رسائل ترويجية</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a style="font-family:ar" href="#">رسائل ترويجية</a></li>
					<li class="breadcrumb-item active" style="font-family:ar" aria-current="page">رسائل ترويجية</li>
				</ol>
			</div>
			<!--/Page-Header-->

			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title" style="font-family:ar;">رسائل ترويجية</h3>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered border-top mb-0">
								<thead style="font-family:ar">
									<tr>
										<th>الرقم المتسلسل</th>
										<th>الرسالة</th>
										<th>المستخدم</th>
									</tr>
								</thead>
								<tbody style="font-family:ar">
                                    @if(count($messagesAds) < 1) <tr>
                                        <td colspan="3" class="text-center">لا توجد رسائل ترويجية</td>
                                        </tr>
                                        @else
                                        @foreach($messagesAds as $key => $adsMessage)
                                        <tr>
                                            <td>{{($key+1)}}</td>
                                            <td style="font-family:ar">{{$adsMessage->message}}</td>
                                            <td style="font-family:ar">@if($adsMessage->allUsers == 0) {{$adsMessage->user->username}} @else كل المستخدمين @endif</td>
                                            <td>
                                                <a href="ads-messages/show/{{$adsMessage->id}}" class="btn btn-sm btn-info " style="font-family:ar" data-toggle="tooltip" data-original-title="عرض">عرض</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                </tbody>
                                <tfoot>
                                    <td colspan="5">
                                        <div class="text-right">
											{!! $messagesAds->withQueryString()->links('pagination::bootstrap-5') !!}
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