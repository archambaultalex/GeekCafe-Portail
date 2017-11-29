@extends('layouts.template')

@section('title')
    Branches
@endsection
    <?php
    use App\Branch;
    ?>


@section('content')
    <div class="table-responsive">
       <a class="btn btn-primary" style="float:right;background-color: #02f837; border-color: #02f837;" href="{{route('branches.create')}}">Ajouter une branch</a>
        <table class="table table-hover" id="basicTable">
            <thead>
            <tr>

                <th style="width:10%">Image</th>
                <th>Location</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Manager Name</th>
                <th>Manager Phone</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
                <tr>
                    <td class="v-align-middle ">
                        <img style="max-width: 40%;" src="data:image/png;base64,{{App\Image::findOrFail($row['image_id'])->image}}"/>
                    </td>

                    <td class="v-align-middle nameTd">
                        <p>{{$row['location']}}</p>
                    </td>

                    <td class="v-align-middle">
                        <p>{{$row['email']}}</p>
                    </td>

                    <td class="v-align-middle">
                        <p>{{$row['phone']}}</p>
                    </td>

                    <td class="v-align-middle">
                        <p>{{$row['manager_name']}}</p>
                    </td>


                    <td class="v-align-middle">
                        <p>{{$row['manager_phone']}}</p>
                    </td>


                    <td style="text-align: center" class="v-align-middle">
                        <a class="btn btn-primary" href="{{route('branches.edit',$row['id'])}}">Modifier</a>


                    </td>
                    <td style="text-align: center" class="v-align-middle">
                        <form method="post" action=" {{route('branches.destroy',$row['id'])}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE"/>
                            <input style="color: #fff;background-color: #d12a4e;border-color: #ea2c54;" class="btn btn-primary" type="submit" value="Éffacer"></form>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection