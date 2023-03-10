@extends('master')
@section('content')

<!-- Button trigger modal -->
<center>
<button type="button" class="btn btn-primary fw-bold fs-5 mt-5 rounded-pill " data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Record
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CRUD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="insertData" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-2">
                <input type="text" placeholder="Enter Product Name" class="form-control" name="pname" id="">
            </div>

            <div class="mb-2">
                <input type="text" placeholder="Enter Product Price" class="form-control" name="pprice" id="">
            </div>

            <div class="mb-2">
                <input type="file" name="image" class="form-control" name="" id="">
            </div>
            <button type="submit" class="btn btn-primary fw-bold fs-5 rounded-pill" >Add Record</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</center>

<div class="container">
<table class="table mt-5">
    <thead class="bg-success text-white fw-bold">
        <th>Id</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Image</th>
        <th>Update</th>
        <th>Delete</th>
    </thead>
    <tbody class="text-black bg-light fs-4">
        @foreach($data as $item)

        <tr>
          <form action="updatedelete" method="get">
            <td class="pt-5"> <input type="hidden" name="id" value="{{$item ['Id']}}"> {{$item ['Id']}}</td>
            <td class="pt-5"><input type="hidden" name="name" value="{{$item ['PName']}}">{{$item ['PName']}}</td>
            <td class="pt-5"><input type="hidden" name="price" value="{{$item ['PPrice']}}">{{$item ['PPrice']}}</td>
            <td><img src="images/{{$item ['PImage']}}" width="100px" height="100px" alt=""></td>

            <td class="pt-5"> <input type="submit" class="btn btn-outline-warning rounded-pill" name="update" value="Update"> </td>
            <td class="pt-5"> <input type="submit" class="btn btn-outline-danger rounded-pill" value="Delete"> </td>

          </form>
        </tr>

        @endforeach
    </tbody>
</table>
</div> 
@endsection 