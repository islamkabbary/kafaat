@extends('admin.index')
@section('main')

    <div class="app-content my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title" style="font-family:ar;">رسائل التواصل</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="font-family:ar;" href="#">رسائل التواصل</a></li>
                    <li class="breadcrumb-item active" style="font-family:ar;" aria-current="page">رسائل التواصل</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family:ar;">رسائل التواصل</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered border-top mb-0">
                                <thead style="font-family:ar;">
                                    <tr>
                                        <th>الرقم المتسلسل</th>
                                        <th>الاسم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>الرسالة</th>
                                        <th>رقم الجوال</th>
                                    </tr>
                                </thead>
                                <tbody style="font-family:ar;">
                                    @if (count($contacts) < 1)
                                        <tr>
                                            <td colspan="3" class="text-center">لا توجد رسائل</td>
                                        </tr>
                                    @else
                                        @foreach ($contacts as $key => $contact)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->message }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>
                                                    <a href="contacts/show/{{ $contact->id }}" class="btn btn-sm btn-info "
                                                        data-toggle="tooltip" data-original-title="عرض">عرض</a>
                                                    <a href="contacts/delete/{{ $contact->id }}"
                                                        class="btn btn-sm btn-danger " data-toggle="tooltip"
                                                        data-original-title="حذف">حذف</a>
                                                    @if ($contact->replay)
                                                        <a href="#" class="btn btn-sm btn-info" data-toggle="tooltip"
                                                            data-original-title="تم التواصل">تم التواصل</a>
                                                    @else
                                                        <a href="#" class="btn btn-sm btn-info"
                                                            onclick="popUpConfirmReplay({{ $contact->id }})"
                                                            data-toggle="tooltip" data-original-title="تم اعادة التواصل">تم
                                                            اعادة التواصل</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <td colspan="5">
                                        <div class="text-right">
                                            {!! $contacts->withQueryString()->links('pagination::bootstrap-5') !!}
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
    <div class="modal" id="confirmReplay" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registerMessages">
                    @csrf
                    <div class="modal-body" style="padding: 40px">
                        <textarea class="form-control messageInContactUs" id="message1"
                            style="resize:none;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2)" name="message" rows="6"
                            placeholder="الرسالة"></textarea>
                        <input type="hidden" id="contact_id">
                    </div>
                    {{-- @php
                        dd($contact_id);
                    @endphp --}}
                    <div class="modal-footer">
                        <button type="button" onclick="replayCourse()" class="btn btn-danger"> <span id="text_replay">
                                حفظ</span> <span class="loader_area"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    function popUpConfirmReplay(id) {
        $('#contact_id').val(id);
        $('#confirmReplay').fadeIn(450).modal({
            'show': true
        });
    }

    function replayCourse() {
        $('#registerMessages').on('submit', function(e) {
            e.preventDefault();
        });
        var course_id = $('#contact_id').val();
        var message1 = $('#message1').val();
        $('.loader_area').html(
            '<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
        $('#text_replay').html('جاري ارسال الرسالة');
        $.ajax({
            url: "{{ url('/admin/contacts/replay') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                message1: message1,
                course_id: course_id
            },
            success: function() {
                location.reload();
            }
        })
    }
</script>
