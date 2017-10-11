@section('title') Acceuil @endsection
<?php
use App\Image;
use App\ItemType;
use Carbon\Carbon;
?>
@section('title')
    Clients
@endsection
@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
@endsection