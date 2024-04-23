<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{route('adminHome')}}">
            <h4>لوحة التحكم</h4>
        </a>
        <!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li><h3>العناصر</h3></li>
        @if(auth('admin')->user())
        <li class="slide">
            <a class="side-menu__item" href="{{route('adminHome')}}">
                <i class="fa fa-home side-menu__icon"></i>
                <span class="side-menu__label">الرئيسية</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('admins.index')}}">
                <i class="fa fa-user side-menu__icon"></i>
                <span class="side-menu__label">المشرفين</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('users.index')}}">
                <i class="fa fa-users side-menu__icon"></i>
                <span class="side-menu__label">المستخدمين</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('tasks.index')}}">
                <i class="fa fa-plane side-menu__icon"></i>
                <span class="side-menu__label">المهام</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.logout')}}">
                <i class="fa fa-lock side-menu__icon"></i>
                <span class="side-menu__label">تسجيل الخروج</span>
            </a>
        </li>
        @else
            <li class="slide">
                <a class="side-menu__item" href="{{route('adminHome')}}">
                    <i class="fa fa-home side-menu__icon"></i>
                    <span class="side-menu__label">الرئيسية</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('user.tasks.index')}}">
                    <i class="fa fa-plane side-menu__icon"></i>
                    <span class="side-menu__label">المهام الخاصه بي</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('admin.logout')}}">
                    <i class="fa fa-lock side-menu__icon"></i>
                    <span class="side-menu__label">تسجيل الخروج</span>
                </a>
            </li>
        @endif
    </ul>
</aside>

