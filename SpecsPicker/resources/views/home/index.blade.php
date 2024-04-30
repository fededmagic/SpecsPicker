@extends("layouts.app")
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])

@section("content")
<!--
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

-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <form method="POST" action = "{{ route("home.search") }}">
                @csrf
                <div class="form-group row">
                    <label for="txtInput" class="col-lg-4 col-md-4 col-sm-12 col-form-label">Software name:</label>
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <input type="text" id="txtInput" name="txtInput" class="form-control">
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    <div class="form-group row mt-3">
                      <div class="col-lg-8 col-md-8 col-sm-12 offset-md-4">

                        <h4>Minimum specs</h4>
                        <table class = "table table-bordered table-striped">

                          <tr>
                            <th>Component</th>
                            <th>Value</th>
                          </tr>
                          
                          @if(array_key_exists("minimum", $viewData["result"]))
                            
                            @foreach(array_keys($viewData["result"]["minimum"]) as $field)
                            <tr>
                                <td>{{ $field }}</td>
                                <td>{{ $viewData["result"]["minimum"][$field] }}</td>
                            </tr>
                            @endforeach

                          @endif

                        </table>

                      </div>

                      <div class="form-group row mt-3">
                        <div class="col-lg-8 col-md-8 col-sm-12 offset-md-4">
  
                          <h4>Suggested specs</h4>
                          <table class = "table table-bordered table-striped">

                            <tr>
                              <th>Component</th>
                              <th>Value</th>
                            </tr>
                            
                            @if(array_key_exists("suggested", $viewData["result"]))
                              
                              @foreach(array_keys($viewData["result"]["suggested"]) as $field)
                              <tr>
                                <td>{{ $field }}</td>
                                <td>{{ $viewData["result"]["suggested"][$field] }}</td>
                              </tr>
                              @endforeach

                            @endif
  
                          </table>
  
                        </div>
                      </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection