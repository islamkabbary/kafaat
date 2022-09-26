<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar doc-sidebar">
{{--            <div class="app-sidebar__user clearfix">--}}
{{--                <div class="dropdown user-pro-body">--}}
{{--                    <div>--}}
{{--                        <img src="{{asset('assets/images/auth()->user()->photo')}}" alt="user-img" class="avatar avatar-lg brround">--}}
{{--                        <a href="editprofile.html" class="profile-img">--}}
{{--                            <span class="fa fa-pencil" aria-hidden="true"></span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="user-info">--}}
{{--                        <h2>{{auth()->user()->username}}</h2>--}}
{{--                        <span>Web Designer</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
    <br>
            <ul class="side-menu">
                <li class="slide">
                    <a class="side-menu__item" style="font-family:ar" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-user"></i><span style="font-family:ar" class="side-menu__label">المستخدمين</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/users')}}">المستخدمين</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/users/create')}}">إضافة مستخدم</a></li>


                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" style="font-family:ar" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-user-plus"></i><span style="font-family:ar" class="side-menu__label">مديرين النظام</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/admins')}}">مديرين النظام</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/admins/create')}}">إضافة مدير للنظام</a></li>


                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" style="font-family:ar" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-airplay"></i><span style="font-family:ar" class="side-menu__label">الخدمات</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/services')}}">الخدمات</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/services/create')}}">إضافة خدمة</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/services/orders')}}">طلبات الخدمات</a></li>


                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-aperture"></i><span style="font-family:ar" class="side-menu__label">مجالات الأعمال</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{route('business_area.index')}}">مجالات الأعمال</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{route('business_area.create')}}">إضافة مجال عمل</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-info"></i><span style="font-family:ar" class="side-menu__label">من نحن</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{route('about_us.index')}}">أقسام من نحن</a></li>

                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span style="font-family:ar" class="side-menu__label">الدورات</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/courses')}}"> الدورات المتاحة </a></a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/courses/purchased/20212120')}}"> الدورات المشتراه (الحالية)</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/courses/date-expired/msfa20212120')}}"> الدورات المنتهية (أرشيف)</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/courses/create')}}">إضافة دورة</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#" ><i class="side-menu__icon fe fe-dollar-sign"></i><span style="font-family:ar" class="side-menu__label">المدفوعات</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar"  href="{{url('/admin/bank_transactions')}}">الحوالات البنكية</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/credit_transactions')}}">الدفع الإلكترونى</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-calendar"></i><span style="font-family:ar" class="side-menu__label">الإنجازات</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{route('achievements.index')}}">الإنجازات</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{route('achievements.create')}}">إضافة إنجاز</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-eye"></i><span style="font-family:ar" class="side-menu__label">الإعلانات</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{route('ads.index')}}">الإعلانات</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{route('ads.create')}}">إضافة إعلان</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-comment"></i><span style="font-family:ar" class="side-menu__label">رسائل ترويجية</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{route('ads-messages.index')}}">رسائل ترويجية</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{route('ads-messages.create')}}">إضافة رسالة</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-activity"></i><span style="font-family:ar" class="side-menu__label">الشركاء</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/partners')}}">الشركاء</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/partners/create')}}">إضافة شريك</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-bell"></i><span style="font-family:ar" class="side-menu__label">رسائل التواصل</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{route('contacts.index')}}">الرسائل</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-phone"></i><span style="font-family:ar" class="side-menu__label">الاشتراكات</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{route('subscriptions.index')}}">الاشتراكات</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-shopping-cart"></i><span style="font-family:ar" class="side-menu__label">كوبونات الخصم</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{route('coupons.index')}}">كوبونات الخصم</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{route('coupons.create')}}">إضافة كوبون</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-file"></i><span style="font-family:ar" class="side-menu__label">الشهادات</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{route('certificates.index')}}">الشهادات المستخرجة</a></li>
                        <li><a class="slide-item" style="font-family:ar" href="{{route('certificatesRequested')}}">طلبات الشهادات</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-rocket"></i><span style="font-family:ar" class="side-menu__label">الصفحات</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{route('pages.index')}}">جميع صفحات الفوتر</a></li>

                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-settings"></i><span style="font-family:ar" class="side-menu__label"> إعدادات الموقع</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" style="font-family:ar" href="{{url('/admin/settings')}}">تعديل الإعدادات</a></li>

                    </ul>
                </li>
            </ul>
        </aside>
