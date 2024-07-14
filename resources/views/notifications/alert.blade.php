 <!-- Display success message -->
 @if (session('success'))
 <div id="success-alert" class="alert alert-success">
     {{ session('success') }}
 </div>
@endif

<!-- Display error message -->
@if (session('error'))
 <div id="error-alert" class="alert alert-danger">
     {{ session('error') }}
 </div>
@endif
