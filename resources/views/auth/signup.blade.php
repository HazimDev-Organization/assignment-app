<head>
<title>Assignment-App</title>
  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>
<!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="
        margin-top: -100px;
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Sign up now</h2>
          <form method="post" action="{{ route('registration.post') }}">
          @csrf
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" name="email" id="email" class="form-control" />
              <label class="form-label" for="email">Email address</label>
              @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
            </div>

             <!-- full name input -->
             <div data-mdb-input-init class="form-outline mb-4">
              <input type="text" name="name" id="name" class="form-control" />
              <label class="form-label" for="name">Full Name</label>
              @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif

            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" name="password" id="password" class="form-control" />
              <label class="form-label" for="password">Password</label>
              @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
            </div>

            <!-- full name input -->
            <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="role">Role: </label>
    <div class="btn-group">
    <input type="radio" class="btn-check" name="role" id="student" value="student" checked />
        <label class="btn btn-secondary" for="student" data-mdb-ripple-init>Student</label>

        <input type="radio" class="btn-check" name="role" id="lecturer" value="lecturer"/>
        <label class="btn btn-secondary" for="lecturer" data-mdb-ripple-init>Lecturer</label>
    </div>
</div>
         
            <!-- Submit button -->
            <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Submit" >
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>
</body>