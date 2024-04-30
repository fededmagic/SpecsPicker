@extends("layouts.app")
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <form method="POST" action="{{ route("home.search") }}">
                @csrf
                <div class="form-group row">
                    <label for="txtInput" class="col-lg-4 col-md-4 col-sm-12 col-form-label">Software name:</label>
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <input type="text" id="txtInput" name="txtInput" class="form-control">
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>

<div class="container">
    <div class="row justify-content">
      <h4>Minimum specs</h4>
        <table class="table table-bordered table-striped">

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

    <div class="row justify-content">
      <h4>Suggested specs</h4>
      <table class="table table-bordered table-striped">

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
@endsection

@section("sidebar")
<nav id="sidebar">
  <ul class="list-unstyled components">

    @foreach($viewData["responses"] as $response)
    <li class="mb-2">
      <a href="#" class="text-dark text-decoration-none d-flex align-items-center">
        <i class="bi bi-layers me-2"></i>
        <p>{{ $response->getName() }}</p>
      </a>
      <hr class="my-0" style="width: 50%;">
    </li>
    @endforeach
  
  </ul>
</nav>


@endsection
