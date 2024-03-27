@extends("layouts.app")
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])

@section("content")
<div class="sidebar-wrapper">
    <div class="sidebar-linklist-wrapper">
      <div class="link-list-wrapper">
        <ul class="link-list">
          <li><a class="list-item medium active" href="#"><span>Home</span></a>
          </li>
          <li><a class="list-item medium disabled" href="#"><span>About</span></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="sidebar-linklist-wrapper linklist-secondary">
      <div class="link-list-wrapper">
        <ul class="link-list">
          <li><a class="list-item" href="#"><span>Software1</span></a>
          </li>
          <li><a class="list-item active" href="#"><span>Software2</span></a>
          </li>
          <li><a class="list-item disabled" href="#"><span>Software3</span></a>
          </li>
        </ul>
      </div>
    </div>
  </div>

<div class="h-100 d-flex align-items-center justify-content-center">
    <div>
      
    </div>
  </div>

@endsection
