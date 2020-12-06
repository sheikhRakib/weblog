<!-- User Card -->
<div class="card card-widget widget-user">
    <!-- Name -->
    <div class="widget-user-header bg-gray">
        <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
    </div>

    <!-- Display Picture -->
    <div class="widget-user-image">
        <img class="img-circle elevation-2" src="https://ui-avatars.com/api/?bold=true&color=272a6b&name={{ Auth::user()->name }}"
            alt="User Avatar">
    </div>

    <div class="card-body pt-5">
        <!-- Introduction -->
        @if(Auth::user()->intro)
        <h6 class="widget-user-desc text-center font-italic">{{ Auth::user()->intro }}</h6>
        <hr>
        @endif

        <!-- Sex -->
        @if (Auth::user()->sex)
        <strong class="d-block">
            <i class="fas fa-venus-mars fa-lg w-20"></i>
            <span>{{ Auth::user()->sex }}</span>
        </strong>
        @endif

        <!-- Birth Date -->
        @if (Auth::user()->dob)
        <strong class="d-block">
            <i class="fas fa-birthday-cake fa-lg w-20"></i>
            <span>{{ Auth::user()->birthdate }}</span>
        </strong>
        @endif

        <!-- Location -->
        @if (Auth::user()->location)
        <strong class="d-block">
            <i class="fas fa-map-marker-alt fa-lg w-20"></i>
            <span>{{ Auth::user()->location }}</span>        
        </strong>
        @endif

        <!-- Education -->
        @if (Auth::user()->education)
        <strong class="d-block">
            <i class="fas fa-university fa-lg w-20"></i>
            <span>{{ Auth::user()->education }}</span>
        </strong>
        @endif

        <!-- Workplace -->
        @if (Auth::user()->workplace)
        <strong class="d-block">
            <i class="fas fa-briefcase fa-lg w-20 h-100"></i>
            <span>{{ Auth::user()->workplace }}</span>
        </strong>
        @endif
    </div>
</div>
<!-- ./User Card -->
