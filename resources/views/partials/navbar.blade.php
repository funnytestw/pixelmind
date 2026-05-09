<nav>
  <div class="nav-logo">
    <img  src="{{ asset('images/logo.png') }}" alt="شعار الموقع">
  </div>
  <ul class="nav-links">
    <li><a href="{{ url('/about') }}">ما هو؟</a></li>
    <li><a href="{{ url('/how') }}">كيف يعمل؟</a></li>
    <li><a href="{{ url('/tools') }}">الأدوات</a></li>
    <li><a href="{{ url('/gallery') }}">المعرض</a></li>
    <li><a href="{{ url('/examples') }}">أمثلة</a></li>
  </ul>
  <a href="{{ url('/about') }}" class="btn-primary" style="font-size:.85rem; padding:10px 24px;">استكشف الآن</a>
</nav>