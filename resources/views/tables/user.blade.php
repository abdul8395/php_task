

@extends('index')

@section('content')
<!-- <h1 style="margin-left: 50px; margin-top: 50px;">welcome user:</h1> -->
    <br>
<style>
    /* .btn-info, .btn-warning, .btn-danger {
        border-radius: 0px;
    } */

    thead {
        background-color: #7386d5;
        color: #fff;
    }
</style>

<table class="table table-striped" id="tbl" style="width:100%;">
    <thead>
        <tr>

            <th>
                id 
            </th>

            <th>
               User Name
            </th>
           
            <th>
               User Description
            </th>

            <th>
                Created_At
            </th>
            <th>
                Updated_At
            </th>
        </tr>
    </thead>
    <tbody>
    @foreach ($tbldata as $p)
            <tr>
                <td>
                    {{$p->id}}
                </td>

                <td>
                    {{$p->product_name}}
                </td>
                
                <td>
                    {{$p->product_description}}
                </td>

                <td>
                    {{$p->created_at}}
                </td>

                <td>
                    {{$p->updated_at}}
                </td>

               
            </tr>
    @endforeach
          
    </tbody>
</table>

@endsection
