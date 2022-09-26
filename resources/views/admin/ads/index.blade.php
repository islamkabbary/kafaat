@extends('admin.index')
@section('main')

    <div class="app-content my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title" style="font-family:ar">الإعلانات</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="font-family:ar" href="#">الإعلانات</a></li>
                    <li class="breadcrumb-item active" style="font-family:ar" aria-current="page">الإعلانات</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family:ar;">الإعلانات</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered border-top mb-0">
                                <thead style="font-family:ar">
                                    <tr>
                                        <th width="10%">الرقم المتسلسل</th>
                                        <th width="10%">الاسم</th>
                                        <th width="40%">الوصف</th>
                                        <th width="20%">الصورة</th>
                                    </tr>
                                </thead>
                                <tbody style="font-family:ar">
                                    @if (count($ads) < 1)
                                        <tr>
                                            <td colspan="3" class="text-center">لا توجد إعلانات</td>
                                        </tr>
                                    @else
                                        @foreach ($ads as $key => $adss)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td style="font-family:ar">{{ $adss->title }}</td>
                                                <td style="font-family:ar">{!! Str::limit($adss->description, 50) !!}</td>
                                                <td><img src="{{ $adss->image }}" width="50px" height="50px"></td>
                                                <td>
                                                    <a href="ads/edit/{{ $adss->id }}" class="btn btn-sm btn-info "
                                                        style="font-family:ar" data-toggle="tooltip"
                                                        data-original-title="تعديل">تعديل</a>
                                                    <a href="ads/delete/{{ $adss->id }}" class="btn btn-sm btn-danger "
                                                        style="font-family:ar" data-toggle="tooltip"
                                                        data-original-title="حذف">حذف</a>
                                                    @if ($adss->is_show)
                                                        <a href="ads/hide/{{ $adss->id }}"
                                                            class="btn btn-sm btn-danger " style="font-family:ar"
                                                            data-toggle="tooltip" data-original-title="اخفاء">اخفاء</a>
                                                    @else
                                                        <a href="ads/hide/{{ $adss->id }}"
                                                            class="btn btn-sm btn-danger " style="font-family:ar"
                                                            data-toggle="tooltip" data-original-title="عرض">عرض</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <td colspan="5">
                                        <div class="text-right">
                                            {!! $ads->withQueryString()->links('pagination::bootstrap-5') !!}
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
